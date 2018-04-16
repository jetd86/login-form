<?php session_start(); ?>
<?php

    $link = explode('/',$_SERVER['REQUEST_URI']);
    if($link == $_SESSION){

    }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="../css/starter-template.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/include/menu.php'; ?>
<div class="container">
    <h1>Запретная зона, доступ только авторизированному пользователю</h1>
    <h2>Информация выводится из базы данных</h2>
    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>Пользователь(логин)</th>
            <th>Имя</th>
            <th>возраст</th>
            <th>описание</th>
            <th>Фотография</th>
            <th>Действия</th>
        </tr>
        <?php
        require_once '../classdb.php';
        $users = new Database();
        $users = $users->query("SELECT * FROM users");
        foreach ($users as $v) {
            $imgName = explode('/', $v['photo']);
            ?>

            <tr>
                <td><?= $v['id'] ?></td>
                <td><?= $v['login'] ?></td>
                <td><?= $v['name'] ?></td>
                <td><?= $v['age'] ?></td>
                <td><?= $v['description'] ?></td>
                <td>
                    <div class='userAvatar'>
                        <img src="<?= '/'. $v['photo'] ?>" width='100' height="100"><br>
                    </div>
                </td>
                <td>
                    <form action="del_user.php" method="post" enctype="multipart/form-data">
                        <input type="submit" name="<?=$v['id'] ?>" value="Удалить пользователя">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/main.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>
