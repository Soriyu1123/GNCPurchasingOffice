<?php
require('includes/ims_headeradminadmin.php');
require('includes/ims_connection.php');

$run = mysqli_query($conn, "select * from `announcement_wall`");

    if (!$conn) {
        die("Database conn failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
        $id = $_GET['id'];

        // Retrieve Announcement information from the database
        $query = "SELECT id, anc_date, anc_cont FROM announcement_wall WHERE id = $id";
        $result = mysqli_query($conn, $query);
          
        if (isset($anc) && is_array($anc)) {
            $id = $anc['id'];
            $anc_cont = isset($anc['anc_cont']) ? $anc['anc_cont'] : ''; // Initialize $anc_cont or use an empty string as a default
        } else {
            // Handle the case where $anc is not defined or null
            $id = ''; // Set a default value or handle the error as needed
            $anc_cont = ''; // Set a default value or handle the error as needed
        }

        mysqli_free_result($result);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="includes/css/memo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <title>Announcement Wall</title>
</head>

<style>
.body {
    background-image: none !important;
}

.card-text {
    font-size: 12px;
}

/* Add a fixed height to the card body */
.fixed-height-card {
    height: 200px;
    /* Adjust the height as needed */
    overflow: hidden;
    /* Hide overflow content */
}

.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    /*background-color: rgba(0, 0, 0, 0.7);*/
}

.modal-content {
    background-color: #fff;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 600px;
}

/* Style for the close button */
.close {
    float: right;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover {
    color: #C70039;
}

/* Responsive table styles */
.table-responsive {
    overflow-x: auto;
}

/* Define the pop-up animation */
@keyframes popup {
    from {
        opacity: 0;
        transform: scale(0.8);
    }

    to {
        opacity: 1;
        transform: scale(1);
    }
}

/* Apply the animation to the modal */
.modal {
    animation: popup 0.3s ease-out;
}
</style>

<body>
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="d-flex" style="height: 50rem">
                <div class="col-lg">
                    <div class="container">

                        <!-- Modal for Add Announcement -->
                        <div id="announcementModal" class="modal">
                            <div class="modal-content bg-dark text-light d-flex">
                                <span class="close" id="closeModal">&times;</span>
                                <h1 class="text-center">Add New Announcement</h1>
                                <table class="announcement-table table-responsive">
                                    <form action="ims_addanc.php" method="POST">
                                        <tr>
                                            <td><label for="anc_date">Image:</label></td>
                                            <td><input type="file" name="image/*"></td>
                                        </tr>
                                        <tr>
                                            <td><label for="anc_date">Date:</label></td>
                                            <td><input type="date" name="anc_date" required></td>
                                        </tr>
                                        <tr>
                                            <td><label for="anc_cont">Content:</label></td>
                                            <td><textarea type="text" name="anc_cont" cols="50" rows="4"
                                                    required></textarea></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><input type="submit" value="Add Announcement"></td>
                                        </tr>
                                    </form>
                                </table>
                            </div>
                        </div>

                        <!-- The Modal for Update Announcement -->
                        <!--<div id="updateAnnouncementModal" class="modal">-->
                        <!--    <div class="modal-content">-->
                        <!--        <span class="close" id="closeUpdateModal">&times;</span>-->
                        <!--        <div class="container">-->
                        <!--            <div class="row">-->
                        <!--                <div class="card" style="width: 50rem; height: 50rem">-->
                        <!--                    <div class="col-lg">-->
                        <!--                        <div class="card-body">-->
                        <!-- Table -->
                        <!--                            <h1>Update Announcement</h1><br>-->
                        <!--                            <table class="updateanc">-->
                        <!--                                <form action="ims_updateanc.php" method="POST">-->
                        <!--                                    <input type="hidden" name="id" value="<?php echo $id; ?>">-->
                        <!--                                    <tr>-->
                        <!--                                        <td><label for="anc_cont">Announcement:</label></td>-->
                        <!--                                        <td><textarea name="anc_cont" rows="7" cols="50" required><?php echo $id; ?></textarea></td>-->
                        <!--                                    </tr>-->
                        <!--                                    <tr>-->
                        <!--                                    <td><input type="submit" value="Update Announcement"></td>-->
                        <!--                                    </tr>-->
                        <!--                                </form>-->
                        <!--                            </table><br>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->

                        <h1>Manage Announcements</h1>
                        <p class="text-secondary"><button type="button" class="btn" id="addAnnouncementButton"><i
                                    class="fa-solid fa-square-plus fa-2xl text-success"></i></button> Add New</p>
                        <div class="container">
                            <div class="container">
                                <div class="row">
                                    <?php
                                    $i = 1;
                                    if ($num = mysqli_num_rows($run) > 0) {
                                        while ($result = mysqli_fetch_assoc($run)) {
                                            echo "
                                            <div class='col-lg-4 mb-4 cnt'>
                                                <div class='card'>
                                                    <img class='card-img-top' src='data:image/jpeg;base64," . base64_encode($result['img']) . "' alt='Card image'>
                                                    <div class='card-body fixed-height-card'>
                                                        <h5 class='card-title'>" . $result['anc_date'] . "</h5>
                                                        <p class='card-text'>" . $result['anc_cont'] . "</p>
                                                        <hr>
                                                        <a href='ims_updateancp.php?id=" . $result['id'] . "' class='btn btn-primary' id='updateAnnouncementButton'><i class='fa-regular fa-pen-to-square' style='color: #ffffff;'></i></a>
                                                        <a href='ims_ancdelete.php?id=" . $result['id'] . "' class='btn btn-danger'><i class='fa-solid fa-trash' style='color: #ffffff;'></i></a>
                                                    </div>
                                                </div>
                                            </div>";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!--Add Announcement-->
    <script>
    // Get references to the modal and button
    var modal = document.getElementById("announcementModal");
    var btn = document.getElementById("addAnnouncementButton");
    var closeBtn = document.getElementById("closeModal");

    // Function to open the modal with animation
    btn.onclick = function() {
        modal.style.display = "block";
        modal.classList.add("animated"); // Add the animation class
    }

    // Function to close the modal
    closeBtn.onclick = function() {
        modal.style.display = "none";
    }

    // Close the modal if the user clicks outside of it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>

    <!--Edit Announcement-->
    <script>
    // Get references to the modal and button
    var updateModal = document.getElementById("updateAnnouncementModal");
    var updateBtn = document.getElementById("updateAnnouncementButton");
    var closeUpdateBtn = document.getElementById("closeUpdateModal");

    // Function to open the modal
    updateBtn.onclick = function() {
        updateModal.style.display = "block";
    }

    // Function to close the modal
    closeUpdateBtn.onclick = function() {
        updateModal.style.display = "none";
    }

    // Close the modal if the user clicks outside of it
    window.onclick = function(event) {
        if (event.target == updateModal) {
            updateModal.style.display = "none";
        }
    }
    </script>

</body>

</html>