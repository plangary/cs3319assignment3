<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Deleting Doctor</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    echo "<br><br>";
    
    $name = $_POST["name"];
    $hosCode = $_POST["hosCode"];
    
    if(empty($hosCode)){
        echo "No hospital code provided!";
    }
    elseif(empty($name)){
        echo "No name provided!";
    }
    else{
        $query = "SELECT hosCode FROM hospital WHERE hosCode = '$hosCode'";
        $result = mysqli_query($connection, $query);

        
        if(!$result){
            die("Query failed");
        }
        if(mysqli_num_rows($result) == 0){
        die("You have entered an invalid hospital code");
        }
        
        else{
            
        
        $query2 = "UPDATE hospital SET name = '$name' WHERE hosCode = '$hosCode'";
        
        if(!mysqli_query($connection,$query2)){
            die("Query failed!: " . mysqli_error($connection));
            }
        echo "Hospital name updated successfully!";
    
        }
        
        mysqli_free_result($result);

    }
        mysqli_close($connection);
    ?>
    
    
    
</body>
</html>