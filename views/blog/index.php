<?php include(ROOT . '/views/layouts/header.php'); ?>

<section>
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/" class="">Главная</a></li>
            <li class="active">Наши статьи</li>
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
                    <h2 class="title text-center">Последние статьи</h2>

                   <?php foreach ($blogList as $blog):?>
                    <div class="single-blog-post">
                        <h3><?php echo $blog['title'];?></h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-user"></i> <?php echo $blog['author'];?></li>
                                <li><i class="fa fa-calendar"></i> <?php echo $blog['date'];?></li>
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

<!--										<i class="fa fa-star"></i>-->
<!--										<i class="fa fa-star"></i>-->
<!--										<i class="fa fa-star"></i>-->
<!--										<i class="fa fa-star-half-o"></i>-->
								</span>
                        </div>
                        <a href="/blog/<?php echo $blog['id_article'];?>">
                            <img src="<?php echo Blog::getImage($blog['id_article']);?>"  alt="">
                        </a>
                        <p><?php echo $blog['preview'];?></p>
                        <a  class="btn btn-primary" href="/blog/<?php echo $blog['id_article'];?>">Читать полностью</a>
                    </div>
                    <?php endforeach; ?>
                    <br>
                    <br>

                </div>

            </div>

        </div>

    </div>

</section>
<div class="col-md-4"></div><?php echo $pagination->get();?>

<?php include(ROOT . '/views/layouts/footer.php'); ?>
