<?php

require_once './db.php'; // connectToDatabase
$mysqli = connectToDatabase('cars');

// строка запроса
$sql = "SELECT model, color, year from cars;";

if (!$result = $mysqli->query($sql)){
  echo "Error: Our query failed to execute and here is why: \n";
  echo "Query: " . $sql . "\n";
  echo "Errno: " . $mysqli->errno . "\n";
  echo "Error: " . $mysqli->error . "\n";
  exit;
}

// if ($result->num_rows === 0) {
//   echo "Result is empty";
//   exit;
// }

// в result лежит ответ бд

echo "<h1 id='main_header'>List of cars</h1>";
echo "<table>
        <tr>
        <th>model</th>
        <th>color</th>
        <th>year</th>
      </tr>";

// перебрать все строки результата в виде ассоц. массивов      
while($car = $result->fetch_assoc()){
  echo "<tr>";
  echo "<td>" . $car['model'] . "</td>";
  echo "<td>" . $car['color'] . "</td>";
  echo "<td>" . $car['year'] . "</td>";
  echo "</tr>";
}
echo "</table>";

echo "<a href='/gp/add_car.php'>add new car</a>";

$result->free();
$mysqli->close();

?>
