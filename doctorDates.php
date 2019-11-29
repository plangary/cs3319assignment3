<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dates</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    // store date given by user in variable and run query
    $date = $_POST["date"];
    // show all doctors less than specified date
    $query = "SELECT * FROM doctor WHERE licenseDate < '$date' ";
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    echo "<h2> Here are the doctors with licenses before " . $date . ": </h2>";
    //output info about the doctors 
    while ($row=mysqli_fetch_assoc($result)) {
        
        echo"<ul>";
        echo $row['firstName'] ." ". $row['lastName']. " ". $row['speciality']. " ". $row['licenseDate'].  "</ul>";
     }
    
    mysqli_free_result($result);
    mysqli_close($connection);
    
    ?>

</body>
</html>