<?php


class AdminOrderController extends AdminBase
{
    public function actionIndex() {
        $dataTableCountColumn = 5;
        $title = 'Азбука.Бай - Админ-панель-Заказы';
        self::checkAdmin();
        $orders = Order::getOrders();

        require_once(ROOT . '/views/admin_order/index.php');
        return true;
    }

    public function actionUpdate($id) {
        $title = 'Азбука.Бай - Админ-панель-Редактирование заказа №'.$id;
        $dataTableCountColumn = 5;
        $orderInfo = Order::getOrderById($id);
        $productsInOrder = array();
        $productsInOrder = Order::getProductsInOrder($id);
        $errors = false;
        if(isset($_POST['submit'])) {
            $options['id_order'] = $id;
            $options['user_name'] = $_POST['user_name'];
            $options['payment'] = $_POST['payment'];
            $options['user_email'] = $_POST['user_email'];
            $options['delivery'] = $_POST['delivery'];
            $options['address'] = $_POST['address'];
            $options['comment'] = $_POST['comment'];
            $options['status'] = $_POST['status'];
            if( !isset($options['user_name']) || empty($options['user_name'])
                || !isset($options['payment']) || empty($options['payment'])
                || !isset($options['user_email']) || empty($options['user_email'])
                || !isset($options['delivery']) || empty($options['delivery'])
                || !isset($options['address']) || empty($options['address'])
                || !isset($options['status']) || empty($options['status']) ) {
                $errors[] = 'Ошибка.Заполните поля!';
            }
            if($errors == false) {
                Order::update($options);
                header("Location: /admin/order/update/{$id}");
            }

        }
        require_once(ROOT . '/views/admin_order/update.php');
        return true;
    }
    public function actionDeleteProduct($id_order, $id_book){
        Order::deleteProductFromOrder($id_order,$id_book);
        Order::recountTotalOrder($id_order);
        header("Location: /admin/order/update/{$id_order}");
    }
    public function actionUpdateProduct($id_order, $id_book){
        $title = 'Азбука.Бай - Админ-панель-Изменение кол-ва товара в заказе';
        $products = Product::getProductsList();
        $quantityBook = Order::getQuantityProductInOrder($id_order, $id_book);
        $quantityBook = $quantityBook['quantity'];

        $errors = false;
        if(isset($_POST['submit'])) {
            $options['quantity'] = intval($_POST['quantity']);
            $options['id_book'] = $id_book;
            $options['id_order'] = $id_order;
            if(!isset($options['quantity']) || empty($options['quantity'])) {
                $errors[] = 'Ошибка.Заполните поля!';
            }
            if($errors == false) {
                Order::updateProductInOrder($options);
                Order::recountTotalOrder($id_order);
                header("Location: /admin/order/update/{$id_order}");
            }
        }
        require_once(ROOT . '/views/admin_order/product_in_order/update.php');
        return true;
    }
    public function actionCreateProduct($id_order){
        $title = 'Азбука.Бай - Админ-панель-Добавление товара в заказ';
        $products = Product::getProductsList();

        $errors = false;
        if(isset($_POST['submit'])) {
            $options['quantity'] = intval($_POST['quantity']);
            $options['id_book'] = intval($_POST['id_book']);
            $options['id_order'] = intval($id_order);
            if(!isset($options['quantity']) || empty($options['quantity']) ||
                !isset($options['id_book']) || empty($options['id_book'])) {
                $errors[] = 'Ошибка.Заполните поля!';
            }
            if($errors == false) {
                Order::createProductInOrder($options);
                Order::recountTotalOrder($id_order);
                header("Location: /admin/order/update/{$id_order}");
            }
        }


        require_once(ROOT . '/views/admin_order/product_in_order/create.php');
        return true;
    }


}