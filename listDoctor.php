<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dr. Western's Vet Clinic-Your Pets</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Here's the information for your selected doctor:</h1>
<ol>
<?php
   $docId= $_POST["doctors"];
    echo "<h1>". $docId . "</h1>";
   $query = "SELECT * FROM doctor WHERE docLicNum = '$docId'";
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    while ($row=mysqli_fetch_assoc($result)) {
        echo"<ul>";
        echo $row["firstName"] . "</ul>";
     }
     mysqli_free_result($result);
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>