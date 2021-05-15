<?php


class User
{
    public static function getUsers() {
        $db = Db::getConnection();
        $sql = "SELECT * FROM user";
        $result = $db->query($sql);
        $users = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $users[$i]['id_user'] = $row['id_user'];
            $users[$i]['name'] = $row['name'];
            $users[$i]['email'] = $row['email'];
            $users[$i]['discount'] = $row['discount'];
            $users[$i]['role'] = $row['role'];
            $users[$i]['password'] = $row['password'];
            $i++;
        }
        return $users;
    }
    public static function updateUser($option) {
        $db = Db::getConnection();
        $sql = "UPDATE user SET name='{$option['name']}',email='{$option['email']}',role='{$option['role']}',discount={$option['discount']} WHERE id_user={$option['id_user']}";
        $result= $db->query($sql);
        return $result->execute();
    }
    //Проверка имени
    public static function checkName($name) {
        if(strlen($name) >= 3) {
            return true;
        }
        return false;
    }
    //Проверка пароля
    public static function checkPassword($password) {
        if(strlen($password) >=6 ) {
            return true;
        }
        return false;
    }
    //Проверка email
    public static function checkEmail($email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    public static function checkPhone($phone) {
        $phone = intval($phone);
        if(strlen($phone) > 6){
            return true;
        }
        return false;
    }
    public static function getDiscount() {
        if(isset($_SESSION['user'])) {
            $userId = $_SESSION['user'];
            $db = Db::getConnection();
            $result = $db->query('SELECT discount FROM user WHERE id_user ='. $userId);
            $discount = $result->fetch();
            return $discount['discount'];
        }else{
            return 0;
        }

    }
    //Проверка email на соответсвие в базе
    public static function checkEmailExist($email) {
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        if($result->fetchColumn()){
            return true;
        }
        return false;

    }
    //Регистрация нового пользователя на сайте
    public static function register($name, $email, $password) {
        $db =Db::getConnection();
        $discount = 1;
        $role = 'Пользователь';
        $sql = 'INSERT INTO user (name, email, password,discount,role) VALUES (:name, :email, :password,:discount,:role)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':discount', $discount, PDO::PARAM_INT);
        $result->bindParam(':role', $role, PDO::PARAM_STR);
        return  $result->execute();

    }
    //Проверка логина и пароля,возвращает ID-user
    public static function checkUserData($email, $password) {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';
        $result = $db->prepare($sql);
        $result->bindParam(':email',$email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if($user) {
            return $user['id_user'];
        }
        return false;
    }
    //Запись идентификатора пользователя в сессию
    public static function auth($userId) {
        $_SESSION['user'] = $userId;
    }
    //Проверка на то,авторизован ли пользователь
    public static function checkLogged() {

        if(isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /user/login");
    }
    //Является ли посетитель гостем
    public static function isGuest() {
        if(isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }
    //Получение информации о пользователе
    public static function getUserById($id_user) {
        if($id_user) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM user WHERE id_user = :id_user';
            $result = $db->prepare($sql);
            $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            return $result->fetch();
        }
    }

    //Изменение данных пользователя
    public static function edit($id_user, $name, $password) {
        $db = Db::getConnection();
        $sql = 'UPDATE user SET name = :name, password = :password WHERE id_user = :id_user';
        $result = $db->prepare($sql);
        $result->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();

    }
}