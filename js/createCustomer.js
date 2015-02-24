function validateCreateCustomers(form) {
    return true;
}

// Validate Email
var email = $("#jsemail").val();
if ((/(.+)@(.+){2,}\.(.+){2,}/.test(email)) || email==="" || email===null) { 
    document.write("This is wrong");
    } 
else{
        alert("Please enter a valid email");
    }








