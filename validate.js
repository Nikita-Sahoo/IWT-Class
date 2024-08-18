
    // let a = document.forms["register"]["name"].value;
    // let b = document.forms["register"]["regd"].value;
    // let c = document.forms["register"]["email"].value;
    // let d = document.forms["register"]["password"].value;
    // let e = document.forms["register"]["phone"].value;

    // // var alphabetPattern = /^[A-Za-z]+$/;
    // if (a == "" || b == "" || c == "" || d == "" || e =="") {
    //     alert("All field should be filled ...");
    //     return false;
    // }
    // else if( a.length < 2 || a.length > 30){
    //         alert("out with min size 2 and max size 30")
    //         return false;
    // }
    // if( b.length < 2 || b.length > 10){
    //     // alert("Password must be filled which is less than 10 and more than 2...")
    //     return false;
    // }
    // else if (!isNaN(a)) {
    //     alert("Name must not be a number...");
    //     return false;
    // }
    
    // else if (/[!@#$%^&*(),.?:{}/<>]/.test(a)) {
    //     alert("Special charecters are not allowed...");
    //     return false;
    // }

    // else if(/^[A-Za-z]+$/.test(e)){
    //     alert("Alphabet are not allowed..")
    // }
    // // else if(alphabetPattern.test(a)){
    // //     alert("Name is corect");
    // //     return true;
    // // }

    

    

    
   
    
    // else if(x == "admin" || y == "abc123" ){
    //     alert("Congratulation.... Login succesfully.")
    //     return true;
    // }
    // else{
    //     alert("Wrong username or password...")
    //     return false;
    // }
    // return true;

    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        // Prevent form submission
        event.preventDefault();
    let valid = true;

    const name = document.getElementById('name').value;
    if(name === ""){
        document.getElementById('nameError').textContent = "Name is required.";
        valid = false;
    }
    else{
        document.getElementById('nameError').textContent = "";
    }

    const regd = document.getElementById('regd').value;
    if(regd === ""){
        document.getElementById('regdError').textContent = "Registration number is required.";
        valid = false;
    }
    else{
        document.getElementById('regdError').textContent = "";
    }

    const email = document.getElementById('email').value;
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!email.match(emailPattern)){
        document.getElementById('emailError').textContent = "Please enter valid Email address.";
        valid = false;
    }
    else{
        document.getElementById('emailError').textContent = "";
    }

    const password = document.getElementById('password').value;
    if(password.length < 6){
        document.getElementById('passwordError').textContent = "Password must be 6 charecter long ";
        valid = false;
    }
    else{
        document.getElementById('passwordError').textContent = "";
    }

    const phone = document.getElementById('phone').value;
    const phonePattern = /^[0-9]{10}$/;
    if(!phone.match(phonePattern)){
        document.getElementById('phoneError').textContent = "Please enter a valid phone number. It must be 10 charecter";
        valid = false;
    }
    else{
        document.getElementById('phoneError').textContent = "";
    }

    if (valid) {
        alert("Form submitted successfully!");

        window.location.href = "registration.html";
    }

    return true;


    
});

document.getElementById('name').addEventListener('input', function() {
    document.getElementById('nameError').textContent = "";
});

document.getElementById('regd').addEventListener('input', function() {
    document.getElementById('regdError').textContent = "";
});

document.getElementById('phone').addEventListener('input', function() {
    document.getElementById('phoneError').textContent = "";
});

document.getElementById('email').addEventListener('input', function() {
    document.getElementById('emailError').textContent = "";
});

document.getElementById('password').addEventListener('input', function() {
    document.getElementById('passwordError').textContent = "";
});