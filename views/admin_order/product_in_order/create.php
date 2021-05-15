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

                <div class="form-group" >
                    <label class="col-sm-3 control-label" style="margin-left: 10px" for="form-field-4">Наименование товара(ID)- Артикул</label>
                    <select  name="id_book"  class="col-xs-4 col-sm-2" id="form-field-select-1">

                        <?php foreach ($products as $product):?>
                            <option  value="<?php echo $product['id_book'];?>">
                                <?php echo $product['name']."({$product['id_book']})"."- {$product['code']}";?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-4">Количество товара</label>
                    <div class="col-sm-9">
                        <input class="input-sm" value="" name="quantity" type="text" id="form-field-4" placeholder="5" />


                        <div class="help-block" id="input-size-slider"></div>
                    </div>
                </div>

                <input style="margin-left: 360px" type="submit" name="submit"  value="Изменить количество" class="btn btn-success">


            </form>



        </div>
    </div>




<?php include(ROOT . '/views/layouts/footer_admin.php');?>