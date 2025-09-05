<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../Css/Mobile/Home.css">
    <script src="https://kit.fontawesome.com/b59d19b6f4.js" crossorigin="anonymous"></script>
    <title>App Inicio</title>
</head>
<body>
    <div class="carcasa">
        <form action="../../Controllers/LogIn.php" class="formA" method="post">
            <nav class="head-home">
                <a href="../Registro.php"><i class="fa-sharp-duotone fa-regular fa-square-plus icon-hover" style="color: #061c1c;"></i></a>
            </nav>
            <div class="data">
                <input type="hidden" name="mobile" value="1">
                <input type="text" placeholder="Email" name="Email" required="">
                <input type="password" placeholder="Contraseña" name="Pass" required="">
            </div>
            <div class="entrar">
                <i class="fa-solid fa-utensils" style="color: #ffffff;"></i>
                <!-- ----- -->
                 <button type="submit">Entrar</button>
                <!-- ----- -->
                 <i class="fa-solid fa-utensils" style="color: #ffffff;"></i>
            </div>
        </form>
        <div class="foot-home">
            <div class="remember">
                <input type="checkbox"> <p>Recordarme</p>
            </div>
            <a href="../PasswordA.php" class="space">¿Olvidaste la contraseña?</a>
        </div>
        <h2>TASTELY</h2>
    </div>
</body>
</html>