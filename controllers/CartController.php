<?php


class CartController
{
    public function actionAdd($id_product) {
        Cart::addProduct($id_product);
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }
    public function actionDelete($id_product) {
        Cart::delete($id_product);
        header("Location: /checkout");
        return true;
    }
    public function actionAddAjax($id_product) {
        echo Cart::addProduct($id_product);
        return true;
    }
    public function actionIndex() {
        $title = "Азбука.Бай - Корзина";
        $categoryList = array();
        $categoryList = Category::getCategoriesList();
        $productsInCart = false;
        $productsInCart = Cart::getProducts();
        if($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);
            $total = Cart::getTotalPrice($products);
        }
        require_once(ROOT . '/views/cart/index.php');
        return true;
    }
    public function actionCheckout() {
        $title = "Азбука.Бай - Оформление заказа";
        $categoryList = array();
        $categoryList = Category::getCategoriesList();
        $result = false;
        $user = false;
        $discount = User::getDiscount();

        if(isset($_POST['submit'])) {

            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userEmail = $_POST['userEmail'];
            $userComment = $_POST['message'];
            $userDelivery = $_POST['delivery'];
            $userAddress = $_POST['userAddress'];
            $payment = $_POST['payment'];
            $errors = false;
            if(!User::checkName($userName)){
                $errors[] = 'Неверное имя';
            }
            if(!User::checkEmail($userEmail)){
                $errors[] = 'Неверная электронная почта';
            }
            if(!User::checkPhone($userPhone)){
                $errors[] = 'Неверный телефон';
            }
            if($errors == false) {
                $productsInCart = Cart::getProducts();
                if(User::isGuest()) {
                    $userId = false;
                }else{
                    $userId = User::checkLogged();
                }
                $productsInCart = Cart::getProducts();
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $fullOrderPrice =  round($totalPrice - ($totalPrice*$discount/100),2);
                $result = Order::save($userName, $userEmail, $userPhone, $userComment, $userDelivery, $userAddress, $productsInCart,$fullOrderPrice,$payment);
                if($result) {
                    $adminEmail = 'admin@mail.ru';
                    $message = 'На сайте новый заказ!';
                    $subject = 'Новый заказ';
                    mail($adminEmail, $subject, $message);
                    Cart::clear();
                }
            }else {
                $productsInCart = Cart::getProducts();
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $fullOrderPrice =  round($totalPrice - ($totalPrice*$discount/100),2);
            }
        }else {
            $productsInCart = Cart::getProducts();
            if($productsInCart == false) {
                header("Location: /");
            }else{
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $fullOrderPrice =  round($totalPrice - ($totalPrice*$discount/100),2);
                $userName = '';
                $userEmail = '';
                $userPhone = '';
                if(User::isGuest()){

                }else{
                    $userId = User::checkLogged();
                    $user = User::getUserById($userId);
                    $userName = $user['name'];
                    $userEmail = $user['email'];

                }
            }
        }
        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }
    public function actionPlus($id_product) {
        Cart::plus($id_product);
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }public function actionMinus($id_product) {
        Cart::minus($id_product);
        $referer = $_SERVER['HTTP_REFERER'];
        header("Location: $referer");
    }
}