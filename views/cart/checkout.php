<?php include(ROOT . '/views/layouts/header.php'); ?>

<section id="cart_items">
    <div class="container">

            <ol class="breadcrumb">
                <li><a href="/" class="">Главная</a></li>
                <li class="active">Оформление заказа</li>
            </ol>


<!--        <div class="step-one">-->
<!--            <h2 class="heading">Step1</h2>-->
<!--        </div>-->
<!--        <div class="checkout-options">-->
<!--            <h3>New User</h3>-->
<!--            <p>Checkout options</p>-->
<!--            <ul class="nav">-->
<!--                <li>-->
<!--                    <label><input type="checkbox"> Register Account</label>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <label><input type="checkbox"> Guest Checkout</label>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href=""><i class="fa fa-times"></i>Cancel</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!---->
<!--        <div class="register-req">-->
<!--            <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>-->
<!--        </div>-->

        <?php if($result) :?>
        <h2>Заказ оформлен. Мы с вами свяжемся в ближайшее время.</h2>
        <?php else:?>
        <?php if(isset($errors) && is_array($errors)):?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <div class="review-payment">
            <h2>Товары к покупке</h2>
        </div>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu">
                    <td class="image">Товар</td>
                    <td class="description"></td>
                    <td class="price">Цена(BYN)</td>
                    <td class="quantity">Количество(Шт.)</td>
                    <td class="total">Сумма(BYN)</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($products as $product):?>
                <tr>
                    <td class="cart_product">
                        <a href=""><img src="<?php echo Product::getImage($product['id_book']);?>" style="height: 100px; width: auto" alt=""></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href=""><?php echo $product['name'];?></a></h4>
                        <p>Web ID: <?php echo $product['id_book'];?></p>
                    </td>
                    <td class="cart_price">
                        <p><?php echo $product['price'];?>BYN</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <a class="cart_quantity_up" href="/cart/plus/<?php echo $product['id_book'];?>"> + </a>
                            <input class="cart_quantity_input" readonly type="text" style="font-size: 15px" name="quantity" value="<?php echo $productsInCart[$product['id_book']]?>" autocomplete="off" size="2">
                            <a class="cart_quantity_down" href="/cart/minus/<?php echo $product['id_book'];?>"> - </a>
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price"><?php echo $productsInCart[$product['id_book']] * $product['price'];?></p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href="/checkout/delete/<?php echo $product['id_book']?>"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>

                <tr>
                    <td colspan="4">&nbsp;</td>
                    <td colspan="2">
                        <table class="table table-condensed total-result">
                            <tr>
                                <td>Итого товаров на сумму</td>
                                <td><?php echo $totalPrice?> BYN</td>
                            </tr>

                            <tr class="shipping-cost">
                                <td>Скидка</td>
                                <td><?php echo $discount;?>%</td>
                            </tr>
                            <tr>
                                <td>Итого</td>
                                <td><span><?php echo $fullOrderPrice; ?> BYN</span></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>





        <div class="shopper-informations">
            <div class="row">
                <div class="col-md-6">
                    <div class="shopper-info">
                        <p>Информация о покупателе</p>
                        <form action="" method="POST" id="checkout-form">
                            <input type="text" name="userName" value="<?php echo $user['name'];?>" placeholder="Имя">
                            <input type="email" name="userEmail" value="<?php echo $user['email'];?>" placeholder="Электронная почта">
                            <p>Адрес</p>
                            <input type="text" name="userAddress" placeholder="Адрес">
                            <p>Выбор доставки</p>
                            <select name="delivery" style="padding: 10px" form="checkout-form">
                                <option value="1">По Беларуси - Почтовое отправление, отправка по тарифам Белпочты.</option>
                                <option value="2">КЗ Минск, У Поющих фонтанов, м. Первомайская, ул. Октябрьская, 5. Пн-сб: 10.00 - 18.30; Вс: 10.00 - 16.00. Самостоятельно.</option>
                                <option value="3">Курьером по г. Минску. Стоимость доставки - 5 руб. Бесплатная доставка при заказе от 60 руб.</option>
                                <option value="4">Курьером за пределами МКАД (до 10 км). Стоимость доставки – 7 руб. Бесплатная доставка при заказе от 150 руб.</option>
                                <option value="5">М. Уручье, переход, посл. вагон (из центра) налево, 11.00 - 20.00 без вых. Самостоятельно.</option>
                                <br>
                            </select>
                            <p>Варианты оплаты</p>
                            <select name="payment" style="padding: 10px" form="checkout-form">
                                <option value="1">Наличный расчёт</option>
                                <option value="2">Оплата картой (Visa, Mastercard)</option>
                                <option value="3">Безналичный расчёт</option>
                                <option value="4">Наложенный платеж</option>
                                <option value="5">Система "Расчет" (ЕРИП)</option>
                                <br>
                            </select>

                            <p>Телефон для связи</p>
                            <input type="phone" name="userPhone" placeholder="Номер телефона">
                    </div></div>
                <div class="col-md-6">
                            <p>Комментарии к заказу</p>
                            <textarea name="message" name="userMessage"  placeholder="Введите ваше сообщение" rows="16"></textarea>
                </div>
                            <input type="submit" name="submit" class="btn btn-primary col-lg-12" value="Оформить заказ">
                        </form>

                    </div>
                </div>


            </div>
        </div>
<br>
<br>
<br>

    </div>
</section> <!--/#cart_items-->
<?php endif; ?>



<?php include(ROOT . '/views/layouts/footer.php'); ?>
