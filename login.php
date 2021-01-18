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
    <h1>Login</h1>
    <form id="for2" method="post">
        <div class="form-group w-50">
            Email_ID<input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" required>
        </div>
        <div class="form-group w-50">
            Password<input type="password" name="pass" class="form-control" placeholder="Enter password" required>
        </div>
        <button type="submit" class="btn btn-primary" name="login">Login IN</button>
    </form>
    </div>
    </div>
    </div>
</body>

</html>
<?php
session_start();
// init_Set("db2.php".Max_Time(200s));
$servername = "localhost";
$username = "root";
$password = "";
$database = "CedCab";
$con = mysqli_connect($servername, $username, $password, $database);
if (isset($_POST['login'])) {

    $em = $_POST['email'];
    $password = $_POST['pass'];

    // $sql = "INSERT INTO  tbl_user (email_id,name,mobile,status,password,is_admin) values('$em','$name','$mobile','0','$password','0')";
    $result = "SELECT* FROM tbl_user WHERE email_id='$em' AND password='$password';  ";

    $r1 = mysqli_query($con, $result);
    $r2 = mysqli_num_rows($r1);
    $r3 = $r1->fetch_assoc();
    $uemail = $r3['email_id'];
    $upass = $r3['password'];
    //   $_SESSION['userid']=$r3['user_id'];
    //   echo $_SESSION['userid'];
    if ($r2 == 1) {
        if ($r3['status'] == 1 && $r3['is_admin'] == 1) {
            header('location:admin.php');
            $_SESSION['adminname'] = $r3['name'];
            echo "admin";
        } else
    if ($r3['status'] == 0 && $r3['is_admin'] == 0) {
            $_SESSION['userid'] = $r3['user_id'];
            $_SESSION['username'] = $r3['name'];
?><script>
                location.replace('user.php')
            </script><?php
                    } else
                    if ($r3['status'] == 0) {
                        echo "You Are Blocked";
                    }
                }
                if ($em == $uemail) {
                    echo "Valid Email";
                } else
                if ($password != $upass) {
                    echo "Invalid Password";
                }
            }
                        ?>