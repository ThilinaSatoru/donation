
<!-- header section starts  -->

    <header class="header fixed-top">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <nav class="nav">
            <a href="index.php">home</a>
            <a href="aboutus.php">about us</a>
            <a href="contact.php">Contact</a>
            <a href="login.php">be donor</a>
          
            <?php
            if(isLoggedIn()) {
              echo "<a href='chatbot.php'>CHAT</a>";
              echo "<h4>". $_SESSION['loggedUser'] ."</h4>";
            } 
            ?>
            <?php
            if(isLoggedIn()) { 
              echo "<a href='data/logout.php'>Logout</a>";
            }
            ?>

            <a href="api/api.php">API</a>
            
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