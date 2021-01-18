<?php session_start();
// $uname=$_SESSION['username']; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Ride Info.</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>


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
                <h4 style="color:white">Hi admin</h4>
                <li><a href="Signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> LogOut</a></li>
            </ul>
        </div>
    </nav>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <a href="Admin" style="text-decoration: none;">Home</a><br><br>
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
                <table class="table table-dark" id="tab" width=100%>
                    <thead>
                        <tr>
                            <th scope="col">Ride Date</th>
                            <th scope="col">Source</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Total Distance</th>
                            <th scope="col">Luggage</th>
                            <th scope="col">Fair</th>
                            <th scope="col">Cab-Type</th>
                        </tr>
                    </thead>
                    <tbody>
            </div>

            <?php
            // session_start();


            // $uid=$_SESSION['cid'];

            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "CedCab";

            // SELECT Orders.OrderID, Customers.CustomerName
            // FROM Orders
            // INNER JOIN tbl_ride ON tbl_user.CustomerID = Customers.CustomerID;



            $con = mysqli_connect($servername, $username, $password, $database);
            $sql = "SELECT* from  tbl_user WHERE `status`='0'";
            $sql2 = "SELECT* from  tbl_ride";
            $sql = "SELECT status FROM tbl_user;
            INNER JOIN tbl_ride
            ON tbl_user.status= tbl_ride.CAB_TYPE";
            $show = mysqli_query($con, $sql);
            while ($s = mysqli_fetch_array($show)) {
            ?>
                <tr>
                    <td><?php echo $s['ride_date'] ?></td>
                    <td><?php echo $s['dist_from'] ?></td>
                    <td><?php echo $s['dist_to'] ?></td>
                    <td><?php echo $s['total_distance'] ?></td>
                    <td><?php echo $s['luggage'] ?></td>
                    <td><?php echo $s['total_fare'] ?></td>
                    <td><?php echo $s['CAB_TYPE'] ?></td>
                </tr>
            <?php
            }
            ?>

            </tbody>
            </table>
</body>
<script>
    $(document).ready(function() {
        $('#tab').dataTable({
                "scrollX": true
            }

        );


    });
</script>

</html>