const form = document.querySelector("form"),
statusTxT= form.querySelector(".button-area span");

form.onsubmit =(e)=>{
    e.precentDefault();
}