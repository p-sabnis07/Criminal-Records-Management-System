<?php 
session_start();
include('dbconnect.php');

$id = $_SESSION['staffid'];
$username = $_POST['username'];
$pass = $_POST['password'];
$old = $_POST['passwordold'];

$query = mysqli_query($dbcon, "SELECT * FROM userlogin WHERE staffid='$id' AND password=SHA1('$old')") or die(mysqli_error($dbcon));
$count = mysqli_num_rows($query);

if ($count > 0) {
    if ($pass <> "") {
        mysqli_query($dbcon, "UPDATE userlogin SET password=SHA1('$pass') WHERE staffid='$id'") or die(mysqli_error($dbcon));
    }
    echo "<script type='text/javascript'>alert('Successfully updated Password!');</script>";
    echo "<script>document.location='index.php'</script>";  
} else {
    echo "<script type='text/javascript'>alert('Your Old Password is incorrect!');</script>";
    echo "<script>document.location='profile.php'</script>"; 
}
?>
