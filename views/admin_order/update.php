<?php include(ROOT . '/views/layouts/header_admin.php');?>
<?php if(isset($errors) && is_array($errors)):?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><h3><?php echo $error; ?></h3></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="page-header">
                    <h1>
                        Заказ № <?php echo $id;?>
                    </h1>
                </div><!-- /.page-header -->


                <form style="margin-left: 150px;" class="form-horizontal" action="" id="form" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Номер заказа</label>

                        <div class="col-sm-9">
                            <input type="text" readonly name="id_order" value="<?php echo $orderInfo['id_booking'];?>" id="form-field-1" placeholder="Наименование" class="col-xs-10 col-sm-5" />
                        </div>
                        <div class="space-4"></div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ФИО заказчика</label>

                        <div class="col-sm-9">
                            <input type="text" value="<?php echo $orderInfo['user_name'];?>" name="user_name" id="form-field-1" placeholder="ФИО" class="col-xs-10 col-sm-5" />
                        </div>
                        <div class="space-4"></div>
                    </div>

                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="margin-left: 10px" for="form-field-4">Вариант оплаты</label>
                        <select  name="payment"  class="col-xs-4 col-sm-2" id="form-field-select-1">
                                <option selected  value="<?php echo $orderInfo['payment'];?>"><?php echo Order::getStatusPaymentText($orderInfo['payment']);?></option>
                                <option  value="1">Наличный расчёт</option>
                                <option  value="2">Оплата картой (Visa, Mastercard)</option>
                                <option  value="3">Безналичный расчёт</option>
                                <option  value="4">Наложенный платеж</option>
                                <option  value="5">Система "Расчет" (ЕРИП)</option>

                        </select>
                    </div>



                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-4">Общая сумма со скидкой(BYN)</label>

                        <div class="col-sm-9">
                            <input class="input-sm"  readonly value="<?php echo $orderInfo['total'];?>" name="price" type="text" id="form-field-4" placeholder="50.00" />
                            <div class="space-2"></div>

                            <div class="help-block" id="input-size-slider"></div>
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Электронная почта заказчика</label>

                        <div class="col-sm-9">
                            <input type="text" name="user_email" value="<?php echo $orderInfo['user_email'];?>" id="form-field-1" placeholder="Автор" class="col-xs-10 col-sm-5" />
                        </div>
                        <div class="space-4"></div>
                    </div>

                    <label class="col-sm-3 control-label no-padding-right" style="margin-left: -5px" for="form-field-1"> Дата заказа</label>

                    <div class="row ">
                        <div class="form-group-sm col-sm-2">
                            <div class="input-group">
                                <input value="<?php echo date("d.m.Y",strtotime($orderInfo['date']));?>" name="date" readonly type="date">
                            </div>
                        </div>
                    </div>

                    <div class="space-4"></div>
                    <div class="space-4"></div>

                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="margin-left: 10px" for="form-field-4">Варианты доставки</label>
                        <select  name="delivery"  class="col-xs-4 col-sm-6" id="form-field-select-1">


                            <option selected  value="<?php echo $orderInfo['delivery'];?>"><?php echo Order::getStatusDeliveryText($orderInfo['delivery']);?></option>
                            <option  value="1">По Беларуси - Почтовое отправление, отправка по тарифам Белпочты.</option>
                            <option  value="2">КЗ Минск, У Поющих фонтанов, м. Первомайская, ул. Октябрьская, 5. Пн-сб: 10.00 - 18.30; Вс: 10.00 - 16.00. Самостоятельно.</option>
                            <option  value="3">Курьером по г. Минску. Стоимость доставки - 5 руб. Бесплатная доставка при заказе от 60 руб.</option>
                            <option  value="4">Курьером за пределами МКАД (до 10 км). Стоимость доставки – 7 руб. Бесплатная доставка при заказе от 150 руб.</option>
                            <option  value="5">М. Уручье, переход, посл. вагон (из центра) налево, 11.00 - 20.00 без вых. Самостоятельно.</option>

                        </select>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-4">Адрес доставки</label>
                        <div class="col-sm-9">
                            <input class="input-sm" value="<?php echo $orderInfo['address'];?>" name="address" type="text" id="form-field-4" placeholder="Твёрдый" />
                            <div class="help-block" id="input-size-slider"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Комментарий к заказу</label>
                        <div class="col-sm-5">
                            <textarea  name="comment"><?php echo $orderInfo['comment'];?></textarea>
                        </div>
                    </div>
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="margin-left: 10px" for="form-field-4">Статус</label>
                        <select name="status"  class="col-xs-3 col-sm-3" id="form-field-select-1">
                            <option selected value="<?php echo $orderInfo['status'];?>"><?php echo AdminBase::statusOrderText($orderInfo['status'])?></option>
                            <option value="1">Новый заказ</option>
                            <option value="2">В обработке</option>
                            <option value="3">Отгружен, ожидает доставки</option>
                            <option value="4">В пути</option>
                            <option value="5">Завершён</option>

                        </select>
                    </div>

                    <input style="margin-left: 360px" type="submit" name="submit"  value="Обновить информацию" class="btn btn-success">


                </form>


<a href="/admin/order/update/<?php echo $id?>/createProduct"><button class="btn btn-danger">Добавить книгу в заказ</button></a>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">


                                <div class="clearfix">
                                    <div class="pull-right tableTools-container"></div>
                                </div>

                                <div class="table-header">
                                    Товары в заказе №<?php echo $id;?>
                                </div>
                                <div>
                                    <!-- Table -->
                                    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </th>
                                            <th>Идентификатор</th>
                                            <th>Артикул</th>
                                            <th class="hidden-480">Наименование</th>

                                            <th>Цена</th>
                                            <th class="hidden-480">Количество</th>
                                            <th></th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        <?php foreach ($productsInOrder as $product):?>
                                            <tr>
                                                <td class="center">
                                                    <label class="pos-rel">
                                                        <input type="checkbox" class="ace" />
                                                        <span class="lbl"></span>
                                                    </label>
                                                </td>

                                                <td><?php echo $product['id_book'];?></td>
                                                <td><?php echo $product['code'];?> </td>
                                                <td class="hidden-480"><?php echo $product['name'];?></td>
                                                <td><?php echo $product['price'];?></td>

                                                <td class="hidden-480">
                                                    <span class="  "><?php echo $product['quantity']; ?></span>
                                                </td>

                                                <td>
                                                    <div class="hidden-sm hidden-xs action-buttons">
                                                        <a class="green" href="/admin/order/update/<?php echo $id;?>/updateProduct/<?php echo $product['id_book'];?>">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>
                                                        <a class="red" href="/admin/order/update/<?php echo $id;?>/deleteProduct/<?php echo $product['id_book'];?>">
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                        </a>


                                                    </div>

                                                    <div class="hidden-md hidden-lg">
                                                        <div class="inline pos-rel">
                                                            <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                                <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                            </button>

                                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                <li>
                                                                    <a href="/admin/order/update/<?php echo $id;?>/updateProduct/<?php echo $product['id_book'];?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="/admin/order/update/<?php echo $id;?>/deleteProduct/<?php echo $product['id_book'];?>" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
                                                                    </a>
                                                                </li>




                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>




                                        </tbody>
                                    </table>
                                    <!-- Table -->
                                </div>
                            </div>
                        </div>



                        <!-- PAGE CONTENT ENDS -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

<?php include(ROOT . '/views/layouts/footer_admin.php'); ?>