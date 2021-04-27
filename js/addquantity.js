const plus = document.querySelector('.plus');
const minus = document.querySelector('.minus');
const input = document.querySelector('#qte_demande');

window.addEventListener('load',()=>{
    input.value = 1;
})
plus.addEventListener('click',()=>{
   input.value++;

});
minus.addEventListener('click',()=>{
    input.value--;
    if(input.value<=0) input.value = 1;
});
