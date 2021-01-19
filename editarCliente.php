<?php 

$patron = "/^[[:digit:]]+$/";
if (preg_match($patron, $_GET['id'])) {
    $id = (int) $_GET['id'];    
} else {
    die('Error');
}

include './includes/templates/header.php' ?>

        <div class="main_container">
        
            <form class="form" id="form" action="./validarEdicion.php" onsubmit="return validarFormulario()" method="POST">
                <h1>Editar Cliente.</h1>
                <?php
                    try {
                        include_once('includes/database/functions.php');
                        $resultado = obtenerClienteId($id);
                        $cliente = mysqli_fetch_assoc($resultado); 
                        if($cliente === null) {
                            die('Error');
                        } ?>
                
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" value="<?php echo $cliente['cliente_nombre']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="dni">Dni:</label>
                            <input type="text" name="dni" id="dni" value="<?php echo $cliente['cliente_dni']; ?>">
                        </div>

                        <?php $localidades = allLocalidades(); ?>
                        <div class="form-group">
                            <label for="localidad">Localidad:</label>
                            <select name="localidad" id="localidad">
                                <?php while($localidad = mysqli_fetch_assoc($localidades)) :
                                    if($localidad['localidad_id'] === $cliente['cliente_localidad']) { ?>
                                        <option value="<?php echo $localidad['localidad_id']; ?>" selected>
                                            <?php echo $localidad['localidad_nombre']; ?>    
                                        </option>
                                    <?php } else {?>
                                        <option value="<?php echo $localidad['localidad_id']; ?>">
                                            <?php echo $localidad['localidad_nombre']; ?>
                                        </option> 
                                    <?php };   
                                endwhile; ?>
                            </select> 
                        </div> <?php
                    } catch (\Throwable $th) {
                        echo 'Error';
                    }; ?> 

                <div class="form-group">
                    <input type="hidden" name='id' value="<?php echo $cliente['cliente_id']; ?>">
                    <input type="submit" value="Guardar" id="submit-btn">
                </div>
            </form>
        </div>

<?php include './includes/templates/footer.php' ?>