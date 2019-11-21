<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome!</title>
</head>
    
<body>
    <form action = "getdata.php" method="post">
    How would you like to order the list of doctors?<br>
    <input type = "radio" name="order" value="alph fName">Alphabetically by first name<br>
    <input type = "radio" name="order" value="alph lName">Alphabetically by last name<br>    
    <input type= "submit" value="Submit">
    
    
    
    </form>
    
<?php
include 'connectdb.php';
?>
<?php
    include 'getdata.php';
    ?>
    
</body>
</html>