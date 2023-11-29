<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CRUD_APP";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user details
$user_id = $_SESSION['user_id'];
$sql = "SELECT firstName, lastName, email FROM crudTable WHERE user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $firstName = $row['user_name'];
    $lastName = $row['user_email'];
    $email =$row['$email'];
} else {
    echo "User not found in the database.";
}

// Handle delete request
if (isset($_POST['delete'])) {
    $deleteSql = "DELETE FROM crudTable WHERE user_id = $user_id";
    
    if ($conn->query($deleteSql) === TRUE) {
        // Redirect to logout page after successful deletion
        header("Location: logout.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

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
    <h1>Welcome, <?php echo $user_name; ?>!</h1>
    
    <p>Your Email: <?php echo $user_email; ?></p>

    <form method="post">
        <input type="submit" name="delete" value="Delete My Account" onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
    </form>
</body>
</html>
