<?php include(ROOT . '/views/layouts/header.php'); ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right" style="margin-bottom: 10%">
                <?php if($result) :?>
                <p>Данные отредактированы</p>
                <?php else: ?>

                <?php if(isset($errors) && is_array($errors)):?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <div class="signup-form"><!--sign up form-->
                    <h2>Изменение данных</h2>
                    <form action="" method="POST">
                        Имя<input type="name" name="name" placeholder="Имя"  value="<?php echo $name;?>"/>
                        Пароль<input type="password" name="password" placeholder="Пароль"  value="<?php echo $password;?>"/>
                        <input type="submit" name="submit" value="Изменить данные" class="btn btn-success">
                    </form>
                </div><!--/sign up form-->
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php include(ROOT . '/views/layouts/footer.php'); ?>
