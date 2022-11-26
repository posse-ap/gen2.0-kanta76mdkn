<?php
// phpinfo();
require("./db_connect.php");
// あるものを呼び出す際に使うやつ,相対パス
// SELECT * FROM users;
// SELECT name, id, email FROM users;
// 学習言語、学習言語の色、学習言語毎の時間(合算) を取得したい
// SELECT 学習言語(studylanguage.language), 色(studylanguage.color), 時間(studyrecords.studytimesの合計時間)
// 1つのテーブル情報で足りないので共通項目を材料にして他のテーブルをくっつけて表示する
// inner join left join (カリキュラム見てね)
// select * from studylanguage left join studyrecords on studylanguage.id = studyrecords.language_id\G
// 学習記録ごとのsqlを取ってこれる。欲しいのだけセレクトするようにする。
// docker exec -it gen20-kanta76mdkn_db_1 bash
// select language, color, sum(studytimes) as study_sum from studylanguage left join studyrecords on studylanguage.id = studyrecords.language_id group by language\G
// select language, sum(studytimes) as study_sum from studylanguage left join studyrecords on studylanguage.id = studyrecords.language_id group by language\G
// select language, color, sum(studytimes) as study_sum from studylanguage left join studyrecords on studylanguage.id = studyrecords.language_id group by language, color\G
// asでカラム名を変えられる
$languagelist_stmt = $db->query("SELECT language, color, sum(studytimes) as study_sum FROM studylanguage left join studyrecords on studylanguage.id = studyrecords.language_id group by language, color");
$languagelist = $languagelist_stmt->fetchAll();

/**
 * ["language"] => "HTML" ["color"] => "#0445ec"
 */
// array(8) { [0]=> array(4) { ["language"]=> string(4) "HTML" [0]=> string(4) "HTML" ["color"]=> string(7) "#0445ec" [1]=> string(7) "#0445ec" } [1]=> array(4) { ["language"]=> string(3) "CSS" [0]=> string(3) "CSS" ["color"]=> string(7) "#0f70bd" [1]=> string(7) "#0f70bd" } [2]=> array(4) { ["language"]=> string(3) "SQL" [0]=> string(3) "SQL" ["color"]=> string(7) "#20bdde" [1]=> string(7) "#20bdde" } [3]=> array(4) { ["language"]=> string(5) "SHELL" [0]=> string(5) "SHELL" ["color"]=> string(7) "#3ccefe" [1]=> string(7) "#3ccefe" } [4]=> array(4) { ["language"]=> string(10) "Javascript" [0]=> string(10) "Javascript" ["color"]=> string(7) "#b29ef3" [1]=> string(7) "#b29ef3" } [5]=> array(4) { ["language"]=> string(3) "PHP" [0]=> string(3) "PHP" ["color"]=> string(7) "#4a17ef" [1]=> string(7) "#4a17ef" } [6]=> array(4) { ["language"]=> string(7) "Laravel" [0]=> string(7) "Laravel" ["color"]=> string(7) "#3005c0" [1]=> string(7) "#3005c0" } [7]=> array(4) { ["language"]=> string(19) "ãã®ä»–" [0]=> string(19) "ãã®ä»–" ["color"]=> string(7) "#6c46eb" [1]=> string(7) "#6c46eb" } } ;


/**
 * [
 *  [
 *   'language' => 'HTML',
 *   'color' => '#003030',
 *   'study_sum' => '10',
 *  ],
 *  ...
 * ]
 *  */ 
$languageNameList = [];
$languageColorList = [];
$timeList = [];
foreach($languagelist as $eachLanguageList){
    if ((int)$eachLanguageList["study_sum"] !== 0 && (int)$eachLanguageList["study_sum"] > 0) {
        // Name
        $languageNameList[] = $eachLanguageList["language"];
        // Color
        $languageColorList[] = $eachLanguageList["color"];
        // hint
        // $languageColorList[] = $eachLanguageList["何か"] ?? 0; ??はnull合体演算子という
        $timeList[] = (int)$eachLanguageList["study_sum"];
    }
}

// ['HTML', 'CSS', 'JavaScript'];
$languageEachListjson = json_encode($languageNameList);
// ['#30303', '#0808080', '#0809393'];
$colorEachListjson = json_encode($languageColorList);
// [10, 12, 13];
$timesEachListjson = json_encode($timeList);
?>
<script>
// 学習言語の円グラフ
    const languagelabels = <?= $languageEachListjson; ?>;
    const backgroundColors = <?= $colorEachListjson; ?>;
    const timeslabels = <?= $timesEachListjson; ?>;
var ctx = document.getElementById("circleGrafLanguages");
var circleGrafLanguages = new Chart(ctx, {
  type: "doughnut",
  data: {
    labels: 
      languagelabels, //データ項目のラベル
    datasets: [
      {
        backgroundColor: backgroundColors, //色の指定
        data: timeslabels, //数値代入
      },
    ],
  },
  options: {
    legend: { position: "bottom" },
    maintainAspectRatio: false,
    responsive: true,
    layout: {
      padding: {
        left: 30,
        right: 30,
        top: 0,
        bottom: 50,
      },
    },
  },
  plugins: [dataLabelPlugin],
});
console.log(timeslabels);
</script>