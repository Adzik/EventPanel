<?php
require_once('config.php');
connect();
global $pdo;
try
{
    $stmt = $pdo -> prepare("SELECT * FROM events");
    $stmt->execute();
    $array = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '{"Events":';
    print_r (json_encode($array, JSON_UNESCAPED_UNICODE));
    echo '}';
}
catch (PDOException $e)
{
    echo 'Wystąpił błąd'. $e->getMessage();
}


