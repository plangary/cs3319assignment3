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
    //store info given by user in variables
    $docLicNum = $_POST["docLicNum"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $specialty= $_POST["speciality"];
    $licenseDate = $_POST["licenseDate"];
    $hosWorksAt = $_POST["hosWorksAt"];
    

    //check if hospital location is left blank by user
    if(empty($_POST["hosWorksAt"])){
        die("You must enter a value for hospital location!");
    }
    
    //check if hospital code is valid
    if(!($hosWorksAt === "BBC" || $hosWorksAt === "ABC" || $hosWorksAt === "DDE")){
        die("Please enter a valid hospital location");
    }
    
    //run query 
    $query = "SELECT docLicNum FROM doctor WHERE doctor.docLicNum='$docLicNum'";
    $result = mysqli_query($connection, $query);
    
    
    if(!result) {
        die("database query failed.");
    }
     //check if the doctor with specified license already exists
    if(mysqli_num_rows ($result) >0){
        die("Doctor with license ".$docLicNum . " exists. Please enter different license number" ); 
    }
    else{
        //run another query to insert doctor
        $query = "INSERT INTO doctor (docLicNum,firstName,lastName,speciality,licenseDate) VALUES ('$docLicNum', '$firstName','$lastName','$specialty','$licenseDate')";
        
    
        if(!mysqli_query($connection, $query)){
                die("Error: insert failed" . mysqli_error($connection));
            }
        //run query to set hospital location of doctor
        $query2= "UPDATE doctor SET hosWorksAt = '$hosWorksAt' WHERE docLicNum = '$docLicNum'";
        
        if(!mysqli_query($connection, $query2)){
                die("Error: insert failed" . mysqli_error($connection));
            }
        echo "The doctor was added!";
        
        mysqli_free_result($result);
        mysqli_close($connection);

    
    }
    
    ?>

</body>
</html>