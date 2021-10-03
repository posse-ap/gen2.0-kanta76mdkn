let container = document.getElementById('container');

let quizSet = [
 ['たかなわ','たかわ','こうわ'],
 ['かめいど','かめど','かめと'],
 ['こうじまち','かゆまち','おかとまち'],
 ['おなりもん','ごせいもん','おかどもん'],
 ['とどろき','たたら','たたりき'],
 ['しゃくじい','いじい','せきこうい'],
 ['ぞうしき','ざっしょ','ざっしき'],
 ['おかちまち','みとちょう','ごしろちょう'],
 ['ししぼね','ろっこつ','しこね'],
 ['こぐれ','こばく','こしゃく'],
]

let picture = [
    ['https://d1khcm40x1j0f.cloudfront.net/quiz/34d20397a2a506fe2c1ee636dc011a07.png'],
    ['https://d1khcm40x1j0f.cloudfront.net/quiz/512b8146e7661821c45dbb8fefedf731.png'],
    ['https://d1khcm40x1j0f.cloudfront.net/quiz/ad4f8badd896f1a9b527c530ebf8ac7f.png'],
    ['https://d1khcm40x1j0f.cloudfront.net/quiz/ee645c9f43be1ab3992d121ee9e780fb.png'],
    ['https://d1khcm40x1j0f.cloudfront.net/quiz/6a235aaa10f0bd3ca57871f76907797b.png'],
    ['https://d1khcm40x1j0f.cloudfront.net/quiz/0b6789cf496fb75191edf1e3a6e05039.png'],
    ['https://d1khcm40x1j0f.cloudfront.net/quiz/23e698eec548ff20a4f7969ca8823c53.png'],
    ['https://d1khcm40x1j0f.cloudfront.net/quiz/50a753d151d35f8602d2c3e2790ea6e4.png'],
    ['https://d1khcm40x1j0f.cloudfront.net/words/8cad76c39c43e2b651041c6d812ea26e.png'],
    ['https://d1khcm40x1j0f.cloudfront.net/words/34508ddb0789ee73471b9f17977e7c9c.png'],
];

let content = "";
for(let count=0;count < 10 ; count++){
    var shuffleArray = [0,1,2];
    //シャッフルアレイは３個あるから2回for文が行われている
    
    for (let i = shuffleArray.length - 1; i > 0; i--) {
        //０〜2.９までの乱数を出し、floorで小数点以下切り捨て
      const j = Math.floor(Math.random() * (i + 1));
      //iとjを入れ替えている、これをfor文分やっている（2回）
      [shuffleArray[j], shuffleArray[i]] = [shuffleArray[i], shuffleArray[j]];
    }
    console.log(shuffleArray);
    content +=
        '<h2><p class="question_question">' +[count+1]+',この地名なんと読む？'+'</p></h2>'+
            '<img src='+picture[count]+'>'+
            '<div>'+
                '<div class="li" id="question'+count+'-'+shuffleArray[0]+'" onclick = "clickfunction('+count+','+shuffleArray[0]+')">'+quizSet[count][shuffleArray[0]]+'</div>'+
                '<div class="li" id="question'+count+'-'+shuffleArray[1]+'" onclick = "clickfunction('+count+','+shuffleArray[1]+')">'+quizSet[count][shuffleArray[1]]+'</div>'+
                '<div class="li" id="question'+count+'-'+shuffleArray[2]+'" onclick = "clickfunction('+count+','+shuffleArray[2]+')">'+quizSet[count][shuffleArray[2]]+'</div>'+
            '</div>'+
            '<section class="answer_box" id="answer-box-'+count+'">'+
                '<span class="q_true" id="q-'+count+'-true">正解！</span>'+
                '<span class="q_false" id="q-'+count+'-false">不正解！</span>'+
                '<div class="q_answer" id="q'+count+'-answer">'+
                    '正解は「'+quizSet[count][0]+'」です！'
                +'</div>'+
            '</section>'
container.innerHTML = content;
}

//１問目の１選択肢目を選んだ時　clickfunction(0,0)
function clickfunction (questionNo,click) {
        document.getElementById('question'+questionNo+'-'+click).style.background = 'red';
        document.getElementById('question'+questionNo+'-'+0).style.background = 'blue';
        document.getElementById('question'+questionNo+'-'+click).style.color = 'white';
        document.getElementById('question'+questionNo+'-'+0).style.color = 'white';
        document.getElementById('answer-box-'+questionNo).style.display="block";
        document.getElementById('q-'+questionNo+'-true').style.display="none";
        document.getElementById('q-'+questionNo+'-false').style.display="none";
        document.getElementById('question'+questionNo+'-0').classList.add('after');
        document.getElementById('question'+questionNo+'-1').classList.add('after');
        document.getElementById('question'+questionNo+'-2').classList.add('after');
        if(click===0){
            document.getElementById('q-'+questionNo+'-true').style.display="block";
        }else{
            document.getElementById('q-'+questionNo+'-false').style.display="block";
        }
}