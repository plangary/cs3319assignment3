<html>
<body>
<h1>Editing Patient</h1>
    <?php
    include 'connectdb.php';
    echo "<br><br>";
    $ohip = $_POST["ohip"];
    $docLicNum= $_POST["docLicNum"];
    $type = $_POST["type"];
    $pName= '';
    $dName= '';
    
  
    $query1="SELECT * FROM patient WHERE patient.ohip ='$ohip'";
    $query2 = "SELECT * FROM doctor WHERE doctor.docLicNum = '$docLicNum'";
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
    
    
    else if($type==="stop"){
        if(mysqli_num_rows($result) == 0){
            die("$pName is not being treated by $dName.");
        }
    }
   

    if($type==="stop"){
        $query4 = "DELETE FROM treats WHERE ohip='$ohip' and docLicNum='$docLicNum'";
        $result = mysqli_query($connection, $query4);
        if(!result) {
            die("database query failed-4.");
            }
        echo $pName . " has stopped being treated by " . $dName;
        echo "<br><br>";
    }
    else{
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