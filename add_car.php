<?php

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //add new post
    
    // echo "model = $model color = $color year = $year";
    // валидация

    require_once './db.php'; // connectToDatabase
    $mysqli = connectToDatabase('cars');

    $model = $mysqli->real_escape_string($_POST['model']);
    $color = $mysqli->real_escape_string($_POST['color']);
    $year = $mysqli->real_escape_string($_POST['year']);

    $sql = "INSERT INTO cars(model, color, year) VALUES ('$model', '$color', '$year')";

    if ($mysqli->query($sql) === TRUE) {
        //echo "New record created successfully";
        //redirect
        header('Location: /gp/cars.php', true, 302);
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
  <title>Page Title</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
</head>
<body>
  <h1>Add new car</h1>

  <form method="POST">
    <input type="text" name="model" placeholder="model"/>
    <input type="text" name="color" placeholder="color"/>
    <input type="text" name="year" placeholder="year"/>
    <button type="submit">add</button>
  </form>

</body>
</html>