<?php session_start();
$uname=$_SESSION['username']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Ride Info.</title>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src= "https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
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
<?php
// session_start();


$uid=$_SESSION['cid'];

$servername = "localhost";
$username = "root";
$password = "";
$database = "CedCab";
$con = mysqli_connect($servername, $username, $password, $database);
$sql="SELECT* from  tbl_ride WHERE 	customer_user_id=$uid";
$expense= "SELECT SUM(total_fare) FROM tbl_ride WHERE customer_user_id='$uid'" ;
$show=mysqli_query($con,$sql);
$totalexpense=mysqli_query($con,$expense);
$row = mysqli_fetch_array($totalexpense);
?><?php
$total = $row['SUM(total_fare)'];

// $double;

echo "Total Expenses" . $total;

?>  
   
    

</tbody>
</table>
</body>
<script>
$(document).ready(function() {
    $('#tab').dataTable(
      {"scrollX": true}
     
    );
  
 
    } );
</script>
</html>



