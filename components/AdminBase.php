<?php


class AdminBase
{
    public static function checkAdmin() {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        if($user['role'] == 'admin') {
            return true;
        }
        die("<img src='/template/images/404/unauthorized-access.png'>");
    }

    public static function statusOrderText($number)
    {
        switch ($number) {
            case 1:
                return 'Новый заказ';
                break;
            case 2:
                return 'В обработке';
                break;
            case 3:
                return 'Отгружен, ожидает доставки';
                break;
            case 4:
                return 'В пути';
                break;
            case 5:
                return 'Завершён';
                break;
        }
    }

}