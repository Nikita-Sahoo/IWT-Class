<?php
// Start the session
session_start();
include 'conn.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>
            alert('Please login first.');
            window.location.href = 'login.php';
          </script>";
    exit;
}

// Access session variables
$user_id = $_SESSION['user_id']; // Assuming user_id is stored in session

// Check if the book_id is provided
if (isset($_POST['remove_cart'])) {
    $cart_id = $_POST['cart_id']; // Get the book_id from the form

    // SQL query to remove the book from the cart
    $delete_query = "DELETE FROM add_to_cart WHERE id = '$cart_id' AND user_id = '$user_id'";

    if ($conn->query($delete_query) === TRUE) {
        echo "<script>alert('Book removed from cart!');
        window.location.href = 'addtocart.php';</script>";
    } else {
        echo "<script>alert('Error removing book from cart.');</script>";
    }
}
?>
