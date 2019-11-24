<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dates</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    if(empty($_POST["hosWorksAt"])){
        die("You must enter a value for hospital location!");
    }
    $date = $_POST["date"];
    $query = "SELECT * FROM doctor WHERE licenseDate < '$date' ";
    $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    echo "<h2> Here are the doctors with licenses before " . $date . ": </h2>";
    while ($row=mysqli_fetch_assoc($result)) {
        
        echo"<ul>";
        echo $row['firstName'] ." ". $row['lastName']. " ". $row['speciality']. " ". $row['licenseDate'].  "</ul>";
     }

    ?>

</body>
</html>