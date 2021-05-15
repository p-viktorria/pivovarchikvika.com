<?php include(ROOT . '/views/layouts/header.php'); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/" class="">Главная</a></li>
            <li><a href="/catalog" class="">Каталог</a></li>
            <li class="active"><?php echo $categoryById['name'];?></li>
        </ol>
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категории</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php foreach ($categoryList as $category):?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a <?php if($id_category == $category['id_category']) echo 'class="active"';?>
                                                href="/category/<?php echo $category['id_category'];?>">
                                            <?php echo $category['name'];?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div><!--/category-products-->

                    <div class="brands_products"><!--filter-->
                        <h2>Сортирововать по:</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a class="<?php if(isset($_SERVER['REDIRECT_QUERY_STRING'])){
                                        if(preg_match('/sort=minPrice/', $_SERVER['REDIRECT_QUERY_STRING'])){
                                            echo 'active';
                                        }} ?>"
                                       href="/category/<?php echo $id_category;?>?sort=minPrice">
                                        Сначала дешёвые</a></li>
                                <li><a class="<?php if(isset($_SERVER['REDIRECT_QUERY_STRING'])){
                                        if(preg_match('/sort=maxPrice/', $_SERVER['REDIRECT_QUERY_STRING'])){
                                            echo 'active';
                                        }} ?>" href="/category/<?php echo $id_category;?>?sort=maxPrice">Сначала дорогие</a>
                                </li>
                                <li><a class="<?php if(isset($_SERVER['REDIRECT_QUERY_STRING'])){
                                        if(preg_match('/sort=rating/', $_SERVER['REDIRECT_QUERY_STRING'])){
                                            echo 'active';
                                        }} ?>" href="/category/<?php echo $id_category;?>?sort=rating">По популярности</a>
                                </li>
                                <li><a class="<?php if(isset($_SERVER['REDIRECT_QUERY_STRING'])){
                                        if(preg_match('/sort=date/', $_SERVER['REDIRECT_QUERY_STRING'])){
                                            echo 'active';
                                        }} ?>" href="/category/<?php echo $id_category;?>?sort=date">По дате издания</a>
                                </li>

                            </ul>
                        </div>
                    </div><!--/filter-->


                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Представлены последние <?php echo count($productsByCategory);?> результатов</h2>
                    <?php foreach($productsByCategory as $product): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="/product/<?php echo $product['id_book'];?>">
                                            <img style="height: 200px;width: auto;" src="<?php echo Product::getImage($product['id_book']);?>" alt="<?php echo $product['name'];?>" />
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
                <?php echo $pagination->get();?>


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
