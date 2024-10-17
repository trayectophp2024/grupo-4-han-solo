<?php

require_once "utils/funciones.php";
require_once "utils/db_connections.php"; 


//capturar lo que pone el usuario o el termino busqueda

$termino_busqueda = $_GET['q'] ?? '';

$productos = [];


if ($termino_busqueda) {
    // si hay un termino busqeda nos vamos a la funcion buscar_producto
    $productos = buscar_productos($conn, $termino_busqueda);
}

?>

<?php require "partials/header.php" ?>

<main class="busqueda p-5">
    <h1 class="text-center">Resultados de la busqueda</h1>

    <?php if ($termino_busqueda && !empty($productos)) { ?>
        <div class="row">
            <?php foreach ($productos as $producto) { ?>
                <div class="col-4 mt-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <img src="img/<?=$producto ['Imagen']?>" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?=$producto ['Nombre']?></h5>
                            <h5 class="card-title text-succes"><?=$producto ['Descripcion']?></h5>
                            <a href="<?= $producto['tabla'] ?>.php?categorias=<?= $producto['tabla'] ?>&id=<?= $producto['id'] ?>" class="btn btn-primary">Ver Mas</a>

                        </div>
 
                    </div>

                </div>


            <?php } ?>

        </div>

    <?php }elseif($termino_busqueda) {?>
        <p class="text-center text-warning fs-3"> No se encontraron productos para el termino busqueda:    <?=$termino_busqueda ?></p>
        <?php }else { ?>
        <p class="text-center text-danger fs-3">El campo de busqueda no puede estar vacio</p>

     <?php } ?>






</main>
<?php require "partials/footer.php" ?>
