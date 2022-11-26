@section('graph')

<script>
    var ctx = document.getElementById("circleGrafLanguages");
var circleGrafLanguages = new Chart(ctx, {
  type: "doughnut",
  data: {
    labels: [
      "HTML",
      "CSS",
      "JavaScript",
      "PHP",
      "Laravel",
      "SQL",
      "SHELL",
      "その他",
    ], //データ項目のラベル
    datasets: [
      {
        backgroundColor: [
          "#65ccf9",
          "#2d72b8",
          "#204be3",
          "#55bbda",
          "#aea1ee",
          "#654fe4",
          "#412ce5",
          "#291db9",
        ], //色の指定
        data: [30, 20, 10, 5, 20, 20, 10], //数値代入
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


// 学習言語の円グラフについて

var ctx = document.getElementById("circleGrafContents");
var circleGrafContents = new Chart(ctx, {
  type: "doughnut",
  data: {
    labels: ["N予備校", "ドットインストール", "POSSE課題","青本","YouTube","Udemy"], //内容
    datasets: [
      {
        backgroundColor: ["#2d72b8", "#204be3", "#55bbda","#3ccefe", "#4a17ef", "#b29ef3"], //色の指定
        data: [40, 20, 40], //実際の数値代入
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
});



// 棒グラフについて
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
      18,
      "",
      20,
      "",
      26,
      "",
      28,
      "",
      30,
      "",
    ], //x軸の値のメモリ
    datasets: [
      {
        label: "hours",
        data: [
          3, 10, 5, 3, 0, 0, 4, 2, 2, 8, 8, 2, 2, 1, 7, 4, 4, 3, 3, 3, 2, 2, 6,
          2, 2, 1, 1, 7, 8, 1,
        ], //時間(実査のy軸の値)の代入
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
            suggestedMax: 15,
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
            suggestedMax: 31,
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
@endsection