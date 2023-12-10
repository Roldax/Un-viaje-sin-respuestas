<!DOCTYPE html>
<html>
<head>
  <title>NEPTUNO</title>
  <link rel="stylesheet" type="text/css" href="styles_planetas.css">
  <script>

    function showIncorrectAnswer() {
      // Muestra el div con id "incorrectAnswerdiv"
      document.getElementById("incorrectAnswerdiv").style.display = "block";
    }

    function showCorrectAnswer() {
      // Muestra el div con id "correctAnswerdiv"
      document.getElementById("correctAnswerdiv").style.display = "block";
    }
    
  </script>
  <style>
    #correctAnswerdiv {
      display: none; /* Inicialmente oculto */
    }

    #incorrectAnswerdiv {
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
    for ($i = 0; $i < count($options); $i++) {
        // Utilizar trim para eliminar espacios en blanco alrededor de las respuestas
        $cleanCorrectAnswer = trim($correctAnswer);
        $cleanSelectedAnswer = trim($options[$i]);
    ?>
        <!-- Agregar un evento onclick con un condicional if -->
        <button class="option" onclick="<?php
                                        if ($cleanSelectedAnswer === $cleanCorrectAnswer) {
                                            echo 'showCorrectAnswer()';
                                        } else {
                                            echo 'showIncorrectAnswer()';
                                        }
                                        ?>"><?php echo $options[$i]; ?></button>
    <?php
    }
    ?>
</div>




    <div id="correctAnswerdiv">
     <p>Tu respuesta es correcta.</p>
    </div>

    <div id="incorrectAnswerdiv">
     <p>Tu respuesta es incorrecta, la respuesta correcta era: <?php echo $correctAnswer; ?>.</p>
    </div>

    <div class="siguiente">
      <button>Jugar Nuevamente</button>
    </div>

</div>

</body>
</html>
