<?php
require('includes/ims_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Specify column mapping
    $query = "INSERT INTO `deleted` (name, descr, quantity, price, size, course_code, date_deleted)
              SELECT name, descr, quantity, price, size, course_code, NOW()
              FROM `items_college`
              WHERE id = '$id'";

    $result1 = mysqli_query($conn, $query);

    // Delete from items_college
    $dlt = "DELETE FROM `items_college` WHERE id = '$id'";
    $result2 = mysqli_query($conn, $dlt);

    if ($result1 && $result2) {
        echo "<script>alert('Item deleted successfully!'); window.location='ims_itemsCOLLEGE.php';</script>";
        exit; // Important to stop script execution after the redirect
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
