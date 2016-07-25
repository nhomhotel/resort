function checkPhoneNumber(e){
    var phoneno = /^0+[0-9]{9,10}/;  
    if(e.match(phoneno))
        return true;
    else
        return false;
}
function checkEmail(e){
    var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;  
    if(e.match(phoneno))
        return true;
    else 
        return false
}

function checkFirstName(e){
    var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;  
    if(e.match(phoneno))
        return true;
    else
        return false;
}

function checkLastName(e){
    var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;  
    if(e.match(phoneno))
        return true;
    else
        return false;
}


