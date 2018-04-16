<?php include '../include/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/menu.php'; ?>
<div class="container">
    <div class="form-container">
    <?php
    if ($_SESSION['AUTH'] == false){
        ?>

            <form class="form-horizontal" method="post" action="form-reg.php"
                  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
                    <div class="col-sm-10">
                        <input type="text" name="login" class="form-control" id="inputEmail3"
                               placeholder="Придумайте ваш логин на латинице">
                        <?php echo '<span class="error">' . $_SESSION['LOGIN_ERROR'] . '</span>'; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control"
                               id="inputPassword3" placeholder="Пароль">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword4" class="col-sm-2 control-label"></label>
                    <div class="col-sm-10">
                        <input type="password" name="password_repeat" class="form-control"
                               id="inputPassword4" placeholder="Пароль еще раз">
                        <?php echo '<span class="error">' . $_SESSION['PASS_ERROR'] . '</span>'; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Имя</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="inputName"
                               placeholder="введите ваше имя">
                        <?php echo '<span class="error">' . $_SESSION['NAME_ERROR'] . '</span>'; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Возраст</label>
                    <div class="col-sm-10">
                        <input type="text" name="age" class="form-control" id="inputAge"
                               placeholder="ваш возраст">
                        <?php echo '<span class="error">' . $_SESSION['AGE_ERROR'] . '</span>'; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Доп.инфо</label>
                    <div class="col-sm-10">
                        <textarea type="text" name="shortBio" class="form-control" id="inputInfo"
                                  placeholder="кратко о себе"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Аватар</label>
                    <div class="col-sm-10">
                        <input type="file" name="file" class="form-control" id="inputAvatar">
                        <small>jpg,png,gif(не больше 1мб)</small>
                        <br>
                        <?php echo '<span class="error">' . $_SESSION['FILE_ERROR'] . '</span>'; ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Зарегистрироваться</button>
                        <br><br>
                        Зарегистрированы? <a href="../">Авторизируйтесь</a>
                    </div>
                </div>
            </form>
        </div>
    <?php }else{
        echo  $_SESSION['LOGIN_SUCCES'] =  'Вы успешно зарегистрировались, <br>теперь вам доступны расширенные возможности.';
    }
    ?>
</div><!-- /.container -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/main.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>
