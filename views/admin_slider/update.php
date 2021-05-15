<?php include(ROOT . '/views/layouts/header_admin.php');?>

<?php if(isset($errors) && is_array($errors)):?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><h3><?php echo $error; ?></h3></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div class="row">
    <div class="col-xs-12" style="margin-top: -180px">

        <form style="margin-left: 150px;" class="form-horizontal" action="" id="form" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> H1</label>

                <div class="col-sm-9">
                    <input type="text"  value="<?php echo $slide['h1'];?>" name="h1" id="form-field-1" placeholder="h1" class="col-xs-10 col-sm-5" />
                </div>
                <div class="space-4"></div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> H2</label>

                <div class="col-sm-9">
                    <input type="text" value="<?php echo $slide['h2'];?>" name="h2" id="form-field-1" placeholder="h2" class="col-xs-10 col-sm-5" />
                </div>
                <div class="space-4"></div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> P</label>

                <div class="col-sm-9">
                    <input type="text"  value="<?php echo $slide['p'];?>" name="p" id="form-field-1" placeholder="p" class="col-xs-10 col-sm-5" />
                </div>
                <div class="space-4"></div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">HREF</label>

                <div class="col-sm-9">
                    <input type="text"  value="<?php echo $slide['href'];?>" name="href" id="form-field-1" placeholder="href" class="col-xs-10 col-sm-5" />
                </div>
                <div class="space-4"></div>
            </div>




            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Изображение</label>

                <div class="col-sm-5">
                    <input type="file" name="image" id="id-input-file-2" />
                </div>
            </div>






            <input style="margin-left: 360px" type="submit" name="submit"  value="Обновитьь слайд" class="btn btn-success">


        </form>



    </div>
</div>




<?php include(ROOT . '/views/layouts/footer_admin.php');?>

