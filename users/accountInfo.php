<?php
session_start();
if(isset($_SESSION['logged']) && $_SESSION['active'] != 0){
    print_r('Jesteś zalogowany jako: '.$_SESSION['user_nick']);
}
else{
    header('Location: index.php');
}