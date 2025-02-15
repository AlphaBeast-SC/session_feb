<?php
// if(isset($_GET["save"])){
//     $data = []; // empty array
//     // feed array value
//     $data["userFirst"] = $_GET["userFirst"];
//     $data["userLast"] = $_GET["userLast"];

//     // store json data
//     $fileName = "data.json";
//     if(file_exists($fileName)){ // file is exist or not
//         $readedData = file_get_contents($fileName); // error file not exist
//         $Array_Data = json_decode($readedData, true); // string to array convert
//     }else{
//         $Array_Data = [];
//     }
//     array_push($Array_Data, $data); 

//     file_put_contents($fileName,json_encode($Array_Data)); // write
//     echo json_encode($Array_Data); // array to string
// }


if(isset($_GET["save"])){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db       = "session";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
}
?>