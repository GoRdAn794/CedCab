<?php
session_start();
$cab = $_SESSION['cabtype'];
$uname = $_SESSION['username'];
// echo $uname;
// echo $cab;
$dist = $_SESSION['distance'];
$weig = $_SESSION['weight'];
$pick = $_SESSION['pickup'];
$drop = $_SESSION['drop'];
// echo $_SESSION['userid'];
$fa = $_SESSION['fair'];
$servername = "localhost";
$username = "root";
$password = "";
$database = "CedCab";
$con = mysqli_connect($servername, $username, $password, $database);
$stat = 0;
$custmerid = $_SESSION['userid'];
$cid = $custmerid;
$_SESSION['cid'] = $cid;
// echo $stat;
// date_default_timezone_get('Asia/Kolkata');
// $da=date('d-m-y');
$sql = "INSERT INTO  tbl_ride(dist_from,dist_to,total_distance,luggage,total_fare,`status`,customer_user_id,CAB_TYPE) VALUES('$pick','$drop','$dist','$weig','$fa','$stat',$cid,'$cab')";
$sql2 = "SELECT* FROM tbl_ride WHERE customer_user_id=$cid";
$pend = "UPDATE tbl_ride SET `status`='1' WHERE `customer_user_id`='$cid' ";
$sql3 = "SELECT* FROM tbl_ride WHERE status='2' ";
$result = mysqli_query($con, $sql);
$result2 = mysqli_query($con, $sql3);
$result3=mysqli_query($con,$pend);
if ($result) {
    // echo "SUCCCESS";
} else {
    echo "Error" . mysqli_error($con) . "";
}
if ($result = mysqli_query($con, $sql2)) {
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows($result);
    // echo "number of rows: ", $rowcount;
    // Free result set
    //   mysqli_free_result($result);
}
if($result3)
{
    echo "Status Updated";
}
else{
    echo "Error" . mysqli_error($con) . "";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<style>
    a {
        text-decoration: none;
        color: black;
    }

    a:hover {
        color: grey;
    }

    .f1 {
        background-color: grey;
    }

    .ca {
        text-align: center;
        border: 1px solid black;
    }
</style>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="cab.php">CedCab</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="cab.php">Book new Ride</a></li>
                <li class="dropdown">
                    <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <h4 style="color:white">Hi <?php echo $uname; ?></h4>
                <li><a href="Signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
            </ul>
        </div>
    </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <a href="update_user_profile.php" style="text-decoration: none;">Update Profile</a><br><br>
                <a href="user_password_update.php" style="text-decoration: none;">Update Password</a><br><br>
                <a href="Admin" style="text-decoration: none;">Update Notice</a><br><br>
                <a href="Admin" style="text-decoration: none;">Update Client List</a><br><br>
                <a href="Admin" style="text-decoration: none;">Add</a><br><br>
                <a href="Admin" style="text-decoration: none;">Update Report</a><br><br>
                <a href="Admin" style="text-decoration: none;">Career Request</a><br><br>
                <a href="Admin" style="text-decoration: none;">Upload Excel</a><br><br>
                <a href="Admin" style="text-decoration: none;">Analysis Report</a><br><br>

            </div>
            <div class="col-md-9">
                <div class="col-md-3">
                    <div class="card ca" style="width: 18rem;height:18rem">
                        <div class="card-body">
                            <h5 class="card-title text-center">All Rides</h5>
                            <p class="card-text text-center"><?php echo $rowcount; ?></p>
                            <a style="text-decoration: none;" href="user_all_rides.php"><button class="btn btn-primary" style="margin: auto;display:block">All Rides</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ca" style="width: 18rem;height:18rem">
                        <div class="card-body">
                           
                                <h5 class="card-title text-center">Completed Rides</h5>
                           
                            <p class="card-text text-center"></p>
                            <a style="text-decoration: none;" href="user_completed_rides.php"><button class="btn btn-primary" style="margin: auto;display:block">Completed Rides</button></a>
                        </div>
                    </div>
                    <div class="card ca" style="width: 18rem;height:18rem;margin-top:12%">
                        <div class="card-body">
                           
                                <h5 class="card-title text-center">Cancelled Rides</h5>
                            
                            <p class="card-text text-center"></p>
                            <a style="text-decoration: none;" href="user_cancelled_rides.php"><button class="btn btn-primary" style="margin: auto;display:block">Cancelled Rides</button></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card ca" style="width: 18rem;height:18rem">
                        <div class="card-body">
                            <h5 class="card-title text-center">Total Expenses</h5>
                            <p class="card-text text-center"><?php
                                                                $servername = "localhost";
                                                                $username = "root";
                                                                $password = "";
                                                                $database = "CedCab";
                                                                $con = mysqli_connect($servername, $username, $password, $database);
                                                                $expense = "SELECT SUM(total_fare) FROM tbl_ride WHERE 	customer_user_id=$cid";
                                                                $totalexpense = mysqli_query($con, $expense);
                                                                $row = mysqli_fetch_array($totalexpense);
                                                                ?><?php
                                                                $total = $row['SUM(total_fare)'];



                                                                echo "₹" . $total;

                                                                ?></p>
                            <a style="text-decoration: none;" href="user_total_expenses.php"><button class="btn btn-primary" style="margin: auto;display:block">Total Expenses</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>
</body>

</html>