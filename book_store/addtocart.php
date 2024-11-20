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
$name = $_SESSION['name'];
$email = $_SESSION['email'];

// SQL query to fetch all courses added to cart (remove course filter for all courses)
$sql = "SELECT * FROM add_to_cart";
$result = $conn->query($sql);

// Fetch unique courses added to the cart
$course_query = "SELECT DISTINCT course FROM add_to_cart";
$course_result = $conn->query($course_query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add to Cart Page</title>
    <link rel="stylesheet" href="style1.css" />
    <script src="myscripts.js"></script>
</head>
<body>
<div class="navbar">
    
    <a href="index.php">Home</a>
    <a href="addtocart.php">Add to cart</a>
    <a href="login.php">Login</a>
    <a href="logout.php">Logout</a>
</div>

<!-- Side Navigation -->
<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <?php
    // Display links for each course dynamically
    if ($course_result->num_rows > 0) {
        while ($row = $course_result->fetch_assoc()) {
            echo "<a href='index.php?course=" . $row['course'] . "'>" . $row['course'] . "</a>";
        }
    }
    ?>
</div>

<div class="container">
    <div class="row">
        <div class="col-25">
            <h4>Animated</h4>
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Courses</span>
        </div>
        <div class="col-75">
            <h1 style="  margin-bottom: 50px; font-size: 40px;">Cart Book List</h1>

            <table>
                <tr>
                    <th>Date</th>
                    <th>Book Name & Author</th>
                    <th>Image</th>
                    <th>Course</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Remove from cart</th>
                </tr>
                <?php
                // Fetch and display each book's data
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['add_date'] . "</td>";
                        echo "<td><span style='color:green;'>" . $row['bookname'] . "</span><br><br>" . $row['author'] . "</td>";
                        echo "<td><img src='image/" . $row['image'] . "' alt='" . $row['bookname'] . "' width='80' height='90'></td>";
                        echo "<td>" . $row['course'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td><form action='remove_cart.php' method='post'>
                                  <input type='hidden' name='cart_id' value='" . $row['id'] . "'> 
                                  <button type='submit' name='remove_cart'>Remove</button>
                              </form></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No books found in the cart.</td></tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>

</body>
</html>
