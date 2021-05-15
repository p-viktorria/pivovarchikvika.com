<?php include(ROOT . '/views/layouts/header_admin.php');?>

    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="page-header">
                    <h1>
                        Слайдер
                    </h1>
                </div><!-- /.page-header -->
                <a href="/admin/slider/create"><button class="btn btn-success">Добавить страницу слайдера</button></a>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">


                                <div class="clearfix">
                                    <div class="pull-right tableTools-container"></div>
                                </div>

                                <div class="table-header">
                                    Результаты поиска в "Страницы слайдера"
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
                                            <th>h1</th>
                                            <th class="hidden-480">h2</th>

                                            <th>

                                                p
                                            </th>
                                            <th class="hidden-480">href</th>

                                            <th></th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        <?php foreach ($slider as $slide):?>
                                            <tr>
                                                <td class="center">
                                                    <label class="pos-rel">
                                                        <input type="checkbox" class="ace" />
                                                        <span class="lbl"></span>
                                                    </label>
                                                </td>

                                                <td><?php echo $slide['id_slider'];?></td>
                                                <td><?php echo $slide['h1'];?> </td>
                                                <td class="hidden-480"><?php echo $slide['h2'];?></td>
                                                <td><?php echo $slide['p'];?></td>

                                                <td class="hidden-480">
                                                    <span class="label label-sm "><?php echo $slide['href'];?></span>
                                                </td>

                                                <td>
                                                    <div class="hidden-sm hidden-xs action-buttons">


                                                        <a class="green" href="/admin/slider/update/<?php echo $slide['id_slider'];?>">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>

                                                        <a class="red" href="/admin/slider/delete/<?php echo $slide['id_slider'];?>">
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
                                                                    <a href="/admin/slider/update/<?php echo $slide['id_slider'];?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="/admin/slider/delete/<?php echo $slide['id_slider'];?>" class="tooltip-error" data-rel="tooltip" title="Delete">
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