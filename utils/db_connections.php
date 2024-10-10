<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "star wars";

$conn = new mysqli($host, $user, $password, $database);

//verificamos conexxion

if ($conn->connect_error) {
    die("conexion fallida:" . $conn->connect_error);
}/*  else {
            echo "conexion exitosa con la base de datos";
    } 
 */