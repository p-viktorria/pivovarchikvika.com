<?php include(ROOT . '/views/layouts/header.php'); ?>

<section id="cart_items" style="margin-bottom: 5%">
    <div class="container">

            <ol class="breadcrumb">
                <li><a href="/" class="">Главная</a></li>
                <li class="active">Корзина</li>
            </ol>

        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <?php if($productsInCart) :?>
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
                        <a href=""><img src="<?php echo Product::getImage($product['id_book']);?>" height="110" width="auto" alt=""></a>
                    </td>
                    <td class="cart_description">
                        <h4><a href=""><?php echo $product['name'];?></a></h4>
                        <p>Web ID: <?php echo $product['id_book'];?></p>
                    </td>
                    <td class="cart_price">
                        <p><?php echo $product['price'];?></p>
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
                <?php endforeach;?>
                <td></td>
                <td></td>
                <td></td>
                <td class="h4">Общая сумма:</td>
                <td class="cart_total">
                    <p class="cart_total_price"><?php echo Cart::getTotalPrice($products)?></p>
                </td>



<?php else:?>
                <h1>Ваша корзина пуста</h1>
                <?php endif; ?>
                </tbody>
            </table>
            <?php if(Cart::countItems() > 0):?>
            <div class="btn btn-primary col-md-2" style="float: right"><a style="color: #ffffff;" href="/checkout" >Оформить заказ</a></div>
            <?php endif; ?>
        </div>

    </div>

</section> <!--/#cart_items-->

<?php include(ROOT . '/views/layouts/footer.php'); ?>
