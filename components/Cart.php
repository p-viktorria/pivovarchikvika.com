<?php


class Cart
{
    //Добавление товара в корзину
    public static function addProduct($id_product) {
        $id_product = intval($id_product);
        $productsInCart = array();
        if(isset($_SESSION['products'])) {
            $productsInCart = $_SESSION['products'];
        }
        if(array_key_exists($id_product, $productsInCart)) {
            $productsInCart[$id_product]++;
        }else {
            $productsInCart[$id_product] = 1;
        }
        $_SESSION['products'] = $productsInCart;

        return self::countItems();
    }
    //Количество товаров в корзину
    public static function countItems() {
        if(isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $quantity) {
                $count += $quantity;
            }
            return $count;
        }else {
            return 0;
        }
    }
    //Получение товаров из корзины
    public static function getProducts() {
        if(isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }
    //Получение общей суммы в корзине
    public static function getTotalPrice($products) {
        $productsInCart = self::getProducts();
        $total = 0;
        if($productsInCart) {
            foreach ($products as $product) {
                $total += $product['price'] * $productsInCart[$product['id_book']];
            }
        }
        return $total;
    }
    public static function delete($id_product) {
        unset($_SESSION['products'][$id_product]);
    }
    public static function clear() {
        if(isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }
    public static function plus($id_product) {
        $_SESSION['products'][$id_product]++;
    }
    public static function minus($id_product) {
        if($_SESSION['products'][$id_product] == 1){
            unset($_SESSION['products'][$id_product]);
            return true;
        }
        $_SESSION['products'][$id_product]--;
    }
}