
function validation(){
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var password2 = document.getElementById("password2").value;

    var bool = true;

    if (email==""){
       alert("email must be filled out");
       bool = false;
    }
    else{
        
        if (email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/))
        {
            
        }
        else{
            alert("Enter a valid email");
            bool = false;
        }
    if (password == password2){
        
    }
    else{
        alert("passwords don't match");
        bool = false;
    }
    }
    if (password == ""){
        alert("password must be filled out");
        bool = false;
    }
    // at least one number, one lowercase and one uppercase letter
    // at least six characters
    else{
        if (password.match(/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/)){
           
        }
        else{
            alert("Password must contain,\nat least one number, one lowercase and one uppercase letter\nat least six characters");
            bool = false;
        }
    }
    return bool;  
}