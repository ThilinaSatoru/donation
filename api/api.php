<?php include '../data/DB_connection.php'; ?>
<?php 
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Authorization, Content-Type');
    header('Access-Control-Expose-Headers: Authorization, Content-Type');
    header('Access-Control-Allow-Credentials: true');

    // Include the session ID in the response headers
    header('X-Session-Id: ' . session_id());
    session_start();

    // Check if the request is a POST request
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the JSON data from the request body
    $json_data = file_get_contents('php://input');

    // Decode the JSON data into a PHP associative array
    $data = json_decode($json_data, true);

    // Check if the JSON data was decoded successfully
    if (json_last_error() === JSON_ERROR_NONE) {
        // Do something with the data
        // For example, you can access a value like this:
        $id = $data['responseId'];
        
        if(!empty($id)) {
            echo $id;
            echo '</br>';
            checkFreeChannel();
        }
        
    } else {
        // Handle the error
        http_response_code(400); // Bad Request
        echo json_encode(array('error' => 'Invalid JSON data'));
    }
    } else {
        http_response_code(405); // Method Not Allowed
        echo json_encode(array('error' => 'Invalid request method'));
    }


    



    function checkFreeChannel() {
        $connect = new mysqli("localhost", "root", "", "users");

        if ($connect -> connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        $_SESSION['loggedUser'] = isset($_SESSION['loggedUser']) ? $_SESSION['loggedUser'] : null;
        echo $_SESSION['loggedUser'];

        $sql = "SELECT * FROM register_users_detail WHERE user_user_name='root'";
        $result = $connect->query($sql);

        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
                echo $row['user_name'];
                updateFreeAttempts($row['free_left']);
            }
            
        }	
        else {
            echo 'You free attempts are over !';
            exit();
        }

        $connect->close();
    }

    function updateFreeAttempts($atmpts) {
        $connect = new mysqli("localhost", "root", "", "users");

        if ($connect -> connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        $atmpts = $atmpts - 1;
        $sql = "UPDATE register_users_detail SET free_left='$atmpts' WHERE user_user_name='root'";
        

        if ($connect->query($sql) === TRUE) {
            echo "Record updated successfully";

            $url = '../index.php';
            header("Location: $url");

        } else {
            echo "Error updating record: " . $connect->error;
        }

        $connect->close();
    }
?>