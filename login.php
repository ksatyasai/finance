<?php
session_start();
$conn=mysqli_connect("localhost","root","","database");
if(isset($_POST['submit']))
{
 $name=$_POST['name'];
 $psw=$_POST['psw'];
 $sql="SELECT * from `form` WHERE username='".$name."' AND password1='".$psw."'";
 $result=mysqli_query($conn,$sql);
 if (mysqli_num_rows($result)> 0) {
 	$data=mysqli_fetch_array($result);
 	$user=$data['username'];
     $_SESSION['username']=$user;
     header("location:finance/index.php");
 }
 else{
            echo "<script>alert('invalid user and password');window.location.href='log.html'</script>";
        }
}
?>