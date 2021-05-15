<?php


class Product
{
    const SHOW_BY_DEFAULT = 6;
    public static function getProductById($id) {
        $id = intval($id);
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM book WHERE id_book='.$id);
        return $result->fetch();
    }
    //Возвращает последние товары
    public static function getLatestProduct($count = self::SHOW_BY_DEFAULT) {
        $count = intval($count);
        // intval — Возвращает целое значение переменной
        $db = Db::getConnection();
        $latestProduct = array();
        $result = $db->query('SELECT id_book,name,price,is_new,is_recomended,img FROM book'
            .' WHERE status > 0 '
            .' ORDER BY sort_order ASC' //ASC - по возрастанию
            .' LIMIT '.$count);
        $i = 0;
        while ($row = $result->fetch()) {
            $latestProduct[$i]['id_book'] = $row['id_book'];
            $latestProduct[$i]['name'] = $row['name'];
            $latestProduct[$i]['img'] = $row['img'];
            $latestProduct[$i]['price'] = $row['price'];
            $latestProduct[$i]['is_new'] = $row['is_new'];
            $latestProduct[$i]['is_recomended'] = $row['is_recomended'];
            $i++;
        }
        return $latestProduct;
    }
    public static function getCountProductInCategory($id_category) {
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(id_book) as count FROM book WHERE id_category='.$id_category;
        $result = $db->query($sql);
        $count = $result->fetch();
        return $count['count'];
    }
    //Получение списка товаров по категории постранично
    public static function getProductsListByCategory($id_category, $page = 1) {
        $id_category = intval($id_category);
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $sort = false;
        if(isset($_SERVER['REDIRECT_QUERY_STRING'])){
            if(isset($_GET['sort'])) {
                $sort = $_GET['sort'];
            }
        }
        $db = Db::getConnection();
        $productByCategory = array();
        $sql = 'SELECT *'
            .' FROM book'
            .' WHERE id_category='.$id_category
            .' LIMIT '.self::SHOW_BY_DEFAULT
            .' OFFSET '. $offset;
        if($sort){
            $sql = Product::getSort($sort, $id_category, $offset);
        }

        $result = $db->query($sql);
        $i = 0;

        while ($row = $result->fetch()) {
            $productByCategory[$i]['id_book'] = $row['id_book'];
            $productByCategory[$i]['name'] = $row['name'];
            $productByCategory[$i]['price'] = $row['price'];
            $productByCategory[$i]['img'] = $row['img'];
            $productByCategory[$i]['year'] = $row['year'];
            $i++;
        }


        return $productByCategory;
    }
    public static function getProductsList() {
        $books = array();
        $db = Db::getConnection();
        $sql = 'SELECT * FROM book ORDER BY id_book DESC';
        $result = $db->query($sql);
        $i = 0;
        while ($row = $result->fetch()) {
            $books[$i]['id_book'] = $row['id_book'];
            $books[$i]['name'] = $row['name'];
            $books[$i]['price'] = $row['price'];
            $books[$i]['status'] = $row['status'];
            $books[$i]['code'] = $row['code'];
            $i++;
        }
        return $books;
    }
    public static function deleteProductById($id_book) {
        $db = Db::getConnection();
        $sql = 'DELETE FROM book WHERE id_book = :id_book';
        $result = $db->prepare($sql);
        $result->bindParam(':id_book',$id_book, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function getImage($id) {
        $noImage = 'no-image.jpg';
        $path = '/upload/images/products/';
        $pathToProductsImage = $path. $id .'.jpg';
        if(file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductsImage)) {
            return $pathToProductsImage;
        }
        return $path. $noImage;
    }
    public static function createProduct($option) {
        $db = Db::getConnection();
        $sql = 'INSERT INTO book '
            .'(id_category,code,name,description,price,author,year,count_page,cover,publisher,is_recomended,is_new,status)'
            .' VALUES '
            .'(:id_category,:code,:name,:description,:price,:author,:date,:count_page,:cover,:publisher,:is_recommended,:is_new,:status)';
        $result = $db->prepare($sql);
        $result->bindParam(':id_category', $option['id_category'], PDO::PARAM_INT);
        $result->bindParam(':code', $option['code'], PDO::PARAM_INT);
        $result->bindParam(':name', $option['name'], PDO::PARAM_STR);
        $result->bindParam(':description', $option['description'], PDO::PARAM_STR);
        $result->bindParam(':price', $option['price'], PDO::PARAM_STR);
        $result->bindParam(':author', $option['author'], PDO::PARAM_STR);
        $result->bindParam(':date', $option['date'], PDO::PARAM_STR);
        $result->bindParam(':count_page', $option['count_page'], PDO::PARAM_INT);
        $result->bindParam(':cover', $option['cover'], PDO::PARAM_STR);
        $result->bindParam(':publisher', $option['publisher'], PDO::PARAM_STR);//
        $result->bindParam(':is_recommended', $option['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':is_new', $option['is_new'], PDO::PARAM_INT);
        $result->bindParam(':status', $option['status'], PDO::PARAM_INT);

        if($result->execute()){

                        return $db->lastInsertId();
        }
        return 0;
    }
    public static function recountRating($id_review) {
        $db = Db::getConnection();
        $sql = "SELECT * FROM review_in_book WHERE id_review_in_book=$id_review";
        $result = $db->query($sql);
        $review = $result->fetch();
        $id_book = $review['id_book'];
        $sql = "SELECT rating FROM review_in_book WHERE status=2 AND id_book=$id_book";
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
            $sql = "UPDATE book SET rating={$rating} WHERE id_book={$id_book}";
            $result = $db->query($sql);
            return $result->execute();
        }
        return 0;
    }

    public static function updateProduct($option) {
        $db = Db::getConnection();
        $sql = 'UPDATE book SET id_category= :id_category, code= :code, name= :name,'
            .' description= :description, price= :price, author= :author, year= :date,'
            .' count_page= :count_page, cover= :cover, publisher= :publisher,'
            .' is_recomended= :is_recommended,is_new= :is_new, status= :status WHERE id_book= :id_book;';
        $result = $db->prepare($sql);
        $result->bindParam(':id_category', $option['id_category'], PDO::PARAM_INT);
        $result->bindParam(':id_book', $option['id_book'], PDO::PARAM_INT);
        $result->bindParam(':code', $option['code'], PDO::PARAM_INT);
        $result->bindParam(':name', $option['name'], PDO::PARAM_STR);
        $result->bindParam(':description', $option['description'], PDO::PARAM_STR);
        $result->bindParam(':price', $option['price'], PDO::PARAM_STR);
        $result->bindParam(':author', $option['author'], PDO::PARAM_STR);
        $result->bindParam(':date', $option['date'], PDO::PARAM_STR);
        $result->bindParam(':count_page', $option['count_page'], PDO::PARAM_INT);
        $result->bindParam(':cover', $option['cover'], PDO::PARAM_STR);
        $result->bindParam(':publisher', $option['publisher'], PDO::PARAM_STR);//
        $result->bindParam(':is_recommended', $option['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':is_new', $option['is_new'], PDO::PARAM_INT);
        $result->bindParam(':status', $option['status'], PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getRecommendedBooks() {
        $books = array();
        $db = Db::getConnection();
        $sql = 'SELECT * FROM book WHERE is_recomended ORDER by rating DESC LIMIT 12';
        $result = $db->query($sql);
        $i = 0;
        while ($row = $result->fetch()) {
            $books[$i]['id_book'] = $row['id_book'];
            $books[$i]['name'] = $row['name'];
            $books[$i]['img'] = $row['img'];
            $books[$i]['price'] = $row['price'];
            $i++;
        }
        return $books;
    }
    public static function getReviewById($id_book) {
        $review = array();
        $db = Db::getConnection();
        $sql = 'SELECT * FROM review_in_book WHERE status = 2 AND  id_book ='. $id_book;
        $result = $db->query($sql);
        $i = 0;
        while ($row = $result->fetch()) {
            $review[$i]['author'] = $row['author'];
            $review[$i]['date'] = $row['date'];
            $review[$i]['text'] = $row['text'];
            $review[$i]['rating'] = $row['rating'];
            $i++;
        }


        return $review;
    }
    public static function getProductBySearch() {
        $products = array();
        $searchString = $_POST['search'];
        $searchInt = intval($searchString);

        $db = Db::getConnection();
        $sql = 'SELECT * FROM book WHERE status > 0 AND name  LIKE "%'. $searchString.'%"'
            . 'UNION SELECT * FROM book WHERE status > 0 AND author  LIKE "%'. $searchString.'%"'
            . 'UNION SELECT * FROM book WHERE status > 0 AND publisher LIKE "%'. $searchString.'%"';
        if($searchInt){
            $sql = $sql. 'UNION SELECT * FROM book WHERE status > 0 AND year  LIKE "%'. $searchInt.'%"';
        }
            $sql = $sql. ' LIMIT 50';

        $result = $db->query($sql);
        $i = 0;
        while ($row = $result->fetch()){
            $products[$i]['id_book'] = $row['id_book'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['img'] = $row['img'];
            $products[$i]['year'] = $row['year'];
            $i++;
        }
        return $products;
    }
    public static function getSort($sort, $id_category, $offset)
    {
        switch ($sort) {
            case 'minPrice':
                $sql = 'SELECT *'
                    . ' FROM book'
                    . ' WHERE id_category=' . $id_category
                    . ' ORDER BY price ASC' //ASC - по возрастанию
                    . ' LIMIT ' . self::SHOW_BY_DEFAULT
                    . ' OFFSET ' . $offset;
                break;
            case 'maxPrice':
                $sql = 'SELECT *'
                    . ' FROM book'
                    . ' WHERE id_category=' . $id_category
                    . ' ORDER BY price DESC' //DESC - по убыванию
                    . ' LIMIT ' . self::SHOW_BY_DEFAULT
                    . ' OFFSET ' . $offset;
                break;
            case 'rating':
                $sql = 'SELECT *'
                    . ' FROM book'
                    . ' WHERE id_category=' . $id_category
                    . ' ORDER BY rating DESC'
                    . ' LIMIT ' . self::SHOW_BY_DEFAULT
                    . ' OFFSET ' . $offset;
                break;
                case 'date':
                $sql = 'SELECT *'
                    . ' FROM book'
                    . ' WHERE id_category=' . $id_category
                    . ' ORDER BY year DESC'
                    . ' LIMIT ' . self::SHOW_BY_DEFAULT
                    . ' OFFSET ' . $offset;
                break;

        }
        return $sql;
    }
    //Получение количества активных товаров в категории
    public static function getTotalProductsInCategory($id_category) {
        $id_category = intval($id_category);
        $db = Db::getConnection();
        $result = $db->query('SELECT COUNT(id_book) AS quantity FROM book'
        .' WHERE id_category ='.$id_category);

        $quantity = $result->fetch();
        return $quantity['quantity'];
    }
    public static function getProductsByIds($idsArray) {
        $products = array();
        $db = Db::getConnection();
        $idsString = implode(',', $idsArray);
        // implode — Объединяет элементы массива в строку
        $sql = "SELECT * FROM book WHERE status = 1 AND id_book IN($idsString)";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;

        while ($row = $result->fetch()) {
            $products[$i]['id_book'] = $row['id_book'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['img'] = $row['img'];
            $i++;
        }
        return $products;
    }
    public static function getProductsByIdsAdmin($idsArray) {
        $products = array();
        $db = Db::getConnection();
        $idsString = implode(',', $idsArray);
        // implode — Объединяет элементы массива в строку
        $sql = "SELECT * FROM book WHERE id_book IN($idsString)";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;

        while ($row = $result->fetch()) {
            $products[$i]['id_book'] = $row['id_book'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['img'] = $row['img'];
            $products[$i]['quantity'] = 0;
            $i++;
        }
        return $products;
    }
}