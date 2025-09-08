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

<h1 class="inner-title">Cambiar datos</h1>
<?php 
    $sql = "SELECT * FROM usuarios WHERE idUsuarios = ?";
    $stmt = $Con->prepare($sql);
    $stmt->bind_param("i", $ID);
    $stmt->execute();
    $User = $stmt->get_result();
    
    if ($Fila = $User->fetch_assoc()) {
        ?>
        <div id="profile-tabs-content">
        <form action="/whimcy/Controllers/UsersControl.php" method="post">
            <input type="hidden" name="Editar">
            <input type="hidden" name="id" Value=<?php echo ($Fila["idUsuarios"]) ?>>
            <Label class="inner-text" for="Nombre">Nombres: </Label>
            <input type="text" class="form-users" name="Nombre" Value="<?php echo ($Fila["Nombre"]) ?>">
            <br>
            <Label class="inner-text" for="Apellido">Apellidos: </Label>
            <input type="text" class="form-users" name="Apellido" value="<?php echo ($Fila['Apellido']) ?>">
            <br>
            <Label class="inner-text" for="Nickname">Nickname: </Label>
            <input type="text" class="form-users" name="Nickname" Value="<?php echo ($Fila["Nickname"]) ?>">
            <br>
            <Label class="inner-text" for="Correo">Correo: </Label>
            <input type="text" class="form-users" name="Correo" Value="<?php echo ($Fila["Correo"]) ?>">
            <br>
            <Label class="inner-text" for="Phone">Celular: </Label>
            <input type="text" class="form-users" name="Phone" Value="<?php echo ($Fila["Celular"]) ?>">
            <br>
            <Label class="inner-text" for="Bday">F. Nacimiento: </Label>
            <input type="date" class="form-users" name="Bday"Value="<?php echo ($Fila["F. Nacimiento"]) ?>">
            <br>
            <Label class="inner-text" for="Direccion">Dirección: </Label>
            <input type="text" class="form-users" name="Direccion" value="<?php echo $Fila['Dirección']; ?>">
            <br>
            <button class="btn btn-primary btn-block" type="submit">Guardar</button>
            <button class="btn btn-primary btn-flex" onclick= "CancelarEdit(event)" type="button">Cancelar</button>
        </div>
        <?php
    }  else {
        echo "0 resultados";
        }
    ?>

    <script>
        function CancelarEdit(e) {
            e.preventDefault();
            location.reload();
        }
    </script> 

    <style>
        .form-users {
            padding: .175rem .55rem;
            border-radius: 20px;
            line-height: 1.5;
            width: 29%;
        }
        label {
            line-height: 2.5 !important;
        }
    </style>
    
</form>
</body>
</html>