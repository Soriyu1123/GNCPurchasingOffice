<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>Update Announcement</title>
</head>

<body>
    <?php
    require('includes/ims_headeradminadmin.php');
    require('includes/ims_connection.php');

    if (!$conn) {
        die("Database conn failed: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['id'])) {
        $id = $_GET['id'];

        // Retrieve Announcement information from the database
        $query = "SELECT id, anc_date, anc_cont FROM announcement_wall WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $anc = mysqli_fetch_assoc($result);
        } else {
            echo "Announcement not found.";
            exit();
        }

        mysqli_free_result($result);
    }
    ?>

    <style>
    .updateanc {
        border-collapse: collapse;
        width: 100%;
    }

    .updateanc td {
        padding: 5px;
        border: none;
        /* Remove borders from table cells */
    }

    .updateanc input,
    .updateanc textarea,
    .updateanc select {
        padding: 5px;
        width: 100%;
    }

    .updateanc input[type="submit"] {
        width: auto;
    }
    </style>
    <!-- Container -->
    <div class="container">
        <div class="row">
            <div class="card" style="width: 50rem; height: 50rem">
                <div class="col-lg">
                    <div class="card-body">
                        <!-- Table -->
                        <h1>Update Announcement</h1><br>
                        <table class="updateanc">
                            <form action="ims_updateanc.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $anc['id']; ?>">
                                <tr><td><textarea name="anc_cont" rows="7" cols="50" required><?php echo $anc['anc_cont']; ?></textarea></td></tr>
                        </table><br>
                                <tr><td><input type="submit" value="Update Announcement" class="btn-success"></td></tr>
                                <a href="ims_ancwalladmin.php"><button type="button" class="btn-danger">Cancel</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>