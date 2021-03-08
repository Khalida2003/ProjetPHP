const outer = document.getElementsByClassName('outer-box')[0];
const inner = document.getElementsByClassName('inner-box');
for(var i = 1; i < 400; i++){
    outer.innerHTML += "<div class='inner-box'></div>";
    const duration=Math.random() * 8;
    inner[i].style.animationDuration = 1+duration+'s';
    }