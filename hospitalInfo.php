<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Hospital info</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    echo "<br><br>";
    echo "<h2>Here's the info we have for the hospitals</h2>";

    $query = "select h.name, d.firstName, d.lastName, h.headDocStartDate from hospital h, doctor d where h.headDoc = d.docLicNum order by h.name";
    $result = mysqli_query($connection, $query);
    if(!result) {
        die("database query failed.");
    }
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
    echo "Hospital Name: ". $row["name"]."<br>". "First Name: " . $row["firstName"]. "<br>" ."Last Name: ". $row["lastName"]."<br>". "Start Date: ". $row["headDocStartDate"].   "<br>";
    echo "<br><br>";    
    }   
    echo "</ul>";    

    mysqli_free_result($result);
    mysqli_close($connection);

    
    
    ?>


</body>
</html>