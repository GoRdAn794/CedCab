
<?php 
session_start();
$ride_id=$_GET['ride_id'];
$servername = "localhost";
$username = "root";
$password = "";
$database = "CedCab";
$con = mysqli_connect($servername, $username, $password, $database);
$sql="UPDATE tbl_ride SET status='0' WHERE tbl_ride.ride_id=$ride_id";
$result=mysqli_query($con,$sql);
echo "<script> window.location.href='admin.php'</script>"; 
?>