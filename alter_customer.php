<?php 
session_start();
        
if(!isset($_SESSION['admin_login'])) 
    header('location:index.php');   
?>

<?php
include '_inc/dbconn.php';
$name=  mysqli_real_escape_string($con,$_REQUEST['edit_name']);
$gender=  mysqli_real_escape_string($con,$_REQUEST['edit_gender']);
$dob=  mysqli_real_escape_string($con,$_REQUEST['edit_dob']);
$nominee=  mysqli_real_escape_string($con,$_REQUEST['edit_nominee']);
$type=  mysqli_real_escape_string($con,$_REQUEST['edit_account']);
$address=  mysqli_real_escape_string($con,$_REQUEST['edit_address']);
$mobile=  mysqli_real_escape_string($con,$_REQUEST['edit_mobile']);
$id=  mysqli_real_escape_string($con,$_REQUEST['current_id']);

$sql="UPDATE customer SET  name='$name', dob='$dob', nominee='$nominee', account='$type', address='$address', mobile='$mobile', gender='$gender' WHERE id='$id'";
mysqli_query($con,$sql) or die(mysqli_error($con));
header('location:adminpage.php');
?>