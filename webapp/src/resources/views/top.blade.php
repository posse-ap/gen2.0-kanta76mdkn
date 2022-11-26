<!DOCTYPE html>
<html>

<head>
    <title>トップページ</title>
    <link rel="stylesheet" href="{{ asset('/webapp.css') }}">
</head>

<body>

    <!DOCTYPE html>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>webapp ph3</title>
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
                <p>週目</p>
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
                            <p class="time_each_hours">{{ $today }}</p><br>
                            <p class="time_each_unit">hour</p>
                        </li>
                        <li class="time_each">
                            <p class="time_each_title">Month</p><br>
                            <p class="time_each_hours">{{ $month }}</p><br>
                            <p class="time_each_unit">hour</p>
                        </li>
                        <li class="time_each">
                            <p class="time_each_title">Total</p><br>
                            <p class="time_each_hours">{{ $total }}</p><br>
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

            <!-- ここからフッター -->
            <div class="now_time_container">
                <p class="now_time_flame" id=hiduke></p>
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
                        <dd class="modal_form_twitter_btn"><input type="radio" name="tweet"
                                onclick="radioDeselection(this, 1)">Twitterに自動投稿する
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
        <script src="{{ asset('/webapp.js') }}"></script>
        <script>
            // js にコントローラで定義したブレード変数を渡している
            const bar_date = @json($bar_date);
            const bar_data = @json($bar);
            const language_data = @json($language_data);
            const content_data = @json($content_data);

        </script>
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
                    datasets: [{
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
                        data: language_data, //数値代入
                    }, ],
                },
                options: {
                    legend: {
                        position: "bottom"
                    },
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
                    labels: ["N予備校", "ドットインストール", "POSSE課題","青本","YouTube","Udemy",], //内容
                    datasets: [{
                        backgroundColor: [
                            "#65ccf9",
                            "#2d72b8",
                            "#204be3",
                            "#55bbda",
                            "#aea1ee",
                            "#654fe4",
                          ], //色の指定
                        data: content_data, //実際の数値代入
                    }, ],
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
                    labels: bar_date, //x軸の値のメモリ
                    datasets: [{
                        label: "hours",
                        data: bar_data, 
                        //時間(実査のy軸の値)の代入
                        backgroundColor: "#3f8dcb", //色の指定
                    }, ],
                },
                options: {
                    legend: {
                        display: false,
                    },
                    title: {
                        display: true,
                    },
                    scales: {
                        yAxes: [{
                            stacked: false,
                            gridLines: {
                                display: false,
                            },
                            ticks: {
                                suggestedMax: 8,
                                suggestedMin: 0,
                                stepSize: 2,
                                callback: function(value, index, values) {
                                    return value + "h";
                                },
                            },
                        }, ],
                        xAxes: [{
                            stacked: false,
                            gridLines: {
                                display: false,
                            },
                            ticks: {
                                stepSize: 2,
                                suggestedMax: 30,
                                suggestedMin: 1,
                                callback: function(value, index, values) {
                                    return value + "";
                                },
                            },
                        }, ],
                    },
                },
            });
        </script>

    </body>

    </html>



</body>

</html>
