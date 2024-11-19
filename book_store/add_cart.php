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

$user_id = $_SESSION['user_id']; // Assuming user_id is stored in session

// Fetch course from URL, default is MCA
$course = isset($_GET['course']) ? $_GET['course'] : 'MCA';

// SQL query to fetch books based on the selected course
$sql = "SELECT * FROM book_table WHERE course = '$course'";
$result = $conn->query($sql);

// Check if the form is submitted to add a book to the cart
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $book_id = $_POST['book_id']; // Get the book_id from the form
    
    // Fetch the book details from the book_table using book_id
    $book_query = "SELECT * FROM book_table WHERE id = '$book_id'";
    $book_result = $conn->query($book_query);
    
    if ($book_result->num_rows > 0) {
        $book = $book_result->fetch_assoc();

        // Corrected SQL query to insert into add_to_cart table
        $insert_query = "INSERT INTO add_to_cart (user_id, book_id, bookname, author, image, price, course, add_date) 
                         VALUES ('$user_id', '$book_id', '".$book['bookname']."', '".$book['author']."', '".$book['image']."', '".$book['price']."', '".$book['course']."', CURDATE())";
        
        if ($conn->query($insert_query) === TRUE) {
            echo "<script>alert('Book added to cart!');
            window.location.href = 'addtocart.php';</script>";
        } else {
            echo "<script>alert('Error adding book to cart.');</script>";
        }
    }
}
?>
