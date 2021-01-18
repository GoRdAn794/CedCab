<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
</head>

<body>
    <h1>Verify Email</h1><br>
    <form method="post">
        User Name:<input type="text" placeholder="Input Your Name" required><br><br>
        Email: <input type="email" placeholder="@" name="email" required><br><br>
        <!-- Password: <input type="text" placeholder="Enter your Password" name="pwd" required><br><br> -->
        <button class="btn btn-primary" type="submit" name="validate">Send OTP</button><br><br>
    </form>
    <form  method="post">
        <button class="btn btn-primary" type="submit" name="submit">Verify OTP</button>
         <input type="number" placeholder="Enter OTP" name="valid">
         <h5 style="text-align: center;">Already a User <a href="login.php">Click Here</a></h5>
    </form>
</body>

</html>
<?php

//    require "class.phpmailer.php";
session_start();
// echo $_SESSION['cabtype'];
$digits = 4;
$code = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
// echo $code;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if (isset($_POST['validate'])) {
    $em = $_POST['email'];
    // $pass = $_POST['pwd'];
    
    require 'vendor/autoload.php';

    $mail = new PHPMailer(true);

    try {
        // $mail->SMTPDebug = 2;                                        
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com;';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'vaibhav10054@gmail.com';
        $mail->Password   = 'flashgordan@10054';
        $mail->Body    = $code;
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('vaibhav10054@gmail.com', 'Vaibhav');
        $mail->addAddress("$em");
        // $mail->addAddress('receiver2@gfg.com', 'Name'); 

        $mail->isHTML(true);
        $mail->Subject = 'Regarding  Email Verification';

        $mail->AltBody = 'Body in plain text for non-HTML mail clients';
        $mail->send();
        echo "Mail has been sent successfully!";
       
        $_SESSION['OTP'] = $code;
        echo $_SESSION['OTP'];
        // $_SESSION['OTP2']=$_POST['valid'];
        if (isset($_SESSION['OTP'])) {
            $_SESSION['logintime'] = time();
        }
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if (isset($_POST['submit'])) {
    // // $x=$_POST['valid'];
    // echo $x;
    // echo $_SESSION['logintime'];
    if ((time() - $_SESSION['logintime']) > 10000) {
        session_unset();
        session_destroy();
        echo "Session Destroy";
    } else if ($_POST['valid'] == $_SESSION['OTP'])
         {
            echo "OTP Varified";
            header('location:Mobile.php');
            // echo("<script>location.href='mobile.php;</script>");
            // echo $_POST['valid'];
        } else {
            echo "Enter Correct OTP";
            session_unset();
            session_destroy();
            
        }
    }
?>