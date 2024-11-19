<?php
include 'conn.php';



if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $regd = $_POST['regd'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password 
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Insert data into the database
    $sql = "INSERT INTO registration (name, regd_no, email, pass, phone, date) VALUES 
            ('$name', '$regd', '$email', '$password', '$phone', CURDATE())";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful!');</script>";
        echo "<script>window.location.assign('index.php')</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        .error {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body style="background-image: url(image/nw-bg.jpg);">

<header>
    <nav class="navigation">
        <a href="login.php">Login Here</a>
    </nav>
</header>

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
