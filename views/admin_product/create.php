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
                   <label class="col-sm-3 control-label" style="margin-left: 10px" for="form-field-4">Категория</label>
                  <select name="id_category"  class="col-xs-4 col-sm-2" id="form-field-select-1">
                       <option value=""></option>
                      <?php foreach ($categoryList as $category):?>
                       <option value="<?php echo $category['id_category'];?>"><?php echo $category['name'];?></option>
                      <?php endforeach; ?>
                   </select>
               </div>

               <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Артикул</label>

                   <div class="col-sm-9">
                       <input type="text" name="code" id="form-field-1" placeholder="Артикул" class="col-xs-10 col-sm-5" />
                   </div>
                   <div class="space-4"></div>
               </div>


               <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Изображение</label>

                   <div class="col-sm-5">
                       <input type="file" name="image" id="id-input-file-2" />
                   </div>
               </div>




                   <div class="form-group">
                       <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Описание</label>

                       <div class="col-sm-5">
                           <textarea name="description"></textarea>
                       </div>
                   </div>
                   <div class="space-4"></div>
                   <div class="form-group">
                       <label class="col-sm-3 control-label no-padding-right" for="form-field-4">Цена</label>

                       <div class="col-sm-9">
                           <input class="input-sm" name="price" type="text" id="form-field-4" placeholder="50.00" />
                           <div class="space-2"></div>

                           <div class="help-block" id="input-size-slider"></div>
                       </div>
                   </div>
                   <div class="space-4"></div>
               <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Автор</label>

                   <div class="col-sm-9">
                       <input type="text" name="author" id="form-field-1" placeholder="Автор" class="col-xs-10 col-sm-5" />
                   </div>
                   <div class="space-4"></div>
               </div>

                   <label class="col-sm-3 control-label no-padding-right" style="margin-left: -5px" for="form-field-1"> Дата публикации</label>

               <div class="row ">
                   <div class="form-group-sm col-sm-2">
                       <div class="input-group">
                           <input name="date" type="date">
                       </div>
                   </div>
               </div>

               <div class="space-4"></div>
               <div class="space-4"></div>

               <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right" for="form-field-4">Количество страниц</label>
                   <div class="col-sm-9">
                       <input class="input-sm" name="count_page" type="text" id="form-field-4" placeholder="5008" />


                       <div class="help-block" id="input-size-slider"></div>
                   </div>
               </div>



               <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right" for="form-field-4">Переплёт</label>
                   <div class="col-sm-9">
                       <input class="input-sm" name="cover" type="text" id="form-field-4" placeholder="Твёрдый" />


                       <div class="help-block" id="input-size-slider"></div>
                   </div>
               </div>
               <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right" for="form-field-4">Издатель</label>
                   <div class="col-sm-9">
                       <input class="input-sm" name="publisher" type="text" id="form-field-4" placeholder="Махаон" />
                       <div class="space-2"></div>

                       <div class="help-block" id="input-size-slider"></div>
                   </div>
               </div>
               <div class="form-group" >
                   <label class="col-sm-3 control-label" style="margin-left: 10px" for="form-field-4">Статус</label>
                   <select name="status"  class="col-xs-3 col-sm-1" id="form-field-select-1">
                       <option value=""></option>
                       <option value="1">Отображается</option>
                       <option value="0">Не отображается</option>
                   </select>
               </div>
               <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right" for="form-field-4">Рекомендованный товар</label>
                   <div class="col-xs-3">
                       <label>
                           <input name="is_recommended" class="ace ace-switch" type="checkbox" />
                           <span class="lbl"></span>
                       </label>
                   </div>
               </div>
               <div class="form-group">
                   <label class="col-sm-3 control-label no-padding-right" for="form-field-4">Новый товар</label>
                   <div class="col-xs-3">
                       <label>
                           <input name="is_new" class="ace ace-switch" type="checkbox" />
                           <span class="lbl"></span>
                       </label>
                   </div>
               </div>
               <div class="space-4"></div>

               <input style="margin-left: 360px" type="submit" name="submit"  value="Добавить книгу" class="btn btn-success">


           </form>



        </div>
    </div>




<?php include(ROOT . '/views/layouts/footer_admin.php');?>
