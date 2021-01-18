<?php include './includes/templates/header.php' ?>

        <div class="main_container">
            <div class="title">
                <h1>Listado A: Clientes.</h1>
            </div>
            <table class="table">
                <thead class="table-head">
                    <tr>
                        <th>ID Cliente</th>
                        <th>Nombre</th>
                        <th>Dni</th>
                        <th>Localidad</th>
                        <th>Provincia</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <?php
                    try {
                        require_once('includes/database/functions.php');
                        $clientes = obtenerClientes();

                        while($cliente = mysqli_fetch_assoc($clientes)) { ?>
                            <tr class="table-row">
                                <td><?php echo $cliente['cliente_id']; ?></td>
                                <td><?php echo $cliente['cliente_nombre']; ?></td>
                                <td><?php echo $cliente['cliente_dni']; ?></td>
                                <td><?php echo $cliente['localidad_nombre']; ?></td>
                                <td><?php echo $cliente['provincia_nombre']; ?></td>
                                <td><a href="editar.php?id=<?php echo $cliente['cliente_id']; ?>"><i class="fas fa-pen-square"></i></a></td>
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