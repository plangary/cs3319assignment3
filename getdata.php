<h1>All the doctors</h1>
<?php
    include 'connectdb.php'
?>

<?php
$order= $_POST["order"];
$query = "SELECT * FROM doctor ORDER BY $order";

$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
echo "<h1>Here are the doctors ordered by {$order}</h1>";
echo "<ul>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>";
    $firstName=$row[firstName];
    $lastName=$row[lastName];
    $toprint = "{$firstName} {$lastName}";
    echo $toprint."</li>";
}
mysqli_free_result($result);
echo "</ul>";
mysqli_close($connection);

?><br><br>
<a href="index.php">RETURN TO PREVIOUS PAGE</a>