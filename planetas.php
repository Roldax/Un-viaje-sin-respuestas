<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEPTUNO</title>
    <link rel="stylesheet" type="text/css" href="styles_planetas.css">
    <style>

    </style>
</head>

<body>

    <?php
    $planets = array("neptuno.jpg", "urano.jpg", "saturno.jpg", "jupiter.jpg", "marte.jpg", "tierra.jpg");

    // Verifica si hay un parámetro 'planet' en la URL y establece la imagen de fondo en consecuencia
    $planetParam = isset($_GET['planet']) ? $_GET['planet'] : $planets[0];

    // Asocia nombres de planetas con títulos
    $planetTitles = array(
        "neptuno.jpg" => "Neptuno",
        "urano.jpg" => "Urano",
        "saturno.jpg" => "Saturno",
        "jupiter.jpg" => "Júpiter",
        "marte.jpg" => "Marte",
        "tierra.jpg" => "Tierra"
    );

    // Obtiene el título actual
    $currentTitle = $planetTitles[$planetParam];

    // Asocia nombres de planetas con niveles de dificultad
    $planetDifficulty = array(
        "neptuno.jpg" => "Preguntas_Facil",
        "urano.jpg" => "Preguntas_Facil",
        "saturno.jpg" => "Preguntas_Medio",
        "jupiter.jpg" => "Preguntas_Medio",
        "marte.jpg" => "Preguntas_Dificil",
        "tierra.jpg" => "Preguntas_Dificil"
    );

    // Obtiene el nivel de dificultad actual
    $currentDifficulty = $planetDifficulty[$planetParam];

    // Selecciona preguntas aleatorias del nivel de dificultad actual
    $host = 'localhost';
    $db = 'viaje_respuestas';
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

    // Escojo una pregunta aleatoria de la base de datos del nivel de dificultad actual
    $sql = "SELECT Enunciado, Opcion1, Opcion2, Opcion3, Opcion4, OpcionCorrecta FROM $currentDifficulty ORDER BY RAND() LIMIT 1";
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
            <h1 id="planetTitle">Neptuno</h1>
        </header>

        <div class="question">
            <h1>Pregunta:</h1>
            <p>
                <?php echo $question; ?>
            </p>
        </div>

        <div class="options">
            <?php
            for ($i = 0; $i < count($options); $i++) {
                // Agregar un evento onclick para llamar a la función correspondiente
                $isCorrect = (strpos($options[$i], $correctAnswer) !== false);

                if ($planetParam === "tierra.jpg" && $isCorrect) {
                    // Si está en el planeta Tierra y la respuesta es correcta, muestra showFinalAnswer
                    $onClickFunction = 'showFinalAnswer()';
                } else {
                    // En otros casos, muestra showCorrectAnswer o showIncorrectAnswer según sea necesario
                    $onClickFunction = $isCorrect ? 'showCorrectAnswer()' : 'showIncorrectAnswer()';
                }

                // Agregar la condición para deshabilitar el botón si el usuario ya respondió
                echo '<button class="option" onclick="' . $onClickFunction . '" ' . ($userAnswered ? 'disabled' : '') . '>' . $options[$i] . '</button>';
            }
            ?>
        </div>

        <div id="correctAnswerdiv">
            <p>Tu respuesta es correcta, consigues avanzar de planeta</p>
            <button id="correct" onclick="nextPlanet()">Siguiente Planeta</button>
        </div>

        <div id="incorrectAnswerdiv">
            <p>Tu respuesta es incorrecta, la respuesta correcta era:
                <?php echo $correctAnswer; ?>
            </p>
            <button id="incorrect" onclick="playAgain()">Jugar Nuevamente</button>
        </div>

        <div id="finalAnswerdiv">
            <p>Tu respuesta es correcta, has conseguido superar la aventura.</p>
            <button id="final" onclick="finalPage()">FINAL</button>
        </div>

        <p id="planetDifficulty" style="position: absolute; bottom: 10px; left: 10px;">
            <?php echo "Nivel de dificultad: " . ucfirst(str_replace("Preguntas_", "", $currentDifficulty)); ?>
        </p>

    </main>

    <script>

        function nextPlanet() {
            var planets = <?php echo json_encode($planets); ?>;
            var currentPlanet = "<?php echo $planetParam; ?>";

            // Encuentra el índice actual en el array
            var currentIndex = planets.indexOf(currentPlanet);

            // Incrementa el índice y asegúrate de no exceder el límite del array
            currentIndex = (currentIndex + 1) % planets.length;

            var nextPlanetImage = planets[currentIndex];
            var nextTitle = "<?php echo $planetTitles[$planetParam]; ?>";
            var nextDifficulty = "<?php echo $planetDifficulty[$planetParam]; ?>";
            var nextPageURL = window.location.href.split('?')[0]; // Obtén la URL actual sin parámetros
            window.location.href = nextPageURL + "?planet=" + nextPlanetImage + "&title=" + encodeURIComponent(nextTitle) + "&difficulty=" + nextDifficulty;
        }



        // Establece la imagen de fondo y el título según el parámetro 'planet' en la URL
        document.body.style.backgroundImage = 'url("./fotos/<?php echo $planetParam; ?>")';
        document.title = "<?php echo $currentTitle; ?>";
        document.getElementById("planetTitle").innerText = "<?php echo $currentTitle; ?>";

        // Mostrar el nivel de dificultad actual
        var currentDifficulty = "<?php echo $currentDifficulty; ?>";
        document.getElementById("planetDifficulty").innerText = "Nivel de dificultad: " + currentDifficulty;

        function playAgain() {
            window.location.href = 'planetas.php';
        }

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

        function showFinalAnswer() {
            document.getElementById("incorrectAnswerdiv").style.display = "none";
            document.getElementById("correctAnswerdiv").style.display = "none";
            document.getElementById("finalAnswerdiv").style.display = "block";
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

        function finalPage() {
            window.location.href = "end.html";
        }


    </script>

</body>

</html>