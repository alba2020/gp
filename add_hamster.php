<?php

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //add new post
    
    // echo "model = $model color = $color year = $year";
    // валидация

    require_once './db.php'; // connectToDatabase
    $mysqli = connectToDatabase('hamsters');

    $name = $mysqli->real_escape_string($_POST['name']);
    $age = $mysqli->real_escape_string($_POST['age']);
    $profession = $mysqli->real_escape_string($_POST['profession']);
    $weight = $mysqli->real_escape_string($_POST['weight']);

    $sql = "INSERT INTO hamsters(name, age, profession, weight) VALUES ('$name', '$age', '$profession', '$weight')";

    if ($mysqli->query($sql) === TRUE) {
        //echo "New record created successfully";
        //redirect
        header('Location: /gp/hamster.php', true, 302);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    exit();
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add hamster</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
</head>
<body>
  <h1>Add new hamster</h1>

  <form method="POST">
    <input type="text" name="name" placeholder="name"/>
    <input type="text" name="age" placeholder="age"/>
    <input type="text" name="profession" placeholder="profession"/>
    <input type="text" name="weight" placeholder="weight"/>
    <button type="submit">add</button>
  </form>

</body>
</html>