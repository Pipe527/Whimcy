<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../Css/FRegistro.css">
    <link rel="stylesheet" href="../Css/Estilos.css">
</head>
<body>

<header>
    <div>
        <?php include_once ("Menu.html") ?>
        <div class="card-header">
            <div class="backpart">
                <h3 class="card-title">REGISTRARSE</h3>
                <em>¡Con todo lo de tus restaurantes!</em>
            </div>
        </div>
    </div>
</header>
 <!-- Formulario -->
<div class="card-info">
    <form class="form-horizontal" method="Post">

    
    <div class="card-body">
        <div class="doble">
            <div class="input-doble">
                <span class="input-titles">Nombre</span>
                <div class="input-position">
                     <input type="text" class="form-control" placeholder="Nombre" id="Doble1" name="Nombre">
                </div>
            </div>

            <div class="input-doble">
                <span class="input-titles">Apellido</span>
                <div>
                    <input type="text" class="form-control" placeholder="Apellido" id="Doble2" name="Apellido">
                </div>
            </div>
        </div>

        <div class="input-alone">
            <span class="input-titles">Nickname</span>
            <div class="input-group-append">
                <input type="text" class="form-control" placeholder="Nickname" id="Doble3" name="Nickname">
            </div>
        </div>

        <div class="double">
            <div class="input-doble">
                <span class="input-titles"><i class="fa-solid fa-phone-volume"></i></span>
                <div class="input-group-append">
                    <input type="tel" class="form-control" id="phone" name="Phone" placeholder="321-456-78-90" 
                    pattern="[0-9]{10}" required>
                </div>
            </div>

            <div class="input-doble">                
                <span class="input-titles"><i class="fas fa-envelope"></i></span>
                <div class="input-position">
                    <input type="email" class="form-control" name="Correo" placeholder="Email" id="gmail" required>
                </div>
            </div>
        </div>

        <div class="troble">
            <div class="input-doble">
                <span class="input-titles"><i class="fa-solid fa-key"></i></span>
                <div class="input-group-append">
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" required>
                </div>
            </div>

            <div class="input-doble">                
                <span class="input-titles"><i class="fa-solid fa-key"></i></span>
                <div class="input-position">
                    <input type="password" class="form-control" id="Confpass" placeholder="Confirmar contraseña" required>
                </div>
            </div>
        </div>

        <div class="input-alone">
            <span class="input-titles">Fecha de nacimiento</i></span>
            <div class="input-group-append">
                <input type="date" class="form-control" name="Bday" id="Doble4">
            </div>
        </div>

        <div class="input-alone">
            <span class="input-titles ubi"><i class="fa-solid fa-location-dot"></i></span>
            <div class="input-group-append">
                <input type="text" class="form-control" name="Direccion" placeholder="Dirección de domicilio" id="Doble5">
            </div>
        </div>
        
        <div class="terms">
            <input type="checkbox" required>
            <p>Estoy de a cuerdo con los <a href="">terminos y condiciones</a></p>
        </div>
        <div class="return">
            <p>¿Ya tienes cuenta? <a href="index.html">iniciar sesion</a></p>
        </div>
        <!-- Card-footer -->
    <div class="card-footer">
        <button type="submit" class="btn btn-info">¡Registrarme!</button>
        <button type="submit" class="btn btn-default float-right">Cancelar</button>
    </div>
    </form>
</div>
<footer>
    <?php include_once ("footer.html") ?>
</footer>
</body>
</html>
