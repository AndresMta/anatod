<?php include './includes/templates/header.php' ?>

        <div class="main_container">
            <div class="title">
                <h1>Listado B: Localidades.</h1>
            </div>
            <table class="table">
                <thead class="table-head">
                    <tr>
                        <th>ID Provincia</th>
                        <th>Nombre</th>
                        <th>Localidad</th>
                        <th>Cantidad de Clientes</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <?php 
                        try {
                            require_once('includes/database/functions.php');
                            $clientesLocalidades = obtenerClientesLocalidades();
                          
                            while($clientesLocalidad = mysqli_fetch_assoc($clientesLocalidades)) {  ?>
                                <tr class="table-row">
                                    <td><?php echo $clientesLocalidad['provincia_id']; ?></td>
                                    <td><?php echo $clientesLocalidad['provincia_nombre']; ?></td>
                                    <td><?php echo $clientesLocalidad['localidad_nombre']; ?></td>
                                    <td><?php echo $clientesLocalidad['cantidad_clientes']; ?></td>
                                </tr> <?php
                            }
                        } catch (\Throwable $th) {
                            echo 'Error';
                        }
                    ?>
                </tbody>
            </table>
        </div>

<?php include './includes/templates/footer.php' ?>