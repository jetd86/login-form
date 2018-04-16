<?php session_start()?>
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
      <h2>Информация выводится из списка файлов</h2>
      <table class="table table-bordered">
        <tr>
          <th>Название файла</th>
          <th>Фотография</th>
          <th>Действия</th>
        </tr>
          <?php
          $webPath = '/photos/';
          $path = $_SERVER['DOCUMENT_ROOT'] .'/photos/';
          $scanned_directory = array_diff(scandir($path), array('..', '.'));
          $dir = array_values($scanned_directory);
          for ($i = 0; $i <= count($dir)-1; $i++) {
              ?>
              <tr>
                  <td><?=$dir[$i]?></td>
                  <td>
                      <div class='userAvatar'>
                          <img  src="<?=$webPath . $dir [$i]?>" width='100' height="100"><br>
                      </div>
                  </td>
                  <td>
                      <form action="del_photo.php" method="post" enctype="multipart/form-data">
                          <input type="hidden" name='photo' value="<?=$dir[$i]?>">
                          <input type="submit"  value="Удалить фото">
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
