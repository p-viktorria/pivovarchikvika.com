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
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Заглавие</label>

                <div class="col-sm-9">
                    <input type="text" name="title" id="form-field-1" placeholder="Заглавие" class="col-xs-10 col-sm-5" />
                </div>
                <div class="space-4"></div>
            </div>


            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Превью</label>

                <div class="col-sm-5">
                    <textarea name="preview"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Текст</label>

                <div class="col-sm-5">
                    <textarea name="text"></textarea>
                </div>
            </div>



            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Изображение</label>

                <div class="col-sm-5">
                    <input type="file" name="image" id="id-input-file-2" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Автор</label>

                <div class="col-sm-9">
                    <input type="text" name="author" id="form-field-1" placeholder="ФИО" class="col-xs-10 col-sm-5" />
                </div>
                <div class="space-4"></div>
            </div>






            <input style="margin-left: 360px" type="submit" name="submit"  value="Добавить статью" class="btn btn-success">


        </form>



    </div>
</div>




<?php include(ROOT . '/views/layouts/footer_admin.php');?>
