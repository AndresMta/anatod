<?php include './includes/templates/header.php' ?>

        <div class="main_container">
        
            <form class="form" id="form" action="./validarInsercion.php" onsubmit="return validarFormulario()" method="POST">
                <h1>Ingresar Cliente.</h1>
                <div class="form-group">
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="nombre" id="nombre">
                </div>

                <div class="form-group">
                    <label for="dni">DNI:</label>
                    <input type="text" name="dni" id="dni">
                </div>

                <div class="form-group">
                    <label for="localidad">Localidad:</label>
                    <select name="localidad" id="localidad">
                        <?php
                            try {
                                require_once('includes/database/functions.php') ;
                                $localidades = allLocalidades(); ?>

                                <option value="null" selected>Seleccione una localidad</option>
                                <?php while($localidad = mysqli_fetch_assoc($localidades)) { ?>
                                <option value="<?php echo $localidad['localidad_id']; ?>">
                                    <?php echo $localidad['localidad_nombre']; ?>
                                </option>
                                <?php }
                            } catch (\Throwable $th) {
                                echo 'Error';
                            }
                        ?>    
                    </select>
                </div>            

                <div class="form-group">
                    <input type="submit" value="Guardar" id="submit-btn">
                </div>
            </form>
        </div>

<?php include './includes/templates/footer.php' ?>
    