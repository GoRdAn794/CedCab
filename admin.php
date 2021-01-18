<?php session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
</style>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="cab.php">CedCab</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Rides
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Ride Requests</a></li>
                        <li><a href="#">Completed Rides</a></li>
                        <li><a href="#">Cancelled Rides</a></li>
                        <li><a href="#">All Rides</a></li>
                    </ul>
                </li>
                <li><a href="#">Users</a></li>
                <li><a href="#">Location</a></li>
                <li><a href="#">Account</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <h4 style="color: white;">Hi Admin</h4>
                <li><a href="Signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
            </ul>
        </div>
    </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <a href="Admin" style="text-decoration: none;">Update News</a><br><br>
                <a href="Admin" style="text-decoration: none;">Update Notice</a><br><br>
                <a href="Admin" style="text-decoration: none;">Update Client List</a><br><br>
                <a href="Admin" style="text-decoration: none;">Add</a><br><br>
                <a href="Admin" style="text-decoration: none;">Update Report</a><br><br>
                <a href="Admin" style="text-decoration: none;">Career Request</a><br><br>
                <a href="Admin" style="text-decoration: none;">Upload Excel</a><br><br>
                <a href="Admin" style="text-decoration: none;">Analysis Report</a><br><br>
            </div>
            <div class="col-md-2">
                <div class="card" style="width: 18rem;border-radius:15px;">
                    <div class="card-body" style="background-color: #FFC300;">
                        <h4 class="card-title" style="text-align: center;">Completed Rides</h4>
                        <p class="card-text" style="font-size: 40px;text-align:center">34</p>
                        <a href="admin_completed_rides.php"><button class="btn btn-primary">Completed Rides</button></a>
                    </div>
                    <div class="card-body" style="background-color: #1D628C;margin-top:10%">
                        <h4 class="card-title" style="text-align: center;">12358</h4>
                        <p class="card-text" style="font-size: 40px;text-align:center">0</p>
                        <a href="admin_blocked_user.php"><button class="btn btn-primary">Blocked Users</button></a>
                    </div>
                    <div class="card-body" style="background-color: #1A6533;margin-top:10%">
                        <h4 class="card-title" style="text-align: center;">12358</h4>
                        <p class="card-text" style="font-size: 40px;text-align:center">0</p>
                        <a href="admin_total_rides.php"><button class="btn btn-primary">Total Rides</button></a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card" style="width: 18rem;border-radius:15px;">
                    <div class="card-body" style="background-color: #1D628C ;">
                        <h4 class="card-title" style="text-align: center;">12358</h4>
                        <p class="card-text" style="font-size: 40px;text-align:center">0</p>
                        <a href="admin_cancelled_rides.php"><button class="btn btn-primary">Cancelled Rides</button></a>
                    </div>
                    <div class="card-body" style="background-color: #FFC300 ;margin-top:10%">
                        <h4 class="card-title" style="text-align: center;">12358</h4>
                        <p class="card-text" style="font-size: 40px;text-align:center">0</p>
                        <a href="admin_all_users.php"><button class="btn btn-primary">All Users</button></a>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="card" style="width: 18rem;border-radius:15px;">
                    <div class="card-body" style="background-color: #415460;">
                        <h4 class="card-title" style="text-align: center;">12358</h4>
                        <p class="card-text" style="font-size: 40px;text-align:center">0</p>
                        <a href="admin_pending_requests.php"><button class="btn btn-primary">Pending Rides</button></a>
                    </div>
                    <div class="card-body" style="background-color: #1D628C;margin-top:10%">
                        <h4 class="card-title" style="text-align: center;">12358</h4>
                        <p class="card-text" style="font-size: 40px;text-align:center">0</p>
                        <button class="btn btn-primary">Ride Requests</button>
                    </div>
                    <div class="card-body" style="background-color: #FFC300;margin-top:10%">
                        <h4 class="card-title" style="text-align: center;">Total Earnings</h4>
                        <p class="card-text" style="font-size: 40px;text-align:center"><?php
                                                                $servername = "localhost";
                                                                $username = "root";
                                                                $password = "";
                                                                $database = "CedCab";
                                                                $con = mysqli_connect($servername, $username, $password, $database);
                                                                $sql = "SELECT* from  tbl_ride";
                                                                $expense = "SELECT SUM(total_fare) FROM tbl_ride WHERE status=2";
                                                                $show = mysqli_query($con, $sql);
                                                                $totalexpense = mysqli_query($con, $expense);
                                                                $row = mysqli_fetch_array($totalexpense);
                                                                ?><?php
                                                                $total = $row['SUM(total_fare)'];



                                                                echo "₹" . $total;

                                                                ?></p>
                        <button class="btn btn-primary">Total Earnings</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <table class="table table-dark"  width=100%>
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Source</th>
      <th scope="col">Destination</th>
      <th scope="col">Total Distance</th>
      <th scope="col">Luggage</th>
      <th scope="col">Fair</th>
      <th scope="col">Cab-Type</th>
      
    </tr>
  </thead>
  <tbody>
</body>
</html>
<?php
// // session_start();
// echo $_SESSION['cabtype'];
// echo $_SESSION['distance'];
// echo $_SESSION['weight'];
// echo $_SESSION['pickup'];
// echo $_SESSION['drop'];

// // echo $_SESSION['userid'];
// $fa = $_SESSION['fair'];

$servername = "localhost";
$username = "root";
$password = "";
$database = "CedCab";
$con = mysqli_connect($servername, $username, $password, $database);
$sql="SELECT* FROM tbl_ride WHERE `status`='1';";
$result=mysqli_query($con,$sql);
while($s=mysqli_fetch_array($result))
{
    ?>
   <tr>
   <td><?php echo $s['ride_date']?></td>
    <td><?php echo $s['dist_from']?></td>
    <td><?php echo $s['dist_to']?></td>
    <td><?php echo $s['total_distance']?></td>
    <td><?php echo $s['luggage']?></td>
    <td><?php echo $s['total_fare']?></td>
    <td><?php echo $s['CAB_TYPE']?></td>
    <td><a href="approve.php?ride_id=<?php echo $s['ride_id'];?>"><button class="btn btn-primary">Approve</button></td>
      <td><a href="cancel.php?ride_id=<?php echo $s['ride_id'];?>"><button class="btn btn-danger">Cancel</button></td></a>
   <?php 
}
?>
