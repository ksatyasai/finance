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
        margin-top:40px;
        background-color:white;
        width:450px;
        height:540px;
        border-radius:20px;
    }
    b{
          margin-right:30px;
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
         height:160px;
         margin-top:30px;
    }
    input{
         margin-top:25px;
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
          <h1>update data</h1>
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
    <b class="b">SELECT DATE AND CHANGE AMOUNT : </b>
      <input type="date" name="dat" id="date" min="2023-01-01">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="value" placeholder="enter amount to change">
    <button type="submit" class="btn button" name="submit">UPDATE</button>
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
  $var=$_POST['dat'];
 $d1=strtotime($var);
 $d2=getDate($d1);
 $day=$d2['mday'];
 $month=$d2['mon'];
 $year=$d2['year'];
                 switch ($month) {
                   case '1':$dat=$year.' '.'jan'.' '.$day;
                     break;
                   case '2':$dat=$year.' '.'feb'.' '.$day;
                     break;
                    case '3':$dat=$year.' '.'mar'.' '.$day;
                     break;
                    case '4':$dat=$year.' '.'apr'.$day;
                     break;
                     case '5':$dat=$year.' '.'may'.' '.$day;
                     break;
                     case '6':$dat=$year.' '.'jun'.' '.$day;
                     break;
                     case '7':$dat=$year.' '.'jul'.' '.$day;
                     break;
                     case '8':$dat=$year.' '.'aug'.' '.$day;
                     break;
                     case '9':$dat=$year.' '.'sep'.' '.$day;
                     break;
                     case '10':$dat=$year.' '.'oct'.' '.$day;
                     break;
                     case '11':$dat=$year.' '.'nov'.' '.$day;
                     break;
                     case '12':$dat=$year.' '.'dec'.' '.$day;
                     break;
                   default:
                     # code...
                     break;
                 } 
  $value=$_POST['value'];
  $sql="UPDATE `newlist` SET `id`='$id',`name`='$name',`fathername`='$fathername',`phoneno`='$phoneno',`totalamount`='$totalamount',`paidamount`='$paidamount',`date`='$date',`$dat`='$value' where `id`='$id'";
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