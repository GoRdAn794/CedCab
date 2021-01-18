<?php
session_start();
$value=$_POST['valid'];
echo $value;
if($value==$_SESSION['otp'])
{
    echo "OTP VERIFIED";
    header('location:Signup.php');

}
else{
    echo "ENTER CORRECT OTP";
}



?>