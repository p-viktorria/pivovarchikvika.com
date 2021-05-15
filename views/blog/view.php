<?php include(ROOT . '/views/layouts/header.php'); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/" class="">Главная</a></li>
            <li><a href="/blog" class="">Наши статьи</a></li>
            <li class="active"><?php echo $blog['title'];?></li>
        </ol>
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
            <div class="col-sm-9">
                <div class="blog-post-area">

                    <div class="single-blog-post">
                        <h3><?php echo $blog['title'];?></h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-user"></i> <?php echo $blog['author'];?></li>
                                <li><i class="fa fa-calendar"></i><?php echo $blog['date'];?></li>
                            </ul>
                            <span>
									<?php for($i = 0; $i < 5;$i++) {
                                        if($blog['rating'] >= 1){
                                            echo '<i class="fa fa-star "></i>';
                                            $blog['rating']--;
                                            continue;
                                        }
                                        echo '<i class="fa fa-star fa-star-o"></i>';
                                    } ?>
								</span>
                        </div>
                        <a href="">
                            <img src="<?php echo Blog::getImage($blog['id_article']);?>" alt="">
                        </a>
                        <p>
                         <?php echo $blog['text'];?>
                        </p>

                    </div>
                </div><!--/blog-post-area-->



                <div class="socials-share">
                    <a href=""><img src="/tempate/images/blog/socials.png" alt=""></a>
                </div><!--/socials-share-->


                <div class="response-area">
                    <h2>Комментарии (<?php echo count($reviews);?>)</h2>
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
                </div><!--/Response-area-->

            </div>

        </div>

    </div>

</section>

<?php include(ROOT . '/views/layouts/footer.php'); ?>
