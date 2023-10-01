<?php
require('includes/ims_connection.php');
require('includes/ims_header_std.php');


// Check if the database connection is valid
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch announcements from the database
$sql = "SELECT * FROM announcement_wall ORDER BY anc_date DESC";
$result = $conn->query($sql);

// Check if the query was executed successfully
if ($result === false) {
    die("Error executing the query: " . mysqli_error($conn));
}



// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>List of Announcements</title>
</head>

<style>
    body {
        background: url(https://images.unsplash.com/photo-1634153570366-deda92ecf625?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1664&q=80);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        font-family: 'Open Sans', sans-serif;
    }

    .announcement {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
    }

    .ctr_ann{
        margin-top: 6rem;
    }

    .card{
        padding:50px 0px 150px 0px;
        opacity:90%;
        border-radius: 0;
        border:none;
    }
    
    /*header {*/
    /*    background-color: #333;*/
    /*    color: #fff;*/
    /*    text-align: center;*/
    /*    padding: 1rem;*/
    /*}*/

</style>

<body>
    <!-- Container -->
    <div class="container-fluid ctr_ann">
        <div class="row">
            <div class="card">
                <div class="col-lg">
                    <div class="card-body">
                        <header class="text-center"><h1>List of Announcements</h1><span class="text-secondary">Scroll down for more.</span></header>
                        
                        <div class="m-5"></div>
                        
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="w-50 m-0 announcement mx-auto justify-content-center align-center border border-2 rounded-3 shadow p-3">';
                                echo '<p class="text-secondary p-3 pb-0 m-0 fw-bold">Date: ' . $row['anc_date'] . '</p>';
                                echo '<p class="p-3 pt-0 mb-0">' . $row['anc_cont'] . '</p>';
                                echo '<img class="w-50 mb-3 d-flex mx-auto m-auto justify-content-center align-center border border-1" src="image.php?image_id=' . $row['id'] . '" alt="Announcement Image">';
                                echo '</div>';
                                echo '<hr class="mx-auto justify-content-center align-center w-50">';
                            }
                        } else {
                            echo '<p>No announcements found.</p>';
                        }
                        
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>