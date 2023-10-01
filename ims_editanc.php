<?php
require('includes/ims_headeradminadmin.php');
require('includes/ims_connection.php');

$run = mysqli_query($conn, "select * from `announcement_wall`");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>

<style>
.announcement-table {
    border-collapse: collapse;
    width: 100%;
}

.announcement-table td {
    padding: 5px;
    border: none;
    /* Remove borders from table cells */
}

.announcement-table input,
.announcement-table select {
    width: 100%;
    padding: 5px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    /* Add a border to input and select elements */
}

.announcement-table input[type="submit"] {
    width: auto;
}

.Users,
th,
td {
    padding-left: 15px;
    padding-right: 15px;
    border: 1px solid black;
}
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="card" style="width: 50rem; height: 50rem">
                <div class="col-lg">
                    <div class="card-body">
                        <i class="fa-solid fa-boxes-stacked fa-2xl ml-3 mb-4" style="color: #0f100f;"></i>
                        <h1>Announcement</h1>
                        <table class="items" align="center" border="1" cellspacing="0" cellpadding="0">
                            <tr class="heading">
                                <th>Date</th>
                                <th>Annoncement</th><br>
                            </tr>

                            <?php
                                $i = 1;
                                    if ($num = mysqli_num_rows($run) > 0) {
                                        while ($result = mysqli_fetch_assoc($run)) {
                                            echo "
                                    <tr class='data' style='border: 1px solid'> 
                                    <td>" . $result['anc_date'] . "</td>
                                    <td>" . $result['anc_cont'] . "</td>      
                                    <td>
                                    <a href='ims_updateancp.php?id=" . $result['id'] . "' id='btn' class='btn btn-primary'>Edit</a>
                                    </td>  
                                    </tr>";}
                                    }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>