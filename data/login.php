<?php include 'init.php'; ?>
<?php include 'DB_connection.php'; ?>

<?php

  if($_POST["submit"] == "Submit")
  {

    $e=$_POST["name"];
    $f=$_POST["password"];


    $sql = "SELECT * FROM register_users_detail WHERE user_user_name='$e' && user_password='$f'";
    $result = mysqli_query($connect, $sql);
    $num = mysqli_num_rows($result);


    if ($num == 1) {
      // Set session variable
      $_SESSION['loggedUser'] = $e;
      echo $_SESSION['loggedUser'];
      header("location:../appoinment.php");
      exit();
    }	
    else {
      header("location:chatbot.html");
      exit();
    }

    $connect->close();
  }
?>