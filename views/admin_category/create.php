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
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Наименование</label>

                    <div class="col-sm-9">
                        <input type="text" name="name" id="form-field-1" placeholder="Наименование" class="col-xs-10 col-sm-5" />
                    </div>
                    <div class="space-4"></div>
                </div>
                <div class="form-group" >
                    <label class="col-sm-3 control-label" style="margin-left: 10px" for="form-field-4">Статус</label>
                    <select name="status"  class="col-xs-3 col-sm-1" id="form-field-select-1">
                        <option value=""></option>
                        <option value="1">Отображается</option>
                        <option value="0">Не отображается</option>
                    </select>
                </div>

                <input style="margin-left: 360px" type="submit" name="submit"  value="Добавить категорию" class="btn btn-success">


            </form>



        </div>
    </div>




<?php include(ROOT . '/views/layouts/footer_admin.php');?>