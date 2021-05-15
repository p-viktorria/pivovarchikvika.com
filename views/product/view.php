<?php include(ROOT . '/views/layouts/header.php'); ?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категории</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <?php foreach ($categoryList as $category):?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $category['id_category'];?>">
                                            <?php echo $category['name'];?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div><!--/category-products-->





                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img style="height:450px;width: auto; " src="<?php echo Product::getImage($productInfo['id_book']);?>" alt="<?php echo $productInfo['name']?>" />
                        </div>


                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="" class="newarrival" alt="" />
                            <h2><?php echo $productInfo['name']?></h2>
                            <p>Артикул: <?php echo $productInfo['code'];?></p>
                            <div class="post-meta" style="color: #d2076e;">
                                <?php for($i = 0; $i < 5;$i++) {
                                    if($productInfo['rating'] >= 1){
                                        echo '<i class="fa fa-star "></i>';
                                        $productInfo['rating']--;
                                        continue;
                                    }
                                    echo '<i class="fa fa-star fa-star-o"></i>';
                                } ?>
                            </div>
                            <span>
									<span><?php echo $productInfo['price']?> BYN</span>
<!--									<label>Кол-во:</label>-->
<!--									<input type="text" value="1" />-->
									<a href="" class="btn btn-default add-to-cart" data-id="<?php echo $productInfo['id_book'];?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
								</span>
                            <p><b>Автор: </b><?php echo $productInfo['author']?></p>
                            <p><b>Год выпуска: </b><?php echo $productInfo['year']?></p>
                            <p><b>Количество страниц: </b><?php echo $productInfo['count_page']?></p>
                            <p><b>Переплёт: </b><?php echo $productInfo['cover']?></p>
                            <p><b>Издатель: </b><?php echo $productInfo['publisher']?></p>
                            <p><b>Краткое описание: </b><?php echo $productInfo['description']?></p>
                            <script type="text/javascript">(function() {
                                    if (window.pluso)if (typeof window.pluso.start == "function") return;
                                    if (window.ifpluso==undefined) { window.ifpluso = 1;
                                        var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                                        s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                                        s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                                        var h=d[g]('body')[0];
                                        h.appendChild(s);
                                    }})();</script>
                            <div class="pluso" data-background="transparent" data-options="small,round,line,horizontal,nocounter,theme=04" data-services="vkontakte,odnoklassniki,facebook,twitter"></div>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->

                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#reviews" data-toggle="tab">Комментарии (<?php echo count($reviews)?>)</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details" >
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">

                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="tab-pane fade" id="companyprofile" >




                        </div>

                        <div class="tab-pane fade" id="tag" >

                        </div>

                        <div class="tab-pane fade active in" id="reviews" >
                            <div class="col-sm-12">

                                <?php foreach ($reviews as $review) :?>


                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i><?php echo $review['author'];?></a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i><?php echo $review['date'];?></a></li>
                                    <?php for($i = 0; $i < 5;$i++) {
                                        if($review['rating'] >= 1){
                                            echo '<i class="fa fa-star"></i>';
                                            $review['rating']--;
                                            continue;
                                        }
                                        echo '<i class="fa fa-star fa-star-o"></i>';
                                    } ?>
                                </ul>

                                <p><?php echo $review['text'];?></p>
                                <?php endforeach; ?>
                                <?php if(isset($errors) && is_array($errors)):?>
                                    <ul>
                                        <?php foreach ($errors as $error): ?>
                                            <li><h3><?php echo $error; ?></h3></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <?php if($result){
                                    echo '<h3>'.$result.'</h3>';
                                } ?>
                                <p><b>Напишите своё мнение!</b></p>

                                <form action="" id="form" style="margin-top: 0" method="POST">
										<span>
											<input type="text" name="author" placeholder="Имя Фамилия"/>
											<input type="email" name="email" placeholder="Электронная почта"/>
										</span>

                                    <textarea name="text" placeholder="Текст" ></textarea>
                                    <input type="submit" class="btn btn-success pull-right" name="submit" value="Отправить">

                                    <p>Оцените от 1 до 5</p>
                                    <div class="star-rating">
                                        <div class="star-rating__wrap">
                                            <input class="star-rating__input" id="star-rating-5" type="radio" name="rating" value="5">
                                            <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-5" title="5 из 5 звёзд"></label>
                                            <input class="star-rating__input" id="star-rating-4" type="radio" name="rating" value="4">
                                            <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-4" title="4 из 5 звёзд"></label>
                                            <input class="star-rating__input" id="star-rating-3" type="radio" name="rating" value="3">
                                            <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-3" title="3 из 5 звёзд"></label>
                                            <input class="star-rating__input" id="star-rating-2" type="radio" name="rating" value="2">
                                            <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-2" title="2 из 5 звёзд"></label>
                                            <input class="star-rating__input" id="star-rating-1" type="radio" name="rating" value="1">
                                            <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-1" title="1 из 5 звёзд"></label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div><!--/category-tab-->

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
                                echo '<a href="/product/'.$product['id_book'].'"><img style="height: 100px; width: auto" src="'. Product::getImage($product['id_book']).'" alt="" /></a>';
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