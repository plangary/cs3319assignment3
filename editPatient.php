<html>
<body>
<h1>Editing Patient</h1>
    <?php
    include 'connectdb.php';
    echo "<br><br>";
    $ohip = $_POST["ohip"];
    $docLicNum= $_POST["docLicNum"];
    $type = $_POST["type"];
    
  
    $query1="SELECT ohip FROM patient WHERE patient.ohip ='$ohip'";
    $query2 = "SELECT docLicNum FROM doctor WHERE doctor.docLicNum = '$docLicNum'";
    
    $result = mysqli_query($connection, $query1);
    $result2 = mysqli_query($connection, $query2);
    echo "<br><br>";
    
    if(!$result){
         die("Query failed");
    }
    else if(mysqli_num_rows($result) == 0){
    die("Patient does not exist! Please enter a valid OHIP number.");
    }
    else if (!$result2){
        die("Query failed");
    }
    else if(mysqli_num_rows($result2) == 0){
        die("Doctor does not exist! Please enter a valid license number");
    }
    else{
        while ($row = mysqli_fetch_assoc($result)){
            echo $row["firstname"];
        }
        if($type ==="stop"){
            
        }
        else{
            $query3 = "INSERT into treats VALUES('$docLicNum','$ohip')";
            
            $result3 = mysqli_query($connection, $query3);
            echo "<br><br>";
            
            if(!$result3){
            die("Query failed");
            }
            echo "Patient with OHIP:";
            
            
        }
        
        
        
        
        
        
    }
        
        
        
        
        
   
    
    
    
    ?>

<a href="index.php">RETURN TO PREVIOUS PAGE</a>
</body>
</html>