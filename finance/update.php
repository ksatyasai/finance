<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>finance</title>
    <link rel="stylesheet" href="bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- <style>
        body{
            overflow-x:hidden;
        }
        form{
            padding:0 150px;
        }
        .submit{
            padding:10px 45px;
           margin:0 90%;
        }
        .form-control{
            border:none;
            border-bottom:3px solid coral;
            background:none;
        }
        .col-md-5{
            margin:0 130px;  
        }
        </style> -->
        <style type="text/css">
            .data{
               background-color:white;
            }
            .btn{
                margin-top:10px;
                margin-left:30px;
                background-color:white;
                height:30px;
                padding:3px;
            }
            .matter{
                height:170px;
            }
            .sec{
                margin-left:120px;
                margin-top:30px;
            }
            .container{
overflow:auto;
white-space:nowrap;
}   
             .del{
              background-color:tomato;
              color:black;
              padding:2px;
              border-radius:5px;
             }
             .upd{
              background-color:lightgreen;
              color:black;
              padding:2px;
              border-radius:5px;
             }
            @media (max-width: 767px) { 
                .sec{
                     margin-top:20px;
                     margin-left:0px;
                }
                .h2{
                    margin-left:10px;
                    margin-top:20px;
                }
                .matter{
                height:190px;
            }
            }
        </style>
</head>
<body style="background:coral;">
<div class="matter">
     <button class="btn"><a href="index.php" style="color:black;"><-back</a></button>
     <h2 align="center" class="h2">update / delete page</h2>
        <div class="col-9 sec"><b>Name of The Candidate :</b>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names here.."  class="search">
        </div>
</div>
<div class="container">
    <?php 
 $conn=mysqli_connect("localhost","root","","database");
 if(!$conn){
     die("Connection Failed");
 }
 $sql="select * from `newlist`";
 $result=mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0)
         {?>
    <table id="myTable" class="table table-hover responsive" id="myTable"> 
        <thead class="thead-light">  
          <tr id="myUL">  
            <th>ID</th>
            <th>Name</th>
            <th>Date</th>
            <th>Phone Number</th>
            <th>daily updates</th>
            <th>delete data</th>
            <th>total updates</th>
          </tr>  
        </thead>  
        <?php foreach($result as $row){
       ?> <tr class="data"><?php
         echo "<th>".$row['id']."</th>
            <td>".$row['name']."</td>
            <td>".$row['date']."</td>
            <td>".$row['phoneno']."</td>
            <td><a href='update code.php?id=$row[id]&name=$row[name]&date=$row[date]&fathername=$row[fathername]&phoneno=$row[phoneno]&totalamount=$row[totalamount]&paidamount=$row[paidamount]' class='upd'>update</a></td>

            <td><a href='delete.php?id=$row[id]&name=$row[name]&fathername=$row[fathername]&totalamount=$row[totalamount]&paidamount=$row[paidamount]' class='del'>delete</a></td>

            <td><a href='total update code.php?id=$row[id]&name=$row[name]&date=$row[date]&fathername=$row[fathername]&phoneno=$row[phoneno]&totalamount=$row[totalamount]&paidamount=$row[paidamount]' class='upd'>totalupdate</a></td>";
            ?>
        </tr>
        <?php
                        }
                    }
                    else{
                        echo "some error";
                    }
                
               ?> 
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