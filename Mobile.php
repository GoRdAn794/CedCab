<?php include 'header.php' ?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Verification</title>
    <style>
        #di
        {
            font-size: 40px;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Mobile Verification</h1><br>
    <form id="for" action="login.php" method="post">
        <!-- Name:<input type="text" placeholder="Input Your Name"><br><br> -->
        Phone No.<input type="number" placeholder="Input your Number" name="mobile"><br><br>
        <!-- Message: <input type="text" name="message" id="ms"><br><br> -->
        <button class="btn btn-primary" type="submit" name="validate">Send OTP</button><br><br>
    </form>
    <form method="post" id="for1">
        <a href="login.php"><button class="btn btn-primary" type="submit" name="submit">Verify OTP</button></a>
        <input type="number" placeholder="Enter OTP" name="valid">
    </form>
    <p id="di">

    </p>
</body>
<script>
    $(document).ready(function() {
        $('#for').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: 'verify.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    header("location: login.php");

                    // console.log(data);
                }

            });
        })
        $('#for1').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: 'verified.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    header("location: login.php");

                    // document.getElementById("ms").innerHTML=data;
                }

            });
        })

    })
</script>

</html>