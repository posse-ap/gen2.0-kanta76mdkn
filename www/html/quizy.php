<?php
require("./db_connect.php");

if(isset($_GET['1'])) { $id = $_GET['1']; };

if(isset($_GET['2'])) { $id = $_GET['2']; };


?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">X-UA-Compatible
    <title>testtesttest</title>
    <link rel="stylesheet" href="quizy.css">
    <link rel="stylesheet" href="riset.css">
</head>

<body>
    <h1><p class="quiz-title">ガチで東京の人しか解けない！ #東京の難読地名クイズ</p></h1>
    
    
    <div id = "container"></div>
    <script src="quizy.js"></script>
</body>

</html>