CREATE DATABASE IF NOT EXISTS viaje_respuestas;
Use viaje_respuestas;

CREATE TABLE Preguntas_Facil (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Enunciado VARCHAR(255) NOT NULL,
    Opcion1 VARCHAR(100) NOT NULL,
    Opcion2 VARCHAR(100) NOT NULL,
    Opcion3 VARCHAR(100) NOT NULL,
    Opcion4 VARCHAR(100) NOT NULL,
    OpcionCorrecta VARCHAR(100) NOT NULL
);

CREATE TABLE Preguntas_Medio (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Enunciado VARCHAR(255) NOT NULL,
    Opcion1 VARCHAR(100) NOT NULL,
    Opcion2 VARCHAR(100) NOT NULL,
    Opcion3 VARCHAR(100) NOT NULL,
    Opcion4 VARCHAR(100) NOT NULL,
    OpcionCorrecta VARCHAR(100) NOT NULL
);

CREATE TABLE Preguntas_Dificil (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    Enunciado VARCHAR(255) NOT NULL,
    Opcion1 VARCHAR(100) NOT NULL,
    Opcion2 VARCHAR(100) NOT NULL,
    Opcion3 VARCHAR(100) NOT NULL,
    Opcion4 VARCHAR(100) NOT NULL,
    OpcionCorrecta VARCHAR(100) NOT NULL
);


-- Preguntas fáciles
INSERT INTO Preguntas_Facil (Enunciado, Opcion1, Opcion2, Opcion3, Opcion4, OpcionCorrecta) VALUES
('¿Cuál es la capital de España?', 'Lisboa', 'París', 'Madrid', 'Roma', 'Madrid'),
('¿En qué año se fundó la ONU?', '1945', '1950', '1960', '1975', '1945'),
('¿Quién escribió "Cien años de soledad"?', 'Gabriel García Márquez', 'Isabel Allende', 'Mario Vargas Llosa', 'Julio Cortázar', 'Gabriel García Márquez'),
('¿Cuál es el río más largo de Europa?', 'Danubio', 'Volga', 'Ródano', 'Támesis', 'Volga'),
('¿En qué país se encuentra Machu Picchu?', 'Perú', 'México', 'Colombia', 'Brasil', 'Perú'),
('¿Cuántos huesos tiene el cuerpo humano?', '206', '180', '250', '300', '206'),
('¿Quién fue el primer presidente de Estados Unidos?', 'Thomas Jefferson', 'George Washington', 'John Adams', 'Benjamin Franklin', 'George Washington'),
('¿Cuál es el país más grande del mundo?', 'Canadá', 'Rusia', 'China', 'Estados Unidos', 'Rusia'),
('¿Quién pintó "La noche estrellada"?', 'Claude Monet', 'Vincent van Gogh', 'Pablo Picasso', 'Leonardo da Vinci', 'Vincent van Gogh'),
('¿Cuántas patas tiene un gato?', '4', '6', '8', '10', '4'),
('¿Cuál es el resultado de 2 + 2?', '3', '4', '5', '6', '4'),
('¿En qué continente se encuentra Egipto?', 'Asia', 'África', 'Europa', 'América', 'África'),
('¿Cuál es el mes de diciembre en el calendario?', 'Décimo', 'Undécimo', 'Duodécimo', 'Noveno', 'Duodécimo'),
('¿Cuál es el animal mamífero más grande del mundo?', 'Elefante', 'Ballena Azul', 'Jirafa', 'Hipopótamo', 'Ballena Azul'),
('¿En qué año llegó Cristóbal Colón a América?', '1492', '1510', '1600', '1450', '1492'),
('¿Cuál es el símbolo químico del oro?', 'Ag', 'Au', 'Fe', 'Cu', 'Au'),
('¿Cuál es el resultado de 5 x 4?', '15', '20', '25', '30', '20'),
('¿Qué planeta es conocido como el "Planeta Rojo"?', 'Júpiter', 'Marte', 'Venus', 'Saturno', 'Marte');

