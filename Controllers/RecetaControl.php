<?php
require_once("../Conexion.php");
session_start();

function subirImagen($file, $maxW = 300, $maxH = 300) {
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    $tmpName = $file['tmp_name'];
    $info = getimagesize($tmpName);
    if ($info === false) {
        echo "<script>
            alert('El archivo no es una imagen válida.');
            window.location.href = '../Views/Recetas.php';
        </script>";
        exit;
    }

    $ancho = $info[0];
    $alto  = $info[1];
    if ($ancho > $maxW || $alto > $maxH) {
        echo "<script>
            alert('La imagen excede el tamaño máximo permitido (300x300 px).');
            window.location.href = '../Views/Recetas.php';
        </script>";
        exit;
    }

    // Carpeta
    $dir = __DIR__ . "/../uploads/"; // ruta física
    if (!is_dir($dir)) mkdir($dir, 0777, true);

    $name = time() . "_" . basename($file['name']);
    $destino = $dir . $name;

    if (!move_uploaded_file($tmpName, $destino)) {
        "<script>
            alert('Error al guardar la imagen.');
            window.location.href = '../Views/Recetas.php';
        </script>";
        exit;
    }

    return "/Whimcy/uploads/" . $name; // ruta relativa para BD
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idUsuarios = $_SESSION['idUsuarios'];
    $menu   = $Con->real_escape_string($_POST['menu']);
    $receta = $Con->real_escape_string($_POST['receta']);

    $ruta_imagen = null;
    if (isset($_FILES['imagen']) && $_FILES['imagen']['tmp_name'] !== '') {
        $ruta_imagen = subirImagen($_FILES['imagen']);
    }

    // EDITAR
    if (isset($_POST['Editar'])) {
        $idMenu = intval($_POST['id']);
        $sql = "UPDATE receta 
                SET Menu = '$menu', Receta = '$receta'";
        if ($ruta_imagen) {
            $sql .= ", Imagen = '$ruta_imagen'";
        }
        $sql .= " WHERE idMenu = $idMenu AND idUsuarios = $idUsuarios";
        $Con->query($sql);

    // INSERTAR
    } else {
        $sql = "INSERT INTO receta (idUsuarios, Menu, Receta, Imagen)
                VALUES ('$idUsuarios', '$menu', '$receta', '$ruta_imagen')";
        $Con->query($sql);
    }
    
    if ($Con->query($sql)) {
        echo "<div class='exito'>Receta guardada correctamente</div>";
        echo "<a href='../views/Recetas.php' class='boton-regresar'>Regresar</a>";
    } else {
        echo "<div class='error'>Error al guardar: " . $Con->error . "</div>";
        echo "<a href='../views/Recetas.php' class='boton-regresar'>Intentar de nuevo</a>";
    }
}
?>
