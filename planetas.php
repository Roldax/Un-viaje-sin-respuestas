<!DOCTYPE html>
<html>
<head>
  <title>NEPTUNO</title>
  <link rel="stylesheet" type="text/css" href="styles_planetas.css">
</head>
<body>

<?php
$host = 'localhost';
$db   = 'viaje_respuestas';
$user = 'root';
$pass = 'password';

// Creo una conexión
$conn = new mysqli($host, $user, $pass, $db);

// Compruebo la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escojo una pregunta aleatoria de la base de datos
$sql = "SELECT Enunciado, Opcion1, Opcion2, Opcion3, Opcion4, OpcionCorrecta FROM Preguntas_Facil ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Obtengo el primer resultado (debería haber solo uno)
    $row = $result->fetch_assoc();
    $question = $row['Enunciado'];
    
    // Obtener opciones
    $options = [
        "a) " . $row['Opcion1'],
        "b) " . $row['Opcion2'],
        "c) " . $row['Opcion3'],
        "d) " . $row['Opcion4']
    ];

    $correctAnswer = $row['OpcionCorrecta'];
} else {
    $question = "No hay preguntas disponibles.";
    $options = [];
    $correctAnswer = "";
}
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