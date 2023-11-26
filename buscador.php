<?php
include 'config/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador</title>
    <link rel="shorcut icon" href="img/iconbar.png">
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<form>
<button type="submit" name="filtro" value="nombre_receta">Filtrar por Categoría 2</button>
            <button type="submit" name="filtro" value="categoria3">Filtrar por Categoría 3</button>
            
            <label for="costo-slider" id="costo-label">Costo:</label>
            <input type="range" id="costo-slider" name="costo" min="0" max="100" value="50">
        </form>
<script>
    // Actualiza la etiqueta de costo al mover la barra deslizante
    document.getElementById('costo-slider').addEventListener('input', function () {
    document.getElementById('costo-label').innerText = 'Costo: ' + this.value;
    });
</script>

<?php
if(isset($_GET['enviar'])){
    $busqueda= $_GET['busqueda'];
    $consulta= $con->query("SELECT * FROM recetas WHERE nombre_receta LIKE '%$busqueda%'");
    if ($consulta->num_rows > 0) {
        while ($row = $consulta->fetch_array()) {
            echo '<a href="otra_pagina.php?receta_id=' . $row['id_receta'] . '">';
            echo 'Nombre de la Receta: ' . $row['nombre_receta'] . '     ';
            echo 'Desripcion: ' . $row['descripcion'] . '     ';
            echo 'Tiempo Preparacion: ' . $row['tiempo_preparacion'];
            echo 'Precio: '.$row['costo_aprox'];
            echo '</a><br>';
        }
    }else{
            echo "No se encontraron resultados.";
        }

}

#Precio
if(isset($_GET['filtro'])){
    $filtro = $_GET['filtro'];
    $consulta = $con->query("SELECT * FROM recetas");
    if ($consulta->num_rows > 0) {
        while ($row = $consulta->fetch_array()) {
            echo '<a href="otra_pagina.php?receta_id=' . $row['id_receta'] . '">';
            echo 'Nombre de la Receta: ' . $row['nombre_receta'] . '     ';
            echo 'Precio: '.$row['costo_aprox'];
            echo '</a><br>';
        }
    }else{
            echo "No se encontraron resultados.";
        }
}

?>


</body>
</html>