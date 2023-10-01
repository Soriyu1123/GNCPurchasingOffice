<?php
ob_start();
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
require('includes/ims_connection.php');
$_SESSION['status']="Active";

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $userName = mysqli_real_escape_string($conn,$_POST["username"]);
    $userPassword = mysqli_real_escape_string($conn,$_POST["password"]);
    echo $userName . " " . $userPassword;

    // Hash the password
    $hashedPassword = sha1($userPassword);

    // Check if the user exists in the database.
    $query = "SELECT * FROM accounts WHERE username = '".$userName."' AND password = '".$userPassword."';";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Start a session and store user information.

        $_SESSION['username'] = $row['id'];
        $_SESSION['role'] = $row['role'];
        // Redirect to appropriate admin panel based on the user role.
        if ($row['role'] == 'admin') {
            header("Location: ims_adminadmin.php");
        } else if ($row['role'] == 'staff') {
            header("Location: ims_staff.php");
        } 
        else {
            echo "Unknown role!";
        }

        exit();
    } else {
        echo "<script>alert('Invalid username or Password!'); window.location='login.html';</script>";
    }

    mysqli_free_result($result);
    mysqli_close($conn);
}
ob_end_flush();
?>