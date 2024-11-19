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



// Fetch course from URL, default is MCA
$course = isset($_GET['course']) ? $_GET['course'] : 'MCA';

// SQL query to fetch books based on the selected course
$sql = "SELECT * FROM book_table WHERE course = '$course'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Page</title>
  <link rel="stylesheet" href="style1.css" />
  <style>
   
  </style>
</head>

<body>

  <!-- Navbar -->
  <div class="navbar">
    <a href="index.php">Home</a>
    <a href="addtocart.php">Add to cart</a>
    <a href="login.php">Login</a>
    <a href="logout.php">Logout</a>
  </div>

  <!-- Side Navigation -->
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="index.php?course=MCA">MCA</a>
    <a href="index.php?course=MSc">MSc</a>
    <a href="index.php?course=Physics">Physics</a>
    <a href="index.php?course=Chemistry">Chemistry</a>
    <a href="index.php?course=Math">Maths</a>
  </div>

  <!-- Content -->
  <div class="container">
    <div class="row">
      <div class="col-25">
        <h4>Courses</h4>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Courses</span>
      </div>
      <div class="col-75">
        <!-- <h1>All Book List</h1> -->

       

        <!-- Table -->
        <table>
        <!-- <div class="form-container"> -->
         
          <form action="" method="get">
            
            <select name="course">
              <!-- <option value="" >Select Course</option> -->
              <option value="MCA" <?php if ($course == 'MCA') echo 'selected'; ?>>MCA</option>
              <option value="MSc" <?php if ($course == 'MSc') echo 'selected'; ?>>MSc</option>
              <option value="Physics" <?php if ($course == 'Physics') echo 'selected'; ?>>Physics</option>
              <option value="Chemistry" <?php if ($course == 'Chemistry') echo 'selected'; ?>>Chemistry</option>
              <option value="Math" <?php if ($course == 'Math') echo 'selected'; ?>>Math</option>
            </select>
            <button type="submit">Filter</button>
          </form>
        <!-- </div> -->
          <h2><?php echo $course; ?> Book Table</h2>
          <tr>
            <th style="width: 50px;">Add Date</th>
            <th style="width: 150px;">Book Name & Author</th>
            <th style="width: 10px;">Image</th>
            
            <th style="width: 20px;">Course</th>
            <th style="width: 20px;">Status</th>
            <th style="width: 50px;">Price</th>
           
            <th style="width: 50px;">Add to Cart</th>
          </tr>
          <?php
          // Fetch and display each book's data
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row['date'] . "</td>";
              echo "<td>". "<span style=' color:green; ' > " . $row['bookname'] . "</span>". "<br> <br>" . $row['author'] . "</td>";
              echo "<td><img src='image/" . $row['image'] . "' alt='" . $row['bookname'] . "' width='80' height='90'></td>";
              
              echo "<td>" . $row['course'] . "</td>";
              echo "<td>" . $row['status'] . "</td>";
              echo "<td>" . $row['price'] . "</td>";
             
              echo "<td><form action='add_cart.php' method='post'>
                      <input type='hidden' name='book_id' value='" . $row['id'] . "'> <!-- Sending only book_id -->
                      <button type='submit' name='add_to_cart'>Add</button>
                    </form></td>";
              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='7'>No books found for this course</td></tr>";
          }
          ?>
        </table>
      </div>
    </div>
  </div>

  <!-- JavaScript for Navigation -->
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

