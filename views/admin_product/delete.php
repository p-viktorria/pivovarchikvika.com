<?php include(ROOT . '/views/layouts/header_admin.php');?>
<div class="container-fluid" style="margin-left: 25%;margin-top: 1%">
<div style="display: inline-block">
<h3 class="col-lg-8">Удаление книги с иденификатором №<?php echo $id;?>?</h3>
</div>
<h4>Вы действительно хотите удалить эту книгу?</h4>
<form action="#" method="POST" style="display: block">
    <input class="btn btn-danger" type="submit" value="Удалить" name="submit">
    <input class="btn btn-success" type="submit" value="Назад" name="exit">
</form>
</div>

<?php include(ROOT . '/views/layouts/footer_admin.php');?>
