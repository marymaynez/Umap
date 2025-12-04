<?php
session_start();
require 'conexion.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $correo, $contrasena);
    $stmt->execute();

    $_SESSION['correo'] = $correo; // Guardamos sesión
    header("Location: crear_pago.php");
}
?>
<h2>Registro de Usuario - UMap</h2>
<form method="post">
    Nombre: <input type="text" name="nombre" required><br>
    Correo: <input type="email" name="correo" required><br>
    Contraseña: <input type="password" name="contrasena" required><br>
    <input type="submit" value="Registrarse">
</form>
