
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FINANCE</title>
    <link rel="stylesheet" href="./bootstrap.min.css">
</head>
<body>
    <table class="table table-bordered table-striped table-primary table-responsive text-center">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Father Name</th>
            <th>Phone Number</th>
            <th>Total Amount</th>
            <th>paid amount</th>
            <th>Date</th>
        </tr>
        <?php
        $conn=mysqli_connect("localhost","root","","database");
        if(!$conn){
            die("Connection Failed");
        }
        $sql="select * from `newlist`";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['fathername'];?></td>
            <td><?php echo $row['phoneno'];?></td>
            <td><?php echo $row['totalamount'];?></td>
            <td><?php echo $row['paidamount'];?></td>
            <td><?php echo $row['date'];?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>