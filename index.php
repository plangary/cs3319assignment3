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
    <h3>Search License before specific date</h3>
    <form action ="doctorDates.php" method="post">
    Please enter license date (YYYY-MM-DD)
    <input type = "text" name="date" maxlength="10">
    <input type = "submit" value="Search Date">    
    </form>
    
    <br>
    <hr>
    <br>
    
    <h3>Add a new doctor</h3>
    <form action = "addDoctor.php" method= "post">
    Enter License Number    
    <input type = "text" name = "docLicNum" maxlength = "4">
    <br><br>    
    First Name    
    <input type = "text" name = "firstName" maxlength = "20">
    <br><br>    
    Last Name    
    <input type = "text" name = "lastName" maxlength = "20">
    <br><br>   
    Specialty    
    <input type = "text" name = "speciality" maxlength = "30">
    <br><br>    
    License Date    
    <input type = "text" name = "licenseDate" maxlength = "10">
    <br><br>    
    Location of Hospital (BBC, ABC, DDE)    
    <input type = "text" name = "hosWorksAt"  required maxlength = "3">
    <br><br>    
    <input type = "submit" value="Submit">    
    </form>
    
    <br>
    <hr>
    <br>
    
    <h3>Enter the license number of the doctor you want to delete</h3>
    <form action = "deleteDoctor.php" method= "post">
    <input type = "text" name = "docLicNum" maxlength = "4">
    <input type = "submit" value="Submit">    
    </form>
      

    
    
    
    
    
</body>
</html>