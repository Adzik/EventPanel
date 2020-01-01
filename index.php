<?php
    session_start();
    if(isset($_SESSION['logged'])){
        echo 'Już dawno zalogowany!';
        header('Location: panel.php');
    }
    else{
    include('cu2n35d.html');
    }
?>
