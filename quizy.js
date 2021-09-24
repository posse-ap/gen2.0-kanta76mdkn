console.log('kakuninnsimasita')

// const kanta = document.getElementById('question1-1')


// const kanta1 = kanta.addEventListener('click',()=>{
//     kanta.style.background = 'blue';
// });

// let content={
// '<h2><p class="question_question">' :+count+',この地名なんと読む？'+'</p></h2>'+
//     '<img src="https://d1khcm40x1j0f.cloudfront.net/quiz/34d20397a2a506fe2c1ee636dc011a07.png">'+
//     '<ul>'+
//         '<div class="li" id=question'+count+'-true>たかなわ</div>'+
//         '<div class="li" id=question'+count+'-false1>たかわ</div>'+
//         '<div class="li" id=question'+count+'-false2>こうわ</div>'+
//     '</ul>'+
//     '<section class="answer_box" id="answer-box-'+count+'">'+
//         '<span class="q_true" id="q'+count+'-true">正解！</span>'+
//         '<span class="q_false" id="q'+count+'-false">不正解！</span>'+
//         '<div class="q_answer" id="q'+count+'-answer">'+
//             '正解は「たかなわ」です！'
//         +'</div>'+
//     '</section>'
// }
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
for(let count=0;count < 11 ; count++){
    content +=
        '<h2><p class="question_question">' +[count]+',この地名なんと読む？'+'</p></h2>'+
            '<img src='+picture[count]+'>'+
            '<ul>'+
                '<div class="li" id=question'+count+'-true>'+quizSet[count][0]+'</div>'+
                '<div class="li" id=question'+count+'-false1>'+quizSet[count][1]+'</div>'+
                '<div class="li" id=question'+count+'-false2>'+quizSet[count][2]+'</div>'+
            '</ul>'+
            '<section class="answer_box" id="answer-box-'+count+'">'+
                '<span class="q_true" id="q'+count+'-true">正解！</span>'+
                '<span class="q_false" id="q'+count+'-false">不正解！</span>'+
                '<div class="q_answer" id="q'+count+'-answer">'+
                    '正解は「'+quizSet[count-1][0]+'」です！'
                +'</div>'+
            '</section>'
container.innerHTML = content;

// if () {
        
// } else {
    
// }




}








        
    document.getElementById('question'+count+'-true').addEventListener('click',()=>{
        document.getElementById('question'+count+'-true').style.background = '#287dff';
        document.getElementById('question'+count+'-true').style.color = 'white';
        document.getElementById('answer-box-'+count).style.display="block";
        document.getElementById('q'+count+'-true').style.display="block";
        // document.getElementById('q'+count+'-false').style.display="none";
        document.getElementById('question'+count+'-true').color = 'white';
        document.getElementById('question'+count+'-true').classList.add('after');
        document.getElementById('question'+count+'-false1').classList.add('after');
        document.getElementById('question'+count+'-false2').classList.add('after');
    });
    document.getElementById('question'+count+'-false1').addEventListener('click',()=>{
        document.getElementById('question'+count+'-true').style.background = '#287dff';
        document.getElementById('question'+count+'-false1').style.background = 'red';
        document.getElementById('question'+count+'-true').style.color = 'white';
        document.getElementById('question'+count+'-false1').style.color = 'white';
        document.getElementById('answer-box-'+count).style.display="block";
        document.getElementById('q'+count+'-false').style.display="block";
        // document.getElementById('q'+count+'-true').style.display="none";
        document.getElementById('question'+count+'-true').classList.add('after');
        document.getElementById('question'+count+'-false1').classList.add('after');
        document.getElementById('question'+count+'-false2').classList.add('after');
    });
    document.getElementById('question'+count+'-false2').addEventListener('click',()=>{
        document.getElementById('question'+count+'-true').style.background = '#287dff';
        document.getElementById('question'+count+'-false2').style.background = 'red';
        document.getElementById('question'+count+'-true').style.color = 'white';
        document.getElementById('question'+count+'-false2').style.color = 'white';
        document.getElementById('answer-box-'+count).style.display="block";
        document.getElementById('q'+count+'-false').style.display="block";
        // document.getElementById('q'+count+'-true').style.display="none";
        document.getElementById('question'+count+'-true').classList.add('after');
        document.getElementById('question'+count+'-false1').classList.add('after');
        document.getElementById('question'+count+'-false2').classList.add('after');
    });
      






