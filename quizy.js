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
for(let count=1;count < 11 ; count++){
    let content=
        '<h2><p class="question_question">' +count+',この地名なんと読む？'+'</p></h2>'+
            '<img src="https://d1khcm40x1j0f.cloudfront.net/quiz/34d20397a2a506fe2c1ee636dc011a07.png">'+
            '<ul>'+
                '<div class="li" id=question'+count+'-true>たかなわ</div>'+
                '<div class="li" id=question'+count+'-false1>たかわ</div>'+
                '<div class="li" id=question'+count+'-false2>こうわ</div>'+
            '</ul>'+
            '<section class="answer_box" id="answer-box-'+count+'">'+
                '<span class="q_true" id="q'+count+'-true">正解！</span>'+
                '<span class="q_false" id="q'+count+'-false">不正解！</span>'+
                '<div class="q_answer" id="q'+count+'-answer">'+
                    '正解は「たかなわ」です！'
                +'</div>'+
            '</section>'
 
        // var list = [
        //     {id = 'question'+count+'-true'
        //     },
        //     {
        //         id = 'question'+count+'-false1'
        //     },
        //     {
        //         id = 'question'+count+'-false2'
        //     },
        // ];
        // arrayShuffle(list);
        // console.log(list);
    
        //     var menu = [
        //         {
        //           id: 1001,
        //           name: "coffee beans",
        //           price: 500
        //         },
        //         {
        //           id: 1002,
        //           name: "cup",
        //           price: 780
        //         },
        //         {
        //           id: 1003,
        //           name: "scone",
        //           price: 300
        //         },
        //       ];
        //       arrayShuffle(menu);
        //       console.log(menu);
              // 0: {id: 1003, name: "scone", price: 300}
              // 1: {id: 1002, name: "cup", price: 780}
              // 2: {id: 1001, name: "coffee beans", price: 500}
        
    document.getElementById('question'+count+'-true').addEventListener('click',()=>{
        document.getElementById('question'+count+'-true').style.background = '#287dff';
        document.getElementById('question'+count+'-false1').style.background = 'white';
        document.getElementById('question'+count+'-false2').style.background = 'white';
        document.getElementById('question'+count+'-true').style.color = 'white';
        document.getElementById('answer-box-'+count).style.display="block";
        document.getElementById('q'+count+'-true').style.display="block";
        document.getElementById('q'+count+'-false').style.display="none";
        document.getElementById('question'+count+'-true').color = 'white';
        document.getElementById('question'+count+'-true').classList.add('after');
        document.getElementById('question'+count+'-false1').classList.add('after');
        document.getElementById('question'+count+'-false2').classList.add('after');
    });
    document.getElementById('question'+count+'-false1').addEventListener('click',()=>{
        document.getElementById('question'+count+'-true').style.background = '#287dff';
        document.getElementById('question'+count+'-false1').style.background = 'red';
        document.getElementById('question'+count+'-false2').style.background = 'white';
        document.getElementById('question'+count+'-true').style.color = 'white';
        document.getElementById('question'+count+'-false1').style.color = 'white';
        document.getElementById('answer-box-'+count).style.display="block";
        document.getElementById('q'+count+'-false').style.display="block";
        document.getElementById('q'+count+'-true').style.display="none";
        document.getElementById('question'+count+'-true').classList.add('after');
        document.getElementById('question'+count+'-false1').classList.add('after');
        document.getElementById('question'+count+'-false2').classList.add('after');
    });
    document.getElementById('question'+count+'-false2').addEventListener('click',()=>{
        document.getElementById('question'+count+'-true').style.background = '#287dff';
        document.getElementById('question'+count+'-false1').style.background = 'white';
        document.getElementById('question'+count+'-false2').style.background = 'red';
        document.getElementById('question'+count+'-true').style.color = 'white';
        document.getElementById('question'+count+'-false2').style.color = 'white';
        document.getElementById('answer-box-'+count).style.display="block";
        document.getElementById('q'+count+'-false').style.display="block";
        document.getElementById('q'+count+'-true').style.display="none";
        document.getElementById('question'+count+'-true').classList.add('after');
        document.getElementById('question'+count+'-false1').classList.add('after');
        document.getElementById('question'+count+'-false2').classList.add('after');
    });
      
}