-- Preguntas de nivel medio
INSERT INTO Preguntas_Medio (Enunciado, Opcion1, Opcion2, Opcion3, Opcion4, OpcionCorrecta) VALUES
('¿Cuál es la capital de Australia?', 'Sídney', 'Melbourne', 'Canberra', 'Brisbane', 'Canberra'),
('¿En qué año se fundó la Liga de Naciones (predecesora de la ONU)?', '1919', '1925', '1930', '1935', '1919'),
('¿Quién escribió "Don Quijote de la Mancha"?', 'Gabriel García Márquez', 'Miguel de Cervantes', 'Federico García Lorca', 'Jorge Luis Borges', 'Miguel de Cervantes'),
('¿Cuál es el río más largo de América del Norte?', 'Misisipi', 'Yukón', 'Columbia', 'Río Grande', 'Misisipi'),
('¿En qué país se encuentra la ciudad de Petra?', 'Jordania', 'Egipto', 'Siria', 'Irak', 'Jordania'),
('¿Cuántos planetas hay en nuestro sistema solar?', '7', '8', '9', '10', '8'),
('¿Quién fue el segundo presidente de Estados Unidos?', 'John Adams', 'Thomas Jefferson', 'James Madison', 'Alexander Hamilton', 'John Adams'),
('¿Cuál es el país más poblado del mundo?', 'India', 'Estados Unidos', 'China', 'Brasil', 'China'),
('¿Quién pintó "Guernica"?', 'Salvador Dalí', 'Pablo Picasso', 'Vincent van Gogh', 'Diego Rivera', 'Pablo Picasso'),
('¿Cuántas cuerdas tiene una guitarra estándar?', '4', '6', '8', '12', '6'),
('¿Cuál es el resultado de 7 - 3?', '3', '4', '5', '6', '4'),
('¿En qué continente se encuentra Rusia?', 'Asia', 'Europa', 'África', 'América', 'Asia'),
('¿Cuál es el mes de junio en el calendario?', 'Quinto', 'Sexto', 'Décimo', 'Undécimo', 'Sexto'),
('¿Cuál es el mamífero terrestre más rápido?', 'Guepardo', 'León', 'Elefante', 'Rinoceronte', 'Guepardo'),
('¿En qué año se fundó la ciudad de Nueva York?', '1625', '1750', '1800', '1664', '1625'),
('¿Cuál es el símbolo químico del carbono?', 'Ca', 'Co', 'C', 'Cu', 'C'),
('¿Cuál es el resultado de 9 x 7?', '56', '63', '72', '81', '63'),
('¿Cuál es el planeta más cercano al Sol?', 'Mercurio', 'Venus', 'Tierra', 'Marte', 'Mercurio'),
('¿En qué año se firmó la Declaración de Independencia de los Estados Unidos?', '1776', '1789', '1800', '1756', '1776'),
('¿Cuál es el componente principal del gas natural?', 'Metano', 'Etano', 'Propano', 'Butano', 'Metano');

-- Preguntas difíciles
INSERT INTO Preguntas_Dificil (Enunciado, Opcion1, Opcion2, Opcion3, Opcion4, OpcionCorrecta) VALUES
('¿Cuál es la velocidad de la luz en el vacío?', '300,000 km/s', '150,000 km/s', '500,000 km/s', '299,792 km/s', '299,792 km/s'),
('¿En qué año se firmó la Declaración de Independencia de los Estados Unidos?', '1776', '1789', '1800', '1756', '1776'),
('¿Cuál es el componente principal del gas natural?', 'Metano', 'Etano', 'Propano', 'Butano', 'Metano'),
('¿Cuántos dientes permanentes tiene un adulto promedio?', '24', '28', '32', '36', '32'),
('¿En qué año se lanzó el primer satélite artificial, el Sputnik 1?', '1955', '1957', '1960', '1962', '1957'),
('¿Cuál es la montaña más alta del mundo?', 'Monte Everest', 'K2', 'Monte Kilimanjaro', 'Aconcagua', 'Monte Everest'),
('¿Qué científico formuló la teoría de la relatividad?', 'Isaac Newton', 'Galileo Galilei', 'Albert Einstein', 'Niels Bohr', 'Albert Einstein'),
('¿Cuál es el pH del agua pura a temperatura ambiente?', '5', '7', '9', '11', '7'),
('¿En qué año se inauguró la Torre Eiffel?', '1875', '1889', '1901', '1915', '1889'),
('¿Cuántos huesos tiene el cráneo humano?', '14', '22', '28', '32', '22'),
('¿Cuál es el elemento más abundante en la corteza terrestre?', 'Hierro', 'Aluminio', 'Oxígeno', 'Silicio', 'Oxígeno'),
('¿Quién descubrió la penicilina?', 'Alexander Fleming', 'Marie Curie', 'Louis Pasteur', 'Joseph Lister', 'Alexander Fleming'),
('¿Cuántos siglos tiene un milenio?', '1', '10', '50', '100', '10'),
('¿Cuál es la capital de Canadá?', 'Toronto', 'Montreal', 'Ottawa', 'Vancouver', 'Ottawa'),
('¿Cuántas lunas tiene el planeta Marte?', '1', '2', '5', '7', '2'),
('¿Cuál es el metal más ligero?', 'Aluminio', 'Cobre', 'Titanio', 'Litio', 'Litio'),
('¿En qué año se fundó la Organización Mundial de la Salud (OMS)?', '1945', '1950', '1960', '1970', '1948'),
('¿Cuál es el gas responsable del efecto invernadero en la atmósfera terrestre?', 'Ozono', 'Metano', 'Dióxido de carbono', 'Óxido nitroso', 'Dióxido de carbono'),
('¿Cuántos dientes temporales tiene un niño promedio?', '16', '20', '24', '28', '20');

