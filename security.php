<?php

/*
1.одно приложение 1бд, 1логин 1пароль
2.шифровать пароль лучше функцие crypt()+ нужно добавлять соль.
3.Используем basename при передаче файлов


*/


$userPassword = 'mypassword';

$hashed_password = crypt('mypassword', 'cba20383d41e7d97ab8d5c2005f8b965597ab64df036e9cef749445dbdaa3258');

if (hash_equals($hashed_password, crypt($userPassword, $hashed_password))) {//функция для сравнения 2 строк
    echo "Пароль верен!";
}else {
    echo 'пароль не верен';
}

echo PHP_EOL;
echo $hashed_password;

function clearAll($data){
    $data = strip_tags($data);
    $data = htmlspecialchars($data, ENT_QUOTES);
}
