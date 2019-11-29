<html>
<body>
<h1>Editing Patient</h1>
    <?php
    include 'connectdb.php';
    echo "<br><br>";
    $ohip = $_POST["ohip"];
    $docLicNum= $_POST["docLicNum"];
    $type = $_POST["type"];
    $pName= ''; //store patient name
    $dName= ''; //store doctor name
    
    //run query to check if patient exists
    $query1="SELECT * FROM patient WHERE patient.ohip ='$ohip'";
    //run query to check if doctor exists
    $query2 = "SELECT * FROM doctor WHERE doctor.docLicNum = '$docLicNum'";
    //run query to check if patient is being treated by anyone
    $query3 = "SELECT * FROM treats where ohip = '$ohip' and docLicNum = '$docLicNum'";
    
    $result = mysqli_query($connection, $query1);
    if(!result) {
        die("database query failed.");
    }
    
    else if(mysqli_num_rows($result) == 0){
        die("Patient does not exist. Please provide a valid OHIP number.");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $pName = $row["firstname"];
    }

    $result = mysqli_query($connection, $query2);

    if(!result) {
        die("database query failed-2.");
    }
    else if(mysqli_num_rows($result) == 0){
        die("Doctor does not exist. Please enter a valid license number.");
    }
    while ($row = mysqli_fetch_assoc($result)) {
        $dName = $row["firstName"];
    }

    
    $result = mysqli_query($connection, $query3);
    if(!result) {
        die("database query failed-3.");
    }
    
    //if user wants to stop treating patient, check if patient is being treated first by specified doctor
    else if($type==="stop"){
        if(mysqli_num_rows($result) == 0){
            die("$pName is not being treated by $dName.");
        }
    }
   

    if($type==="stop"){
        //run query to delete record
        $query4 = "DELETE FROM treats WHERE ohip='$ohip' and docLicNum='$docLicNum'";
        $result = mysqli_query($connection, $query4);
        if(!result) {
            die("database query failed-4.");
            }
        echo $pName . " has stopped being treated by " . $dName;
        echo "<br><br>";
    }
    else{
        //run query to insert record
        $query5 = "INSERT INTO treats VALUES ('$docLicNum','$ohip')";
        $result = mysqli_query($connection, $query5);
         if(!result) {
            die("database query failed-4.");
            }
        echo $pName . " is now being treated by doctor " . $dName;
        echo "<br><br>";

    }
    
    
    mysqli_close($connection);

    ?>
<a href="index.php">RETURN TO PREVIOUS PAGE</a>
</body>
</html>