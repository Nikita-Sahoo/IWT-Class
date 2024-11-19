<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lgin Form</title>
    <link rel="stylesheet" href="style.css"/>
    
   
</head>
<body class="login">
    <header>
        <!-- <h2 class="logo">logo</h2> -->
        <nav class="navigation">
            <a href="registration.php">Register Here</a>
            <!-- <a href="index.html">Home</a>
            <a href="Addtocart.html">Add to Cart</a> -->
        </nav>
    </header>

    <div class="border">
        <div class="form-box login" >
            <h2> Student Login Form</h2>
            <form name="myForm"   method="POST" >
                <div class="input-box">
                    <span class="icon"></span>
                    <input type="text" id="username" name="username" />
                    <label>Username (Email)</label>
                </div>
                
                <div class="input-box">
                    <span class="icon"></span>
                    <input type="password" id="password" name="password" >
                    <label>Password</label>
                </div>
               
                
                <button type="submit" name="submit" class="btnlogin-popup" style="background-color: #77975b" > Submit</button>
                <p>If already register then <a class="mouseHover" href="registration.php" >Register Here</a></p>
                
            </form>
        </div>
</form> 


</body>
</html>

<?php
session_start();
include 'conn.php';

// Handle form submission
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['username']; // Email is used as username
    $password = $_POST['password'];

    // Check if email exists in the database
    $sql = "SELECT * FROM registration WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['pass'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            // Redirect to index.html
            echo "<script>
                    alert('Login successful!');
                    window.location.href = 'index.php';
                  </script>";
        } else {
            echo "<script>alert('Incorrect password. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('Email not found. Please register first.');</script>";
    }
}
?>

