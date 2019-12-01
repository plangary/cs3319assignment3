<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Deleting Doctor</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    //store license num in variable
    $docLicNum = $_POST["docLicNum"];
    
    if(empty($docLicNum)){
        echo "No license number provided";
    }
    else{
        //run query to check for doctor 
        $query = "SELECT docLicNum FROM doctor WHERE doctor.docLicNum = '$docLicNum'";
        $query2= "SELECT * FROM treats where docLicNum = '$docLicNum'";
        $result = mysqli_query($connection, $query);
        echo "<br><br>";

        
        if(!$result){
            die("Query failed");
        }
        //output message if doctor does not exist
        if(mysqli_num_rows($result) == 0){
            die("Doctor does not exist! Please enter a valid license number.");
        }
        $result = mysqli_query($connection, $query2);
    
        //check if the doctor is treating patients. Ask user to confirm to delete
        if(mysqli_num_rows($result)>0){
            echo "This doctor has patients. Do you still want to delete?<br><br>";
            echo '<form action = "confirmDocDelete.php" method= "post">
                Re-enter license number to confirm
                <input type = "text" name = "docLicNum" maxlength="20">
                <input type = "submit" value="Confirm">    
                </form>';

        }
        else{
            //if doctor exists and is not treating patients, run query to delete doctor
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