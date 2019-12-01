<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Confirm delete doctor</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    echo "<br><br>";

    $docLicNum = $_POST["docLicNum"];
    //queries to delete doctor from treats table and doctors table. 
    $query1 = "DELETE FROM doctor WHERE doctor.docLicNum='$docLicNum'";
    $query2 = "DELETE FROM treats WHERE docLicNum = '$docLicNum'";
    //make connection to db
    $result = mysqli_query($connection, $query1);

    if(!$result){
        die("Query failed");
    }
    $result = mysqli_query($connection, $query2);

    if(!$result){
        die("Query failed");
    }
    echo "Doctor has been successfully deleted!";
    
    mysqli_close($connection);

    ?>
    
</body>
</html>