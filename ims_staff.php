<?php
session_start();
require('includes/ims_header.php');
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header("Location: login.html");
    exit();
}
if ($_SESSION['role'] == 'staff') {
} else if ($_SESSION['role'] == 'admin')
?>
<!DOCTYPE html>
<html>
<!-- Bootstrap 5 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
<!-- Css -->
<link rel="stylesheet" href="includes/css/memos.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<link rel="stylesheet" href="includes/css/style.css">
<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">

<script>
var dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'))
var dropdownList = dropdownElementList.map(function(dropdownToggleEl) {
    return new bootstrap.Dropdown(dropdownToggleEl)
})
</script>

<body>
    <title>Staff Panel</title>
    <!-- Memo Note Section -->
    <div class="container">
        <div class="section">
            <h1 style="color: white; text-align: center"><strong>Welcome, Staff</strong></h1>
            <p style="color: white; text-align: center">Purchasing Office</p>
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
                                <input type="text" spellcheck="false">
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
            <div class="wrapper">
                <li class="add-box">
                    <div class="icon"><i class="uil uil-plus"></i></div>
                    <p>Add new note</p>
                </li>
            </div>

            <script src="includes/assets/script.js"></script>
        </div>
    </div>
    </div>
</body>

</html>