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

// Inicializamos la variable para rastrear si el usuario ha respondido
$userAnswered = false;

// Escojo una pregunta aleatoria de la base de datos
$sql = "SELECT Enunciado, Opcion1, Opcion2, Opcion3, Opcion4, OpcionCorrecta FROM Preguntas_Dificil ORDER BY RAND() LIMIT 1";
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

<main>
  <header>
      <h1>NEPTUNO</h1>
  </header>

    <div class="question">
        <h1>Pregunta:</h1>
        <p><?php echo $question; ?></p>
    </div>

    <div class="options">
    <?php
    for ($i = 0; $i < count($options); $i++) {
        // Agregar un evento onclick para llamar a la función correspondiente
        $isCorrect = (strpos($options[$i], $correctAnswer) !== false);
        $onClickFunction = $isCorrect ? 'showCorrectAnswer()' : 'showIncorrectAnswer()';
        
        // Agregar la condición para deshabilitar el botón si el usuario ya respondió
        echo '<button class="option" onclick="' . $onClickFunction . '" ' . ($userAnswered ? 'disabled' : '') . '>' . $options[$i] . '</button>';
    }
    ?>
    </div>

    <p id="correctAnswerdiv">Tu respuesta es correcta.</p>
   
    <p id="incorrectAnswerdiv">Tu respuesta es incorrecta, la respuesta correcta era: <?php echo $correctAnswer; ?>.</p>
  
    <button onclick="resetGame()">Jugar Nuevamente</button>

  </main>

<script>
    function showIncorrectAnswer() {
        document.getElementById("correctAnswerdiv").style.display = "none";
        document.getElementById("incorrectAnswerdiv").style.display = "block";
        disableButtons();
    }

    function showCorrectAnswer() {
        document.getElementById("incorrectAnswerdiv").style.display = "none";
        document.getElementById("correctAnswerdiv").style.display = "block";
        disableButtons();
    }

    function disableButtons() {
        var buttons = document.getElementsByClassName("option");
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].disabled = true;
        }
        
        // Actualizar la variable para rastrear si el usuario ha respondido
        <?php echo $userAnswered = true; ?>;
    }


</script>

</body>
</html>

