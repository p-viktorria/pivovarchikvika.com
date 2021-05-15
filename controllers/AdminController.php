<?php


class AdminController extends AdminBase
{
    public function actionIndex() {
        self::checkAdmin();
        $title = 'Азбука.Бай - Админ-панель';
        require_once(ROOT . '/views/admin/index.php');
        return true;
    }
}