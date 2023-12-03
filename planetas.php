<!DOCTYPE html>
<html>
<head>
  <title>NEPTUNO</title>
  <link rel="stylesheet" type="text/css" href="styles_planetas.css">
  <script>
    function showAnswer() {
      // Muestra el div con id "answerDiv"
      document.getElementById("answerDiv").style.display = "block";
    }
  </script>
  <style>
    #answerDiv {
      display: none; /* Inicialmente oculto */
    }
  </style>
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
        // Mostrar las opciones
        foreach ($options as $option) {
            // Agregar un evento onclick para llamar a la función showAnswer
            echo '<button class="option" onclick="showAnswer()">' . $option . '</button>';
        }
        ?>
    </div>

    <div id="answerDiv">
        <p>La respuesta correcta es: <?php echo $correctAnswer; ?>.</p>
        <p>Tu respuesta es incorrecta.</p>
    </div>

    <button>Jugar Nuevamente</button>
</div>

</body>
</html>
