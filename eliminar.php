<?php
// Verifica si el parámetro 'archivo' está presente en la URL
if (isset($_GET['archivo'])) {
    // Obtén el nombre del archivo desde el parámetro
    $archivo = basename($_GET['archivo']); // `basename` para evitar el acceso a directorios no deseados

    // Ruta al directorio donde están almacenados los archivos
    $directorio = '/var/www/html/caso01buho/';

    // Ruta completa al archivo a eliminar
    $rutaArchivo = $directorio . $archivo;

    // Verifica si el archivo existe antes de intentar eliminarlo
    if (file_exists($rutaArchivo)) {
        // Intenta eliminar el archivo
        if (unlink($rutaArchivo)) {
            echo "Archivo eliminado correctamente.";
        } else {
            echo "Error al eliminar el archivo.";
        }
    } else {
        echo "El archivo no existe.";
    }
} else {
    echo "No se especificó ningún archivo para eliminar.";
}
?>
