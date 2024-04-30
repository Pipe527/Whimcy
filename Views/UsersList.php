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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<script>
function confirmar(id) {
    var resultado = confirm("¿Deseas eliminar el usuario?");
    $.ajax({
        url: 'UsersList.php',
        type: 'post',
        data: { 'resultado': resultado, 'id': id },
        success: function(response) {
            alert(response);
            location.reload();
        }
    });
}
</script>
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
                <td><button style= "background-color: crimson" onclick="confirmar(<?php echo $Fila["idUsuarios"] ?>)">Eliminar</button></td>
            </tr>
            <?php
            }
        } 
        
        if(isset($_POST['resultado']) && $_POST['resultado'] == 'true') {
            $id = $_POST["id"];
            $sql2 = "DELETE FROM usuarios WHERE `usuarios`.`idUsuarios` = $id";
            $Users = $Con->query($sql2);
        }
        
        
        
        ?>
        

        </tbody>
    </table>
</body>
</html>
