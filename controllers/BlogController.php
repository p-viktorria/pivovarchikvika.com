<?php


class BlogController
{
    public function actionIndex($page = 1) {
        $title = "Азбука.Бай - Наши статьи";
        $categoryList = array();
        $categoryList = Category::getCategoriesList();
        $blogList = Blog::getBlogList($page);
        $total = Blog::getTotalBlog();
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
        require_once(ROOT . '/views/blog/index.php');
        return true;
    }
    public function actionView($id_article) {
        $result = false;
        $categoryList = array();
        $categoryList = Category::getCategoriesList();
        $blog = Blog::getBlogById($id_article);
        $title = "Азбука.Бай - {$blog['title']}";
        $reviews = Blog::getReviewById($id_article);
        if(isset($_POST['submit'])) {
            $options['author'] = $_POST['author'];
            $options['text'] = $_POST['text'];
            $options['rating'] = $_POST['rating'];
            $options['email'] = $_POST['email'];
            $options['id_article'] = $id_article;
            $errors = false;
            if(!isset($options['author']) || empty($options['author'])
                || !isset($options['text']) || empty($options['text'])
                || !isset($options['rating']) || empty($options['rating'])
                || !isset($options['email']) || empty($options['email'])){
                $errors[] = 'Ошибка.Заполните поля!';
            }
            if($errors == false ) {
                if($result == false){


                    Review::createReviewPost($options);
                    $options = false;
                    $result = 'Ваш отзыв успешно отправлен. Ожидайте модерации.';
                }
            }

        }
        require_once(ROOT . '/views/blog/view.php');
        return true;
    }

}