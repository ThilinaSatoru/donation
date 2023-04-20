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
      header("location:../register.php"); 
      exit();
    }
    else {
      header("location:../login.php");
      exit();
    }

    $con->close();
  }

?>