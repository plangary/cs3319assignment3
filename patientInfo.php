<html>
<body>
    <?php    
    include 'connectdb.php';
    echo "<br><br>";
    echo "<h1>Patient info</h1>";
    
    $ohip = $_POST["ohip"];
    $pFName='';
    $pLName='';
    
    //query to check if patient exists with provided ohip num
    $query1="SELECT * FROM patient WHERE patient.ohip ='$ohip'";
    //query to check if patient is being treated by anyone
    $query2 = "SELECT * FROM treats where ohip = '$ohip'";

    //run the query
    $result = mysqli_query($connection, $query1);

    if(!result) {
        die("database query failed.");
    }
    //check if patient exists
    else if(mysqli_num_rows($result) == 0){
        die("Patient does not exist. Please provide a valid OHIP number.");
    }
    //retrieve values for patient name and last name
    while ($row = mysqli_fetch_assoc($result)) {
        $pFName=$row["firstname"];
        $pLName=$row["lastname"];
        
    }
    
    $result = mysqli_query($connection, $query2);
    if(!result) {
            die("database query failed.");
    
    }
    //check if patient is being treated by anyone
    else if(mysqli_num_rows($result) == 0){
        die("Patient is not being treated by anyone.");
    }

    //run query to get all doctors treating provided patient
    $query3 = "select distinct p.firstname, p.lastname, d.firstName, d.lastName  from treats t join patient p on p.ohip = '$ohip' join doctor d on t.docLicNum = d.docLicNum";


    $result = mysqli_query($connection, $query3);
    if(!result) {
        die("database query failed.");
    }
    echo "<h3>$pFName $pLName is being treated by:</h3><br>";
    //iterate through array and retrieve first name and last name of doctors
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<ul>";

        $dFirstName = $row["firstName"];
        $dLastName = $row["lastName"];
        echo $dFirstName . " ". $dLastName;
        echo "</ul>";

    }
        
    mysqli_free_result($result);
    mysqli_close($connection);
    
    ?>

<a href="index.php">RETURN TO PREVIOUS PAGE</a>
</body>
</html>