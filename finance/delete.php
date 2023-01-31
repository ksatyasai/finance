<?php
include("include.php");
error_reporting(0);
$id=$_GET['id'];
$name=$_GET['name'];
$fathername=$_GET['fathername'];
$totalamount=$_GET['totalamount'];
$paidamount=$_GET['paidamount'];
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>finance</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <style type="text/css"> 
    body{
       background-color:red;
    }
    .main{
        margin-top:65px;
        background-color:white;
        width:450px;
        height:500px;
        border-radius:20px;
    }
    b{
          margin-right:30px;
    }
    .b{
    	margin-right:70px;
    }
    .button{
            margin-top:15px;
            border:1px solid black;
            background-color:blue;
            color:white;
            width:400px;
    }
    .tab{
         border:1px solid black;
         border-radius:20px;
    }
    .fm{
        border:1px solid black;
         border-radius:20px;
         height:140px;
         margin-top:15px;
    }
    input{
         margin-top:15px;
         width:370px;
         height:35px;
    }
    strong{
           margin-left:-300px;
    }
  </style>
</head>
<body>
    <div class="col-xs-12 row" align="center">
      <div class="col-xs-6">
       <div class="container main">
          <h1>Delete data</h1>
      <hr>
      <strong>Details:</strong>
      <div class="tab">
      <table cellpadding="10px">
      <tr>
        <td><b>ID</b></td>
        <td>:</td>
        <td><?php echo $id ?></td>
      </tr>
      <tr>
        <td> <b>NAME</b></td>
        <td>:</td>
        <td><?php echo $name ?></td>
      </tr>
      <tr>
        <td> <b>FATHERNAME</b></td>
        <td>:</td>
        <td><?php echo $fathername ?></td>
      </tr>
      <tr>
        <td><b>TOTALAMOUNT</b></td>
        <td>:</td>
        <td><?php echo $totalamount ?></td>
      </tr>
      <tr>
        <td><b>PAIDAMOUNT</b></td>
        <td>:</td>
        <td><?php echo $paidamount ?></td>
      </tr>
       </table> 
       </div>
       <div class="fm">
  <form class="form" method="post">
    <b class="b">Enter password to delete the candidate:</b>
      <input type="password" name="delete" placeholder="Enter password to delete" required="">
    <button type="submit" class="btn button" name="submit">Delete</button>
  </form>
  </div>
</div>
   </div> 
  </div>
<?php
$conn=mysqli_connect("localhost","root","","database");
 if(!$conn){
     die("Connection Failed");
 }

if(isset($_POST['submit']))
{
  $del=$_POST['delete'];
  if($del=="delete")
  {
    $delete=mysqli_query($conn,"DELETE FROM `newlist` WHERE `id`='$id'");
    echo "<script>alert('Data deleted successfully');window.location.href='update.php'</script>";
  }
  else
  {
    echo "<script>alert('error occour not deleted');window.location.href='update.php'</script>";
  }
}
?>
</body>
</html>