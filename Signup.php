<?php session_start(); ?>
<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        h1 {
            color: black;
            text-decoration: underline;

        }

        #for {
            margin-top: 5%;
        }
    </style>
</head>

<body>
    <h1>Sign UP</h1>
    <form id="for2" method="post">
        <div class="form-group w-50">
            Name<input type="text" name="user" class="form-control" placeholder="Enter Name" required>
        </div>
        <div class="form-group w-50">
            Email_ID<input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" required>
        </div>
        <div class="form-group w-50">
            Mobile no.<input type="number" name="mob" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" required>
        </div>
        <div class="form-group w-50">
            Password<input type="password" name="pass" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" required>
        </div>
        <button type="submit" class="btn btn-primary" name="login">Submit</button>
    </form>
    </div>
    </div>
    </div>
    <h5 style="text-align: center;">Already a User <a href="login.php">Click Here</a></h5>
</body>

</html>



<?php
// init_Set("db2.php".Max_Time(200s));
$servername = "localhost";
$username = "root";
$password = "";
$database="CedCab";

$con = mysqli_connect($servername, $username, $password,$database);
if(isset($_POST['login']))
{
$name=$_POST['user'];
$em=$_POST['email'];
$mobile=$_POST['mob'];
$password=$_POST['pass'];


 $sql = "INSERT INTO  tbl_user (email_id,name,mobile,status,password,is_admin) values('$em','$name','$mobile','0','$password','0')";
 if(mysqli_query($con, $sql))
 {
     echo "Success";
 }
else{
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}
}
?>

