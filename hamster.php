<?php

require_once './db.php'; // connectToDatabase

function getHamsters($mysqli) {
  // строка запроса
  $sql = "SELECT id, name, age, profession, weight from hamsters;";
  
  if (!$result = $mysqli->query($sql)){
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
  }

  $hamsters = [];

  while($h = $result->fetch_assoc()){
    $hamsters[] = [
      'id' => $h['id'],
      'name' => $h['name'],
      'age' => $h['age'],
      'profession' => $h['profession'],
      'weight' => $h['weight']
    ];
  }

  $result->close();

  return $hamsters;
}

function getHamsterById($mysqli, $id){
  $id = $mysqli->real_escape_string($id);
  $sql = "SELECT id, name, age, profession, weight from hamsters where id = '$id' LIMIT 1";

  // echo $sql;
  // return;

  if (!$result = $mysqli->query($sql)){
    echo "Error: Our query failed to execute and here is why: \n";
    echo "Query: " . $sql . "\n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit;
  }

  $hamster = $result->fetch_assoc();
  $result->close();
  return $hamster;
}

function getMaxWeightHamsterName(array $hamsters) {
  $maxWeight = 0;
  $hamstersName = '';
  foreach ($hamsters as $homa) {
    if ($maxWeight < $homa['weight']) {
        $maxWeight = $homa['weight'];
        $hamstersName = $homa['name'];
    }
  }
  return $hamstersName;
}

function printHamsters(array $hamsters) {
  echo "<h1 id='main_header'>All hamsters</h1>";
  echo "<h1>List of all hamsters</h1>";
  echo "<table>
  <tr>
    <th>name</th>
    <th>age</th>
    <th>profession</th>
    <th>weight</th>
  <tr>";

  // while($h = $hamsters->fetch_assoc()){
    foreach ($hamsters as $h) {
      $id = $h['id'];
      echo "<tr>";
      echo "<td><a href='/gp/hamster.php?id=" . $id . "'>" . $h['name'] . "</a></td>";
      echo "<td>" . $h['age'] . "</td>";
      echo "<td>" . $h['profession'] . "</td>";
      echo "<td>" . $h['weight'] . "</td>";
      echo "<td><a href='/gp/delete_hamster.php?del=" . $h['id'] . "'><input type='button' value='delete'/></a></td>";
      echo "</tr>";
      
    }
    echo "</table>";
    echo "<a href='/gp/add_hamster.php'><input type='button' value='add new hamster'/></a>";
  }

function printHamster($h) {
  echo "<h1>Hamster details</h1>";
  echo "<h3>id: " .  $h['id'] . "</h3>";
  echo "<h3>name: " .  $h['name'] . "</h3>";
  echo "<h3>age: " .  $h['age'] . "</h3>";
  echo "<h4>profession: " .  $h['profession'] . "</h4>";
  echo "<h4>weight: " .  $h['weight'] . "</h4>";
  echo "<a href='/gp/hamster.php'>back</a>";
}


  // @$minWeight = $_GET['minWeight'] || 0;
  // $hamster_name = 'Homa-Homichok';
  // $hamster_age = 3;
  // $hamster_profession = "Food";

  // $hamsters = [
  //   [
  //     'name' => 'Homa-Homichok',
  //     'age' => 3,
  //     'profession' => 'Food',
  //     'weight' => 0.02
  //   ],
  //   [
  //     'name' => 'Homa-Small',
  //     'age' => 5,
  //     'profession' => 'Flower',
  //     'weight' => 0.035
  //   ],
  //   [
  //     'name' => 'Homa-Snow',
  //     'age' => 2,
  //     'profession' => 'White',
  //     'weight' => 0.023
  //   ],
  //   [
  //     'name' => 'Homa-Sanya',
  //     'age' => 2,
  //     'profession' => 'Sunny',
  //     'weight' => 0.045
  //   ],
  //   [
  //     'name' => 'Homa-Byn',
  //     'age' => 1,
  //     'profession' => 'Dog',
  //     'weight' => 0.05
  //   ]
  // ];

  // @$action = $_GET['action'];
  // if($action === 'add') {
  //   // добавим в хвост массива
  //   $hamsters[] = [
  //     'name' => 'Donald',
  //     'age' => 1,
  //     'profession' => 'Teacher',
  //     'weight' => 0.01
  //   ];
  // }
// ----------------------------------------------------------
?>

<html>
<style>
 td {
   border: 1px solid lightgray;
 }
</style>

<body>

  <?php
    $mysqli = connectToDatabase('hamsters');
    
    if (isset($_GET['id'])) { // один хомяк
      // $hamsters = getHamsters($mysqli);
      $hamster = getHamsterById($mysqli, $_GET['id']);
      printHamster($hamster);
      // foreach ($hamsters as $h) {
      //   if ($h['id'] === $_GET['id']) {
      //     printHamster($h);
      //   }
      // }
    } else { // список хомяков
      $hamsters = getHamsters($mysqli);
      printHamsters($hamsters);
      // echo "<p> The biggest hamster:" . getMaxWeightHamsterName($hamsters) . "</p>";
    }
  ?>



</body>
</html>

<?php
  $mysqli->close();
?>