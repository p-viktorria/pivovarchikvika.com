<?php include(ROOT . '/views/layouts/header_admin.php');?>

    <div class="main-content">
        <div class="main-content-inner">
            <div class="page-content">
                <div class="page-header">
                    <h1>
                        Категории
                    </h1>
                </div><!-- /.page-header -->
                <a href="/admin/category/create"><button class="btn btn-success">Добавить категорию</button></a>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">


                                <div class="clearfix">
                                    <div class="pull-right tableTools-container"></div>
                                </div>

                                <div class="table-header">
                                    Результаты поиска в "Категории"
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

                                            <th class="hidden-480">Наименование</th>


                                            <th class="hidden-480">Статус</th>

                                            <th></th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        <?php foreach ($categoryList as $category):?>
                                            <tr>
                                                <td class="center">
                                                    <label class="pos-rel">
                                                        <input type="checkbox" class="ace" />
                                                        <span class="lbl"></span>
                                                    </label>
                                                </td>

                                                <td><?php echo $category['id_category'];?></td>

                                                <td class="hidden-480"><?php echo $category['name'];?></td>


                                                <td class="hidden-480">
                                                    <span class="label label-sm "><?php if($category['status'] == 1){echo 'Отображается';}else{ echo 'Не отображается';}?></span>
                                                </td>

                                                <td>
                                                    <div class="hidden-sm hidden-xs action-buttons">
                                                       

                                                        <a class="green" href="/admin/category/update/<?php echo $category['id_category'];?>">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>

                                                        <?php if(Product::getCountProductInCategory($category['id_category']) < 1):?>
                                                        <a class="red" href="/admin/category/delete/<?php echo $category['id_category'];?>">
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                        </a>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="hidden-md hidden-lg">
                                                        <div class="inline pos-rel">
                                                            <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                                <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                            </button>

                                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                

                                                                <li>
                                                                    <a href="/admin/category/update/<?php echo $category['id_category'];?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
                                                                    </a>
                                                                </li>
                                                                <?php if(Product::getCountProductInCategory($category['id_category']) < 1):?>
                                                                <li>
                                                                    <a href="/admin/category/delete/<?php echo $category['id_category'];?>" class="tooltip-error" data-rel="tooltip" title="Delete">
																				<span class="red">
																					<i class="ace-icon fa fa-trash-o bigger-120"></i>
																				</span>
                                                                    </a>
                                                                </li>
                                                                <?php endif; ?>
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