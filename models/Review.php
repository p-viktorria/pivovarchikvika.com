<?php


class Review
{
    public static function getReviewInBook() {
        $db = Db::getConnection();
        $review = array();
        $sql = "SELECT * FROM review_in_book";
        $result = $db->query($sql);
        $i = 0;
        while ($row = $result->fetch()) {
            $review[$i]['id_review_in_book'] = $row['id_review_in_book'];
            $review[$i]['author'] = $row['author'];
            $review[$i]['rating'] = $row['rating'];
            $review[$i]['text'] = $row['text'];
            $review[$i]['email'] = $row['email'];
            $review[$i]['status'] = $row['status'];

            $i++;
        }
        return $review;
    }
    public static function getReviewInPost() {
        $db = Db::getConnection();
        $review = array();
        $sql = "SELECT * FROM review_in_article";
        $result = $db->query($sql);
        $i = 0;
        while ($row = $result->fetch()) {
            $review[$i]['id_review_in_article'] = $row['id_review_in_article'];
            $review[$i]['author'] = $row['author'];
            $review[$i]['rating'] = $row['rating'];
            $review[$i]['text'] = $row['text'];
            $review[$i]['email'] = $row['email'];
            $review[$i]['status'] = $row['status'];

            $i++;
        }
        return $review;
    }
    public static function getCountNewReviewBook() {
        $db = Db::getConnection();
        $sql = "SELECT COUNT(id_review_in_book) as count FROM review_in_book WHERE status=0";
        // с помощью этого запроса находим количество новых отзывов на книгу
          $result = $db->query($sql);
        return $result->fetch()['count'];
    }
    public static function getCountNewReviewPost() {
        $db = Db::getConnection();
        $sql = "SELECT COUNT(id_review_in_article) as count FROM review_in_article WHERE status=0";
          $result = $db->query($sql);
        return $result->fetch()['count'];
    }
    public static function getStatusText($status) {
        switch ($status){
            case 0:{
                return 'Новый комментарий';
                break;
            }
            case 1:{
                return 'Не отображается';
                break;
            }
            case 2:{
                return 'Отображается';
                break;
            }
        }
    }
    public static function reviewVisibleBook($id) {
    $db = Db::getConnection();
    $sql = "UPDATE review_in_book SET status=2 WHERE id_review_in_book=$id";
    $result = $db->query($sql);
    return $result->execute();
}
    public static function reviewUnVisibleBook($id) {
        $db = Db::getConnection();
        $sql = "UPDATE review_in_book SET status=1 WHERE id_review_in_book=$id";
        $result = $db->query($sql);
        return $result->execute();
    }
    public static function reviewVisiblePost($id) {
        $db = Db::getConnection();
        $sql = "UPDATE review_in_article SET status=2 WHERE id_review_in_article=$id";
        $result = $db->query($sql);
        return $result->execute();
    }
    public static function reviewUnVisiblePost($id) {
        $db = Db::getConnection();
        $sql = "UPDATE review_in_article SET status=1 WHERE id_review_in_article=$id";
        $result = $db->query($sql);
        return $result->execute();
    }
    public static function createReviewBook($option){
        $db = Db::getConnection();
        $sql = "INSERT INTO review_in_book (author,rating,text,email,id_book) VALUES ('{$option['author']}',{$option['rating']},'{$option['text']}','{$option['email']}',{$option['id_book']})";
        $result = $db->query($sql);
        return 0;
    }
    public static function createReviewPost($option){
        $db = Db::getConnection();
        $sql = "INSERT INTO review_in_article (author,rating,text,email,id_article) VALUES ('{$option['author']}',{$option['rating']},'{$option['text']}','{$option['email']}',{$option['id_article']})";
        $result = $db->query($sql);
        return 0;
    }

}