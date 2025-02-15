<?php

// MYSQL CONNECTION
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

// INSERT COND
if(isset($_POST["insert"])){
    $first = $_POST["firstname"];
    $last = $_POST["lastname"];
    $result = mysqli_query($conn, "INSERT INTO tbl_user(firstname, lastname) VALUES ('$first', '$last')");
    // if($result){
    //     echo "Saved Done!!!!";
    // }
}

// UPDATE COND
if(isset($_POST["update"])){
    $first = $_POST["firstname"];
    $last = $_POST["lastname"];
    $id = $_POST["id"]; // hidden
    $result = mysqli_query($conn, "UPDATE tbl_user SET firstname = '$first', lastname='$last' WHERE id='$id'");
    header("Location:./index.php");
}

// Delete
if(isset($_GET["delete"])){
    $query = "DELETE FROM tbl_user WHERE id =".$_GET['delete'];
    $result = mysqli_query($conn, $query);
    header("Location:./index.php");
}

// Delete
if(isset($_GET["edit"])){
    $query = "SELECT * FROM tbl_user WHERE id =".$_GET['edit'];
    $result = mysqli_query($conn, $query);
    $resultData = mysqli_fetch_assoc($result);
    // print_r($resultData);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM</title>
</head>
<body>
    <form action="" method="POST">
        <!-- check first name  -->
        <?php
            $first = isset($resultData) ? $resultData["firstname"] : "";
            $last = isset($resultData) ? $resultData["lastname"] : "";
            $button = isset($resultData) ? "update" : "insert";
            $value  = isset($resultData) ? $resultData["id"] : 0;
        ?>
        <input type="hidden" name="id" value="<?php echo $value; ?>">
        <input type="text" name="firstname" value="<?php echo $first; ?>" placeholder="Enter First Name">
        <input type="text" name="lastname" value="<?php echo $last; ?>" placeholder="Enter Second Name">
        <input type="submit" name="<?php echo $button; ?>" value="<?php echo $button; ?>">
    </form>
    <hr>
    <table>
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>action</th>
            <tr>
        </thead>
        <tbody>

            <!-- query -->
             <!-- loop and data display -->
            <?php
                $result = mysqli_query($conn, "SELECT * FROM tbl_user"); // exec
                $resultAll = mysqli_fetch_all($result, MYSQLI_ASSOC); // fetch

                //print_r($resultAll);
                // echo json_encode($resultAll);

                foreach($resultAll as $value){
                    $id        = $value["id"];
                    $firstName = $value["firstname"];
                    $lastName  = $value["lastname"];
                    echo "
                        <tr>
                            <td>$firstName</td>
                            <td>$lastName</td>
                            <td>
                                <a href='?edit=$id'>Edit</a>
                                <a href='?delete=$id'>Delete</a>
                            </td>
                        </tr> ";
                }
            ?>
        </tbody>
    </table>
</body>
</html>