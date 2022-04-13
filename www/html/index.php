<?php
// phpinfo();
require("./db_connect.php");
// あるものを呼び出す際に使うやつ,相対パス


$title = "4/3";


// 今日の学習時間
$today_stmt = $db->query("SELECT studytimes FROM studyrecords WHERE studydate = CURDATE()");
$todaytimes = $today_stmt->fetch() ?: 0;


// $todaytimes = "2";

//今月の学習時間
// どっちかをもう片方に合わせるのではなく、両方別の同じフォーマットに合わせれば楽
$month_stmt = $db->query("SELECT SUM(studytimes) FROM studyrecords WHERE DATE_FORMAT(studydate, '%M/%Y') = DATE_FORMAT(now(), '%M/%Y')");
$monthStudyTimes = $month_stmt->fetch() ?: 0;

// $monthStudyTimes = "243";

$totalStudyTimes = "134";

//合計学習時間
$total_stmt = $db->query("SELECT SUM(studytimes) FROM studyrecords");
$totalStudyTimes = $total_stmt->fetch() ?: 0;





// ごそっと今月のデータを持ってくればいい
$monthlist_stmt = $db->query("SELECT studytimes FROM studyrecords WHERE DATE_FORMAT(studydate, '%M/%Y') = DATE_FORMAT(now(), '%M/%Y') ");
$monthlist = $monthlist_stmt->fetchAll();

// var_dump($monthlist[0]["studytimes"], $monthlist[0][0]);

// ビャーキャラは文字
// sとリングも文字
$monthTimesList = [];
// $monthTimesList[] = 1;
// $monthTimesList[] = 2;
// $monthTimesList = [1, 2];
// foreach (回す配列 as 単体) ｛
// 単体 = $monthlist[数字]
// $monthTimesListに単体の中身を入れたい
// }
// [ 'studytimes' => '1', 0 => '1' ];
// $montheachlist = $mothlist[0]
// $montheachlist = $mothlist[1]
// $montheachlist = $mothlist[2]
foreach($monthlist as $montheachlist){
$monthTimesList[] = (int)$montheachlist["studytimes"];
}

// json_encodeを使えばjsonに直したのを返してくれる json_encode(jsonにしたいやつ);

$monthstudylistjson = json_encode($monthTimesList);





// array(17) { [0]=> array(2) { ["studytimes"]=> string(1) "1" [0]=> string(1) "1" } [1]=> array(2) { ["studytimes"]=> string(1) "2" [0]=> string(1) "2" } [2]=> array(2) { ["studytimes"]=> string(1) "1" [0]=> string(1) "1" } [3]=> array(2) { ["studytimes"]=> string(1) "1" [0]=> string(1) "1" } [4]=> array(2) { ["studytimes"]=> string(1) "4" [0]=> string(1) "4" } [5]=> array(2) { ["studytimes"]=> string(1) "2" [0]=> string(1) "2" } [6]=> array(2) { ["studytimes"]=> string(1) "3" [0]=> string(1) "3" } [7]=> array(2) { ["studytimes"]=> string(1) "2" [0]=> string(1) "2" } [8]=> array(2) { ["studytimes"]=> string(1) "3" [0]=> string(1) "3" } [9]=> array(2) { ["studytimes"]=> string(1) "2" [0]=> string(1) "2" } [10]=> array(2) { ["studytimes"]=> string(1) "2" [0]=> string(1) "2" } [11]=> array(2) { ["studytimes"]=> string(1) "1" [0]=> string(1) "1" } [12]=> array(2) { ["studytimes"]=> string(1) "2" [0]=> string(1) "2" } [13]=> array(2) { ["studytimes"]=> string(1) "3" [0]=> string(1) "3" } [14]=> array(2) { ["studytimes"]=> string(1) "2" [0]=> string(1) "2" } [15]=> array(2) { ["studytimes"]=> string(1) "1" [0]=> string(1) "1" } [16]=> array(2) { ["studytimes"]=> string(1) "3" [0]=> string(1) "3" } };



// ?=はif分が使えない、＜？phpを使う

?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ph2課題<?= $title; ?></title>
  <link rel="stylesheet" href="./webapp.css">
  <link rel="stylesheet" href="./reset.css">
  <link rel="stylesheet" href="./resu.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
</head>

