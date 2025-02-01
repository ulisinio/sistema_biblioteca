<?php
require "seguridad.php";
require "conexion.php";

//Consulta a la bse de datos

$todos_datos = "SELECT * FROM autores";
$resultado = mysqli_query($conectar, $todos_datos);

//Verificar si hay resultados
if ($resultado->num_rows > 0) {
    $datos = [];

    //Obtener cada fila como un arreglo
    while ($fila = $resultado->fetch_assoc()) {
        $datos[] = $fila;
    }

    //Convertir los datos a JSON aceptando caracteres especiales
    $json = json_encode($datos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    //Guardar el JSON en un archivo
    $archivo = "consulta_resultados.json";

    if (file_put_contents($archivo, $json)) {
        echo '
        <script>
        alert("Los datos se guardaron en formato JSON");
        location.href="autor.php";
        </script>
        ';
    } else {
        echo "Error al guardar el archivo.";
    }
}

?>