console.log('kakuninnsimasita')

// const kanta = document.getElementById('question1-1')


// const kanta1 = kanta.addEventListener('click',()=>{
//     kanta.style.background = 'blue';
// });

for(let count=1;count < 11 ; count++){
    document.getElementById('question'+count+'-true').addEventListener('click',()=>{
        document.getElementById('question'+count+'-true').style.background = 'blue';
        document.getElementById('question'+count+'-folse1').style.background = 'white';
        document.getElementById('question'+count+'-folse2').style.background = 'white';
        document.getElementById('answer-box-'+count).style.display="block";
        document.getElementById('q'+count+'-true').style.display="block";
        document.getElementById('q'+count+'-folse').style.display="none";
    });
    document.getElementById('question'+count+'-folse1').addEventListener('click',()=>{
        document.getElementById('question'+count+'-true').style.background = 'white';
        document.getElementById('question'+count+'-folse1').style.background = 'red';
        document.getElementById('question'+count+'-folse2').style.background = 'white';
        document.getElementById('answer-box-'+count).style.display="block";
        document.getElementById('q'+count+'-folse').style.display="block";
        document.getElementById('q'+count+'-true').style.display="none";
    });
    document.getElementById('question'+count+'-folse2').addEventListener('click',()=>{
        document.getElementById('question'+count+'-true').style.background = 'white';
        document.getElementById('question'+count+'-folse1').style.background = 'white';
        document.getElementById('question'+count+'-folse2').style.background = 'red';
        document.getElementById('answer-box-'+count).style.display="block";
        document.getElementById('q'+count+'-folse').style.display="block";
        document.getElementById('q'+count+'-true').style.display="none";
    });
      
}




