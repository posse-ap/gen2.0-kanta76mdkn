<?php
require("./db_connect.php");

$page_id = filter_input(INPUT_GET,'id');
if(!isset($page_id)){
    header('Location: ./index.php');
}
// もしidを記述しないまま直接アクセスしようとするとindex.phpに戻される仕組み。Amazonでログインしないまま買い物しようとするとログイン画面に戻される的な。


$big_question_stmt = $db->prepare("select title from big_questions where id =? ");
// prepareについて：括弧内のsql文を発効しますよって感じ？
// sql文を最初に用意しておいてクエリ内のパラメータの値だけを変更してクエリを実行。？に何かが埋め込まれて初めて動き出すもの。
// queryはすぐ実行しますよってやつ
$big_question_stmt->execute([$page_id]);
// はてなにpage_idを埋め込むって意味
// ここまでPDOステートメント。そのままだとphpで利用できない!?ものらしい。まだphpに落とし込まれていない段階。
$big_question = $big_question_stmt->fetchAll();
// ここで初めてphpで利用できるようなオブジェクトになる。fetchだったら1行。allまでつけてしまったら余計なものまでついてくる。他のところではほぼall使う。
print_r($big_question)




?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>クイジーph2課題</title>
    <link rel="stylesheet" href="quizy.css">
    <link rel="stylesheet" href="riset.css">
</head>

<body>
    <h1><p class="quiz-title">ガチで東京の人しか解けない！ #東京の難読地名クイズ</p></h1>  
    <div id = "container"></div>
    <script src="quizy.js"></script>

    

</body>

</html>