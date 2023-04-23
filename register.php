<?php include 'data/init.php'; ?>
<?php include 'DB_connection.php'; ?>
<?php

  if($_POST["add"] == "Submit")
  {
    $a=$_POST["Name"];
    $b=$_POST["Address"];
    $d=$_POST["Telephone"];
    $c=$_POST["Email"];
    $e=$_POST["User_Name"];
    $f=$_POST["Password"];
    $g=$_POST["userstype"];
    $h=$_POST["Gender"];
    $i=$_POST["Date_of_birth"];

    $sql = "INSERT INTO register_users_detail ( user_name, user_address, user_phone, user_email, user_user_name, user_password,user_type,gender,user_birthday) VALUES ( '$a', '$b', '$d', '$c', '$e', '$f', '$g', '$h', '$i')";

    if(!mysqli_query($connect, $sql)) {
      header("location:register.php"); 
      exit();
    }
    else {
      header("location:login.php");
      exit();
    }

    $con->close();
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap");

      /* Full-width inputs */
      input[type="text"],
      input[type="email"],
      input[type="number"],
      input[type="password"] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
      }

      /* Set a style for all buttons */
      button {
        background-color: #00b8b8;
        color: white;
        font-size: 20px;
        margin-bottom: 10%;
        padding: 14px 20px;
        margin: 8px 10px;
        border: none;
        cursor: pointer;
        width: 100%;
      }

      /* Add a hover effect for buttons */
      button:hover {
        opacity: 0.8;
      }

      .Select-box {
        border: none;
        appearance: none;
        padding: 0 30px 0 15px;
        width: 100%;
        color: rgb(14, 13, 13);
        background-color: #f3f3f3;
        font-size: 18px;
      }

      /* The "Forgot password" text */
      span.psw {
        float: right;
        padding-top: 16px;
      }

      /* Change styles for span and cancel button on extra small screens */
      @media screen and (max-width: 300px) {
        span.psw {
          display: block;
          float: none;
        }
      }

      :root {
        --blue: #00b8b8;
        --black: #333;
        --white: #fff;
        --light-color: #666;
        --light-bg: #eee;
        --border: 0.2rem solid rgba(0, 0, 0, 0.1);
        --box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
      }

      * {
        font-family: "Poppins", sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        outline: none;
        border: none;
        text-decoration: none !important;
      }

      *::-webkit-scrollbar {
        height: 0.5rem;
        width: 1rem;
      }

      *::-webkit-scrollbar-track {
        background-color: transparent;
      }

      *::-webkit-scrollbar-thumb {
        background-color: var(--blue);
      }

      html {
        font-size: 62.5%;
        overflow-x: hidden;
        scroll-behavior: smooth;
        scroll-padding-top: 6.5rem;
      }

      section {
        padding: 7rem 2rem;
      }

      .heading {
        text-align: center;
        font-size: 4rem;
        color: var(--black);
        text-transform: uppercase;
        font-weight: bolder;
        margin-bottom: 3rem;
      }

      .link-btn {
        display: inline-block;
        padding: 1rem 3rem;
        border-radius: 0.5rem;
        background-color: var(--blue);
        cursor: pointer;
        font-size: 1.7rem;
        color: var(--white);
      }

      .link-btn:hover {
        background-color: var(--black);
        color: var(--white);
      }

      .header {
        padding: 2rem;
        border-bottom: var(--border);
        background-color: var(--blue);
      }

      .header.active {
        background-color: var(--white);
        box-shadow: var(--box-shadow);
        border: 0;
      }

      label {
        font-size: 20px;
      }

      .header .logo {
        font-size: 2rem;
        color: var(--black);
      }

      .header .logo span {
        color: var(--blue);
      }

      .header .nav a {
        margin: 0 1rem;
        font-size: 1.7rem;
        color: var(--black);
      }

      .header .nav a:hover {
        color: var(--white);
      }

      #menu-btn {
        font-size: 2.5rem;
        color: var(--black);
        cursor: pointer;
        display: none;
      }

      .home {
        background: url(images/background.jpg) no-repeat;
        background-size: cover;
        background-position: center;
      }

      .home .content {
        width: 55rem;
        padding: 2rem;
      }

      .home .content h3 {
        font-size: 6rem;
        text-transform: uppercase;
        color: var(--black);
      }

      .home .content p {
        line-height: 2;
        font-size: 1.5rem;
        color: var(--light-color);
        padding: 1rem 0;
      }

      .about .row {
        min-height: 50vh;
      }

      .about .content span {
        font-size: 2rem;
        color: var(--blue);
      }

      .about .content h3 {
        font-size: 3rem;
        color: var(--black);
        margin-top: 1rem;
      }

      .about .content p {
        padding: 1rem 0;
        font-size: 1.4rem;
        color: var(--light-color);
        line-height: 2;
      }

      .services {
        background-color: var(--light-bg);
      }

      .services .box-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(30rem, 1fr));
        gap: 2rem;
      }

      .services .box-container .box {
        text-align: center;
        padding: 2rem;
        background-color: var(--white);
        box-shadow: var(--box-shadow);
        border-radius: 0.5rem;
      }

      .services .box-container .box img {
        margin: 1rem 0;
        height: 40rem;
      }

      .services .box-container .box h3 {
        font-size: 2rem;
        padding: 1rem 0;
        color: var(--black);
      }

      .services .box-container .box p {
        font-size: 1.5rem;
        color: var(--light-color);
        line-height: 2;
      }

      .process .box-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(3rem, 1fr));
        gap: 1rem;
      }

      .process .box-container .box {
        padding: 0rem;
        margin-left: 10rem;
      }

      .process .box-container .box h3 {
        font-size: 2rem;
        color: var(--white);
      }

      .process .box-container .box p {
        font-size: 1.5rem;
        color: var(--white);
        line-height: 2;
      }

      .footer {
        background-color: var(--light-bg);
      }

      .footer .box-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(25rem, 1fr));
        gap: 3rem;
      }

      .footer .box-container .box {
        text-align: center;
      }

      .footer .box-container .box i {
        height: 5rem;
        width: 5rem;
        border-radius: 50%;
        line-height: 5rem;
        font-size: 2rem;
        background-color: var(--blue);
        color: var(--white);
      }

      .footer .box-container .box h3 {
        font-size: 2rem;
        margin: 2rem 0;
        color: var(--black);
      }

      .footer .box-container .box p {
        font-size: 1.5rem;
        color: var(--light-color);
        text-transform: none;
      }

      .footer .credit {
        text-align: center;
        border-top: var(--border);
        padding-top: 2rem;
        margin-top: 2rem;
        font-size: 2rem;
        color: var(--light-color);
      }

      .footer .credit span {
        color: var(--blue);
      }

      /* media queries  */

      @media (max-width: 991px) {
        html {
          font-size: 55%;
        }

        .header .link-btn {
          display: none;
        }

        section {
          padding: 5rem 2rem;
        }
      }

      @media (max-width: 768px) {
        section {
          padding: 3rem 1rem;
        }

        #menu-btn {
          display: inline-block;
          transition: 0.2s linear;
        }

        #menu-btn.fa-times {
          transform: rotate(180deg);
        }

        .header .nav {
          position: absolute;
          top: 99%;
          left: 0;
          right: 0;
          background-color: var(--white);
          border-top: var(--border);
          border-bottom: var(--border);
          padding: 1rem 0;
          text-align: center;
          flex-flow: column;
          clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
          transition: 0.2s linear;
        }

        .header .nav.active {
          clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
        }

        .header .nav a {
          margin: 1rem 0;
          font-size: 2rem;
        }

        .home {
          background-position: left;
        }

        .home .content {
          width: auto;
        }
      }

      @media (max-width: 450px) {
        html {
          font-size: 50%;
        }

        .home .content h3 {
          font-size: 4rem;
        }

        .heading {
          font-size: 3rem;
        }
      }
    </style>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>doctor channeling for donors</title>

    <!-- font awesome cdn link for my site -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />

    <!-- bootstrap cdn link for my site  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css"
    />
  </head>
  <body>

    <!-- header section starts  -->
    <?php include 'header.php' ?>
    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">
      <div class="container">
        <div class="row min-vh-100 align-items-center">
          <div class="content text-center text-md-left">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
              <h1>Register Here</h1>

              <form>
                <label for="name">Name</label><br />
                <input
                  type="text"
                  id="Name"
                  name="Name"
                  placeholder="user Name.."
                  required
                /><br /><br />

                <label for="name">Address</label><br />
                <input
                  type="text"
                  id="Address"
                  name="Address"
                  placeholder="user Address..."
                  required
                /><br /><br />

                <label for="email">Email</label><br />
                <input
                  type="email"
                  id="Email"
                  name="Email"
                  placeholder="user Email.."
                  required
                /><br /><br />

                <label for="telephone">Telphone Number</label><br />
                <input
                  type="number"
                  id="Telephone"
                  name="Telephone"
                  placeholder="user Telphone.."
                  required
                /><br /><br />

                <label for="user_name">User Name</label><br />
                <input
                  type="text"
                  id="User_Name"
                  name="User_Name"
                  placeholder="user  name.."
                  required
                /><br /><br />

                <label for="Password"> Password</label><br />
                <input
                  type="Password"
                  id="Password"
                  name="Password"
                  placeholder="user password.."
                  required
                /><br /><br />

                <div class="dropdown">
                  <label for="userstype">User Type:</label>
                  <select class="Select-box" name="userstype" id="userstype">
                    <option value="User">User</option>
                    <option value="Donar">Donar</option>
                  </select>
                </div>

                <br /><br />

                <div class="dropdown">
                  <label for="userstype">Gender:</label>
                  <select class="Select-box" name="Gender" id="Gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
                <br /><br />

                <label for="Date_of_birth">Date of birth</label><br />
                <input
                  type="text"
                  id="Date_of_birth"
                  name="Date_of_birth"
                  placeholder="user birthday.."
                  required
                /><br /><br />

                <button type="submit" value="Submit" name="add">
                  Register
                </button>
              </form>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- footer section -->
    <?php include 'footer.php' ?>
  </body>
</html>
