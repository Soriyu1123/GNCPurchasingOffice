<?php
require('includes/ims_headeradminadmin.php');
require('includes/ims_connection.php');
if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $query = "DELETE FROM `items` WHERE id = '$id'";
     $run = mysqli_query($conn, $query);
     if ($run) {
          header('location:ims_additems.php');
     } else {
          echo "Error: " . mysqli_error($conn);
     }
}
?>