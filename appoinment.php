<?php include 'data/init.php'; ?>
<?php include 'data/functions.php'; ?>
<?php include 'data/DB_connection.php'; ?>
<?php


if(isset($_POST['submit'])) {

   $free = checkFreeChannel();

   if($free > 0) {
      echo 'Free Appointment.';
      updateFreeAttempts($free);
      insertAppointment($_POST['name'], $_POST['email']);
   } else {
      echo 'Your free Appointments are over!';
      insertAppointment($_POST['name'], $_POST['email']);
   }

   

}

?>
<!DOCTYPE html>
<html lang="en">
<head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

   :root{
      --blue:#00b8b8;
      --black:#333;
      --white:#fff;
      --light-color:#666;
      --light-bg:#eee;
      --border:.2rem solid rgba(0,0,0,.1);
      --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
   }

   *{
      font-family: 'Poppins', sans-serif;
      margin:0; padding:0;
      box-sizing: border-box;
      outline: none; border:none;
      text-decoration: none !important;
      text-transform: capitalize;
   }
   --red
   *::-webkit-scrollbar{
      height: .5rem;
      width: 1rem;
   }

   *::-webkit-scrollbar-track{
      background-color: transparent;
   }

   *::-webkit-scrollbar-thumb{
      background-color: var(--blue);
   }

   html{
      font-size: 62.5%;
      overflow-x: hidden;
      scroll-behavior: smooth;
      scroll-padding-top: 6.5rem;
   }

   section{
      padding:7rem 2rem;
   }

   .heading{
      text-align: center;
      font-size: 4rem;
      color:var(--black);
      text-transform: uppercase;
      font-weight: bolder;
      margin-bottom: 3rem;
   }

   .link-btn{
      display: inline-block;
      padding:1rem 3rem;
      border-radius: .5rem;
      background-color: var(--blue);
      cursor: pointer;
      font-size: 1.7rem;
      color:var(--white);
   }

   .link-btn:hover{
      background-color: var(--black);
      color:var(--white);
   }

   .header{
      padding:2rem;
      border-bottom: var(--border);
      background-color: var(--blue);
   }

   .header.active{
      background-color: var(--white);
      box-shadow: var(--box-shadow);
      border:0;
   }

   .header .logo{
      font-size: 2rem;
      color:var(--black);
   }

   .header .logo span{
      color:var(--blue);
   }

   .header .nav a{
      margin:0 1rem;
      font-size: 1.7rem;
      color:var(--black);
   }

   .header .nav a:hover{
      color:var(--white);
   }

   #menu-btn{
      font-size: 2.5rem;
      color:var(--black);
      cursor: pointer;
      display: none;
   }

   .home{
      background:url(images/background.jpg) no-repeat;
      background-size: cover;
      background-position: center;
   }

   .home .content{
      width: 55rem;
      padding:2rem;
   }

   .home .content h3{
      font-size: 6rem;
      text-transform: uppercase;
      color:var(--black);
   }

   .home .content p{
      line-height: 2;
      font-size: 1.5rem;
      color:var(--light-color);
      padding:1rem 0;
   }

   .about .row{
      min-height: 50vh;
   }

   .about .content span{
      font-size: 2rem;
      color:var(--blue);
   }

   .about .content h3{
      font-size: 3rem;
      color:var(--black);
      margin-top: 1rem;
   }

   .about .content p{
      padding:1rem 0;
      font-size: 1.4rem;
      color:var(--light-color);
      line-height: 2;
   }

   .services{
      background-color: var(--light-bg);
   }

   .services .box-container{
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
      gap:2rem;
   }

   .services .box-container .box{
      text-align: center;
      padding:2rem;
      background-color: var(--white);
      box-shadow: var(--box-shadow);
      border-radius: .5rem;
   }

   .services .box-container .box img{
      margin:1rem 0;
      height: 4rem;
   }

   .services .box-container .box h3{
      font-size: 2rem;
      padding:1rem 0;
      color:var(--black);
   }

   .services .box-container .box p{
      font-size: 1.5rem;
      color:var(--light-color);
      line-height: 2;
   }

   .process .box-container{
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
      gap:2rem;
   }

   .process .box-container .box{
      background-color: var(--blue);
      padding:2rem;
      border-radius: .5rem;
      text-align: center;
      box-shadow: var(--box-shadow);
   }

   .process .box-container .box img{
      height: 20rem;
      margin:1rem 0;
   }

   .process .box-container .box h3{
      font-size: 2rem;
      color:var(--white);
      margin:1.5rem 0;
   }

   .process .box-container .box p{
      font-size: 1.5rem;
      color:var(--white);
      line-height: 2;
   }

   .reviews{
      background-color: var(--light-bg);
   }

   .reviews .box-container{
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
      gap:2rem;
   }

   .reviews .box-container .box{
      background-color: var(--white);
      text-align: center;
      border-radius: .5rem;
      box-shadow: var(--box-shadow);
      padding:2rem;
   }

   .reviews .box-container .box img{
      height: 10rem;
      width: 10rem;
      border-radius: 50%;
   }

   .reviews .box-container .box p{
      padding:2rem 0;
      line-height: 2;
      font-size: 1.5rem;
      color:var(--light-color);
      margin-bottom: 0;
   }

   .reviews .box-container .box .stars{
      padding:.5rem 1.5rem;
      border-radius: .5rem;
      background-color: var(--light-bg);
      margin-bottom: 2rem;
      display: inline-block;
   }

   .reviews .box-container .box .stars i{
      font-size: 1.5rem;
      color:var(--blue);
   }

   .reviews .box-container .box h3{
      font-size: 2rem;
      color:var(--black);
   }

   .reviews .box-container .box span{
      color:var(--light-color);
      font-size: 1.5rem;
   }

   .contact form{
      border-radius: .5rem;
      background-color: var(--light-bg);
      padding:2rem;
      margin:0 auto;
      max-width: 50rem;
   }

   .contact form .message{
      margin-bottom: 2rem;
      border-radius: .5rem;
      background-color: var(--blue);
      padding:1.2rem 1rem;
      font-size: 1.7rem;
      color:var(--white);
      text-align: center;
   }

   .contact form .box{
      width: 100%;
      margin-top: 1rem;
      margin-bottom: 2rem;
      border-radius: .5rem;
      background-color: var(--white);
      padding:1.2rem 1.4rem;
      font-size: 1.7rem;
      color:var(--black);
      text-transform: none;
   }

   .contact form span{
      font-size: 1.7rem;
      color:var(--black);
   }

   .footer{
      background-color: var(--light-bg);
   }

   .footer .box-container{
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
      gap:3rem;
   }

   .footer .box-container .box{
      text-align: center;
   }

   .footer .box-container .box i{
      height: 5rem;
      width: 5rem;
      border-radius: 50%;
      line-height: 5rem;
      font-size: 2rem;
      background-color: var(--blue);
      color:var(--white);
   }

   .footer .box-container .box h3{
      font-size: 2rem;
      margin:2rem 0;
      color:var(--black);
   }

   .footer .box-container .box p{
      font-size: 1.5rem;
      color:var(--light-color);
      text-transform: none;
   }

   .footer .credit{
      text-align: center;
      border-top: var(--border);
      padding-top: 2rem;
      margin-top: 2rem;
      font-size: 2rem;
      color:var(--light-color);
   }

   .footer .credit span{
      color:var(--blue);
   }







   /* media queries  */

   @media (max-width:991px){

      html{
         font-size: 55%;
      }

      .header .link-btn{
         display: none;
      }

      section{
         padding:5rem 2rem;
      }

   }

   @media (max-width:768px){

      section{
         padding:3rem 1rem;
      }

      #menu-btn{
         display: inline-block;
         transition: .2s linear;
      }

      #menu-btn.fa-times{
         transform: rotate(180deg);
      }

      .header .nav{
         position: absolute;
         top:99%; left:0; right:0;
         background-color: var(--white);
         border-top: var(--border);
         border-bottom: var(--border);
         padding:1rem 0;
         text-align: center;
         flex-flow: column;
         clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
         transition: .2s linear;
      }

      .header .nav.active{
         clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
      }

      .header .nav a{
         margin:1rem 0;
         font-size: 2rem;
      }

      .home{
         background-position: left;
      }

      .home .content{
         width: auto;
      }

   }

   @media (max-width:450px){

      html{
         font-size: 50%;
      }

      .home .content h3{
         font-size: 4rem;
      }

      .heading{
         font-size: 3rem;
      }

   }

