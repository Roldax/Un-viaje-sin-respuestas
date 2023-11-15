<!DOCTYPE html>
<html>
<head>
  <title>NEPTUNO</title>
  <link rel="stylesheet" type="text/css" href="styles_planetas.css">
</head>
<body>

<?php
$host = 'localhost';
$db   = 'preguntados';
$user = 'administrador';
$pass = 'password';

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch a question from the database (you need to implement this part)
// For now, I'll use a sample question.
$question = "¿Cuál es la capital de Francia?";
$options = ["a) Madrid", "b) Roma", "c) París", "d) Londres"];
$correctAnswer = "c) París";
?>

<div id="div1">
    <h1>NEPTUNO</h1>
</div>

<div id="div2">

    <div class="question">
        <h1>Pregunta:</h1>
        <p><?php echo $question; ?></p>
    </div>

    <div class="options">
        <?php
        // Display options
        foreach ($options as $option) {
            echo '<button class="option">' . $option . '</button>';
        }
        ?>
    </div>

    <div class="result">
        <p>Tu respuesta es <span id="result">incorrecta</span>.</p>
        <p>La respuesta correcta es: <span id="correctAnswer"><?php echo $correctAnswer; ?></span>.</p>
    </div>

    <button id="playAgain">Jugar Nuevamente</button>
</div>

</body>
</html>
