<?php



function checkFreeChannel() {
    include 'DB_connection.php'; 
    $free = 0;
    $user = readSessionData();
    echo "<script>alert('You have' . $user[1]')</script>";

    $sql = "SELECT * FROM donar WHERE user_user_name='$user[0]';";
    $result = $connect->query($sql);
    $out = '';

    if ($result == true) {
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            echo $row[0]['idnumber'];
            $userID = $row[0]['idnumber'];

            $sql = "SELECT * FROM donar_status 
                WHERE donar= '$userID'; ";
            $result = $connect->query($sql);
            $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

            $free = $row[0]['free_left'];
            updateFreeAttempts($free, $userID);
        }
    }	
    else {
        echo "Donar not found in system!";    
    }

    

    $connect->close();
    return $free;
}

function updateFreeAttempts($atmpts, $userID) {
    include 'DB_connection.php';

    $atmpts = $atmpts - 1;
    $sql = "UPDATE donar_status SET free_left='$atmpts' WHERE donar='$userID'";
    

    if ($connect->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $connect->error;
    }

    $connect->close();
}

function insertAppointment($n, $e) {
    include 'DB_connection.php';

    $name = mysqli_real_escape_string($connect, $n);
    $email = mysqli_real_escape_string($connect, $e);
    $number = $_POST['number'];
    $date = $_POST['date'];

    $insert = mysqli_query($connect, "INSERT INTO `contact_form`(name, email, number, date) VALUES('$name','$email','$number','$date')") or die('query failed');

    if($insert){
        echo 'appointment made successfully!';
        $url = './thankyou.php';
        header("Location: $url");
    }else{
        echo 'appointment failed';
    }
}

function writeSessionData($user, $type) {
    $myfile = fopen("session.txt", "w") or die("Unable to open file!");
    fwrite($myfile, $user . "\n");
    fwrite($myfile, $type . "\n");
    fclose($myfile);
}

function readSessionData() {
    $lines = file('session.txt', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
    return $lines;
}



function fetch_data() {
    include 'DB_connection.php';

    if (empty($connect)) {
        $msg = "Database connection error";
    }  else {
        $query = "SELECT idnumber,user_name,gender,user_email,user_phone,user_address,user_user_name,user_birthday,user_type,health,free_left
        FROM donar JOIN donar_status ON donar.idnumber = donar_status.donar ORDER BY idnumber DESC;";
        $result = $connect->query($query);
        if ($result == true) {
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $msg = $row;
            } else {
                $msg = "No Data Found";
            }
        } else {
            $msg = mysqli_error($connect);
        }
    }
    return $msg;
}
?>