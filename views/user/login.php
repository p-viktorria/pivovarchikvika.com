<?php include(ROOT . '/views/layouts/header.php'); ?>

    <section>
        <div class="container">
            <div class="row">

                <div class="col-sm-4 col-sm-offset-4 padding-right" style="margin-bottom: 10%">
                        <?php if(isset($errors) && is_array($errors)):?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        <div class="signup-form"><!--sign up form-->
                            <h2>Вход на сайт</h2>
                            <form action="" method="POST">
                                <input type="email" name="email" placeholder="Электронная почта"  value="<?php echo $email;?>"/>
                                <input type="password" name="password" placeholder="Пароль"  value="<?php echo $password;?>"/>
                               <!-- Запомнить меня<input type="checkbox" name="" class="">-->
                                <input type="submit" name="submit" value="Войти" class="btn btn-success">
                            </form>
                        </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section>

<?php include(ROOT . '/views/layouts/footer.php'); ?>