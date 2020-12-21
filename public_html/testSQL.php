<?php
include 'sqlConfig.php';
$sql = "SELECT * FROM transation";
$result = $conn->query($sql);; // First parameter is just return of "mysqli_connect()" function
echo "<br>";
echo "<table border='1'>";
while($row = $result->fetch_assoc()) {
   echo "<tr>";
   foreach ($row as $field => $value) { // I you want you can right this line like this: foreach($row as $value) {
       echo "<td>" . $value . "</td>"; // I just did not use "htmlspecialchars()" function. 
   }
   echo "</tr>";
}
echo "</table>";

$conn->close();
?>