</style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>doctor channeling for donors</title>

    <!-- font awesome cdn link for my site -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- bootstrap cdn link for my site  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">

</head>

<body>
<!-- header section -->
<?php include 'header.php' ?>

<!-- home section starts  -->

<section class="home" id="home">

    <div class="container">

        <div class="row min-vh-100 align-items-center">
            <div class="content text-center text-md-left">
                <h3>Need Help ?</h3>
                <p>
                    <a href="chatbot.php" class="link-btn">CHAT WITH ME</a>
            </div>
        </div>

    </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-md-6 image">
                <img src="images/doctor-g024485840_1920.jpg" class="w-100 mb-5 mb-md-0" alt="">
            </div>

            <div class="col-md-6 content">
                <span>about us</span>
                <h3>True Healthcare For Your Family</h3>
                <p> We are trusted name of Medical Services <br>
                    who is always at your side and your health is our first priority.<br>
                    24/7 Support
                </p>
                <a href="#contact" class="link-btn">make appointment</a>
            </div>

        </div>

    </div>

</section>

<!-- about section ends -->





<!-- process section starts  -->

<section class="process">

    <h1 class="heading">services</h1>

    <div class="box-container container">

        <div class="box">
            <img src="/images/process-1.png" alt="">
            <h3>Eye disorders or disease</h3>
            <p> If you have any visual difficulties or concerns, you should contact an eye doctor for
                an assessment and accurate diagnosis.</p>
        </div>

        <div class="box">
            <img src="/images/process-2.png" alt="">
            <h3> skin tissue disorders or disease </h3>
            <p>If you see any strange symptoms or changes in your skin,
                get medical assistance right away because early
                identification and treatment can improve outcomes.
            </p>
        </div>



    </div>

</section>

<!-- process section ends -->



<!-- contact section starts  -->

<section class="contact" id="contact">

    <h1 class="heading">make appointment</h1>

    <form action="appoinment.php" method="post">
        <?php
         if(isset($message)){
            foreach($message as $message){
        }
        }
        ?>
        <span>your name :</span>
        <input type="text" name="name" placeholder="enter your name" class="box" required>
        <span>your email :</span>
        <input type="email" name="email" placeholder="enter your email" class="box" required>
        <span>your number :</span>
        <input type="number" name="number" placeholder="enter your number" class="box" required>
        <span>appointment date :</span>
        <input type="datetime-local" name="date" class="box" required>
        <input type="submit" value="make appointment" name="submit" class="link-btn">
    </form>

</section>

<!-- contact section ends -->

<!-- footer section -->
<?php include 'footer.php' ?>

</body>
</html>
