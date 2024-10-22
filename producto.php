<?php

require_once "utils/funciones.php";
require_once "utils/db_connections.php";

/*capturamos la tabla que viene por get (url)*/

$tabla = $_GET['categoria'] ?? false;

/*tablas <validas */
$tablas = [
    'naves' => 'naves',
    'personajes' => 'personajes',
    'sables' => 'sables',
    'peliculas' => 'peliculas'
];

/*comprobar si el array existe*/

if (!array_key_exists($tabla, $tablas)) {
    header('Location: error404.php');
}

//llamar a la funcion

$categorias = listar_todo($conn, $tabla);

/* echo "<pre>";
        var_dump($categorias);
        echo "<pre>";*/

?>

<?php require "partials/header.php" ?>
<div class="fondo">
    <div class=" d-flex justify-content-center p-5">

        <div class="col-6 ">



            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/carrousel04.jpeg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/carrousel05.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="img/carrousel06.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>





        </div>
    </div>
</div>


<main class=" back">

    <div class="row">
        <h1 class="text-center"><?= $tabla ?> </h1>

        <?php foreach ($categorias as $producto) { ?>

            <div class="col-4 mt-4 mb-4 p-5 ">
                <div class="card" style="width: 18rem;">
                    <img src="img/<?= $producto['Imagen'] ?>" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?= $producto['Nombre']; ?></h5>

                        <a href="<?= $tabla ?>.php?categorias=<?= $tabla ?>&id=<?= $producto['id'] ?>" class="btn btn-primary">Ver</a>

                    </div>

                </div>

            </div>
        <?php } ?>

    </div>


</main>



<?php require "partials/footer.php" ?>