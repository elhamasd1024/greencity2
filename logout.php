<?php
include 'Resources/Php/ifLogedIn.php';
if ($login){
    unset($_SESSION['login']);
    unset($_SESSION['timeout']);
    unset($_SESSION['email']);
    unset($_SESSION['admin']);
    header('Location: index.php');
}else{
    header('Location: index.php');
}
