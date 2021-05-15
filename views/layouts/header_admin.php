<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title><?php echo $title;?></title>

    <meta name="description" content="Static &amp; Dynamic Tables" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="/template/admin/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/template/admin/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="icon" href="/template/admin/assets/images/icon.png">

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="/template/admin/assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="/template/admin/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="/template/admin/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="/template/admin/assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="/template/admin/assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="/template/admin/assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="/template/admin/assets/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="/template/admin/assets/js/html5shiv.min.js"></script>
    <script src="/template/admin/assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-3">
<div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="/admin" class="navbar-brand">
                <small>
                    <i class="fa"><img src="/template/admin/assets/images/icon2.png" height="25px" width="auto"></i>
                    Азбука.Бай - Админ панель
                </small>
            </a>
        </div>

        <div class="navbar-buttons navbar-header pull-right" role="navigation">

            <ul class="nav ace-nav">
                <li class="grey dropdown-modal">

                <li class="purple dropdown-modal">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                        <span class="badge badge-important"><?php echo (Review::getCountNewReviewBook()+Review::getCountNewReviewPost()+Order::getCountNewOrder()); ?></span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-exclamation-triangle"></i>
                            <?php echo (Review::getCountNewReviewBook()+Review::getCountNewReviewPost()+Order::getCountNewOrder()); ?> Оповещений
                        </li>

                        <li class="dropdown-content">
                            <ul class="dropdown-menu dropdown-navbar navbar-pink">
                                <?php if(Review::getCountNewReviewBook()):?>
                                <li>
                                    <a href="/admin/review-in-book">
                                        <div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														Новые комментарии к книгам
													</span>
                                            <span class="pull-right badge badge-info">+<?php echo Review::getCountNewReviewBook();?></span>
                                        </div>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if(Review::getCountNewReviewPost()):?>
                                <li>
                                    <a href="/admin/review-in-post">
                                        <div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														Новые комментарии к статьям
													</span>
                                            <span class="pull-right badge badge-info">+<?php echo Review::getCountNewReviewPost();?></span>
                                        </div>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if(Order::getCountNewOrder()):?>
                                <li>
                                    <a href="/admin/order">
                                        <div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
														Новые заказы
													</span>
                                            <span class="pull-right badge badge-success">+<?php echo Order::getCountNewOrder();?></span>
                                        </div>
                                    </a>
                                </li>
                                <?php endif; ?>

                            </ul>
                        </li>


                    </ul>
                </li>

                </li>





                <li class="light-blue dropdown-modal">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<span >
									<small>Здравствуйте,</small>
									<?php echo User::getUserById($_SESSION['user'])['name']?>!
								</span>


                    </a>


                </li>
            </ul>









        </div>
    </div><!-- /.navbar-container -->
</div>

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
        <script type="text/javascript">
            try{ace.settings.loadState('sidebar')}catch(e){}
        </script>



        <ul class="nav nav-list">

            <li class="<?php if(preg_match("/order/",$_SERVER['REQUEST_URI'])){echo 'active open';};?>">
                <a href="/admin/order">
                    <i class="menu-icon fa fa-shopping-cart"></i>
                    <span class="menu-text"> Заказы </span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="<?php if(preg_match("/book/",$_SERVER['REQUEST_URI'])){echo 'active open';};?>">
                <a href="/admin/book">
                    <i class="menu-icon fa fa-book"></i>
                    <!--							<img class="menu-icon fa-book" src="icon.png" >-->
                    <span class="menu-text"> Книги </span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="<?php if(preg_match("/category/",$_SERVER['REQUEST_URI'])){echo 'active open';};?>">
                <a href="/admin/category">
                    <i class="menu-icon fa fa-list"></i>
                    <span class="menu-text"> Категории </span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="<?php if(preg_match("/user/",$_SERVER['REQUEST_URI'])){echo 'active open';};?>">
                <a href="/admin/user">
                    <i class="menu-icon fa fa-user"></i>
                    <span class="menu-text"> Пользователи </span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="<?php if(preg_match("/slider/",$_SERVER['REQUEST_URI'])){echo 'active open';};?>">
                <a href="/admin/slider">
                    <i class="menu-icon fa fa-sliders"></i>
                    <span class="menu-text"> Слайдер </span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="<?php if(preg_match("/blog/",$_SERVER['REQUEST_URI'])){echo 'active open';};?>">
                <a href="/admin/blog">
                    <i class="menu-icon fa fa-newspaper-o"></i>
                    <span class="menu-text"> Статьи </span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="<?php if(preg_match("/review-in-post/",$_SERVER['REQUEST_URI'])){echo 'active open';};?>">
                <a href="/admin/review-in-post">
                    <i class="menu-icon fa fa-star"></i>
                    <span class="menu-text"> Отзывы на статьи </span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="<?php if(preg_match("/review-in-book/",$_SERVER['REQUEST_URI'])){echo 'active open';};?>">
                <a href="/admin/review-in-book">
                    <i class="menu-icon fa fa-star"></i>
                    <span class="menu-text"> Отзывы на товар </span>
                </a>
                <b class="arrow"></b>
            </li>
            <li class="">
                <a href="/">
                    <i class="menu-icon fa fa-external-link"></i>
                    <span class="menu-text"> На сайт </span>
                </a>
                <b class="arrow"></b>
            </li>

        </ul><!-- /.nav-list -->

        <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
            <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
        </div>
    </div>