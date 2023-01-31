<?php
include("include.php");
error_reporting(0);
$id=$_GET['id'];
$name=$_GET['name'];
$fathername=$_GET['fathername'];
$phoneno=$_GET['phoneno'];
$totalamount=$_GET['totalamount'];
$paidamount=$_GET['paidamount'];
$date=$_GET['date'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>finance</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<style type="text/css"> 
		body{
			 background-color:coral;
		}
		.main{
			  margin-top:20px;
			  background-color:white;
			  width:450px;
			  height:600px;
			  border-radius:10px;
		}
		b{
          margin-right:350px;
		}
    .button{
            margin-top:20px;
            border:1px solid black;
            background-color:blue;
            color:white;
            width:400px;
    }
	</style>
</head>
<body>
		<div class="col-xs-12 row" align="center">
			<div class="col-xs-6">
		   <div class="container main">
  <form class="form" method="post">
    <div class="form-group">
      <h1>update data</h1>
      <hr>
      </div>
    <div class="form-group">
    	<b>ID:</b>
      <input type="text" class="form-control" name="id" value="<?php echo $id ?>">
    </div>
    <div class="form-group">
      <b>NAME:</b>
      <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
    </div>
    <div class="form-group">
      <b>FATHERNAME:</b>
      <input type="text" class="form-control" name="fathername" value="<?php echo $fathername ?>">
    </div>
    <div class="form-group">
      <b>PHONENO:</b>
      <input type="text" class="form-control" name="phoneno" value="<?php echo $phoneno ?>">
    </div>
    <div class="form-group">
      <b>TOTALAMOUNT:</b>
      <input type="text" class="form-control" name="totalamount" value="<?php echo $totalamount ?>">
    </div>
    <div class="form-group">
      <b>PAIDAMOUNT:</b>
      <input type="text" class="form-control" name="paidamount" value="<?php echo $paidamount ?>">
    </div>
    <div class="form-group">
    <b>DATE:</b>
      <input type="text" class="form-control" name="date" value="<?php echo $date ?>">
    </div>
    <button type="submit" class="btn button" name="submit">UPDATE</button>
  </form>
  <p id="demo"></p>
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
  $id=$_POST['id'];
  $name=$_POST['name'];
  $fathername=$_POST['fathername'];
  $phoneno=$_POST['phoneno'];
  $totalamount=$_POST['totalamount'];
  $paidamount=$_POST['paidamount'];
  $date=$_POST['date'];
  $sql="UPDATE `newlist` SET `id`='$id',`name`='$name',`fathername`='$fathername',`phoneno`='$phoneno',`totalamount`='$totalamount',`paidamount`='$paidamount',`date`='$date' where `id`='$id'";
  $query_run=mysqli_query($conn,$sql);
  if($query_run)
  {
    echo "<script>alert('Data updated successfully');window.location.href='update.php'</script>";
  }
  else
  {
    echo "<script>alert('error occour not updated');window.location.href='update.php'</script>";
  }
}
?>
</body>
</html>