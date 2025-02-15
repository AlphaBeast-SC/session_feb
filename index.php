<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <form method="GET" action="action.php"> -->
    <div>
        <div>
            <label>First Name</label>
            <input type="text" name="firstname" id="first">
        </div>
        <div>
            <label>Last Name</label>
            <input type="text" name="lastname" id="last">
        </div>
        <input type="submit" value="save" name="action" id="action">
    <!-- </form> -->
    </div>
    <script>
        function clickEvent(){
            let first = document.querySelector("#first").value;
            let last = document.querySelector("#last").value;
            // location.href = `http://localhost:8888/action.php?firstname=&lastname=`;


            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", `action.php?firstname=${first}&lastname=${last}`, true);
            xhttp.send();
        }   
        document.querySelector("#action").addEventListener("click", clickEvent);
    </script>
</body>
</html>