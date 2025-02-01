<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regresar</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --color1: #ebbb4c; /* Amarillo brillante */
            --color2: #8c143c; /* Rojo oscuro */
            --bg-color: #f7f7f7; /* Fondo claro */
            --text-color: #333; /* Texto principal */
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        .btn {
            padding: 12px 24px;
            font-size: 18px;
            font-weight: bold;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            text-decoration: none;
            background-color: var(--color1);
            color: white;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn:hover {
            background-color: var(--color2);
            transform: translateY(-2px);
        }
        #contenedor_datos {
            width: 80%;
            max-width: 600px;
            background-color: white;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
        }
        .estilo {
            font-size: 1.2rem;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .estilo:last-child {
            border-bottom: none;
        }
    </style>
</head>
<body>
    <a href="login.php" class="btn">Regresar al Login</a>
    <h1>IMPRIMIR DATOS DE AUTORES</h1>
    <div id="contenedor_datos">
        <!-- Aquí se mostrarán los datos dinámicamente -->
    </div>

    <script>
        // Función para cargar el archivo JSON
        fetch('consulta_resultados.json') // Ruta del archivo JSON
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al cargar el archivo JSON');
                }
                return response.json(); // Convertir a objeto JSON
            })
            .then(data => {
                // Seleccionar el contenedor
                const tabla = document.getElementById('contenedor_datos');

                // Recorrer los datos y agregarlos al contenedor
                data.forEach(autores => {
                    const fila = document.createElement('div');
                    fila.innerHTML = `
                        <p class="estilo">${autores.nombre}</p>
                    `;
                    tabla.appendChild(fila);
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
    </script>
</body>
</html>