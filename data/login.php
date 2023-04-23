<?php include 'init.php'; ?>
<?php include 'DB_connection.php'; ?>
<?php include 'functions.php'; ?>

<?php

if (isset($_POST["donar_login"])) {
  echo "ok";
  $user = $_POST["name"];
  $f = $_POST["password"];

  $sql = "SELECT * FROM donar WHERE user_user_name='$user' && user_password='$f'";
  $result = mysqli_query($connect, $sql);
  $num = mysqli_num_rows($result);


  if ($num == 1) {
    while ($row = $result->fetch_assoc()) {
      $type = $row['user_type'];
      if ($type == 'Donar') {
        // Set session variable
        $_SESSION['loggedUser'] = $user;
        $_SESSION['loggedUserType'] = $type;
        writeSessionData($user, $type);
        header("location:../appoinment.php");
        exit();
      }
    }
  } else {
    header("location:../login.php");
    exit();
  }

  $connect->close();
} else {
  echo "not submit";
}




if (isset($_POST["doctor_login"])) {
  echo "ok";
  $user = $_POST["name"];
  $f = $_POST["password"];


  $sql = "SELECT * FROM doctor WHERE user_name='$user' && user_password='$f'";
  $result = mysqli_query($connect, $sql);
  $num = mysqli_num_rows($result);


  if ($num == 1) {
    while ($row = $result->fetch_assoc()) {
      $type = $row['user_type'];

      if ($type == 'Doctor') {
        $_SESSION['loggedUser'] = $user;
        $_SESSION['loggedUserType'] = $type;
        writeSessionData($user, $type);
        header("location:../doctor-admin.php");
        exit();
      } else {
        echo "Doctor not found";
      }
    }
  } else {
    header("location:../doctor-login.php");
    exit();
  }

  $connect->close();
} else {
  echo "not submit";
}





?>