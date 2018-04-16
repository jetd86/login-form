<?php
header('Location:/filelist/');
$path = $_SERVER['DOCUMENT_ROOT'] . '/photos/' . $_POST['photo'];
if (file_exists($path)) {
    unlink($path);
}
