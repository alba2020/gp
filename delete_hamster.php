<?php

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //add new post
    
    // echo "model = $model color = $color year = $year";
    // валидация

    require_once './db.php'; // connectToDatabase
    $mysqli = connectToDatabase('hamsters');
    
    // $del = intval($_GET['del']);
    // $id = $_GET["id"];
    $id = $_POST['id'];
    // $name = $mysqli->real_escape_string($_POST['name']);
    // $age = $mysqli->real_escape_string($_POST['age']);
    // $profession = $mysqli->real_escape_string($_POST['profession']);
    // $weight = $mysqli->real_escape_string($_POST['weight']);

    $sql = "DELETE FROM hamsters WHERE id = '$id'";
    // $sql = "INSERT INTO hamsters(name, age, profession, weight) VALUES ('$name', '$age', '$profession', '$weight')";

    if ($mysqli->query($sql) === TRUE) {
        //echo "New record created successfully";
        //redirect
        header('Location: /gp/hamster.php', true, 302);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    exit();
  } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id_to_delete = $_GET['del'];
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Delete hamster</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
</head>
<body>
  <h1>Delete hamster</h1>

  <form method="POST">
  <p>Do you really want to delete hamster?</p>

    <button type="submit">delete</button>
    <input type="hidden" name="id" value="<?= $id_to_delete ?>"/>
    <a href="/gp/hamster.php"><input type="button" value="cancel"/></a>
  </form>

</body>
</html>