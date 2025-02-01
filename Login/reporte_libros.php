<?php
require 'fpdf/fpdf.php'; // Asegúrate de que la ruta sea correcta para tu archivo FPDF
include "conexion.php"; // Conexión a la base de datos

// Crear una nueva instancia de FPDF
class PDF extends FPDF {
    // Redefinir el método Footer()
    function Footer() {
        // Posicionar a 1.5 cm de la parte inferior
        $this->SetY(-15);
        
        // Establecer fuente con soporte para UTF-8
        $this->SetFont('Helvetica', 'I', 8);
        
        // Fecha
        $this->Cell(0, 10, 'Fecha de descarga: ' . utf8_decode(date('d/m/Y')), 0, 0, 'L');
        
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página ' . $this->PageNo()), 0, 0, 'R');
    }
}

// Crear una nueva instancia del PDF
$pdf = new PDF();
$pdf->AddPage();

// Colores personalizados
$colorFondoHeader = [140, 20, 60]; // Rojo para el encabezado
$colorTextoHeader = [235, 187, 76]; // Amarillo para el texto del encabezado
$colorFondoCeldas = [255, 255, 255]; // Blanco para las celdas
$colorTextoCeldas = [0, 0, 0]; // Negro para el texto de las celdas

// Obtener el ancho de la página
$paginaAncho = $pdf->GetPageWidth();

// Ajustar la imagen para que esté centrada sobre el título
$imagenAncho = 20; // Ancho de la imagen
$imagenX = ($paginaAncho - $imagenAncho) / 2; // Calcula la posición X para centrar la imagen
$pdf->Image('logo.png', $imagenX, 10, $imagenAncho); // Coloca la imagen centrada
$pdf->Ln(20); // Espacio después de la línea

// Configuración de la fuente y título del reporte
$pdf->SetFont('Helvetica', 'B', 16);
$pdf->SetTextColor($colorFondoHeader[0], $colorFondoHeader[1], $colorFondoHeader[2]);
$pdf->Cell(0, 10, utf8_decode('Reporte de Libros'), 0, 1, 'C');

// Línea horizontal roja (hr)
$pdf->SetLineWidth(0.5); // Grosor de la línea
$pdf->SetDrawColor($colorFondoHeader[0], $colorFondoHeader[1], $colorFondoHeader[2]); // Color rojo
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY()); // Coordenadas de la línea
$pdf->Ln(5); // Espacio después de la línea

// Encabezados de la tabla
$pdf->SetFillColor($colorFondoHeader[0], $colorFondoHeader[1], $colorFondoHeader[2]); // Fondo rojo
$pdf->SetTextColor($colorTextoHeader[0], $colorTextoHeader[1], $colorTextoHeader[2]); // Texto amarillo
$pdf->SetFont('Helvetica', 'B', 12);
$pdf->Cell(10, 10, utf8_decode('ID'), 1, 0, 'C', true);  // Celda del ID más pequeña
$pdf->Cell(50, 10, utf8_decode('Título'), 1, 0, 'C', true);
$pdf->Cell(40, 10, utf8_decode('Autor'), 1, 0, 'C', true);
$pdf->Cell(20, 10, utf8_decode('Año'), 1, 0, 'C', true);
$pdf->Cell(40, 10, utf8_decode('Editorial'), 1, 0, 'C', true);
$pdf->Cell(30, 10, utf8_decode('Carrera'), 1, 1, 'C', true);

// Consultar los libros
$query = "
    SELECT libros.id_libro, libros.titulo, autores.nombre AS nombre_autor,
           libros.anio, libros.editorial, carreras.nombre_carrera
    FROM libros
    JOIN autores ON libros.autor = autores.id_autor
    JOIN carreras ON libros.carrera = carreras.id_carrera";
$result = mysqli_query($conectar, $query);

// Agregar datos de la consulta en la tabla
$pdf->SetTextColor($colorTextoCeldas[0], $colorTextoCeldas[1], $colorTextoCeldas[2]); // Texto negro
$pdf->SetFont('Helvetica', '', 8);

// Establecer el color de las líneas de la tabla a negro
$pdf->SetDrawColor(0, 0, 0); // Bordes negros para la tabla

while ($fila = mysqli_fetch_assoc($result)) {
    // Fondo blanco para las celdas
    $pdf->SetFillColor($colorFondoCeldas[0], $colorFondoCeldas[1], $colorFondoCeldas[2]);

    // Celdas con bordes negros y fondo blanco
    $pdf->Cell(10, 10, utf8_decode($fila['id_libro']), 1, 0, 'C', true); // Celda del ID más pequeña
    $pdf->Cell(50, 10, utf8_decode($fila['titulo']), 1, 0, 'C', true);
    $pdf->Cell(40, 10, utf8_decode($fila['nombre_autor']), 1, 0, 'C', true);
    $pdf->Cell(20, 10, utf8_decode($fila['anio']), 1, 0, 'C', true);
    $pdf->Cell(40, 10, utf8_decode($fila['editorial']), 1, 0, 'C', true);
    $pdf->Cell(30, 10, utf8_decode($fila['nombre_carrera']), 1, 1, 'C', true);
}

// Cerrar conexión
mysqli_close($conectar);

// Salida del PDF
$pdf->Output('D', 'reporte_libros.pdf'); // Descarga automática del PDF
?>
