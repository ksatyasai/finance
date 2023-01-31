<?php
$conn=mysqli_connect("localhost","root","","database");
if(!$conn){
    die("Connection Failed");
}
if(isset($_POST['value']))
$id=$_POST['id'];
$name=$_POST['name'];
$phone=$_POST['phoneno'];
$value=$_POST['value'];
$sql="INSERT INTO `newlist` (`id`,`name`,`phoneno`,`Amount_Paid`) VALUES ('$id','$name','$phone','$value')";
$result=mysqli_query($conn,$sql);
if($result){
echo "Data Enter Succesfully";
header('Refresh:0.5;url=index.html');
}

$sql="UPDATE `newlist` SET `Return_Amount`=`Return_Amount`+'$value' where `Name`='$name'";
$result=mysqli_query($conn,$sql);
$sql="UPDATE `newlist` SET `Due_Amount`=`Total_Loan_Amount`-`Return_Amount` where `Name`='$name'";
$result=mysqli_query($conn,$sql);
?>