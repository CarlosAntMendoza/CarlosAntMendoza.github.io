<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB1";
 
$conn = new mysqli($servername, $username, $password, $dbname);
 
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
 
$cantidad = isset($_POST['cantidad']) ? (int)$_POST['cantidad'] : 0;
 
$registros = array(
    array("John", "Doe", "john@example.com"),
    array("Jane", "Smith", "jane@example.com"),
    array("Alex", "Johnson", "alex@example.com"),
    array("Emily", "Davis", "emily@example.com"),
    array("Michael", "Brown", "michael@example.com")
);
 
for ($i = 0; $i < $cantidad; $i++) {
    $registro = $registros[$i % count($registros)];
    $sql = "INSERT INTO MyGuests (firstname, lastname, email)
            VALUES ('$registro[0]', '$registro[1]', '$registro[2]')";
   
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
 
$conn->close();
?>
