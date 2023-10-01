<?php
session_start();
require('includes/ims_header_std.php');
require('includes/ims_connection.php');

// Check if a session variable exists for the visitor count, if not, initialize it
if (!isset($_SESSION['visitor_count'])) {
    $_SESSION['visitor_count'] = 1;
} else {
    // Increment the visitor count
    $_SESSION['visitor_count']++;
}

$run = mysqli_query($conn, "select * from `announcement_wall`");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>PURCHASING</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include jQuery (used by Bootstrap) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
</head>


<style>
 /**{border: 1px solid red;} */

body {
    background: url(https://images.unsplash.com/photo-1634153570366-deda92ecf625?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1664&q=80);
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    font-family: 'Open Sans', sans-serif;
}

.card {
    padding: 25px 0px 5px 0px;
    /*margin-top: 50px;*/
    /* margin-bottom: 50px; */
    /* border-radius: 18px; */
    /*background-color: #212529;*/
    /*opacity: 90%;*/
}

.announcement {
    text-align: justify;
    line-height: auto;
    color: black;
}

.announce {
    display: flex;
    margin: auto;
    align-items: center;
    justify-content: center;
}

.carousel-inner {
    margin-top: 7rem;
}

.carousel-item {
    border: 0px;
}


.black-button:hover {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    /* Adjust the shadow as needed */
}


table,
th,
td {
    border: 1px solid black;
}

th,
td {
    padding-left: 8px;
    padding-right: 8px;
}

tr:hover {
    background-color: black;
    color: white;
}

.announcement {
    font-size: 18px;
    padding: 16px;
    margin-bottom: 10px;
    border-radius: 12px;
}

.carousel-control-next,
.carousel-control-prev /*, .carousel-indicators */ {
    filter: invert(100%);
}

.c_img{
    width: 16rem;
}

.c_item{
    width: 45rem;
}
</style>



<body>
<!-- Messenger Chat Plugin Code START -->
    <div id="fb-root"></div>

    <!-- Your Chat Plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "109655948898501");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v17.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
<!-- Messenger Chat Plugin Code END -->    
    
    
<!-- Carousel Start -->
    <div id="carousel-container" class="carousel slide carousel-fade custom-carousel" data-bs-ride="carousel">
        <div class="carousel-indicators">
            
        <?php
            // Fetch announcements from the database
            $sql = "SELECT * FROM announcement_wall ORDER BY anc_date DESC";
            $result = $conn->query($sql);
            // Display announcements as carousel indicators
            $slideIndex = 0;
            while ($row = $result->fetch_assoc()) {
                $active = $slideIndex === 0 ? 'active' : '';
                echo '<button type="button" data-bs-target="#carousel-container" data-bs-slide-to="' . $slideIndex . '" class="' . $active . ' black-button border border-secondary" aria-label="Slide ' . ($slideIndex + 1) . '"></button>';
        
                $slideIndex++;
            }
        ?>
        
        </div>

        <div class="carousel-inner">
            <?php
                // Reset the slideIndex for generating carousel items
                $slideIndex = 0;
                
                // Display announcements as carousel slides
                $result->data_seek(0); // Reset the result pointer
                
                while ($row = $result->fetch_assoc()) {
                    $active = $slideIndex === 0 ? 'active' : '';
                
                    echo '<div class="carousel-item ' . $active . '">';
                    echo '<div class="container-fluid announce p-5 opacity-75 bg-light">';
                    echo '<div class="row c_item border-0 rounded border-secondary shadow">';
                    
                    // Left Column (Image)
                    echo '<div class="col-md-6 p-3">';
                    echo '<img class="c_img d-flex mx-auto m-auto justify-content-center align-center border border-secondary" src="image.php?image_id=' . $row['id'] . '" alt="Announcement Image">';
                    echo '</div>';
                
                    // Right Column (Text)
                    echo '<div class="col-md-6 p-3">';
                    echo '<div class="carousel-announcement announcement d-block mx-auto w-100 p-0 text-center announcement mx-auto d-block fs-5">';
                    echo '<p class="w-100 text-start p-3">' . $row['anc_cont'] . '</p>';
                    echo '<p class="d-flex text-secondary text-start fs-5 p-3 mt-0 pt-0">Posted on: ' . $row['anc_date'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                
                    echo '</div>'; // Close the row
                    echo '</div>'; // Close the container
                    echo '</div>'; // Close the carousel item
                
                    $slideIndex++;
                }
                $conn->close();
            ?>

        
            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-container" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carousel-container" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        
        </div>
    </div>
<!-- Carousel End -->

    <div class="container-fluid">
        <div class="cont_main">
            <div class="row">
                <div class="card bg-light border-0 opacity-75" style="border-radius:0;">
                    <h1 class="text-center "><strong>WELCOME TO THE PURCHASING
                            OFFICE</strong></h1>  <div class="text-center">
        <!--<p>You are visitor number: <?php echo $_SESSION['visitor_count']; ?></p>-->
                </div>
                    <section class="main">
                        <div class="container">
                            <div class="row ">
                                <h3 class="text-center"><strong>The gateway to sourcing high-quality products.</strong>
                                </h3>
                                <br> <br>
                                <span class="text-center w-50 mx-auto">Together, we strive to support the mission of providing
                                    top-notch education and a conducive learning environment for our students.</span>
                                </span>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Bootstrap JavaScript (load after jQuery) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // Initialize the carousel
    $(document).ready(function () {
        $('#carousel-container').carousel();
    });
</script>
    
</body>

</html>