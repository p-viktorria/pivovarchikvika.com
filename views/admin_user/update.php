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
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Идентификатор</label>

                <div class="col-sm-9">
                    <input type="text" readonly value="<?php echo $user['id_user'];?>" name="id_user" id="form-field-1" placeholder="ID" class="col-xs-10 col-sm-5" />
                </div>
                <div class="space-4"></div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Имя</label>

                <div class="col-sm-9">
                    <input type="text"  value="<?php echo $user['name'];?>" name="name" id="form-field-1" placeholder="Имя" class="col-xs-10 col-sm-5" />
                </div>
                <div class="space-4"></div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Эл.Почта</label>

                <div class="col-sm-9">
                    <input type="text"  value="<?php echo $user['email'];?>" name="email" id="form-field-1" placeholder="Эл.Почта" class="col-xs-10 col-sm-5" />
                </div>
                <div class="space-4"></div>
            </div>

            <div class="form-group" >
                <label class="col-sm-3 control-label" style="margin-left: 10px" for="form-field-4">Роль</label>
                <select name="role"  class="col-xs-4 col-sm-2" id="form-field-select-1">
                    <option selected value="<?php echo $user['role'];?>"><?php echo $user['role'];?></option>
                        <option value="Пользователь">Пользователь</option>
                        <option value="admin">Администратор</option>

                </select>
            </div>

            <div class="form-group" >
                <label class="col-sm-3 control-label" style="margin-left: 10px" for="form-field-4">Скидка(%)</label>
                <select name="discount"  class="col-xs-4 col-sm-2" id="form-field-select-1">
                    <option selected value="<?php echo $user['discount'];?>"><?php echo $user['discount'];?>%</option>
                    <option value="1">1%</option>
                    <option value="2">2%</option>
                    <option value="3">3%</option>
                    <option value="4">4%</option>
                    <option value="5">5%</option>
                    <option value="9">9%</option>
                    <option value="10">10%</option>

                </select>
            </div>






            <input style="margin-left: 360px" type="submit" name="submit"  value="Обновить информацию" class="btn btn-success">


        </form>



    </div>
</div>




<?php include(ROOT . '/views/layouts/footer_admin.php');?>
