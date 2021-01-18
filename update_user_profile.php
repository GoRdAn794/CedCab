<?php include 'header.php';
session_start();
$tempid=$_SESSION['cid'];
$servername = "localhost";
$username = "root";
$password = "";
$database = "CedCab";
$con = mysqli_connect($servername, $username, $password, $database);
$sql="SELECT* from  tbl_user";
// $update=mysqli_query($con,$sql);
$r1 = mysqli_query($con, $sql);
    $r2 = mysqli_num_rows($r1);
    while($r3 = $r1->fetch_assoc())
    {
    // echo $r3['user_id'];
    if($tempid==$r3['user_id'])
    {
    $uemail=$r3['email_id'];
    $upass=$r3['password'];
    $mobile=$r3['mobile'];
    $name=$r3['name'];
    }
    else{
        // echo "not matched";
    }
}
    
    if(isset($_POST['submit']))
    {
        $n=$_POST['user'];
        $m=$_POST['mob'];
        $p=$_POST['pass'];
        $sql = "UPDATE tbl_user SET `name`='$n',`mobile`='$m',`password`='$p' WHERE `user_id`='$tempid' ";

if ($con->query($sql) === TRUE) {
  echo "Profile updated successfully";
} else {
  echo "Error updating record: " . $con->error;
}

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Update</title>
</head>
<body>
    <h3 style="text-align: center;text-decoration:underline">Update Profile</h3>
<form id="for2" method="post">
        <div class="form-group w-50">
            Name<input type="text" name="user" class="form-control" placeholder="Enter Name" value="<?php echo $name;?>" required>
        </div>
        <div class="form-group w-50">
            Email_ID<input type="email" name="email" class="form-control" aria-describedby="emailHelp" value="<?php echo $uemail;?>" placeholder="Enter email" readonly required>
        </div>
        <div class="form-group w-50">
            Mobile no.<input type="number" value="<?php echo $mobile;?>" name="mob" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" required>
        </div>
        <div class="form-group w-50">
            Password<input type="text" value="<?php echo $upass;?>" name="pass" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary" name="login">Update</button>
    </form>


</body>
</html>
