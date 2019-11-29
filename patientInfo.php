<html>
<body>
<h1>Patient info</h1>
    <?php
    $ohip = $_POST["ohip"];
    if(empty($docLicNum)){
        echo "No license number provided";
    }
    else{
        
        $query = "SELECT docLicNum FROM doctor WHERE doctor.docLicNum = '$docLicNum'";
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    }
    
    
        
    mysqli_free_result($result);
    mysqli_close($connection);
    
    ?>

<a href="index.php">RETURN TO PREVIOUS PAGE</a>
</body>
</html>