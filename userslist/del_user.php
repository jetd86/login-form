<?php
header('Location:/userslist/');
require_once '../classdb.php';
$user = new Database();

//получаем ключ массива
$userId = key($_POST);

//удаляем фото
$sql = $user->query("SELECT photo FROM users WHERE id='$userId'");
$img = explode('/', $sql[0]['photo']);

$path = $_SERVER['DOCUMENT_ROOT'] . '/photos/' . $img[2];
if (file_exists($path)) {
    unlink($path);
}
//удаляем пользователя последним, так как сначала берется информация о картинке из базы данных.
$sql = $user->query("DELETE FROM users WHERE id='$userId'");

// соединение больше не нужно, закрываем
$sql = null;

