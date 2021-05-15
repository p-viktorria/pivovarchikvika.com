<?php


class AdminReviewController extends AdminBase
{
    public function actionReviewBook() {
        self::checkAdmin();
        $dataTableCountColumn = 4;
        $title = 'Азбука.Бай - Админ-панель-Отзывы товары';
        $reviewInBook = Review::getReviewInBook();
        require_once(ROOT . '/views/admin_review/review_book.php');
        return true;
    }
    public function actionReviewVisibleBook($id) {
        self::checkAdmin();
        Review::reviewVisibleBook($id);
        Product::recountRating($id);
        header("Location: /admin/review-in-book");
    }
    public function actionReviewUnVisibleBook($id) {
        self::checkAdmin();
        Review::reviewUnVisibleBook($id);
        Product::recountRating($id);
        header("Location: /admin/review-in-book");
    }
    public function actionReviewPost() {
        self::checkAdmin();
        $dataTableCountColumn = 4;
        $title = 'Азбука.Бай - Админ-панель-Отзывы статьи';
        $reviewInPost = Review::getReviewInPost();
        require_once(ROOT . '/views/admin_review/review_post.php');
        return true;
    }
    public function actionReviewVisiblePost($id) {
        self::checkAdmin();
        Review::reviewVisiblePost($id);
        Blog::recountRating($id);
        header("Location: /admin/review-in-post");
    }
    public function actionReviewUnVisiblePost($id) {
        self::checkAdmin();
        Review::reviewUnVisiblePost($id);
        Blog::recountRating($id);
        header("Location: /admin/review-in-post");
    }
}