<?php 

$nombre = trim($_POST['nombre']);
$dni = trim($_POST['dni']);
$localidad = (int) trim($_POST['localidad']);
$id = (int) trim($_POST['id']);

try {
    require_once('includes/database/functions.php');
    $updateExitoso = editarCliente($id, $nombre, $dni, $localidad);
} catch (\Throwable $th) {
    echo 'Error';
}

?>
<?php include './includes/templates/header.php' ?>
        <div class="val-container">
            <?php 
                if($updateExitoso === true) { ?>
                    <div class="val-container_message">
                        <h1>El cliente se ha editado correctamente.</h1>
                        <i class="fas fa-check-circle"></i>
                    </div> <?php
                } else { ?>
                    <div class="val-container_message">
                        <h1>Error. No se ha podido insertar el cliente.</h1>
                        <i class="fas fa-times-circle"></i>
                    </div> <?php
                }
            ?>
        </div>
<?php include './includes/templates/footer.php' ?>