<! DOCTYPE html>  
<html lang="en">  
<head>  
  <title>finance</title>  
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>  
<style>  
body {  
  min-height: 100vh;  
 background-color: coral; 
}
.name{
   margin-top:-20px;
}
.div{
   height:60px
}
table{
   text-align:center;
   table-layout:auto;
}
/*tr{
  border:1px solid black;
}*/
#myTable{
  background-color:snow;
}
.tab{
overflow:auto;
white-space:nowrap;
}
.div{
  height:80px;
  display:inline-flex;
}
.date{
  margin-left:500px;
}
.btn{
  height:30px;
  padding:3px;
  margin-top:-5px;
}
.search{
  height:35px;
}
@media (max-width: 767px) { 
  .date{
      margin-left:-190px;
      margin-top:40px;
  }
  .search{
    margin-top:-5px;
  }
}
</style>  
<body> 
<button style="margin-top:10px;margin-left:30px;" class="btn"><a href="index.php" style="color:black;"><-back</a></button> 
<div class="container">  
  <div class="row py-5">  
    <div class="col-12">  
    <?php 
 $conn=mysqli_connect("localhost","root","","database");
 if(!$conn){
     die("Connection Failed");
 }
 $sql="select * from `newlist`";
 $result=mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0)
         {?>
          <h2 class="name">Data Page</h2>
        <div class="div">

         <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names here.."  class="search">

        <form method="post" action="">
            <input type="month" name="date" min="2023-01" class="date">
            <button name="button" class="btn">submit</button>
        </form>
        </div> 
          <div class="tab">
      <table id="myTable" class="table table-hover responsive" id="myTable"> 
        <thead class="thead-light">  
          <tr id="myUL">  
            <th>ID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Phone Number</th>
            <th>Total Amount</th>
            <th>paid amount</th>
            <?php
            $jan="jan";
            $feb="feb";
            $mar="mar";
            $apr="apr";
            $may="may";
            $jun="jun";
            $jul="jul";
            $aug="aug";
            $sep="sep";
            $oct="oct";
            $nov="nov";
            $dec="dec"; 
            if(isset($_POST['date']))
              {
              for($i=1;$i<=33;$i++)
                {
                 $var=$_POST['date'];
                 $d1=strtotime($var.'-'.$i);
                 $d2=getDate($d1);
                 $day=$d2['mday'];
                 $month=$d2['mon'];
                 $year=$d2['year'];
                 $eq1=$var.'-'.$day;
                 if ($month<"10") {
                 $eq2=$year.'-0'.$month.'-'.$day;
                 }
                 else{
                 $eq2=$year.'-'.$month.'-'.$day;
                 }
                 if ($eq1==$eq2)
                  {
                    switch ($month) {
                      case '1':?><th><?php echo $year.' '.$jan.' '.$day; ?></th><?php
                        break;
                      case '2':?><th><?php echo $year.' '.$feb.' '.$day; ?></th><?php
                        break;
                      case '3':?><th><?php echo $year.' '.$mar.' '.$day; ?></th><?php
                        break;
                      case '4':?><th><?php echo $year.' '.$apr.' '.$day; ?></th><?php
                        break;
                      case '5':?><th><?php echo $year.' '.$may.' '.$day; ?></th><?php
                        break;
                      case '6':?><th><?php echo $year.' '.$jun.' '.$day; ?></th><?php
                        break;
                      case '7':?><th><?php echo $year.' '.$jul.' '.$day; ?></th><?php
                        break;
                      case '8':?><th><?php echo $year.' '.$aug.' '.$day; ?></th><?php
                        break;
                      case '9':?><th><?php echo $year.' '.$sep.' '.$day; ?></th><?php
                        break;
                      case '10':?><th><?php echo $year.' '.$oct.' '.$day; ?></th><?php
                        break;
                      case '11':?><th><?php echo $year.' '.$nov.' '.$day; ?></th><?php
                        break;
                      case '12':?><th><?php echo $year.' '.$dec.' '.$day; ?></th><?php
                        break;
                      default:echo "select date";
                        break;
                    }
                  }
                }
              }
            ?>
          <th>total</th>
          </tr>  
        </thead>  
        <?php foreach($result as $row){
      ?>
        <tr class="data">
        <th><?php echo $row['id'];?></th>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['date'];?></td>
            <td><?php echo $row['phoneno'];?></td>
            <td><?php echo $row['totalamount'];?></td>
            <td><?php echo $row['paidamount'];?></td>
            <?php 
            $jan="jan";
            $feb="feb";
            $mar="mar";
            $apr="apr";
            $may="may";
            $jun="jun";
            $jul="jul";
            $aug="aug";
            $sep="sep";
            $oct="oct";
            $nov="nov";
            $dec="dec";
             $sum=0;
            if(isset($_POST['date']))
              {
              for($i=1;$i<=33;$i++)
                {
                 $d1=strtotime($var.'-'.$i);
                 $d2=getDate($d1);
                 $day=$d2['mday'];
                 $month=$d2['mon'];
                 $year=$d2['year'];
                 $eq1=$var.'-'.$day;
                 if ($month<"10") {
                 $eq2=$year.'-0'.$month.'-'.$day;
                 }
                 else{
                 $eq2=$year.'-'.$month.'-'.$day;
                 }
                 if ($eq1==$eq2)
                  {
                    switch ($month) {
                      case '1':?><td><?php echo $row[$year.' '.$jan.' '.$day]; $sum=$sum+$row[$year.' '.$jan.' '.$day];?></td><?php
                        break;
                      case '2':?><td><?php echo $row[$year.' '.$feb.' '.$day]; $sum=$sum+$row[$year.' '.$feb.' '.$day];?></td><?php
                        break;
                      case '3':?><td><?php echo $row[$year.' '.$mar.' '.$day]; $sum=$sum+$row[$year.' '.$mar.' '.$day];?></td><?php
                        break;
                      case '4':?><td><?php echo $row[$year.' '.$apr.' '.$day]; $sum=$sum+$row[$year.' '.$apr.' '.$day];?></td><?php
                        break;
                      case '5':?><td><?php echo $row[$year.' '.$may.' '.$day]; $sum=$sum+$row[$year.' '.$may.' '.$day];?></td><?php
                        break;
                      case '6':?><td><?php echo $row[$year.' '.$jun.' '.$day]; $sum=$sum+$row[$year.' '.$jun.' '.$day];?></td><?php
                        break;
                      case '7':?><td><?php echo $row[$year.' '.$jul.' '.$day]; $sum=$sum+$row[$year.' '.$jul.' '.$day];?></td><?php
                        break;
                      case '8':?><td><?php echo $row[$year.' '.$aug.' '.$day]; $sum=$sum+$row[$year.' '.$aug.' '.$day];?></td><?php
                        break;
                      case '9':?><td><?php echo $row[$year.' '.$sep.' '.$day]; $sum=$sum+$row[$year.' '.$sep.' '.$day];?></td><?php
                        break;
                      case '10':?><td><?php echo $row[$year.' '.$oct.' '.$day]; $sum=$sum+$row[$year.' '.$oct.' '.$day];?></td><?php
                        break;
                      case '11':?><td><?php echo $row[$year.' '.$nov.' '.$day]; $sum=$sum+$row[$year.' '.$nov.' '.$day];?></td><?php
                        break;
                      case '12':?><td><?php echo $row[$year.' '.$dec.' '.$day]; $sum=$sum+$row[$year.' '.$dec.' '.$day];?></td><?php
                        break;
                      default:echo "select date";
                        break;
                    }
                  }
                }
              } 
                ?>
              <td><b><?php echo $sum;?></b></td>
        </tr>
        <?php
                        }
                    }
                    else{
                        echo "some error";
                    }
                
               ?>     
            <tr>
              <th></th>
              <th></th><th></th>
              <th>total:</th>
              <th></th>
            </tr>
          </table>  
        </div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
</body>    
</html>  