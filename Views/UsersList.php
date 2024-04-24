<?php
require_once ("../Conexion.php");

$sql = "SELECT * FROM usuarios";

$User = $Con->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listados</title>
</head>
<body>
    <h1>Listado de Usuarios</h1>

    <table>
        <thead style="background-color: gray; font-weight: bolder;">
            <tr>
                <th>ID</th> <th>Nombre</th> <th>Apellido</th>
                <th>Nickname</th> <th>Correo</th> <th>Contraseña</th>
                <th>Celular</th> <th>F. Nacimiento</th> <th>Dirección</th> 
                <th>▼</th>
                <th>¤</th>
            </tr>
        </thead> 
        <tbody>       
            <tr>
        <?php
        if ($User) {
            while ($Fila = mysqli_fetch_assoc($User)) {
            ?>
                <td><?php echo intval ($Fila["idUsuarios"])?></td>
                <td><?php echo ($Fila["Nombre"])?></td>
                <td><?php echo ($Fila["Apellido"])?></td>
                <td><?php echo ($Fila["Nickname"])?></td>
                <td><?php echo ($Fila["Correo"])?></td>
                <td><?php echo ($Fila["Contraseña"])?></td>
                <td><?php echo ($Fila["Celular"])?></td>
                <td><?php echo ($Fila["F. Nacimiento"])?></td>
                <td><?php echo ($Fila["Dirección"])?></td>
                <td><a href="UsersEdit.php?id=<?php echo intval ($Fila["idUsuarios"])?>">Editar</a></td>
                <td><form action="../Controllers/UsersControl.php" method ="post">
                    <input type="hidden" name="Eliminar">
                    <input type="hidden" name="id" value= "<?php echo $Fila["idUsuarios"] ?>">
                    <button style= "background-color: crimson" >Eliminar</button>
                </form></td>
            </tr>
            <?php
            }
        } 
        ?>
        

        </tbody>
    </table>
</body>
</html>