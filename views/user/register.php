<?php include(ROOT . '/views/layouts/header.php'); ?>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-sm-offset-4 padding-right" style="margin-bottom: 10%">
                    <?php if($result):?>
                    <h2 style="margin-bottom: 4%">Вы зарегистрированы!</h2>
                    <?php else: ?>
                    <?php if(isset($errors) && is_array($errors)):?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                    <div class="signup-form"><!--sign up form-->
                        <h2>Регистрация на сайте</h2>
                        <form action="" method="POST">
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name;?>"/>
                            <input type="email" name="email" placeholder="Электронная почта"  value="<?php echo $email;?>"/>
                            <input type="password" name="password" placeholder="Пароль"  value="<?php echo $password;?>"/>
                            <input type="submit" name="submit" value="Зарегистрироваться" class="btn btn-success">
                        </form>
                    </div><!--/sign up form-->
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>

<?php include(ROOT . '/views/layouts/footer.php'); ?>