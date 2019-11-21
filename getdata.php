<?php
$query = "SELECT * FROM doctor ORDER BY firstName,lastName";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
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
?>