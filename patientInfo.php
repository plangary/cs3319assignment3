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
    
    
    
    ?>

<a href="index.php">RETURN TO PREVIOUS PAGE</a>
</body>
</html>