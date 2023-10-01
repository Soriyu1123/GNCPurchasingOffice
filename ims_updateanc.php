<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $id = $_POST['id'];
    $anc_cont = $_POST['anc_cont'];

    require('includes/ims_connection.php');

    if (!$conn) {
        die("Database conn failed: " . mysqli_connect_error());
    }

    // Prepare the data for updating in the database
    $id = mysqli_real_escape_string($conn, $id);
    $anc_cont = mysqli_real_escape_string($conn, $anc_cont);

    // Update the item in the database
    $query = "UPDATE announcement_wall SET 
                anc_cont = '$anc_cont' 
                WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('location: ims_editanc.php');
        echo "Item updated successfully!";
    } else {
        echo "Error updating item: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
