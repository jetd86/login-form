<?php
$sub = explode('/', $_SERVER['REQUEST_URI']);
$cls = 'active';
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php
                if ($_SESSION['AUTH'] == false) {
                    ?>
                    <li class="<?= ($sub[1] == '') ? $cls : ''; ?>"><a href="../">Авторизация</a>
                    </li>
                    <li class="<?= ($sub[1] == 'registration') ? $cls : ''; ?>"><a
                                href="../registration/">Регистрация</a></li>
                <?php } ?>

                <?php
                if ($_SESSION['AUTH'] === true) { ?>
                    <li class="<?= ($sub[1] == 'userslist') ? $cls : ''; ?>"><a
                                href="../userslist/">Список пользователей</a></li>
                    <li class="<?= ($sub[1] == 'filelist') ? $cls : ''; ?>"><a href="/filelist/">Список
                            файлов</a></li>
                    <li><a href="../index.php?logout=true">Выйти из
                            кабинета</a></li>
                <?php } else {
                    $_SESSION['WARNING'] = 'вам нужно авторизоваться или зарегистрироваться, чтобы получить доступ к меню';
                }

                ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<?php
print_r($_SESSION);
?>

