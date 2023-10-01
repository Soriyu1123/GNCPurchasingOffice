<?php
require('includes/ims_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Specify column mapping
    $query = "INSERT INTO `deleted` (name, descr, quantity, price, size, grade_level, date_deleted)
              SELECT name, descr, quantity, price, size, grade_level, NOW()
              FROM `items_shs`
              WHERE id = '$id'";

    $result1 = mysqli_query($conn, $query);

    $dlt = "DELETE FROM `items_shs` WHERE id = '$id'";
    $result2 = mysqli_query($conn, $dlt);

    if ($result1 && $result2) {
        echo "<script>alert('Item deleted successfully!'); window.location='ims_itemsSHS.php';</script>";
        exit; // Important to stop script execution after the redirect
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>