<?php

class ProductController
{
    public function actionIndex() {

        $productList = array();
        $productList = Product::getProductList();
        require_once(ROOT . '/views/product/index.php');
        return true;
    }

    public function actionView($id) {
        $result = false;
        $categoryList = array();
        $categoryList = Category::getCategoriesList();
        $recomendedProduct = array();
        $recomendedProduct = Product::getRecommendedBooks();

        if(isset($_POST['submit'])) {
            $options['author'] = $_POST['author'];
            $options['text'] = $_POST['text'];
            $options['rating'] = $_POST['rating'];
            $options['email'] = $_POST['email'];
            $options['id_book'] = $id;
            $errors = false;
            if(!isset($options['author']) || empty($options['author'])
                || !isset($options['text']) || empty($options['text'])
                || !isset($options['rating']) || empty($options['rating'])
                || !isset($options['email']) || empty($options['email'])){
                $errors[] = 'Ошибка.Заполните поля!';
            }
            if($errors == false ) {
                if($result == false){


                Review::createReviewBook($options);
                $options = false;
                $result = 'Ваш отзыв успешно отправлен. Ожидайте модерации.';
                }
            }

        }
        if($id) {
            $productInfo = Product::getProductById($id);
            $reviews = Product::getReviewById($id);
        }
        $title = "Азбука.Бай - Купить книгу {$productInfo['name']}";
        require_once(ROOT . '/views/product/view.php');
        return true;
    }

}