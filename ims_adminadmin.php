<?php
session_start();
require('includes/ims_connection.php');
include("includes/ims_headeradminadmin.php");
$sql = "SELECT * FROM accounts";
$result = $conn->query($sql);

if (!isset($_SESSION['username']) || !isset($_SESSION['role']) || $_SESSION['status'] !== "Active") {
    header("Location: login.html");
    exit();
}

if ($_SESSION['role'] == 'staff') {
} else if ($_SESSION['role'] == 'admin') {
}


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No data found";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Purchasing</title>
    <!-- Css -->
    <link rel="stylesheet" href="includes/css/memo.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
    <!--FA-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<style>
body {
    background-image: url('https://github.com/Soriyu1123/Images/blob/main/admin_bg.jpg?raw=true');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: unset;
}
</style>

<body>

    <!-- Memo Note Section -->
    <div class="container m-0 mx-auto">
        <div class="section">
            <h1 style="color: white; text-align: center"><strong>Welcome
                    <?php echo "" . $row["firstname"] . "!"; ?></strong></h1>
            <p style="color: white; text-align: center">Here you can manage admin tasks.</p>

            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa-regular fa-rectangle-list"></i> Item Reports</h5>
                            <hr>
                            <p class="card-text">Count:</p>
                        </div>
                    </div>
                </div>
                <!--<div class="col-md-6 col-lg-4 mx-auto m-3">-->
                <!--    <div class="card">-->
                <!--        <div class="card-body">-->
                <!--            <h5 class="card-title">Total Transactions</h5><hr>-->
                <!--            <p class="card-text">Count:</p>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="col-md-10 mx-auto m-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa-regular fa-eye"></i> Website Views</h5>
                            <hr>
                            <p class="card-text">The Purchasing Office Website has been visited
                                <?php echo '<span class="text-success">' . $_SESSION['visitor_count']. '</span>';   ?>
                                times</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="popup-box">
                <div class="popup">
                    <div class="content">
                        <header>
                            <p></p>
                            <i class="uil uil-times"></i>
                        </header>
                        <form action="#">
                            <div class="row title">
                                <label>Title</label>
                                <input type="text" spellcheck="false" oninput="validateText(this)">
                            </div>
                            <div class="row description">
                                <label>Description</label>
                                <textarea spellcheck="false"></textarea>
                            </div>
                            <button></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="wrapper d-flex">
                <li class="add-box w-50">
                    <div class="icon"><i class="uil uil-plus"></i></div>
                    <p>Add new note</p>
                </li>
            </div>
        </div>
    </div>

    <script>
    function validateText(input) {
        input.value = input.value.replace(/[^A-Za-z\s]/g, '');
    }
    </script>
    <script src="includes/assets/script.js"></script>

</body>

</html>