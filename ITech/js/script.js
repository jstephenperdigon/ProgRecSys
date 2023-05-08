function checkPassword(){
    let password = document.getElementById("password").value;
    let cnfrmPassword = document.getElementById("cnfrm-password").value;
    console.log(" Password:", password,'\n',"Confirm Password:",cnfrmPassword);
    let message = document.getElementById("message");

    if(password.length != 0){
        if(password == cnfrmPassword){
            message.textContent = "Passwords match";
            message.style.backgroundColor = "#1dcd59";
        }
        else{
            message.textContent = "Password don't match";
            message.style.backgroundColor = "#ff4d4d";
        }
    }
    else{
        alert("Password can't be empty!");
        message.textContent = "";
    }
}




