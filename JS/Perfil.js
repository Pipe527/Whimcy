function inicializarLogin(response) {
    if (response.loggedIn) {
        $('#login-section').hide();
        $('#profile-section').html(`
            <ul>
                <li><a href="#">${response.user}</a></li>
                <li><a href="UsersEdit.php?id=${response.id}">Configuración</a></li>
                <li><a href="../Controllers/Logout.php">Cerrar sesión</a></li>
            </ul>
        `).show();
    } else {
        $('#profile-section').hide();
        $('#login-section').html(`
            <span class="Login-title"><h3>Mi Cuenta</h3></span>
            <form action="../Controllers/LogIn.php" name="Login" method="post">
                ...
            </form>
        `).show();
    }
}

