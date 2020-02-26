<div class="page_content">
    <p class="page_content_title">Авторизация на сайте</p>
    <div class="container">
        <div class="row">


            <span class="col-sm-6 offset-md-3">
            <form action="" method="POST" class="">

                <?if(isset($error)){?>
                    <p class="error">Пользователь не найден</p>
                <?}?>

                <div class="control-group form-group">
                    <input class="form-control" name="login" value="<?=$login?>" placeholder="Логин">
                </div>
                <div class="control-group form-group">
                    <input class="form-control" type="password" name="password" placeholder="Пароль">
                </div>

                <div>
                    <button type="submit" class="form-control btn-primary">Войти</button>
                </div>

            </form>
        </span></div>
    </div>
</div>