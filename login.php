<?php
header('Location:/');
session_start();
echo '<pre>';
print_r($_POST);
echo '</pre>';

//функция очистки полей
function clearAll($data)
{
    $data = strip_tags($data);
    $data = htmlspecialchars($data, ENT_QUOTES);
    $data = htmlentities($data);
    return $data;
}


$login = strtolower(clearAll($_POST['login']));
$auth_pass = clearAll($_POST['auth_pass']);

//подключаемся к базе данных
include('classdb.php');
$db = new Database();
$getId = $db->query("SELECT id FROM users where login='{$login}'"); //получаем ид по логину
foreach ($getId as $v) {
    $id = $v['id'];
}

//получаем логин и пароль пользователя
$getUserInfo = $db->query("SELECT login,password FROM users where id='{$id}'");

echo $getUserInfo[0]['login'];

$userPasswordFromMysql = $getUserInfo[0]['password']; // пароль из базы

//пароль прислыннй пользователем из формы авторизации шифруем
$_postPassword = crypt($auth_pass, 'cba20383d41e7d97ab8d5c2005f8b965597ab64df036e9cef749445dbdaa3258');
$compare = hash_equals($userPasswordFromMysql, $_postPassword);//функция для сравнения паролей
if (strtolower($getUserInfo[0]['login']) == $login && $compare == true) {
    $_SESSION['AUTH'] = true;
    $_SESSION['LOGIN_STATUS'] = 'Вы успешно авторизовались';
} elseif ($compare == false && strtolower($getUserInfo[0]['login']) == $login) {
    $_SESSION['LOGIN_STATUS'] = 'Вы ввели неверный пароль';
} elseif(empty($getUserInfo[0]['login'])){
    $_SESSION['LOGIN_STATUS'] = 'Пользователь с таким логином не найден, зарегистрируйтесь';
}
else {
   unset($_SESSION['LOGIN_STATUS']);
}

