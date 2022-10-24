<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fuzzy+Bubbles:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
    <title>SQL-PHP</title>
</head>
<body>
    
<?php

define("DB_SERVERNAME", "localhost:3306");
define("DB_USERNAME","root");
define("DB_PASSWORD", "root");
define("DB_NAME", "db-university");

// Connect
$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn && $conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
    die();
} 
   
$sql = "SELECT `name`, `level` FROM `degrees`";
$result = $conn->query($sql);
?>

<?= "<h1>Università di Roma</h1>" ?>

<?php
if ($result && $result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

?>
    <div class="container">
        <div class="corsi">
            <?php

                echo $row['name'] . ", tipologia: " . $row['level'];

            ?>
        </div>
   </div>
<?php
    }
} elseif ($result) {
    echo "0 results";
} else {
    echo "query error";
}
?>

<?php
$sql1 = "SELECT `name`, `surname`, `email` FROM `teachers`";
$result1 = $conn->query($sql1);

if ($result1 && $result1->num_rows > 0) {

    while($row = $result1->fetch_assoc()) {

?>
    <div class="container">
        <div class="insegnanti">
        <?php

                echo $row['name'] . " " . $row['surname'] . $row['email'];

            ?>
        </div>
   </div>
<?php
    }
} elseif ($result1) {
    echo "0 results";
} else {
    echo "query error";
}
?>







</body>
</html>