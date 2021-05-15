<?php


class AdminBlogController extends AdminBase

// используем принцип ООП: наследование

{
    public function actionIndex() {
        self::checkAdmin();
        $title = 'Азбука.Бай - Админ-панель-Статьи';
        $dataTableCountColumn = 5;
        $blogList = Blog::getBlogListAdmin();
        require_once(ROOT . '/views/admin_blog/index.php');
        return true;
    }
    public function actionCreate() {
        self::checkAdmin();
        $title = 'Азбука.Бай - Админ-панель-Создание статьи';
        if(isset($_POST['submit'])){
            $options['title'] = $_POST['title'];
            $options['preview'] = $_POST['preview'];
            $options['text'] = $_POST['text'];
            $options['author'] = $_POST['author'];

            $errors = false;
            if(!isset($options['title']) || empty($options['title'])
                || !isset($options['preview']) || empty($options['preview'])
                || !isset($options['text']) || empty($options['text'])
                || !isset($options['author']) || empty($options['author'])) {
                $errors[] = 'Ошибка добавления.Заполните поля!';
            }
            if($errors == false) {
                $id = Blog::createBlog($options);
                if($id){
                    if(is_uploaded_file($_FILES["image"]["tmp_name"])){
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/blogs/{$id}.jpg");
                    }
                }
                header("Location: /admin/blog");
            }
        }
        require_once(ROOT . '/views/admin_blog/create.php');
        return true;
    }
    public function actionDelete($id_article) {
        $title = 'Азбука.Бай - Админ-панель-Удаление статьи';
        self::checkAdmin();
        if(isset($_POST['submit'])) {

            $bag = Product::deleteProductById($id_article);
            header("Location: /admin/blog");
        }
        require_once(ROOT . '/views/admin_blog/delete.php');
        return true;
    }
    public function actionUpdate($id_article) {
        self::checkAdmin();
        $blog = Blog::getBlogById($id_article);
        $title = 'Азбука.Бай - Админ-панель-Изменение статьи';

        if(isset($_POST['submit'])){
            $options['title'] = $_POST['title'];
            $options['preview'] = $_POST['preview'];
            $options['text'] = $_POST['text'];
            $options['author'] = $_POST['author'];

            $errors = false;
            if(!isset($options['title']) || empty($options['title'])
                || !isset($options['preview']) || empty($options['preview'])
                || !isset($options['text']) || empty($options['text'])
                || !isset($options['author']) || empty($options['author'])) {
                $errors[] = 'Ошибка добавления.Заполните поля!';
            }
            if($errors == false) {
                Blog::createBlog($options);
                if($id_article){
                    // is_uploaded_file — определяет, был ли файл загружен при помощи HTTP POST
                    // move_uploaded_file — перемещает загруженный файл в новое место
                    if(is_uploaded_file($_FILES["image"]["tmp_name"])){
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/blogs/{$id_article}.jpg");
                    }
                }
                header("Location: /admin/blog");
            }
        }


        require_once(ROOT . '/views/admin_blog/update.php');
        return true;
    }
}