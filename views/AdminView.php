<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="public/css/adminViewStyles.css" type="text/css" rel="stylesheet">
    <link href="public/css/homeStyles.css" type="text/css" rel="stylesheet">
</head>

<body>
    <header>
        <?php include 'public/html/nav.php'; ?>
    </header>
    <div class="banner">
        <h1>Vista de Administrador.<h1>
    </div>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>BLOCK - Admin - Borrar Entradas</h2>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th style="text-align:center;">Número de Entradas</th>
                            <th>Revisar Entradas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí deberías mostrar la información de los usuarios y la cantidad de entradas -->
                        <?php //para mostrar las entradas del usuario
                        $usuarioModel = new UsuarioModel(); // Crear una instancia de UsuarioModel
                        $usuarios = $usuarioModel->obtenerCantEntradasPorUsuario();
                        //si encuentra usuarios
                        if (count($usuarios) > 0) {
                            // Itera a través de las entradas y muestra cada una en una tarjeta
                            //echo var_dump($usuarios);  
                            foreach ($usuarios as $usuario) {
                        ?>
                                <tr>
                                    <td><?php echo $usuario->nombre; ?> <?php echo $usuario->apellido; ?></td>
                                    <td><?php echo $usuario->email; ?></td>
                                    <td style="text-align:center;"><?php echo $usuario->cant_entradas; ?></td>
                                    <td>
                                        <!-- Puedes agregar enlaces para editar o eliminar usuarios -->
                                        <a href="#editUserModal" class="edit" data-toggle="modal">..ver...<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254; </i></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Agrega aquí tus modales para agregar, editar y eliminar usuarios -->
    <!-- Ejemplo de modal para agregar usuario -->
    <div id="addUserModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Add User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <!-- Agrega más campos según sea necesario -->
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-success" value="Add User">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--- Footer--->
    <?php include 'public/html/footerInfoPersonal.html'; ?>
</body>

</html>