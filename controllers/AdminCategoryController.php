<?php


class AdminCategoryController extends AdminBase
{
    public function actionIndex() {
        $dataTableCountColumn = 3;
        $title = 'Азбука.Бай - Админ-панель-Книги';
        self::checkAdmin();
        $categoryList = Category::getCategoriesListAdmin();
        require_once(ROOT . '/views/admin_category/index.php');
        return true;
    }
    public function actionDelete($id) {
        $title = 'Азбука.Бай - Админ-панель-Удаление товара';
        self::checkAdmin();
        if(isset($_POST['submit'])) {

            Category::deleteCategoryById($id);
            header("Location: /admin/category");
        }
        require_once(ROOT . '/views/admin_category/delete.php');
        return true;
    }
    public function actionCreate() {
        $title = 'Азбука.Бай - Админ-панель-Создание категории';
        if(isset($_POST['submit'])){
            $options['name'] = $_POST['name'];
            $options['status'] = $_POST['status'];
            $errors = false;
            if(!isset($options['name']) || empty($options['name']) || !isset($options['status']) || empty($options['status'])) {
                $errors[] = 'Ошибка добавления.Заполните поля!';
            }
            if($errors == false) {
                Category::createCategory($options);
                header("Location: /admin/category");
            }
    }
        require_once(ROOT . '/views/admin_category/create.php');
        return true;
}

    public function actionUpdate($id) {
        $title = 'Азбука.Бай - Админ-панель-Редактирование категории';
        $category = Category::getCategoryById($id);
        if(isset($_POST['submit'])){
            $options['id_category'] = $id;
            $options['name'] = $_POST['name'];
            $options['status'] = $_POST['status'];
            $errors = false;
            if(!isset($options['name']) || empty($options['name']) || !isset($options['status']) || empty($options['status'])) {
                $errors[] = 'Ошибка добавления.Заполните поля!';
            }
            if($errors == false) {
                Category::updateCategory($options);
                header("Location: /admin/category");
            }
        }
        require_once(ROOT . '/views/admin_category/update.php');
        return true;
    }

}