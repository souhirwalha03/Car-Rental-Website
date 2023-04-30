const nameInput = document.querySelector("#name");
const email = document.querySelector("#email");
const message = document.querySelector("#message");
const success = document.querySelector("#success");
const errorNodes = document.querySelectorAll(".error");

function validateForm(){
    if (nameInput.value.length < 1){
        errorNodes[0].innerText = "Name cannot be blank";
        nameInput.classList.add("error-border");
    } else {
        errorNodes[0].innerText = "";
        nameInput.classList.remove("error-border");
    }

    if(!emailIsValid(email.value)){
        errorNodes[1].innerText = "Invalid email address";
        email.classList.add("error-border");
    } else {
        errorNodes[1].innerText = "";
        email.classList.remove("error-border");
    }

    if (nameInput.value.length >= 1 && emailIsValid(email.value)){
        success.innerText = "Form submitted successfully!";
    } else {
        success.innerText = "";
    }
}

function emailIsValid(email){
    let pattern = /\S+@\S+\.\S+/;
    return pattern.test(email);
}

function clearMessages(){
    for (let i = 0; i < errorNodes.length; i++){
        errorNodes[i].innerText = "";
    }
    nameInput.classList.remove("error-border");
    email.classList.remove("error-border");
}
