<?php


class Blog
{

    public static function getTotalBlog() {
        $db = Db::getConnection();
        $result = $db->query('SELECT COUNT(id_article) AS quantity FROM article');
        $quantity = $result->fetch();
        return $quantity['quantity'];
    }
    public static function getBlogById($id) {
        $id = intval($id);
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM article WHERE id_article='.$id);
        return $result->fetch();
    }
    public static function getReviewById($id_article) {
        $review = array();
        $db = Db::getConnection();
        $sql = 'SELECT * FROM review_in_article WHERE status = 2 AND id_article='.$id_article;
        $result = $db->query($sql);
        $i = 0;
        while ($row = $result->fetch()) {
            $review[$i]['rating'] = $row['rating'];
            $review[$i]['text'] = $row['text'];
            $review[$i]['author'] = $row['author'];
            $review[$i]['date'] = $row['date'];
            $i++;
        }
        return $review;
    }
    public static function getBlogList($page = 1) {
        $page = intval($page);
        // intval — возвращает целое значение переменной
        $offset = ($page - 1) * 5;
        $sort = false;
        $db = Db::getConnection();
        $blogList = array();
        $sql = 'SELECT *'
            .' FROM article'
            .' ORDER BY date DESC' // DESC - по убыванию
            .' LIMIT 5'
            .' OFFSET '. $offset; //OFFSET - ограничивает выборку по количеству

        $result = $db->query($sql);
        $i = 0;

        while ($row = $result->fetch()) { // fetch - получение результирующей строки в виде массива
            $blogList[$i]['id_article'] = $row['id_article'];
            $blogList[$i]['title'] = $row['title'];
            $blogList[$i]['preview'] = $row['preview'];
            $blogList[$i]['author'] = $row['author'];
            $blogList[$i]['date'] = $row['date'];
            $blogList[$i]['rating'] = $row['rating'];
            $blogList[$i]['img'] = $row['img'];
            $i++;
        }


        return $blogList;
    }
    public static function getBlogListAdmin() {
        $db = Db::getConnection();
        $blogList = array();
        $sql = "SELECT * FROM article";
        $result = $db->query($sql);
        $i = 0;

        while ($row = $result->fetch()) { // fetch - получение результирующей строки в виде массива
            $blogList[$i]['id_article'] = $row['id_article'];
            $blogList[$i]['title'] = $row['title'];
            $blogList[$i]['preview'] = $row['preview'];
            $blogList[$i]['author'] = $row['author'];
            $blogList[$i]['date'] = $row['date'];
            $blogList[$i]['text'] = $row['text'];
            $blogList[$i]['rating'] = $row['rating'];
            $i++;
        }
        return $blogList;
    }
    public static function recountRating($id_review) {
        $db = Db::getConnection();
        $sql = "SELECT * FROM review_in_article WHERE id_review_in_article=$id_review";
        $result = $db->query($sql);
        $review = $result->fetch();
        $id_article = $review['id_article'];
        $sql = "SELECT rating FROM review_in_article WHERE status=2 AND id_article=$id_article";
        $result = $db->query($sql);
        $ratings = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ratings[$i] = $row['rating'];
            $i++;
        }
        $rating = 0;
        foreach ($ratings as $rait) {
            $rating +=$rait;
        }
        if(count($ratings)>0){
            $rating = $rating/count($ratings);
            $sql = "UPDATE article SET rating={$rating} WHERE id_article={$id_article}";
            $result = $db->query($sql);
            return $result->execute();
        }
        return 0;
    }
    public static function createBlog($option) {
        $db = Db::getConnection();
        $sql = 'INSERT INTO article '
            .'(title,preview,text,author)'
            .' VALUES '
            .'(:title,:preview,:text,:author)';
        $result = $db->prepare($sql);
        // bindParam — привязывает параметр запроса к переменной
        $result->bindParam(':title', $option['title'], PDO::PARAM_STR);
        $result->bindParam(':preview', $option['preview'], PDO::PARAM_STR);
        $result->bindParam(':text', $option['text'], PDO::PARAM_STR);
        $result->bindParam(':author', $option['author'], PDO::PARAM_STR);

        if($result->execute()){

            return $db->lastInsertId();
        }
        return 0;
    }
    public static function updateBlog($option) {
        $db = Db::getConnection();
        $sql = 'UPDATE article SET'
            .' title=:title,preview=:preview,text=:text,author=:author'
            .' WHERE id_article=:id_article';
        $result = $db->prepare($sql);
        $result->bindParam(':id_article', $option['id_article'], PDO::PARAM_INT);
        $result->bindParam(':title', $option['title'], PDO::PARAM_STR);
        $result->bindParam(':preview', $option['preview'], PDO::PARAM_STR);
        $result->bindParam(':text', $option['text'], PDO::PARAM_STR);
        $result->bindParam(':author', $option['author'], PDO::PARAM_STR);
        return $result->execute();
    }
    public static function deleteBlog($id_article) {
        $db = Db::getConnection();
        $sql = 'DELETE FROM article WHERE id_article = :id_article';
        $result = $db->prepare($sql);
        $result->bindParam(':id_article',$id_article, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function getImage($id) {
        $noImage = 'no-image.jpg';
        $path = '/upload/images/blogs/';
        $pathToProductsImage = $path. $id .'.jpg';
        if(file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductsImage)) {
            return $pathToProductsImage;
        }
        return $path. $noImage;
    }

}