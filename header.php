<head>
    <style>
    .left-corner {
        color: white;
        margin-left: 32em;
    }

    .left-corner * {
        text-transform: uppercase;
    }
    </style>
</head>

<!-- header section starts  -->

<header class="header fixed-top">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <nav class="nav">
                <a href="index.php">home</a>
                <a href="aboutus.php">about us</a>
                <a href="contact.php">Contact</a>
                <a href="doctors.php">Our Doctors</a>
                <?php
              if(isLoggedIn()) {
                echo "<a href='appoinment.php'>Donate</a>";
                echo "<a href='doctor-admin.php'>Doctor Admin</a>";
                echo "<a href='data/logout.php'>Logout</a>";
              } else {
                echo "<a href='login.php'>Be a Donor</a>";
                echo "<a href='doctor-login.php'>Be a Doctor</a>";
              }
            ?>
                <div class="left-corner nav">
                    <?php if(isLoggedIn()) { echo "<h4>DONOR : ". $_SESSION['loggedUser'] ."</h4>";}?>
                </div>
            </nav>

            <div id="menu-btn" class="fas fa-bars"></div>
        </div>
    </div>
</header>

<!-- header section ends -->



<?php

function isLoggedIn()
  {
    if (isset($_SESSION['loggedUser'])) {
      return true;
    }else{
      return false;
    } 
  }



?>