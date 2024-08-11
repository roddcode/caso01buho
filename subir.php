<?php
// Obtén el nombre de la carpeta desde la URL
$nombreCarpeta = isset($_GET['carpeta']) ? $_GET['carpeta'] : '';

// Verifica que se haya proporcionado un nombre de carpeta
if (empty($nombreCarpeta)) {
    echo "No se proporcionó un nombre de carpeta.";
    exit;
}

// Ruta donde deseas crear la carpeta (por ejemplo, en la carpeta 'descarga')
$carpetaRuta = "./descarga/" . $nombreCarpeta;

// Verifica si la carpeta ya existe antes de crearla
if (!file_exists($carpetaRuta)) {
    mkdir($carpetaRuta, 0755, true);
}

// Maneja la subida de archivos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['archivos'])) {
    $archivos = $_FILES['archivos'];
    $totalArchivos = count($archivos['name']);

    for ($i = 0; $i < $totalArchivos; $i++) {
        $nombreArchivo = str_replace(' ', '_', $archivos['name'][$i]);
        if (move_uploaded_file($archivos['tmp_name'][$i], $carpetaRuta . '/' . $nombreArchivo)) {
            echo "Archivo(s) subido(s) con éxito.";
        } else {
            echo "Error al subir el archivo(s).";
        }
    }
} else {
    echo "No se han recibido archivos.";
}
?>
