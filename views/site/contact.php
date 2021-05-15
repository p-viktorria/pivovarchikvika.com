<?php include(ROOT . '/views/layouts/header.php'); ?>

<section>
    <div class="container">
<div class="col-sm-8">
    <ol class="breadcrumb">
        <li><a href="/" class="">Главная</a></li>
        <li class="active">Связаться с нами</li>
    </ol>
    <?php if($result) :?>
    <p>Сообщение отправлено.</p>
    <p>В ближайшее время с вами свяжется наш сотрудник</p>
    <?php else :?>
        <?php if(isset($errors) && is_array($errors)):?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    <div class="contact-form">
        <h2 class="title text-center">Есть вопрос? Напишите нам</h2>
        <div class="status alert alert-success" style="display: none"></div>
        <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
            <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" required="required" placeholder="Ваше имя">
            </div>
            <div class="form-group col-md-6">
                <input type="email" name="email" class="form-control" required="required" placeholder="Ваша электронная почта">
            </div>
            <div class="form-group col-md-12">
                <input type="text" name="subject" class="form-control" required="required" placeholder="Тема письма">
            </div>
            <div class="form-group col-md-12">
                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Ваше сообщение"></textarea>
            </div>
            <div class="form-group col-md-12">
                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Отправить">
            </div>
        </form>
    </div>
    <?php endif;?>
</div>
    </div>
</section>

<?php include(ROOT . '/views/layouts/footer.php'); ?>
