<?php
$dsn = 'mysql:host=db;dbname=ph2_quizy;charset=utf8;';
$user = 'kanta';
$password = 'posse';

try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
} catch(PDOException $e) {
    echo '接続失敗: ' . $e->getMessage();
    exit();
}
