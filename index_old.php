<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="w-100 justify-content-center d-flex mt-5">
        <!-- <form method="POST" action="actions.php"> -->
        <div class="container">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="userFirst" id="userFirst" class="form-control">
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="userLast" id="userLast" class="form-control">
            </div>
            <input type="submit" value="Save" name="save" id="submit" class="btn btn-primary m-2">
        <!-- </form> -->
        </div>
    </div>
</body>
<script>
    document.getElementById("submit").addEventListener("click", function(){
        user1 = document.getElementById("userFirst").value;
        user2 = document.getElementById("userLast").value;

        console.log(user1, user2); // print


        if(user1.length == 0 || user2.length == 0){
            alert("please fill the form");
            return 0;
        }


        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", `actions.php?save=1&userFirst=${user1}&userLast=${user2}`, true);
        xhttp.send();
    });

</script>
</html>