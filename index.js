// function validate() {
//     var inputemail = document.getElementById("emailInput").value;
//     var inputpswrd = document.getElementById("pswrdInput").value;


//     if (inputemail != "yunethcwij@gmail.com") {
//         document.getElementById("emailInput").classList.add('is-invalid');
//         event.preventDefault();
//         event.stopPropagation();
//     }

//     if (inputpswrd != "abcd1234") {
//         document.getElementById("pswrdInput").classList.add('is-invalid');
//         event.preventDefault();
//         event.stopPropagation();
//     }
// }


function validateInputs() {
    let email = document.forms["loginform"]["email"].value;
    let psw = document.forms["loginform"]["pswrd"].value;

    if (email == "") 
    {
        document.getElementById("emailInput").classList.add('is-invalid');
        event.preventDefault();
        event.stopPropagation();
        return false;
    }
    else
    {
        document.getElementById("emailInput").classList.remove('is-invalid');
    }

    if (psw == "") 
    {
        document.getElementById("pswrdInput").classList.add('is-invalid');
        event.preventDefault();
        event.stopPropagation();
        return false;
    }
    else
    {
        document.getElementById("pswrdInputt").classList.remove('is-invalid');
    }

}
