"use strict";


const modalContainer = document.getElementById("modalContainer");
const background = document.getElementById("background");

// モーダル出現
function showModal() {
  modalContainer.style.display = "block";
  background.style.display = "block";
}

// モーダル消える
function closeModal() {
  modalContainer.style.display = "none";
  background.style.display = "none";
}


const postedContainer = document.getElementById("postedContainer");



function showPosted() {
  postedContainer.style.display = "block";
  background.style.display = "block";
}

function closePosted() {
  postedContainer.style.display = "none";
  background.style.display = "none";
}


$(".modal_record_and_post_btn").on("click", function () {
  $("#overlay").fadeIn(500);
  setTimeout(function () {
    $("#overlay").fadeOut(500);
    closeModal();
    showPosted();
  }, 3000);
});




var dataLabelPlugin = {
  afterDatasetsDraw: function (chart, easing) {
    // To only draw at the end of animation, check for easing === 1
    var ctx = chart.ctx;

    chart.data.datasets.forEach(function (dataset, i) {
      var dataSum = 0;
      dataset.data.forEach(function (element) {
        dataSum += element;
      });

      var meta = chart.getDatasetMeta(i);
      if (!meta.hidden) {
        meta.data.forEach(function (element, index) {
          // Draw the text in black, with the specified font
          ctx.fillStyle = "rgb(255, 255, 255)";

          var fontSize = 12;
          var fontStyle = "normal";
          var fontFamily = "Helvetica Neue";
          ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);

          // Just naively convert to string for now
          var labelString = chart.data.labels[index];
          var dataString =
            (
              Math.round((dataset.data[index] / dataSum) * 1000) / 10
            ).toString() + "%";

          // Make sure alignment settings are correct
          ctx.textAlign = "center";
          ctx.textBaseline = "middle";

          var padding = 5;
          var position = element.tooltipPosition();
          // ctx.fillText(labelString, position.x, position.y - (fontSize / 2) - padding);
          ctx.fillText(
            dataString,
            position.x,
            position.y + fontSize / 2 - padding
          );
        });
      }
    });
  },
};

//今日の日付データを変数hidukeに格納
var hiduke=new Date(); 

//年・月・日・曜日を取得する
var year = hiduke.getFullYear();
var month = hiduke.getMonth()+1;
var week = hiduke.getDay();
var day = hiduke.getDate();


document.write("<"+year+"-"+month+"-"+day+">");
// // 学習言語の円グラフ
// var ctx = document.getElementById("circleGrafLanguages");
// var circleGrafLanguages = new Chart(ctx, {
//   type: "doughnut",
//   data: {
//     labels: [
//       "HTML",
//       "CSS",
//       "JavaScript",
//       "PHP",
//       "Laravel",
//       "SQL",
//       "SHELL",
//       "その他",
//     ], //データ項目のラベル
//     datasets: [
//       {
//         backgroundColor: [
//           "#65ccf9",
//           "#2d72b8",
//           "#204be3",
//           "#55bbda",
//           "#aea1ee",
//           "#654fe4",
//           "#412ce5",
//           "#291db9",
//         ], //色の指定
//         data: [30, 20, 10, 5, 20, 20, 10], //数値代入
//       },
//     ],
//   },
//   options: {
//     legend: { position: "bottom" },
//     maintainAspectRatio: false,
//     responsive: true,
//     layout: {
//       padding: {
//         left: 30,
//         right: 30,
//         top: 0,
//         bottom: 50,
//       },
//     },
//   },
//   plugins: [dataLabelPlugin],
// });


// // 学習言語の円グラフについて

// var ctx = document.getElementById("circleGrafContents");
// var circleGrafContents = new Chart(ctx, {
//   type: "doughnut",
//   data: {
//     labels: ["N予備校", "ドットインストール", "POSSE課題"], //内容
//     datasets: [
//       {
//         backgroundColor: ["#2d72b8", "#204be3", "#55bbda"], //色の指定
//         data: [40, 20, 40], //実際の数値代入
//       },
//     ],
//   },
//   options: {
//     legend: {
//       position: "bottom",
//       layout: {
//         padding: {
//           top: 100,
//         },
//       },
//     },
//     maintainAspectRatio: false,
//     title: {
//       display: true,
//     },
//     layout: {
//       padding: {
//         left: 30,
//         right: 30,
//         top: 0,
//         bottom: 120,
//       },
//     },
//   },
//   plugins: [dataLabelPlugin],
// });



// 棒グラフについて
// var ctx = document.getElementById("myBarChart");
// var myBarChart = new Chart(ctx, {
//   type: "bar",
//   data: {
//     labels: [
//       "",
//       2,
//       "",
//       4,
//       "",
//       6,
//       "",
//       8,
//       "",
//       10,
//       "",
//       12,
//       "",
//       14,
//       "",
//       16,
//       "",
//       18,
//       "",
//       20,
//       "",
//       26,
//       "",
//       28,
//       "",
//       30,
//     ], //x軸の値のメモリ
//     datasets: [
//       {
//         label: "hours",
//         data: [
//           3, 4, 5, 3, 0, 0, 4, 2, 2, 8, 8, 2, 2, 1, 7, 4, 4, 3, 3, 3, 2, 2, 6,
//           2, 2, 1, 1, 7, 8,
//         ], //時間(実査のy軸の値)の代入
//         backgroundColor: "#3f8dcb", //色の指定
//       },
//     ],
//   },
//   options: {
//     legend: {
//       display: false,
//     },
//     title: {
//       display: true,
//     },
//     scales: {
//       yAxes: [
//         {
//           stacked: false,
//           gridLines: {
//             display: false,
//           },
//           ticks: {
//             suggestedMax: 8,
//             suggestedMin: 0,
//             stepSize: 2,
//             callback: function (value, index, values) {
//               return value + "h";
//             },
//           },
//         },
//       ],
//       xAxes: [
//         {
//           stacked: false,
//           gridLines: {
//             display: false,
//           },
//           ticks: {
//             stepSize: 2,
//             suggestedMax: 30,
//             suggestedMin: 1,
//             callback: function (value, index, values) {
//               return value + "";
//             },
//           },
//         },
//       ],
//     },
//   },
// });



// Twitterに投稿するところ
const modalFormAnchor = document.getElementById("modalFormAnchor");
modalFormAnchor.addEventListener('click', function(event) {
    if(document.modal_form.tweet.checked) {

      event.preventDefault();

      var left = Math.round(window.screen.width / 2 - 275);
      var top = (window.screen.height > 420) ? Math.round(window.screen.height / 2 - 210) : 0;
      window.open(
          "https://twitter.com/intent/tweet?text=" + encodeURIComponent(document.getElementById("twitter").value),
          null,
          "scrollbars=yes,resizable=yes,toolbar=no,location=yes,width=550,height=420,left=" + left + ",top=" + top);

    }
});



var remove = 0;
function radioDeselection(already, numeric) {
  if (remove == numeric) {
    already.checked = false;
    remove = 0;
  } else {
    remove = numeric;
  }
}

