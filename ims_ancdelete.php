<?php
require('includes/ims_connection.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM `announcement_wall` WHERE id = '$id'";
    $run = mysqli_query($conn, $query);
    if ($run) {
        header('location:ims_ancwalladmin.php');
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>