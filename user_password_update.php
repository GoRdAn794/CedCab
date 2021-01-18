<?php include 'header.php';
session_start();
// echo "hello<br>";
$uid = $_SESSION['userid'];
$servername = "localhost";
$username = "root";
$password = "";
$database = "CedCab";
$con = mysqli_connect($servername, $username, $password, $database);
$sql = "SELECT* from  tbl_user";
$r1 = mysqli_query($con, $sql);
$r2 = mysqli_num_rows($r1);
while ($r3 = $r1->fetch_assoc()) {
    // echo $r3['user_id'];
    if ($uid == $r3['user_id']) {
        $upass = $r3['password'];
    }
}
if (isset($_POST['submit'])) {
    if (($upass == $_POST['oldpass']) && ($_POST['newpass'] == $_POST['confpass'])) {
        $npass = $_POST['confpass'];
        $sql = "UPDATE tbl_user SET `password`='$npass' WHERE `user_id`='$uid' ";

        if ($con->query($sql) === TRUE) {
            echo "Password updated successfully";
        } else {
            echo "Error updating record: " . $con->error;
        }
    } else
if ($upass!= $_POST['oldpass']) {
        echo "Old Password Didn't Matched";
    } else
if ($_POST['newpass']!= $_POST['confpass']) {
        echo "New Password Didn't matched Correctly";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Password Update</title>
</head>

<body>
    <h3 style="text-align: center;text-decoration:underline">Update Password</h3>
    <form id="form1" method="post">
        <div class="form-group w-50">
            Enter Old Password<input type="password" name="oldpass" class="form-control" placeholder="Enter Old Password" required>
        </div>
        <div class="form-group w-50">
            Enter New Password<input type="text" name="newpass" class="form-control" aria-describedby="emailHelp" placeholder="Enter New Password " required>
        </div>
        <div class="form-group w-50">
            Confirm Password<input type="text" name="confpass" name="mob" class="form-control" aria-describedby="emailHelp" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>


</body>

</html>