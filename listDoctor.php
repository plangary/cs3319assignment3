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
   $query = "SELECT * FROM doctor, hospital WHERE docLicNum = '$docId'";
   $result=mysqli_query($connection,$query);
    if (!$result) {
         die("database query2 failed.");
     }
    
    while ($row=mysqli_fetch_assoc($result)) {
        echo"<ul>";
        echo $row["firstName"] . " ". $row["lastName"] . " " . $row["docLicNum"] . " ". $row["speciality"] . " ". $row["licenseDate"] . " ". $row["hosWorksAt"] .  "</ul>";
        break;
     }


     mysqli_free_result($result);
?>
</ol>
<?php
   mysqli_close($connection);
?>
</body>
</html>