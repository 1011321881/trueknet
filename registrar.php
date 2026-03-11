<?php
// Permitir que el formulario envíe datos sin bloqueos
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = htmlspecialchars($_POST['correo']);
    $universidad = htmlspecialchars($_POST['universidad']);
    $fecha = date("d-m-Y H:i:s");

    // Formato compatible con los datos de investigación de Trueknet [cite: 86, 101]
    $datos = "FECHA: $fecha | NOMBRE: $nombre | CORREO: $correo | UNIVERSIDAD: $universidad" . PHP_EOL;
    
    // Intentar escribir en el archivo
    if (file_put_contents("usuarios_registrados.txt", $datos, FILE_APPEND)) {
        echo "<script>
                alert('Registro exitoso. Datos guardados para el estudio de Trueknet.');
                window.location.href='index.html';
              </script>";
    } else {
        echo "Error: No se tienen permisos para escribir en el archivo TXT. Ejecute XAMPP como Administrador.";
    }
}
?>