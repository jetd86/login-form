<?php session_start()?>
<?php include 'include/header.php';?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/menu.php'; ?>
    <div class="container">
        <div class="form-container">
        <?php if ($_SESSION['AUTH'] == false){ ?>
        <form class="form-horizontal" action='login.php' method="post"
              enctype="multipart/form-data">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
                <div class="col-sm-10">
                    <input type="text" name='login' class="form-control" id="inputEmail3"
                           placeholder="Логин">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
                <div class="col-sm-10">
                    <input type="password" name='auth_pass' class="form-control" id="inputPassword3"
                           placeholder="Пароль">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Войти</button>
                    <br><br>
                    <span class="error"><?php echo $_SESSION['LOGIN_STATUS'] ?></span><br>
                    Нет аккаунта? <a href="registration/">Зарегистрируйтесь</a>
                </div>
            </div>
        </form>
    </div>
    </div>

    <?php } else {
       echo $_SESSION['LOGIN_STATUS'] =  'Вы успешно авторизовались, <br>теперь вам доступны расширенные возможности.';
    }

    ?>

<?php include 'include/footer.php';?>