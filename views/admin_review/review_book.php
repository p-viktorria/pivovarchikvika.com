<?php include(ROOT . '/views/layouts/header_admin.php');?>

<div class="main-content">
    <div class="main-content-inner">
        <div class="page-content">
            <div class="page-header">
                <h1>
                    Отзывы на товар
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
                                Результаты поиска в "Отзывы на товар"
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
                                        <th>Автор</th>

                                        <th class="hidden-480">Рейтинг</th>


                                        <th class="hidden-480">Комментарий</th>

                                        <th>Статус</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <?php foreach ($reviewInBook as $review):?>
                                        <tr>
                                            <td class="center">
                                                <label class="pos-rel">
                                                    <input type="checkbox" class="ace" />
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            <td><?php echo $review['author'];?></td>

                                            <td class="hidden-480"><?php echo $review['rating'];?></td>


                                            <td class="hidden-480">
                                                <span class="label label-sm "><?php echo $review['text'];?></span>
                                            </td>
                                            <td class="hidden-480">
                                                <span class="label label-sm "><?php echo Review::getStatusText($review['status']);?></span>
                                            </td>


                                            <td>
                                                <div class="hidden-sm hidden-xs action-buttons">
                                                    <a class="green" href="/admin/review-in-book/visible/<?php echo $review['id_review_in_book'];?>">
                                                        <i class="ace-icon fa fa-check bigger-130"></i>
                                                    </a>

                                                    <a class="red2" href="/admin/review-in-book/unvisible/<?php echo $review['id_review_in_book'];?>">
                                                        <i class="ace-icon fa fa-lock bigger-130"></i>
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
                                                                <a href="/admin/review-in-book/visible/<?php echo $review['id_review_in_book'];?>" class="tooltip-success" data-rel="tooltip" title="Edit">
																				<span class="green">
																					<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
																				</span>
                                                                </a>
                                                            </li>
                                                                <li>
                                                                    <a href="/admin/review-in-book/unvisible/<?php echo $review['id_review_in_book'];?>" class="tooltip-error" data-rel="tooltip" title="Delete">
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
