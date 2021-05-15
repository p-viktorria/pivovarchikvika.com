<?php


class AdminUserController extends AdminBase
{
    public function actionIndex() {
        self::checkAdmin();
        $title = 'Азбука.Бай - Админ-панель-Пользователи';
        $dataTableCountColumn = 5;
        $users = User::getUsers();

        require_once(ROOT . '/views/admin_user/index.php');
        return true;
    }
    public function actionUpdate($id_user) {
        $title = 'Азбука.Бай - Админ-панель-Редактирование пользователя';
        $user = User::getUserById($id_user);
        if(isset($_POST['submit'])){
            $options['id_user'] = $id_user;
            $options['name'] = $_POST['name'];
            $options['email'] = $_POST['email'];
            $options['role'] = $_POST['role'];
            $options['discount'] = $_POST['discount'];

            $errors = false;
            if(!isset($options['name']) || empty($options['name'])
                || !isset($options['email']) || empty($options['email'])
                || !isset($options['role']) || empty($options['role'])
                || !isset($options['discount']) || empty($options['discount'])) {
                $errors[] = 'Ошибка добавления.Заполните поля!';
            }
            if($errors == false) {
                $id = Blog::createBlog($options);
                User::updateUser($options);
                header("Location: /admin/user");
            }
        }
        require_once(ROOT . '/views/admin_user/update.php');
        return true;
    }
}