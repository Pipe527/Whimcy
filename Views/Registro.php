<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../Css/FRegistro.css">
</head>
<body>

<header>
    <div>
        <?php   include_once("Menu.php") ?>
    </div>
</header>
 <!-- Formulario -->
<div class="card-info">
    <form action= "../Controllers/UsersControl.php"class="form-horizontal" name="Registro" method="Post">
    <div class="backpart">
        <div class="card-header">
                <h3 class="card-title">REGISTRARSE</h3>
                <em>¡Con todo lo de tus restaurantes!</em>
                </div>
            </div>
    <div class="card-body">
        <input type="hidden" name="Crear">
        <div class="doble">
            <div class="input-doble">
                <span class="input-titles">Nombres</span>
                <div class="input-position">
                     <Label for="Nombre"></Label>
                     <input type="text" class="form-controll" placeholder="Nombres" id="Doble1" name="Nombre" required>
                </div>
            </div>

            <div class="input-doble">
                <span class="input-titles">Apellidos</span>
                <div>
                    <Label for="Apellido"></Label>
                    <input type="text" class="form-controll" placeholder="Apellidos" id="Doble2" name="Apellido" required>
                </div>
            </div>
        </div>

        <div class="input-alone">
            <span class="input-titles">Nickname</span>
            <div class="input-group-append">
                <Label for="Nickname"></Label>
                <input type="text" class="form-controll" placeholder="Nickname" id="Doble3" name="Nickname">
            </div>
        </div>

        <div class="double">
            <div class="input-doble">
                <span class="input-titles"><i class="fa-solid fa-phone-volume" style="color: #000000;"></i></span>
                <div class="input-group-append">
                    <Label for="Phone"></Label>
                    <input type="tel" class="form-controll" id="phone" name="Phone" placeholder="321-456-78-90" 
                    pattern="[0-9]{10}" required>
                </div>
            </div>

            <div class="input-doble">                
                <span class="input-titles"><i class="fas fa-envelope" style="color: #000000;"></i></span>
                <div class="input-position">
                    <Label for="Correo"></Label>
                    <input type="email" class="form-controll" name="Correo" placeholder="Email" id="gmail" required>
                </div>
            </div>
        </div>

        <div class="troble">
            <div class="input-doble">
                <span class="input-titles"><i class="fa-solid fa-key" style="color: #000000;"></i></span>
                <div class="input-group-append">
                    <Label for="Contra"></Label>
                    <input type="password" class="form-controll" id="pass" name="pass" placeholder="Contraseña" required>
                </div>
            </div>

            <div class="input-doble">                
                <span class="input-titles"><i class="fa-solid fa-key" style="color: #000000;"></i></span>
                <div class="input-position">
                    <input type="password" class="form-controll" id="Confpass" placeholder="Confirmar contraseña" required>
                </div>
            </div>
        </div>

        <div class="input-alone">
            <span class="input-titles" style="color: #000000;">Fecha de nacimiento</i></span>
            <div class="input-group-append">
                <Label for="Bday"></Label>
                <input type="date" class="form-controll" name="Bday" id="Doble4" required>
            </div>
        </div>

        <div class="input-alone">
            <span class="input-titles ubi"><i class="fa-solid fa-location-dot" style="color: #000000;"></i></span>
            <div class="input-group-append">
                <Label for="Direccion"></Label>
                <input type="text" class="form-controll" name="Direccion" placeholder="Dirección de domicilio" id="Doble5" required>
            </div>
        </div>
        
        <div class="terms">
            <input type="checkbox" required>
            <p>Estoy de a cuerdo con los <a href="privacy.html">terminos y condiciones</a></p>
        </div>
        <div class="return">
            <p>¿Ya tienes cuenta? <a href="login.html">iniciar sesion</a></p>
        </div>
        <!-- Card-footer -->
    <div class="card-footer">
        <button type="submit" class="btn btn-info">¡Registrarme!</button>
        <a href="Index.html"><button type="button" class="btn btn-default float-right">Cancelar</button></a>
    </div>
    </form>
</div>
<footer>
    <?php   include_once("footer.html") ?>  
</footer>
<script>
    with(document.Registro){
        onsubmit = function (e) {
            e.preventDefault();
            var ok = true;
            var PassProcess = document.getElementById('Confpass').value;
            if (ok && document.getElementById('pass').value != PassProcess) {
                ok = false;
                alert("Las contraseñas no coinciden");
                document.getElementById('Confpass').focus();
            }
            if (ok) {   submit();   }
        }
    }
</script>
</body>
</html>
