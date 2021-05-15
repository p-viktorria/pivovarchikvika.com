<?php


class UserController
{
    public function actionRegister() {
        $name = '';
        $email = '';
        $password = '';
        $result = false;
        $title = "Азбука.Бай - Регистрация";
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if(!User::checkName($name)) {
                $errors[] = 'Имя должно быть не короче 3-х символов';
            }
            if(!User::checkPassword($password)) {
                $errors[] = 'Пароль должен быть не короче 6-ти символов';
            }
            if(!User::checkEmail($email)) {
                $errors[] = 'Неправильный Email';
            }
            if(User::checkEmailExist($email)) {
                $errors[] = 'Такой email уже используется';
            }

            if($errors == false) {
                $result = User::register($name, $email, $password);
            }
        }


        require_once(ROOT . '/views/user/register.php');
        return true;
    }

    public function actionLogin() {
        $email = '';
        $password = '';
        $title = "Азбука.Бай - Вход в личный кабинет";
        if(isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $errors = false;
            if(!User::checkEmail($email)) {
                $errors[] = 'Неправильный Email';
            }
            if(!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            $userId = User::checkUserData($email, $password);
            if($userId == false) {
                $errors[] = 'Неправильный email или пароль';
            }else {
                User::auth($userId);
                header("Location: /cabinet/");
            }
        }
        require_once(ROOT . '/views/user/login.php');
        return true;
    }

    public function actionLogout() {
        unset($_SESSION['user']);
        header("Location: /");
    }

}