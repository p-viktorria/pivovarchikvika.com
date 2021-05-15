<?php


class AdminProductController extends AdminBase
{

    public function actionIndex() {
        $dataTableCountColumn = 5;
        $title = 'Азбука.Бай - Админ-панель-Книги';
        self::checkAdmin();
        $booksList = Product::getProductsList();
        require_once(ROOT . '/views/admin_product/index.php');
        return true;
    }
    public function actionDelete($id) {
        $title = 'Азбука.Бай - Админ-панель-Удаление товара';
        self::checkAdmin();
        if(isset($_POST['submit'])) {

            $bag = Product::deleteProductById($id);
            header("Location: /admin/book");
        }
        require_once(ROOT . '/views/admin_product/delete.php');
        return true;
    }
    public function actionCreate() {
        self::checkAdmin();
        $title = 'Азбука.Бай - Админ-панель-Создание товара';
        if(isset($_POST['submit'])){
            $options['name'] = $_POST['name'];
            $options['id_category'] = $_POST['id_category'];
            $options['description'] = $_POST['description'];
            $options['price'] = $_POST['price'];
            $options['author'] = $_POST['author'];
            $options['date'] = $_POST['date'];
            $options['count_page'] = $_POST['count_page'];
            $options['publisher'] = $_POST['publisher'];
            $options['cover'] = $_POST['cover'];
            $options['code'] = $_POST['code'];
            $options['status'] = $_POST['status'];
            if(isset($_POST['is_recommended'])){
                $options['is_recommended'] = 1;
            }else{
                $options['is_recommended'] = 0;
            }
            if(isset($_POST['is_new'])){
                $options['is_new'] = $_POST['is_new'];
            }else{
                $options['is_new'] = 0;
            }
            $errors = false;
            if(!isset($options['name']) || empty($options['name']) || !isset($options['id_category']) || empty($options['id_category'])
                || !isset($options['price']) || empty($options['price'])|| !isset($options['author']) || empty($options['author'])
                || !isset($options['date']) || empty($options['date'])|| !isset($options['count_page']) || empty($options['count_page'])
                || !isset($options['cover']) || empty($options['cover'])|| !isset($options['code']) || empty($options['code'])
                || !isset($options['publisher']) || empty($options['publisher'])) {
                $errors[] = 'Ошибка добавления.Заполните поля!';
            }
            if($errors == false) {
                $id = Product::createProduct($options);
                if($id){
                    if(is_uploaded_file($_FILES["image"]["tmp_name"])){
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                    }
                }
                header("Location: /admin/book");
            }
        }
        $categoryList = Category::getCategoriesListAdmin();

        require_once(ROOT . '/views/admin_product/create.php');
        return true;
    }
    public function actionUpdate($id) {
        self::checkAdmin();
        $categoryList = Category::getCategoriesListAdmin();
        $book = Product::getProductById($id);
        $title = 'Азбука.Бай - Админ-панель-Изменение товара';
        $categoryById = Category::getCategoryById($book['id_category']);
        if(isset($_POST['submit'])){
            $options['id_book'] = intval($id);
            $options['name'] = $_POST['name'];
            $options['id_category'] = $_POST['id_category'];
            $options['description'] = $_POST['description'];
            $options['price'] = $_POST['price'];

            $options['author'] = $_POST['author'];
            $options['date'] = $_POST['date'];
            $options['count_page'] = $_POST['count_page'];
            $options['publisher'] = $_POST['publisher'];
            $options['cover'] = $_POST['cover'];
            $options['code'] = $_POST['code'];
            $options['status'] = $_POST['status'];
            if(isset($_POST['is_recommended'])){
                $options['is_recommended'] = $_POST['is_recommended'];
            }else{
                $options['is_recommended'] = 0;
            }
            if(isset($_POST['is_new'])){
                $options['is_new'] = $_POST['is_new'];
            }else{
                $options['is_new'] = 0;
            }
            $errors = false;
            if(!isset($options['name']) || empty($options['name']) || !isset($options['id_category']) || empty($options['id_category'])
                || !isset($options['price']) || empty($options['price'])|| !isset($options['author']) || empty($options['author'])
                || !isset($options['date']) || empty($options['date'])|| !isset($options['count_page']) || empty($options['count_page'])
                || !isset($options['cover']) || empty($options['cover'])|| !isset($options['code']) || empty($options['code'])
                || !isset($options['publisher']) || empty($options['publisher'])) {
                $errors[] = 'Ошибка добавления.Заполните поля!';
            }
            if($errors == false) {
                Product::updateProduct($options);
                if($id){
                    if(is_uploaded_file($_FILES["image"]["tmp_name"])){
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/products/{$id}.jpg");
                    }
                }
                header("Location: /admin/book");
            }
        }


        require_once(ROOT . '/views/admin_product/update.php');
        return true;
    }
}