<?php
//header('Location:http://' . $_SERVER['HTTP_HOST'] . '/' );
if($_GET['logout'] == true){
    session_destroy();
}

?>