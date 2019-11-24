<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Adding Doctor</title>
</head>
<body>
<?php
    include 'connectdb.php';
    echo "<br><br>";
    
    $docLicNum = $_POST["docLicNum"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $specialty= $_POST["speciality"];
    $licenseDate = $_POST["licenseDate"];
    $hosWorksAt = $_POST["hosWorksAt"];
    

    
    if(empty($_POST["hosWorksAt"])){
        die("You must enter a value for hospital location!");
    }
    $query = "SELECT docLicNum FROM doctor WHERE doctor.docLicNum='$docLicNum'";
    $result = mysqli_query($connection, $query);
    
    if($hosWorksAt == "BBC" || $hosWorksAt == "ABC" || $hosWorksAt == "DDE"){
        die("Please enter a valid hospital location");
    }
    if(!result) {
        die("database query failed.");
    }
     
    if(mysqli_num_rows ($result) >0){
        die("Doctor with license ".$docLicNum . " exists. Please enter different license number" ); 
    }
    else{
        $query = "INSERT INTO doctor (docLicNum,firstName,lastName,speciality,licenseDate) VALUES ('$docLicNum', '$firstName','$lastName','$specialty','$licenseDate')";
        
    
        if(!mysqli_query($connection, $query)){
                die("Error: insert failed" . mysqli_error($connection));
            }
        $query2= "UPDATE doctor SET hosWorksAt = '$hosWorksAt' WHERE docLicNum = '$docLicNum'";
        
        if(!mysqli_query($connection, $query2)){
                die("Error: insert failed" . mysqli_error($connection));
            }
        echo "The doctor was added!";
        
        mysqli_free_result($result);
    
    }
    
    ?>

</body>
</html>