<?php
session_start();
header('Location:index.php');


//проверяем файлы перед загрузкой
$file = $_FILES['file'];
$allowedMimes = ['image/jpeg', 'image/png', 'image/bmp', 'image/gif'];

function clearAll($data)
{
    $data = strip_tags($data);
    $data = htmlspecialchars($data, ENT_QUOTES);
    $data = htmlentities($data);
    return $data;
}


//очищаем html теги и кавычки
$login = strtolower(clearAll($_POST['login']));
$name = clearAll($_POST['name']);
$age = clearAll($_POST['age']);
$description = clearAll($_POST['shortBio']);
$password = clearAll($_POST['password']);
$passwordRepeat = clearAll($_POST['password_repeat']);

//шифруем пароль
$hashed_password = crypt($password, 'cba20383d41e7d97ab8d5c2005f8b965597ab64df036e9cef749445dbdaa3258');

//проверяем поле файл
if ($file['error'] === 4) {
    $_SESSION['FILE_ERROR'] = 'прикрепите ваш аватар';
} elseif (in_array($file['type'], $allowedMimes) === false) {
    $_SESSION['FILE_ERROR'] = 'данный тип файла не разрешено загружать';
} else {
    unset($_SESSION['FILE_ERROR']);
}


//соединяемся с базой
include('../classdb.php');
$db = new Database();
//получаем логин и пароль пользователя
$getUserInfo = $db->query("SELECT login FROM users where login='{$login}'");
print_r($getUserInfo);
if (empty($login)) {//проверяем поле логин
    $_SESSION['LOGIN_ERROR'] = 'заполните поле логин';
} elseif ($getUserInfo[0]['login'] == $login){//проверяем поле логин, вдруг такой пользователь существует
    $_SESSION['LOGIN_ERROR'] = 'Логин уже занят, придумайте другой';
} else {
    unset($_SESSION['LOGIN_ERROR']);
}

//проверяем пароль
if ($password != $passwordRepeat) {
    $_SESSION['PASS_ERROR'] = 'пароли не совпадают';
} elseif (empty($password) || empty($passwordRepeat)) {
    $_SESSION['PASS_ERROR'] = 'заполните поля с паролем';
} else {
    unset($_SESSION['PASS_ERROR']);
}

//проверяем поле имя
if (empty($name)) {
    $_SESSION['NAME_ERROR'] = 'заполните поле имя';
} else {
    unset($_SESSION['NAME_ERROR']);
}

//проверяем поле возраст
if (empty($age)) {
    $_SESSION['AGE_ERROR'] = 'заполните поле возраст';
} else {
    unset($_SESSION['AGE_ERROR']);
}


//записываем в базу пользователя
if (strtolower($getUserInfo[0]['login']) != $login && !empty($name) && !empty($age) && !empty($hashed_password) && in_array($file['type'], $allowedMimes)) {
    //берем расширение загруженного файла
    $strCount = strlen($file['name']);
    $imgExt = substr($file['name'], -3, $strCount);

    //проверка, так как есть 4 символа в расширении
    if ($imgExt === 'peg') {
        $imgExt = 'jpeg';
    }
    //переименовываем файл
    $filePath = '../photos/' . strtolower(basename($login . '_' . date('Ymdhms'))) . '.' . $imgExt; //имя сохраняемого файла
    move_uploaded_file($file['tmp_name'], $filePath);
    $db->execute("INSERT INTO users (login, password, name, age, description, photo) VALUES ('$login', '$hashed_password', '$name', '$age', '$description', '$filePath')");
    unset($_SESSION['PASS_ERROR']);
    unset($_SESSION['FILE_ERROR']);
    $_SESSION['AUTH'] = true;
}

//закрываем подключение к базе
$getUserInfo = null;
$db = null;

?>


