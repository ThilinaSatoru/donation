<!DOCTYPE html>
<?php include "data/init.php"; ?>
<?php include "header.php"; ?>
<html lang="en">


<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- font awesome cdn link for my site -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

    <!-- bootstrap cdn link for my site  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" />
    <title>Doctors</title>
    <link rel="stylesheet" type="text/css" href="styles/doctors.css">

</head>


<body>
    <!-- ---------------------------------------------------------------------- -->

    <div class="">
        <h1>leaders guided us to the SUCCESS</h1>
    </div>
    <h1>leaders guided us to the SUCCESS</h1>

    <!-- ------------------------------------------------------------------------------ -->

    <div id="container">
        <span onclick="imgHide();" class="closebtn">
            <ion-icon name="close-circle-outline" style="color: red !important;"></ion-icon>
        </span>
        <img id="fullImg">
    </div>



    <section class="back-cards">
        <div class="row-card">
            <div class="clou col-width-25">
                <div class="card">
                    <div class="imgFrame">
                        <img src="images/man2.png">
                    </div>
                    <div class="card-details">
                        <h4>Dermatologist</h4>
                        <p>Dr. Harold Markman</p>
                        <a href="#">Read All ></a>
                    </div>
                </div>
            </div>
            <div class="clou col-width-25">
                <div class="card">
                    <div class="imgFrame">
                        <img src="images/man1.png">
                    </div>
                    <div class="card-details">
                        <h4>Skin Specialist</h4>
                        <p>Dr. George Crypto</p>
                        <a href="#">Read All ></a>
                    </div>
                </div>
            </div>
            <div class="clou col-width-25">
                <div class="card">
                    <div class="imgFrame">
                        <img src="images/man3.png">
                    </div>
                    <div class="card-details">
                        <h4>Eye Surgeon</h4>
                        <p>Dr. Steve Freeman</p>
                        <a href="#">Read All ></a>
                    </div>
                </div>
            </div>
            <div class="clou col-width-25">
                <div class="card">
                    <div class="imgFrame">
                        <img src="images/man4.png">
                    </div>
                    <div class="card-details">
                        <h4>Eye Care Specialist</h4>
                        <p>Dr. James Stevenson</p>
                        <a href="#">Read All ></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="gradient" style="background-position: 0% 50%;">
    </section>

    <!-- ------------------------------------------------------------------------------------->
    <?php include "footer.php"; ?>
    <!-- ------------------------------------------------------------------------------------->


    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>

</body>

</html>