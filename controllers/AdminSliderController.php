<?php


class AdminSliderController extends AdminBase
{
    public function actionIndex() {
        $title = 'Азбука.Бай - Админ-панель-Слайдер';
        self::checkAdmin();
        $slider = Slider::getSliderList();
        require_once(ROOT . '/views/admin_slider/index.php');
        return true;
    }
    public function actionDelete($id) {
        self::checkAdmin();
        Slider::deleteSlide($id);
        header("Location: /admin/slider");
    }

    public function actionCreate() {
        self::checkAdmin();
        $title = 'Азбука.Бай - Админ-панель-Создание слайда';
        if(isset($_POST['submit'])) {
            $options['h1'] = $_POST['h1'];
            $options['h2'] = $_POST['h2'];
            $options['p'] = $_POST['p'];
            $options['href'] = $_POST['href'];
            $errors = false;
            if (!isset($options['h1']) || empty($options['h1']) || !isset($options['h2']) || empty($options['h2'])
                || !isset($options['p']) || empty($options['p']) || !isset($options['href']) || empty($options['href'])) {
                $errors[] = 'Ошибка добавления.Заполните поля!';
            }
            if ($errors == false) {
                $id = Slider::createSlide($options);
                if ($id) {
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/slider/{$id}.jpg");
                    }
                }
                header("Location: /admin/slider");
            }
        }
        require_once(ROOT . '/views/admin_slider/create.php');
        return true;
    }
    public function actionUpdate($id) {
        self::checkAdmin();
        $slide = Slider::getSlideById($id);
        $title = 'Азбука.Бай - Админ-панель-Редактирование слайда';
        if(isset($_POST['submit'])) {
            $options['h1'] = $_POST['h1'];
            $options['h2'] = $_POST['h2'];
            $options['p'] = $_POST['p'];
            $options['href'] = $_POST['href'];
            $errors = false;
            if (!isset($options['h1']) || empty($options['h1']) || !isset($options['h2']) || empty($options['h2'])
                || !isset($options['p']) || empty($options['p']) || !isset($options['href']) || empty($options['href'])) {
                $errors[] = 'Ошибка добавления.Заполните поля!';
            }
            if ($errors == false) {
                $id = Slider::createSlide($options);
                if ($id) {
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/slider/{$id}.jpg");
                    }
                }
                header("Location: /admin/slider");
            }
        }
        require_once(ROOT . '/views/admin_slider/update.php');
        return true;
    }
}