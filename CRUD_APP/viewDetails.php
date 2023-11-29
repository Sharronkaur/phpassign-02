<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}

// Connect to your MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CRUD_APP";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user details from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT user_name, user_email FROM users WHERE user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();
    $firstName = $row['Ffirst_name'];
    $email = $row['email'];
    $lastName=$row['last_name'];
    
} else {
    echo "User not found in the database.";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
</head>
<body>
    <h1>Welcome, <?php echo $firstName; ?>!</h1>
    <p>Last Name: <?php echo $lastName; ?></p>
    <p>Your Email: <?php echo $email; ?></p>
</body>
</html>
