const form = document.querySelector("form"),
statusTxt= form.querySelector(".button-area span");

form.onsubmit =(e)=>{
    e.preventDefault(); /// preventing form from submitting
statusTxt.style.display = "block";

let xhr= new XMLHttpRequest();//creating new xml object
xhr.open("POST", "message.php", true);//sending post request to message.php file
xhr.onload = ()=>{ //once ajax loaded
    if(xhr.readyState == 4 && xhr.stauts == 200){// if ajax response status is 200 & ready status is 4 means the is no any error
        let response = xhr.response;// storing ajax response in a response variable
        console.log(response);
    }
}
xhr.send();
}