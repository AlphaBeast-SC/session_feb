<?php
if(isset($_GET["firstname"]) && isset($_GET["lastname"])){
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
    //echo "Connected successfully"; 

    $first = $_GET["firstname"];
    $last = $_GET["lastname"];
    $result = mysqli_query($conn, "INSERT INTO tbl_user(firstname, lastname) VALUES ('$first', '$last')");

    // view
    $result = mysqli_query($conn, "SELECT * FROM tbl_user");
    // Fetch all
    $resultAll = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // print_r($resultAll); // Array

    echo json_encode($resultAll); // JSON
}
?>