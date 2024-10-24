<?php

require_once "utils/funciones.php";
require_once "utils/db_connections.php";


$tabla = $_GET['categorias'] ?? FALSE;
$id = $_GET['id'] ?? FALSE;

$productos = categoria_particular($conn, $tabla, $id);


$producto = $productos[0] ?? NULL

?>

<?php require "partials/header.php" ?>


<main class="tarjetas">


    <?php foreach ($productos as $producto) { ?>
        <div class="p-5">
        <div class="card  mx-auto  bg-warning p-4" style="max-width: 740px;">
            <div class="row g-0">
                <div class="col-md-6 p-4">
                    <img src="img/<?= $producto['Imagen'] ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title"><?= $producto['Nombre'] ?></h5>
                        <p class="card-text"><?= $producto['Descripcion'] ?></p>
                        <p class="card-text fs-5">Tipo : <?= $producto['Tipo'] ?></p>
                        <p class="card-text fs-6">Fabricante : <?= $producto['Fabricante'] ?></p>
                        <p class="card-text fs-6">Longitud : <?= $producto['Longitud'] ?></p>
                        <p class="card-text fs-7">Velocidad Maxima: <?= $producto['Velocidad_Maxima'] ?></p>
                        <p class="card-text fs-4">Armamento : <?= $producto['Armamento'] ?></p>
                        <p class="card-text fs-4">Capcidad : <?= $producto['Capacidad'] ?></p>

                    </div>
                </div>
            </div>
        </div>
        </div>


    <?php } ?>

</main>

<?php require "partials/footer.php" ?>