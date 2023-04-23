<?php



function checkFreeChannel() {
    include 'DB_connection.php'; 
    $free = 0;

    $_SESSION['loggedUser'] = isset($_SESSION['loggedUser']) ? $_SESSION['loggedUser'] : null;
    echo $_SESSION['loggedUser'];
    $user = readSessionData();

    $sql = "SELECT * FROM donar WHERE user_user_name='$user[0]'";
    $result = $connect->query($sql);

    if ($result -> num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $free = $row['free_left'];
            echo "<script>alert('You have' . $free . 'free attempts')</script>";
            // updateFreeAttempts($free);
        }
    }	
    else {
        echo "Donar not found in system!";    
    }

    $connect->close();
    return $free;
}

function updateFreeAttempts($atmpts) {
    include 'DB_connection.php';
    $user = readSessionData();

    $atmpts = $atmpts - 1;
    $sql = "UPDATE donar SET free_left='$atmpts' WHERE user_user_name='$user[0]'";
    

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

function writeSessionData($user, $type)
{
    $myfile = fopen("session.txt", "w") or die("Unable to open file!");
    fwrite($myfile, $user . "\n");
    fwrite($myfile, $type . "\n");
    fclose($myfile);
}

function readSessionData()
{
    $lines = file('session.txt', FILE_SKIP_EMPTY_LINES | FILE_IGNORE_NEW_LINES);
    return $lines;
}