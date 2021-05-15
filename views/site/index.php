<?php include(ROOT . '/views/layouts/header.php'); ?>
<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>АЗБУКА</span></h1>
                                <h2>Интернет-магазин литературы</h2>
                                <p>В нашем интернет-магазине вы всегда найдете книгу по душе. Быстрая доставка не заставить себя ждать! </p>
                                <button type="button" class="btn btn-default get"> <a href="/catalog" style="color:#fff;">Посмотреть каталог</a></button>
                            </div>
                            <div class="col-sm-6">
                                <img src="https://s1-goods.ozstatic.by/2000/490/102/102490_0.jpg"  alt="" width="auto" height="441px" />
                            </div>
                        </div>
                        <?php foreach ($slider as $slide) :?>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1><?php echo $slide['h1']?></h1>
                                    <h2><?php echo $slide['h2']?></h2>
                                    <p><?php echo $slide['p']?></p>
                                    <button  type="button" class="btn btn-default get"><a href="<?php echo $slide['href']?>" style="color:#fff;">Перейти</a></button>
                                </div>
                                <div class="col-sm-6">
                                    <img  width="auto" height="441px" src="<?php echo Slider::getImage($slide['id_slider'])?>"   alt="" />
                                </div>
                            </div>





                        <?php endforeach;?>



                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категории</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php foreach ($categoryList as $catogory):?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="/category/<?php echo $catogory['id_category'];?>">
                                        <?php echo $catogory['name'];?>
                                    </a>
                                </h4>
                            </div>
                        </div>
                       <?php endforeach; ?>
                    </div><!--/category-products-->







                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Последние добавленные товары</h2>
                    <?php foreach($latestProduct as $product): ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="/product/<?php echo $product['id_book'];?>">
                                        <img style="height: 200px; width: auto" src="<?php echo Product::getImage($product['id_book']);?>" alt="<?php echo $product['name'];?>" />
                                    </a>
                                    <h2><?php echo $product['price'];?> BYN</h2>
                                    <a href="/product/<?php echo $product['id_book'];?>">
                                        <p><?php echo $product['name'];?></p>
                                    </a>
                                    <a href="" class="btn btn-default add-to-cart" data-id="<?php echo $product['id_book'];?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                </div>

                            </div>

                        </div>
                    </div>
                    <?php endforeach;?>

                </div><!--features_items-->



                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Рекомендуемые товары</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $i = 1;
                            $count = 0;
                            foreach ($recomendedProduct as $product) {
                                if($i == 1 && $count == 0) {
                                    echo '<div class="item active">';
                                    $i--;
                                }else if($count == 0){
                                    echo '<div class="item">';
                                }
                                echo '<div class="col-sm-4">';
                                echo '<div class="product-image-wrapper">';
                                echo '<div class="single-products">';
                                echo '<div class="productinfo text-center">';
                                echo '<a href="/product/'.$product['id_book'].'"><img style="height: 100px; width: auto" src="'.Product::getImage($product['id_book']).'" alt="" /></a>';
                                echo '<h2>'.$product['price'].' BYN</h2>';
                                echo '<p>'.$product['name'].'</p>';
                                echo '<a href="#" data-id="'.$product['id_book'].'" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>В корзину</a>';
                                echo '</div></div></div></div>';
                                ++$count;
                                if($count == 3){
                                    $count = 0;
                                    echo '</div>';
                                }
                            }
                            ?>


                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>
<?php include(ROOT . '/views/layouts/footer.php'); ?>