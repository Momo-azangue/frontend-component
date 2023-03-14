const form = document.querySelector("form"),
statusTxt= form.querySelector(".button-area span");

form.onsubmit =(e)=>{
    e.preventDefault(); /// preventing form from submitting
    statusTxt.style.color = "#0D6EFD";
    statusTxt.style.display = "block";

let xhr = new XMLHttpRequest();//creating new xml object
xhr.open("POST", "message.php", true);//sending post request to message.php file
xhr.onload = ()=>{ //once ajax loaded
    if(xhr.readyState == 4 && xhr.status == 200){// if ajax response status is 200 & ready status is 4 means the is no any error
        let response = xhr.response;// storing ajax response in a response variable
       //if response is an errror like senter valid email address then we'll change status color to  red else reset the form
        if(response.indexOf("Email and password field is required!") != -1 || response.indexOf("Enter a valid email addresss!") || response.indexOf("Sorry, failed to send your message!")){
            statusTxt.style.color = "red";
        }else{
            form.reset();
            setTimeout(()=>{
                statusTxt.style.display = "none";
            }, 3000);//hide the statusTxt after 3second if the msg is sent
        }
        statusTxt.innerText = response;
    }
}
let formData = new FormData(form); // creating new FormData obj. this obj is used to send form data 
xhr.send(formData);//sending  form datas
}