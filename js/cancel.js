const input = document.querySelector("#search_input");
const cancelimg = document.querySelector("#cancelbtn");
const btncancel = document.querySelector("#resetsearch");

btncancel.addEventListener("click",(e)=>{
    cancelimg.classList.add("hide");

})

input.addEventListener("keyup",(e)=>{
    if(e.target.value == "")
    cancelimg.classList.add("hide");
 
    else
     cancelimg.classList.remove("hide");
    
});
