<?php 
include('header.php');
include('dbconnect.php');

$staffid = $_POST['username'];
$fname = $_POST['fname'];
$oname = $_POST['oname'];
$status = $_POST['status'];

if($status == '') {
    mysqli_query($dbcon, "UPDATE userlogin SET surname='$fname', othernames='$oname' WHERE staffid='$staffid'") or die(mysqli_error($dbcon));
}

if(!empty($status)) {
    mysqli_query($dbcon, "UPDATE userlogin SET surname='$fname', status='$status', othernames='$oname' WHERE staffid='$staffid'") or die(mysqli_error($dbcon));
}

echo "<script type='text/javascript'>alert('Staff Edited'); document.location='user.php'</script>";
?>
