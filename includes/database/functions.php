<?php

require_once('includes/database/dataBase.php');

$dataBase = new class_db();
$connection = $dataBase -> conn;
    

function allLocalidades() {  
    global $connection;
    $sql = 'SELECT * FROM localidades';
    $results = mysqli_query($connection, $sql);
        
    return $results;         
};

function insertCliente($nombre, $dni, $localidad) {
    global $connection;
    
    $statemet = $connection -> prepare("INSERT INTO clientes (cliente_nombre, cliente_dni, cliente_localidad) VALUES (?, ?, ?)");
    $statemet -> bind_param("ssi", $nombre, $dni, $localidad);
    $exito = $statemet -> execute();
    $statemet -> close();

    return $exito;
}

function obtenerClientes() {
    global $connection;

    $sql = 'SELECT cliente_id, cliente_nombre, cliente_dni, localidad_nombre, provincia_nombre 
            FROM clientes 
            JOIN localidades 
            ON clientes.cliente_localidad = localidades.localidad_id 
            JOIN provincias 
            ON localidades.localidad_provincia = provincias.provincia_id ';
    $results = mysqli_query($connection, $sql);

    return $results;
}

?>