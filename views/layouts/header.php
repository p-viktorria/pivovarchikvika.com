<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Азбука,Азбука.бай,магазин литературы,книги,купить,онлайн,книжный магазин,азбука книжный магазин,азбука магазин литературы">
    <meta name="author" content="">
    <title><?php echo $title; ?></title>
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/font-awesome.min.css" rel="stylesheet">
    <link href="/template/css/prettyPhoto.css" rel="stylesheet">
    <link href="/template/css/price-range.css" rel="stylesheet">
    <link href="/template/css/animate.css" rel="stylesheet">
    <link href="/template/css/main.css" rel="stylesheet">
    <link href="/template/css/responsive.css" rel="stylesheet">
    <link href="/template/css/star.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/template/js/html5shiv.js"></script>
    <script src="/template/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="/template/images/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/template/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/template/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/template/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/template/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a><i class="fa fa-phone"></i> +375(33) 666-58-07</a></li>
                            <li><a><i class="fa fa-envelope"></i> azbuka@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://vk.com/"><i class="fa fa-vk"></i></a></li>
                            <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="/"><img src="/template/images/home/logo.png" alt="" width="139px" height="39px"/></a>
                    </div>
                    <!--						<div class="btn-group pull-right">-->
                    <!--							<div class="btn-group">-->
                    <!--								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">-->
                    <!--									USA-->
                    <!--									<span class="caret"></span>-->
                    <!--								</button>-->
                    <!--								<ul class="dropdown-menu">-->
                    <!--									<li><a href="#">Canada</a></li>-->
                    <!--									<li><a href="#">UK</a></li>-->
                    <!--								</ul>-->
                    <!--							</div>-->
                    <!--							-->
                    <!--							<div class="btn-group">-->
                    <!--								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">-->
                    <!--									DOLLAR-->
                    <!--									<span class="caret"></span>-->
                    <!--								</button>-->
                    <!--								<ul class="dropdown-menu">-->
                    <!--									<li><a href="#">Canadian Dollar</a></li>-->
                    <!--									<li><a href="#">Pound</a></li>-->
                    <!--								</ul>-->
                    <!--							</div>-->
                    <!--						</div>-->
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">



                            <li><a href="/checkout"><i class="fa fa-crosshairs"></i> Оформить заказ</a></li>
                            <li><a href="/cart">
                                    <i class="fa fa-shopping-cart"></i>
                                    Корзина
                                    <span id="cart-count">(<?php echo  Cart::countItems();?>)</span>
                                </a>
                            </li>
                            <?php if(User::isGuest()): ?>
                            <li><a href="/user/login/"><i class="fa fa-lock"></i> Войти</a></li>
                            <li><a href="/user/register/"><i class="fa fa-user"></i> Регистрация</a></li>
                            <?php else: ?>
                                <li><a href="/cabinet/"><i class="fa fa-user"></i> Личный кабинет</a></li>
                                <li><a href="/user/logout/"><i class="fa fa-unlock"></i> Выйти</a></li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="/" class="active">Главная</a></li>
                            <li class="dropdown"><a href="/catalog">Каталог<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <?php foreach ($categoryList as $category):?>
                                    <li><a href="/category/<?php echo $category['id_category'];?>"><?php echo $category['name'];?></a></li>
                                    <?php endforeach;?>
                                </ul>
                            </li>
                            <li><a href="/blog">Наши статьи</a></li>
                            <li><a href="/contacts">Связаться с нами</a></li>
                            <li><a href="/info">Справочная информация</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                        <form action="/catalog/search" method="POST">
                            <div style="display: inline-block" class="search_box">
                        <input type="text" value="" name="search" placeholder="Введите запрос"/>
                            </div>
                        <input class="btn btn-success" type="submit" name="submit" value="Поиск" style="background-color:#d2076e;border-color:#d2076e;" placeholder="Поиск"/>
                        </form>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->