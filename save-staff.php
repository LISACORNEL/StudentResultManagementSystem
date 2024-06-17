<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: index.php"); 
    }
    else{
if(isset($_POST['submit']))
{
$staffname=$_POST['fullanme'];
$staffid=$_POST['staffid']; 
$email=$_POST['email']; 
$subject=$_POST['subject']; 
$role=2;
$password="123456";
$sql="INSERT INTO admin(UserName,StaffID,email,SubjectId,Password,role) VALUES(:staffname,:staffid,:email,:subject,:password,:role)";
$query = $dbh->prepare($sql);
$query->bindParam(':stafftname',$staffname,PDO::PARAM_STR);
$query->bindParam(':staffid',$staffid,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':subject',$subject,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':role',$role,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "Saved";
}
else 
{
echo "Something went wrong. Please try again";
}

}
else{
    echo "No submit";
}
    }
?>