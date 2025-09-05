<?php   
    include_once("../Conexion.php"); 
    session_start();

    if (isset($_SESSION['idUsuarios'])) {
    $ID = $_SESSION['idUsuarios'];
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>

<h1>Editar Usuarios</h1>
<?php 
    $sql = "SELECT * FROM usuarios WHERE idUsuarios = ?";
    $stmt = $Con->prepare($sql);
    $stmt->bind_param("i", $ID);
    $stmt->execute();
    $User = $stmt->get_result();
    
    if ($Fila = $User->fetch_assoc()) {
        ?>
    <form action="../Controllers/UsersControl.php" method="post">
        <input type="hidden" name="Editar">
        <input type="hidden" name="id" Value=<?php echo ($Fila["idUsuarios"]) ?>>
        <Label for="Nombre"></Label>
        Nombres: <input type="text" name="Nombre" Value="<?php echo ($Fila["Nombre"]) ?>">
        <br>
        <Label for="Apellido"></Label>
        Apellidos: <input type="text" name="Apellido" value="<?php echo ($Fila['Apellido']) ?>">
        <br>
        <Label for="Nickname"></Label>
        Nickname: <input type="text" name="Nickname" Value="<?php echo ($Fila["Nickname"]) ?>">
        <br>
        <Label for="Correo"></Label>
        Correo: <input type="text" name="Correo" Value="<?php echo ($Fila["Correo"]) ?>">
        <br>
        <Label for="Phone"></Label>
        Celular: <input type="text" name="Phone" Value="<?php echo ($Fila["Celular"]) ?>">
        <br>
        <Label for="Bday"></Label>
        F. Nacimiento: <input type="date" name="Bday"Value="<?php echo ($Fila["F. Nacimiento"]) ?>">
        <br>
        <Label for="Direccion"></Label>
        Dirección: <input type="text" name="Direccion" value="<?php echo $Fila['Dirección']; ?>">
        <br>
        <button type="submit">Guardar</button>
        <?php
    }  else {
        echo "0 resultados";
        }
    ?>
    
</form>
</body>
</html>