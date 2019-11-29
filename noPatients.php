<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Doctors</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    echo "<br><br>";
    echo "<h2>Here are the doctors with no patients</h2>";

    //run query to check for doctors with no patients
    $query = "select firstName, lastName from doctor d where not exists (select null from treats where d.docLicNum = treats.docLicNum)";
    
    //make connection to DB
    $result = mysqli_query($connection, $query);
    
    //check if query was a success. If failed, kill script with output message
    if(!result) {
        die("database query failed.");
    }
    //create unordered list
    echo "<ul>";
    //iterate through each row of query and output first name and last name of the doctor
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row["firstName"] . " ". $row["lastName"];
    }
    echo "</ul>";    
    mysqli_free_result($result);
    mysqli_close($connection);
    ?>
</body>
</html>