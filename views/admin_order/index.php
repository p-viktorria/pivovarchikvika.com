<?php include(ROOT . '/views/layouts/header_admin.php');?>

    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="page-header">
                    <h1>
                        Заказы
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">


                                <div class="clearfix">
                                    <div class="pull-right tableTools-container"></div>
                                </div>

                                <div class="table-header">
                                    Результаты поиска в "Заказы"
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
                                            <th>Номер заказа</th>
                                            <th>Стоимость</th>
                                            <th class="hidden-480">ФИО заказчика</th>

                                            <th>Email заказчика
                                            </th>
                                            <th class="hidden-480">Статус заказа</th>
                                            <th></th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        <?php foreach ($orders as $order):?>
                                            <tr>
                                                <td class="center">
                                                    <label class="pos-rel">
                                                        <input type="checkbox" class="ace" />
                                                        <span class="lbl"></span>
                                                    </label>
                                                </td>

                                                <td><?php echo $order['id_booking'];?></td>
                                                <td><?php echo $order['total'];?> </td>
                                                <td class="hidden-480"><?php echo $order['user_name'];?></td>
                                                <td><?php echo $order['user_email'];?></td>

                                                <td class="hidden-480">
                                                    <span class="label label-sm "><?php echo AdminBase::statusOrderText($order['status']); ?></span>
                                                </td>

                                                <td>
                                                    <div class="hidden-sm hidden-xs action-buttons">


                                                        <a class="green" href="/admin/order/update/<?php echo $order['id_booking'];?>">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>


                                                    </div>

                                                    <div class="hidden-md hidden-lg">
                                                        <div class="inline pos-rel">
                                                            <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                                <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                            </button>

                                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                <li>
                                                                    <a href="2" class="tooltip-info" data-rel="tooltip" title="View">
																				<span class="blue">
																					<i class="ace-icon fa fa-search-plus bigger-120"></i>
																				</span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="/admin/order/update/<?php echo $order['id_booking'];?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
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