<?php
// phpinfo();
require("./db_connect.php");
// あるものを呼び出す際に使うやつ,相対パス


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
// const sample = [];
// const sampleMoth = <?= $monthstudylistjson;
// console.log(sample, sampleMoth);
// jsonに直すと読み取ってくれる？
?>

<script>
    const sampleMoth = <?= $monthstudylistjson; ?>;
    // sample = [1,1,2,4];
console.log(sampleMoth);
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: [
      "",
      2,
      "",
      4,
      "",
      6,
      "",
      8,
      "",
      10,
      "",
      12,
      "",
      14,
      "",
      16,
      "",
    ], //x軸の値のメモリ
    datasets: [
      {
        label: "hours",
        data: sampleMoth,
        //時間(実査のy軸の値)の代入
        backgroundColor: "#3f8dcb", //色の指定
      },
    ],
  },
  options: {
    legend: {
      display: false,
    },
    title: {
      display: true,
    },
    scales: {
      yAxes: [
        {
          stacked: false,
          gridLines: {
            display: false,
          },
          ticks: {
            suggestedMax: 8,
            suggestedMin: 0,
            stepSize: 2,
            callback: function (value, index, values) {
              return value + "h";
            },
          },
        },
      ],
      xAxes: [
        {
          stacked: false,
          gridLines: {
            display: false,
          },
          ticks: {
            stepSize: 2,
            suggestedMax: 30,
            suggestedMin: 1,
            callback: function (value, index, values) {
              return value + "";
            },
          },
        },
      ],
    },
  },
});

</script>