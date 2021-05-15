<?php


class Order
{
    public static function getCountNewOrder() {
        $db = Db::getConnection();
        $sql = "SELECT COUNT(id_booking) as count FROM booking WHERE status=1";
        $result = $db->query($sql);
        $result = $result->fetch();
        return $result['count'];
    }
    public static function update($option) {
        $db = Db::getConnection();
        $sql = "UPDATE booking SET user_name='{$option['user_name']}'"
            .",payment={$option['payment']},user_email='{$option['user_email']}'"
            .",delivery='{$option['delivery']}',address='{$option['address']}'"
            .",comment='{$option['comment']}',status='{$option['status']}' WHERE id_booking={$option['id_order']}";
        $result = $db->query($sql);
        return $result->execute();
    }
    public static function save($userName, $userEmail, $userPhone, $userComment, $userDelivery, $userAddress,
                                 $products,$fullOrderPrice,$payment) {

        $db = Db::getConnection();
        $sql = 'INSERT INTO booking (user_name, user_email, user_phone, delivery, address, comment, total,payment)'
        .' VALUES (:userName, :userEmail, :userPhone, :delivery, :address, :comment, :total,:payment)';
        $result = $db->prepare($sql);
        $result->bindParam(':userName', $userName, PDO::PARAM_STR);
        $result->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
        $result->bindParam(':userPhone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':delivery', $userDelivery, PDO::PARAM_STR);
        $result->bindParam(':address', $userAddress, PDO::PARAM_STR);
        $result->bindParam(':comment', $userComment, PDO::PARAM_STR);
        $result->bindParam(':total', $fullOrderPrice, PDO::PARAM_STR);
        $result->bindParam(':payment', $payment, PDO::PARAM_INT);

        $result->execute();
        $id_booking = $db->lastInsertId();

        foreach ($products as $key => $product) { //присваивание ключа текущего элемента переменной $key на каждой итерации
            $sql = 'INSERT INTO book_in_booking (id_booking, id_book, quantity)'
            .' VALUES (:id_booking, :id_book, :quantity)';
            $result = $db->prepare($sql);
            $result->bindParam(':id_booking', $id_booking, PDO::PARAM_STR);
            $result->bindParam(':id_book', $key, PDO::PARAM_INT);
            $result->bindParam(':quantity', $product, PDO::PARAM_INT);
            $result->execute();
        }
        return true;
    }

    public static function getOrders() {
        $orders = array();
        $db = Db::getConnection();
        $sql = 'SELECT * FROM booking';
        $result = $db->query($sql);
        $i = 0;
        while ($row = $result->fetch()) {
            $orders[$i]['id_booking'] = $row['id_booking'];
            $orders[$i]['total'] = $row['total'];
            $orders[$i]['user_name'] = $row['user_name'];
            $orders[$i]['user_email'] = $row['user_email'];
            $orders[$i]['user_phone'] = $row['delivery'];
            $orders[$i]['address'] = $row['address'];
            $orders[$i]['comment'] = $row['comment'];
            $orders[$i]['date'] = $row['date'];
            $orders[$i]['status'] = $row['status'];
            $orders[$i]['payment'] = $row['payment'];
            $i++;
        }
        return $orders;
    }
    public static function getStatusPaymentText($status) {
        switch ($status){
            case 1:{
                return 'Наличный расчёт';
                break;
            }
            case 2:{
                return 'Оплата картой (Visa, Mastercard)';
                break;
            }
            case 3:{
                return 'Безналичный расчёт';
                break;
            }
            case 4:{
                return 'Наложенный платеж';
                break;
            }
            case 5:{
                return 'Система "Расчет" (ЕРИП)';
                break;
            }
        }
    }
    public static function getStatusDeliveryText($status) {
        switch ($status){
            case 1:{
                return 'По Беларуси - Почтовое отправление, отправка по тарифам Белпочты.';
                break;
            }
            case 2:{
                return 'КЗ Минск, У Поющих фонтанов, м. Первомайская, ул. Октябрьская, 5. Пн-сб: 10.00 - 18.30; Вс: 10.00 - 16.00. Самостоятельно.';
                break;
            }
            case 3:{
                return 'Курьером по г. Минску. Стоимость доставки - 5 руб. Бесплатная доставка при заказе от 60 руб.';
                break;
            }
            case 4:{
                return 'Курьером за пределами МКАД (до 10 км). Стоимость доставки – 7 руб. Бесплатная доставка при заказе от 150 руб.';
                break;
            }
            case 5:{
                return 'М. Уручье, переход, посл. вагон (из центра) налево, 11.00 - 20.00 без вых. Самостоятельно.';
                break;
            }
        }
    }
    public static function getOrderById($id) {
        $orders = array();
        $db = Db::getConnection();
        $sql = 'SELECT * FROM booking WHERE id_booking='.$id;
        $result = $db->query($sql);
        return $result->fetch();
    }
    public static function getProductsInOrder($id) {
        $productsIdsInOrder = array();
        $db = Db::getConnection();
        $sql = 'SELECT * FROM book_in_booking WHERE id_booking ='.$id;
        $result = $db->query($sql);
        $i = 0;
        while ($row = $result->fetch()) {
            $productsIdsInOrder[$i]['id_book'] = $row['id_book'];
            $productsIdsInOrder[$i]['quantity'] = $row['quantity'];
            $i++;
        }
        $i=0;
        $products = array();
        foreach ($productsIdsInOrder as $item) {
            // Перебирает массив, задаваемый с помощью productsIdsInOrder
            // На каждой итерации значение текущего элемента присваивается переменной $item.
            $sql = 'SELECT * FROM book WHERE id_book ='.$item['id_book'];
            $result = $db->query($sql);
            $products[$i]['id_book'] = $item['id_book'];
            $products[$i]['quantity'] = $item['quantity'];
            $temp = $result->fetch();
            $products[$i]['name'] = $temp['name'];
            $products[$i]['code'] = $temp['code'];
            $products[$i]['price'] = $temp['price'];
            $i++;
        }

        return $products;
    }
    public static function getQuantityProductInOrder($id_order, $id_book) {
        $db = Db::getConnection();
        $sql = 'SELECT quantity FROM book_in_booking WHERE id_booking='.$id_order.' AND id_book='.$id_book;
        $result = $db->query($sql);
        return $result->fetch();
    }
    public static function updateProductInOrder($option) {
        $db = Db::getConnection();
        $sql = 'UPDATE book_in_booking SET quantity='.$option['quantity'].' WHERE id_booking='
            .$option['id_order'].' AND id_book='.$option['id_book'];
        $result = $db->query($sql);
        return $result->execute();
    }
    public static function createProductInOrder($option) {
        $db = Db::getConnection();
        $sql = "INSERT INTO book_in_booking (id_book,quantity,id_booking) VALUES ({$option['id_book']},{$option['quantity']},{$option['id_order']})";
        $result = $db->query($sql);
        return $result;
    }
    public static function deleteProductFromOrder($id_order, $id_book) {
        $db = Db::getConnection();
        $sql = 'DELETE FROM book_in_booking WHERE id_booking='.$id_order.' AND id_book='.$id_book;
        $result = $db->query($sql);
        return $result->execute();
    }
    public static function recountTotalOrder($id_order) {
        $db = Db::getConnection();
        $sql = "SELECT user_email FROM booking WHERE id_booking = $id_order";
        $userEmail = $db->query($sql);
        $userEmail = $userEmail->fetch();
        $userEmail = $userEmail['user_email'];

        $sql = "SELECT `discount` FROM `user` WHERE `email` LIKE '{$userEmail}'";
        $result = $db->query($sql);
        $discount =$result->fetch();
        $discount = $discount['discount'] / 100;
        $sql = "SELECT * FROM book_in_booking WHERE id_booking=$id_order";
        $result = $db->query($sql);
        $productsInOrder = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $productsInOrder[$i]['id_book'] = $row['id_book'];
            $productsInOrder[$i]['quantity'] = $row['quantity'];
            $i++;
        }
        $totalPrice = 0;
        foreach ($productsInOrder as $product) {
            $sql = "SELECT price FROM book WHERE id_book = {$product['id_book']}";
            $result = $db->query($sql);

            while ($row = $result->fetch()){
                $totalPrice += $row['price'] * $product['quantity'];
            }

        }

        $totalPrice = $totalPrice - ($totalPrice * $discount);
        $sql = "UPDATE booking SET total={$totalPrice} WHERE id_booking ={$id_order}";
        $result = $db->query($sql);
        return $result->execute();
    }
}