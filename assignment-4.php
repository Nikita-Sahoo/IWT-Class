

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        
/* Login Form css Start */

*
{
    padding: 8px;
    margin: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
    text-decoration: none;

}
body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: url(image/bg.jpg)no-repeat;
    background-size: cover;
    background-position: center;
}

.border{
    /* background-color:#b5b6b5 ; */
    margin-top: 101px;
    margin-right: 50%;
}

/* Registration Form css Start */


        input[type=text],input[type=password],input[type=email],input[type=number], select, textarea {
        width: 100%; 
        padding: 12px;
        /* border: 1px solid #ccc;  */
        border-radius: 4px; 
        box-sizing: border-box; 
        margin-top: 6px; 
        /* margin-bottom: 16px;  */
        resize: vertical;
      }

      .btnlogin-popup{
          color: white;
          padding: 10px 20px 10px 20px ;
          width: 120px;
          height: 50px;
          background: transparent;
          border: 2px solid #fff;
          border-radius: 6px;
          cursor: pointer;
          font-size: 1.1rem;
          margin-left: 10px;
          transition: .5s;
          text-decoration: none;
      }
      .btnlogin-popup:hover{
          background: #77975b;
          color: #162938;
      } 

      input[type=submit] {
        background-color: #04AA6D;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
      }

      input[type=submit]:hover {
        background-color: #45a049;
      }

      .container {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
      }

      .error {
        color: red;
        font-size: 13px;
    }

/* Registration Form css End */
        .error {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body style="background-image: url(image/nw-bg.jpg);">

<!-- <header>
    <nav class="navigation">
        <a href="login.php">Login Here</a>
    </nav>
</header> -->

<div class="container" style="margin-right: 62%; margin-left: 8%; margin-top: 5%;">
    <h2>Registration Form</h2>

    <!-- Registration Form -->
    <form id="registrationForm" method="POST">

        <label>Name</label>
        <input type="text" id="name" name="name" placeholder="Your name.." >
        <span id="nameError" class="error"></span> </br>

        <label>Registration Number</label>
        <input type="number" id="regd" name="regd" placeholder="Your Registration number.." >
        <span id="regdError" class="error"></span></br>

        <label>Email</label>
        <input type="text" id="email" name="email" placeholder="Your Email.." >
        <span id="emailError" class="error"></span></br>

        <label>Password</label>
        <input type="password" id="password" name="password" placeholder="Your password.." >
        <span id="passwordError" class="error"></span></br>

        <label>Phone</label>
        <input type="text" id="phone" name="phone" placeholder="Your phone.." >
        <span id="phoneError" class="error"></span></br>

        <input type="submit" name="submit" value="Submit">
    </form>
</div>

<script>
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        let valid = true;

        document.querySelectorAll('.error').forEach(span => span.textContent = "");

        const name = document.getElementById('name').value.trim();
        if (!name) {
            document.getElementById('nameError').textContent = "Name is required.";
            valid = false;
        }

        const regd = document.getElementById('regd').value.trim();
        if (!regd) {
            document.getElementById('regdError').textContent = "Registration number is required.";
            valid = false;
        }

        const email = document.getElementById('email').value.trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!email.match(emailPattern)) {
            document.getElementById('emailError').textContent = "Enter a valid email address.";
            valid = false;
        }

        const password = document.getElementById('password').value.trim();
        if (password.length < 6) {
            document.getElementById('passwordError').textContent = "Password must be at least 6 characters.";
            valid = false;
        }

        const phone = document.getElementById('phone').value.trim();
        const phonePattern = /^[0-9]{10}$/;
        if (!phone.match(phonePattern)) {
            document.getElementById('phoneError').textContent = "Enter a valid 10-digit phone number.";
            valid = false;
        }

        if (!valid) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });

    // Clear error messages
    ['name', 'regd', 'email', 'password', 'phone'].forEach(field => {
        document.getElementById(field).addEventListener('input', function() {
            document.getElementById(`${field}Error`).textContent = "";
        });
    });
</script>

</body>
</html>
