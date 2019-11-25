<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Deleting Doctor</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    $docLicNum = $_POST["docLicNum"];
    
    if(empty($docLicNum)){
        echo "No license number provided";
    }
    else{
    
        $query = "SELECT docLicNum FROM doctor WHERE doctor.docLicNum = '$docLicNum'";
        $result = mysqli_query($connection, $query);
        echo "<br><br>";

        
        if(!$result){
            die("Query failed");
        }
        if(mysqli_num_rows($result) == 0){
        die("Doctor does not exist! Please enter a valid license number.");
        }
        else{
            $query3= "SELECT *"
            $query2= "DELETE FROM doctor WHERE doctor.docLicNum='$docLicNum'";
            if(!mysqli_query($connection,$query2)){
            die("Query failed!: " . mysqli_error($connection));
            }
            echo "Doctor deleted!";
            
        }
            mysqli_free_result($result);
    
    
    }
    mysqli_close($connection);
    
    
    ?>
    
    
    
    
    
    
</body>
</html>