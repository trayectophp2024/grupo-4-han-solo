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

        <div class="card  mx-auto  bg-warning" style="max-width: 740px;">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="img/<?= $producto['Imagen'] ?>" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title"><?= $producto['Nombre'] ?></h5>
                        <p class="card-text"><?= $producto['Descripcion'] ?></p>
                        <p class="card-text fs-5">Episodio : <?= $producto['Episodio'] ?></p>
                        <p class="card-text fs-6">Director : <?= $producto['Director'] ?></p>
                        <p class="card-text fs-6">Estreno : <?= $producto['Año_Estreno'] ?></p>
                        <p class="card-text fs-7">Duracion : <?= $producto['Duracion'] ?></p>
                       
                       
                    </div>
                </div>
            </div>
        </div>


    <?php } ?>

</main>

<?php require "partials/footer.php" ?>