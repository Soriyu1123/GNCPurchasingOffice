<?php
require('includes/ims_header_std.php');
require('includes/ims_connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
</head>

<style>
/* *{        border: 1px solid red;    } */

body {
    background: url(https://images.unsplash.com/photo-1634153570366-deda92ecf625?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1664&q=80);
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    font-family: 'Open Sans', sans-serif;
    line-height: 1.6;
}

/*header {*/
/*    background-color: #333;*/
/*    color: #fff;*/
/*    text-align: center;*/
/*    padding: 1rem;*/
/*}*/

.container {
    max-height: auto;
    max-width: 800px;
    margin: 0 auto;
}

/*.section {*/
/*    margin-bottom: 20px;*/
/*}*/

h1 {
    margin-bottom: 10px;
}

.ctr_abt {
    margin-top: 6rem;
}

.card {
    max-height: auto;
    padding: 40px 0px 80px 0px;
    opacity: 90%;
    border-radius: 0;
    border: none;
}
</style>

<body>
    <!-- Container -->
    <div class="container-fluid ctr_abt">
        <div class="row">
            <div class="card">
                <div class="col">
                    <div class="card-body">
                        <!--<img class="d-flex w-25 p-5 mx-auto justify-content-center" src="includes/img/gallery3.jpg" />-->
                        <header>
                            <h1 class="text-center">About Us</h1>
                        </header>
                        <div class="section text-center w-50 mx-auto justify-content-center align-center p-2"><br>
                            <h4>Our Story</h1>
                                <p class=" text-secondary">The Guagua National Colleges, Inc. Purchasing Office has a
                                    history steeped in dedication. We've been on a mission to provide the necessary
                                    building blocks for academic growth. Our journey is one of resourcefulness,
                                    adaptability, and steadfast commitment to ensuring the college's evolution.</p>
                        </div>
                        <hr class="w-50 mx-auto justify-content-center align-cente">

                        <div class="section text-center w-50 mx-auto justify-content-center align-center p-2">
                            <h4>Our Mission</h1>
                                <p class=" text-secondary">Committed to empowering Guagua National Colleges, Inc., our
                                    mission revolves around securing vital elements that drive educational excellence.
                                    Through strategic sourcing, ethical collaboration, and innovative practices, we
                                    contribute to the college's seamless progression towards its educational goals.</p>
                        </div>
                        <hr class="w-50 mx-auto justify-content-center align-cente">

                        <div class="section text-center w-50 mx-auto justify-content-center align-center">

                            <h4>Our Team</h1>
                                <p class=" text-secondary">Meet our dedicated team members of the Purchasing Office who
                                    work tirelessly to achieve our goals.</p>


                                <div class="container text-center mx-auto">
                                    <div class="row">
                                        <div class="col">
                                            <a href="https://www.facebook.com/richard.sicat.7"><img
                                                    class="w-50 mx-auto rounded-circle"
                                                    src="https://scontent.fcrk2-1.fna.fbcdn.net/v/t39.30808-1/330465577_725451129260376_192054654323751249_n.jpg?stp=cp6_dst-jpg_p200x200&_nc_cat=102&ccb=1-7&_nc_sid=fe8171&_nc_ohc=9WSZ_CTn7c4AX-FlJfh&_nc_ht=scontent.fcrk2-1.fna&oh=00_AfBz0YI2G30doD1M7eGDlFlu-HQJzn1CjYKX_rs41Lrw1w&oe=650ED83F"
                                                    alt=""></a>
                                            <li class="list-unstyled">Richard Sicat</li>
                                            <li class="list-unstyled"><strong>Purchasing Officer</strong></li>
                                        </div>

                                        <div class="col">
                                            <img class="w-50 mx-auto rounded-circle"
                                                src="https://t4.ftcdn.net/jpg/02/70/22/85/360_F_270228529_iDayZ2Dl4ZeDClKl7ZnLgzN5HRIvlGlK.jpg"
                                                alt="">
                                            <li class="list-unstyled">Member 2</li>
                                            <li class="list-unstyled"><strong>Staff</strong></li>
                                        </div>


                                        <div class="col">
                                            <img class="w-50 mx-auto rounded-circle"
                                                src="https://t4.ftcdn.net/jpg/02/70/22/85/360_F_270228529_iDayZ2Dl4ZeDClKl7ZnLgzN5HRIvlGlK.jpg"
                                                alt="">
                                            <li class="list-unstyled">Member 3</li>
                                            <li class="list-unstyled"><strong>Staff</strong></li>
                                        </div>
                                    </div>
                                </div>

                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<!-- Footer -->
<footer class="text-center mt-5">
    <div class="container">
        <div class="row">
            <!-- Social Links -->
            <div class="col-md-4">
                <h4>Follow Us</h4>
                <ul class="list-unstyled">
                    <li><a href=""><i class="fab fa-facebook"></i> Facebook</a></li>
                    <li><a href=""><i class="fab fa-twitter"></i> Twitter</a></li>
                    <li><a href=""><i class="fab fa-instagram"></i> Instagram</a></li>
                </ul>
            </div>
            <!-- Phone Number -->
            <div class="col-md-4">
                <h4>Contact Us</h4>
                <p><i class="fas fa-phone"></i> Phone: (045) 900 4473</p>
            </div>
            <!-- Address -->
            <div class="col-md-4">
                <h4>Address</h4>
                <p><i class="fas fa-map-marker"></i> XJ8M+VXP<br>Rep. Eligio Lagman St, Sta. Filomena Rd<br>Guagua, Pampanga</p>
            </div>
        </div>
    </div>
</footer>
</html>