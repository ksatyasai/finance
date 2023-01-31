<?php
$conn=mysqli_connect("localhost","root","","database");
if(!$conn){
    die("Connection Failed");
}
$Name=$_POST['Username'];
$fname=$_POST['fname'];
$phone=$_POST['phone_no'];
$Tamount=$_POST['Tamount'];
$paidamount=$_POST['paidamount'];
$date=$_POST['date'];
$sql="INSERT INTO `newlist`(`name`,`fathername`,`phoneno`,`totalamount`,`paidamount`,`date`) values('$Name','$fname','$phone','$Tamount','$paidamount','$date')";
$result=mysqli_query($conn,$sql);
if($result){
echo '<script>alert("Data Entered Succesfully");window.location.assign("index.php")</script>';
// echo $result;
}
?>