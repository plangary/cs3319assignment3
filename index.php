<!DOCTYPE html>
<html>
    <?php
include 'connectdb.php';
?>
<head>
<meta charset="utf-8">
<title>Welcome!</title>
</head>
    
<body>
    <form action = "getdata.php" method="post">
    <h3>How would you like to order the list of doctors?</h3> <br>
    <input type = "radio" name="order" value="firstName ASC">Alphabetically by first name Ascending<br>
    <input type = "radio" name="order" value="firstName DESC">Alphabetically by first name Descending<br>
    
    <input type = "radio" name="order" value="lastName ASC">Alphabetically by last name Ascending<br>
    
    <input type = "radio" name="order" value="lastName DESC">Alphabetically by last name Descending<br>    
        
    <input type= "submit" value="Submit">
    </form> 
    <br>
    <hr>
    <br>
    
    <form action ="doctorDates.php" method="post">
    Please enter license date (YYYY-MM-DD)
    <input type = "text" name = "date" maxlength="10">
    <input type = "submit" value="Search Date">    
    </form>
    
    
    
    
    
    
    
    
</body>
</html>