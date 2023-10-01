<?php
require('includes/ims_connection.php');
include('ims_itemsJHS.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $name = $_POST['name'];
    $descr = $_POST['descr'];
    $quantity = $_POST['quantity'];
    $size = $_POST['size'];
    $grade_level = $_POST['grade_level'];
    $price = $_POST['price'];

    // Handle the image upload
    $imgName = $_FILES['img']['name'];
    $imgTmpName = $_FILES['img']['tmp_name'];
    $imgSize = $_FILES['img']['size'];
    $imgError = $_FILES['img']['error'];

    // Check if an image was uploaded successfully
    if ($imgError === 0) {
        $imgData = file_get_contents($imgTmpName);

        if (!$conn) {
            die("Database conn failed: " . mysqli_connect_error());
        }

        // Use a prepared statement to insert data, including the image
        $query = "INSERT INTO items_jhs (img, name, descr, quantity, size, grade_level, price) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, "bssissd", $imgData, $name, $descr, $quantity, $size, $grade_level, $price);

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                echo "<script>alert('Item added successfully!'); window.location='ims_itemsJHS.php';</script>";
            } else {
                echo "Error adding item: " . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing statement: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo "Error uploading image: " . $imgError;
    }
}
?>