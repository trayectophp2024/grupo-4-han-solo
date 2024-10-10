<?php

/*listar categorias por tablas */

function listar_todo($coon,$tabla){

    // 1 realizar consulta query
    $sqlPersonaje = "SELECT * FROM " . $tabla . ";";

    //2 ejecutar la 
    
    $result = $coon->query($sqlPersonaje);

    // 3 retornar y convertir la consulta en un array asociativo

    return $result->fetch_all(MYSQLI_ASSOC);



}
   /* listar un producto en particular */


    function categoria_particular($coon,$tabla,$id){
    // 1 realizar consulta query
    $sqlPersonaje = "SELECT * FROM " . $tabla . " WHERE id = " . $id;

    //2 ejecutar la 
    
    $result = $coon->query($sqlPersonaje);

    // 3 retornar y convertir la consulta en un array asociativo

    return $result->fetch_all(MYSQLI_ASSOC);
}

/* busqueda */ 
 function buscar_productos($conn ,$termino_busqueda){

    //escapar el termino de busqueda para evitar inyecciones sql

    $termino_busqueda = $conn->real_escape_string($termino_busqueda);

    //consulta para buscar en figuras

    $sqlPersonajes = "SELECT 'personajes' as tabla,id,nombre,descripcion,especie,afiliacion,planeta_natal,habilidades,arma,actor,imagen FROM personajes
        WHERE LOWER(nombre) LIKE '%$termino_busqueda%'
    ";
    $sqlnaves = "SELECT 'naves' as tabla,id,nombre,descripcion,tipo,,fabricante,longitud,velocidad_maxima,armamento,capacidad,imagen FROM naves
        WHERE LOWER(nombre) LIKE '%$termino_busqueda%'
    ";

    $sqlsables = "SELECT 'sables' as tabla,id,nombre,descripcion,color,propietario,afiliacion,cristal,imagen FROM sables
        WHERE LOWER(nombre) LIKE '%$termino_busqueda%'
    ";

    $sqlpeliculas = "SELECT 'peliculas' as tabla,id,titulo,episodio,descripcion,director,año_estreno,duracion,imagen FROM peliculas
    WHERE LOWER(nombre) LIKE '%$termino_busqueda%'
    ";



        //ejecutar la consulta y convertir en un array asociativo 
    
        $resultPersonajes = $conn->query($sqlPersonajes)->fetch_all(MYSQLI_ASSOC);
        $resultNaves = $conn->query($sqlnaves)->fetch_all(MYSQLI_ASSOC);
        $resultSables = $conn->query($sqlsables)->fetch_all(MYSQLI_ASSOC);
        $resultpeliculas = $conn->query($sqlsables)->fetch_all(MYSQLI_ASSOC);


        // combinar los resultados de las tres tablas


        $resultado = array_merge($resultPersonajes,$resultNaves,$resultSables);
        
        return $resultado;



 }

?>