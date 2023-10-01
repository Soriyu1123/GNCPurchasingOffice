<?php
    require('includes/ims_connection.php');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $name = $_POST['name'];
    $descr = $_POST['descr'];
    $quantity = $_POST['quantity'];
    $size = $_POST['size'];
    $course_code = $_POST['course_code'];
    $price = $_POST['price'];

    // Handle the image upload
    $imgData = file_get_contents($_FILES['img']['tmp_name']);

    require('includes/ims_connection.php');

    if (!$conn) {
        die("Database conn failed: " . mysqli_connect_error());
    }

    // Use a prepared statement to insert data, including the image
    $query = "INSERT INTO items_college (img, name, descr, quantity, size, course_code, price) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "bssissd", $imgData, $name, $descr, $quantity, $size, $course_code, $price);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            echo "<script>alert('Item added successfully!'); window.location='ims_itemsCOLLEGE.php';</script>";
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
?>