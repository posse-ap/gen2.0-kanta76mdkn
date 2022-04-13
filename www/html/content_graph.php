<?php
// phpinfo();
require("./db_connect.php");
// あるものを呼び出す際に使うやつ,相対パス

$contentList_stmt = $db->query("SELECT content, color, sum(studytimes) as study_sum FROM studycontent left join studyrecords on studycontent.id = studyrecords.content_id group by content,color");
$contentList = $contentList_stmt->fetchAll();

$contentNameList = [];
$contentColorList = [];
$timeList = [];

foreach($contentList as $eachContentList){
    if((int)$eachContentList["study_sum"] !== 0 && (int)$eachContentList["study_sum"] > 0 ){
        $contentNameList[] = $eachContentList["content"];
        $contentColorList[] = $eachContentList["color"];
        $timeList[] = (int)$eachContentList["study_sum"];
    }
};

$contentNameListJson  = json_encode($contentNameList);
$contentColorListJson = json_encode($contentColorList);
$timeListJson = json_encode($timeList);

?>

<script>
    const contentLabels = <?= $contentNameListJson ?>;
    const backgroundColorLabels = <?= $contentColorListJson ?>;
    const timesLabels = <?= $timeListJson ?>;

    // 学習言語の円グラフについて

var ctx = document.getElementById("circleGrafContents");
var circleGrafContents = new Chart(ctx, {
  type: "doughnut",
  data: {
    labels: ["N予備校","POSSE課題","ドットインストール",], //内容
    datasets: [
      {
        backgroundColor: backgroundColorLabels, //色の指定
        data: timesLabels, //実際の数値代入
      },
    ],
  },
  options: {
    legend: {
      position: "bottom",
      layout: {
        padding: {
          top: 100,
        },
      },
    },
    maintainAspectRatio: false,
    title: {
      display: true,
    },
    layout: {
      padding: {
        left: 30,
        right: 30,
        top: 0,
        bottom: 120,
      },
    },
  },
  plugins: [dataLabelPlugin],
})

</script>