<body>
  <!-- ここからヘッダー -->
  <header class="header">
    <div class="header_logo_week">
      <img src="./img/posse.png" alt="POSSEロゴ">
      <p>5週目</p>
    </div>
    <button class="header_record_and_post_btn" onclick="showModal()">記録・投稿</button>
  </header>



  <!-- ここから中身 -->

  <div class="page_container">
    <div id="pageBackground"></div>
    <div class="main_container">
  
    

        <!-- 時間表示のところ -->
      <div class="time_bar_graf">
        <ul class="time_container">
          <li class="time_each">
            <p class="time_each_title">Today</p><br>
            <p class="time_each_hours"><?= $todaytimes['studytimes'] ?></p><br>
            <p class="time_each_unit">hour</p>
          </li>
          <li class="time_each">
            <p class="time_each_title">Month</p><br>
            <p class="time_each_hours"><?= $monthStudyTimes['SUM(studytimes)'] ?></p><br>
            <p class="time_each_unit">hour</p>
          </li>
          <li class="time_each">
            <p class="time_each_title">Total</p><br>
            <p class="time_each_hours"><?= $totalStudyTimes['SUM(studytimes)']  ?></p><br>
            <p class="time_each_unit">hour</p>
          </li>
        </ul>




        <!-- ここから棒グラフ -->
        <div class="bar_graf">
          <canvas id="myBarChart"></canvas>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
        </div>
      </div>



      <!-- ここから学習言語のグラフ -->
      <ul class="circle_graf_container">
        <li class="circle_graf_each">
          <p class="circle_graf_each_title">学習言語</p>
          <canvas class="circle_graf_each_graf" id="circleGrafLanguages">
          </canvas>
        </li>

        <!-- ここから学習したコンテンツのグラフ -->
        <li class="circle_graf_each">
          <p class="circle_graf_each_title">学習コンテンツ</p>
          <canvas class="circle_graf_each_graf" id="circleGrafContents">
          </canvas>
        </li>
      </ul>

    </div>
    <script>

//今日の日付データを変数hidukeに格納
var hiduke=new Date(); 

//年・月・日・曜日を取得する
var year = hiduke.getFullYear();
var month = hiduke.getMonth()+1;
var week = hiduke.getDay();
var day = hiduke.getDate();


document.write("<"+year+"-"+month+"-"+day+">");

</script>

    <!-- ここからフッター -->
    <div class="now_time_container">
      <p class="now_time_flame" id= hiduke></p>
    </div>

    <button class="sp_record_and_post_btn" onclick="showModal()">記録・投稿</button>

  </div>





<!-- ここからモーダル -->
  <section id="modalContainer" class="modal_container">
    <span id="modalBackBtn" class="modal_back_btn" onclick="closeModal()"></span>
    <form action="/" class="modal_form" name="modal_form">
      <div class="modal_form_first">
        <div class="modal_form_date">
          <label for="date">学習日</label>
          <input id="date" type="date" name="date">
        </div>

        <div class="modal_form_contents">
          <label for="contents">学習コンテンツ（複数選択可）</label>
          <div class="modal_form_contents_selections">
            <input type="checkbox" name="contents">N予備校
            <input type="checkbox" name="contents">ドットインストール
            <br>
            <input type="checkbox" name="contents">POSSE課題
          </div>
        </div>

        <div class="modal_form_languages">
          <label for="languages">学習言語（複数選択可）</label>
          <div class="modal_form_languages_selections">
            <input type="checkbox" name="languages">HTML
            <input type="checkbox" name="languages">CSS
            <input type="checkbox" name="languages">JavaScript
            <br>
            <input type="checkbox" name="languages">PHP
            <input type="checkbox" name="languages">Laravel
            <input type="checkbox" name="languages">SQL
            <input type="checkbox" name="languages">SHELL
            <br>
            <input type="checkbox" name="languages">情報システム基礎知識（その他）
          </div>
        </div>
        
      </div>



      <div class="modal_form_second">
        <div class="modal_form_hours">
          <label for="hours">学習時間</label>
          <input id="hours" type="text" name="hours">
        </div>
        <div class="modal_form_twitter">
          <label for="twitter">Twitter用コメント</label>
          <textarea name="twitter" id="twitter" cols="30" rows="10"></textarea>
          <dd class="modal_form_twitter_btn"><input type="radio" name="tweet" onclick="radioDeselection(this, 1)">Twitterに自動投稿する
        </div>
      </div>
    </form>



    <div id="overlay">
      <div class="cv-spinner">
        <span class="spinner"></span>
      </div>
    </div>

    <button id="modalFormAnchor" class="modal_record_and_post_btn">記録・投稿</button>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>


  </section>


  
  <section id="postedContainer" class="posted_container">
    <span id="postedBackBtn" class="modal_back_btn" onclick="closePosted()"></span>
    <p>記録・投稿 完了しました</p>
  </section>

  <div id="background"></div>

  <div id="postedscreen" class="posted_screen">

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="./webapp.js"></script>

  <?php require("./graph.php"); ?>;
  <?php require("./language_graph.php"); ?>;
  <?php require("./content_graph.php"); ?>;


</body>

</html>