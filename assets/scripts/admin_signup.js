const signUpForm = document.querySelector("form");
let error = false;
signUpForm.addEventListener("submit", validate);

const passwordInput = document.querySelector("#password");

passwordInput.addEventListener("change", validatePass);


function validatePass(evt)
{
    const errorSpan = document.querySelector("#passwordErr");

    if(this.value.length < 8)
    {
        errorSpan.innerText = "Password should be more than 8 characters";
        error = true;
    }
    
    else 
    errorSpan.innerText = "";
}


function validate(evt)
{
    const passwordInput = this.elements.password;
    const confPasswordInput = this.elements.confPassword;
    const errorSpan = document.querySelector("#confPassErr");

    if(passwordInput.value !== confPasswordInput.value){
        errorSpan.innerText = "Confirm Password and Password values should be of same length";
        evt.preventDefault();
    }

    else if(error)
        evt.preventDefault();

    else 
        error = false;
}