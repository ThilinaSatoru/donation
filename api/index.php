<?php
session_start();


$_SESSION['loggedUser'] = isset($_SESSION['loggedUser']) ? $_SESSION['loggedUser'] : 'null';
echo $_SESSION['loggedUser']; 

    // header("Content-Type:application/json");
    // header("Access-Control-Allow-Origin: *");

    // if(!empty($_GET['name']))
    // {
    //     $name=$_GET['name'];
    //     $price = get_price($name);
        
    //     if(empty($price))
    //     {
    //         response(200,"Product Not Found",NULL);
    //     }
    //     else
    //     {
    //         response(200,"Product Found",$price);
    //     }
        
    // }
    // else
    // {
    //     response(400,"Invalid Request",NULL);
    // }

    // function response($status,$status_message,$data)
    // {
    //     header("HTTP/1.1 ".$status);
        
    //     $response['status']=$status;
    //     $response['status_message']=$status_message;
    //     $response['data']=$data;
        
    //     $json_response = json_encode($response);
    //     echo $json_response;
    // }