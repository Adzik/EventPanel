<?php
    require_once ('Authorization.php');
    $logout = new Authorization();
    $logout -> LogOut();
    header('Location: index.php');