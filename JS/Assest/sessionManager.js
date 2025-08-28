// AJAX verificación de sesion - para html
function inicializarLogin() {
    $(document).ready(function () {
        var loggedIn = localStorage.getItem('loggedIn');
        if (loggedIn === "true") {
            $('#login-section').hide();
            $('#profile-section').show();
        } else {
            $('#login-section').show();
            $('#profile-section').hide();
        }

        $.get('/whimcy/Controllers/CheckSesion.php', function (response) {
            console.log("Respuesta de la sesión:", response);

            if (response.loggedIn) {
                localStorage.setItem('loggedIn', true);
                $('#login-section').hide();
                $('#profile-section').html(
                    '<ul>' +
                    '<li><a href="/whimcy/Views/Mobile/profile.php">' + response.user + '</a></li>' +
                    '<li><a href="/whimcy/Views/UsersEdit.php?id=' + response.id + '">Configuración</a></li>' +
                    '<li><a href="/whimcy/Controllers/Logout.php">Cerrar sesión</a></li>' +
                    '</ul>'
                ).show();
                document.querySelectorAll('a[href="login.html"]').forEach(link => {
                    link.addEventListener("click", e => {
                        e.preventDefault();
                        window.location.href = "/whimcy/Views/Mobile/profile.php";
                    });
                });
            } else {
                localStorage.setItem('loggedIn', false);

                $('#login-section').html(
                    '<span class="Login-title">' +
                    '<h3>Mi Cuenta</h3>' +
                    '</span>' +
                    '<form action="/whimcy/Controllers/LogIn.php" name="Login" method="post">' +
                    '<div class="input-dates">' +
                    '<label for="Email">Correo:</label>' +
                    '<input type="email" class="form-control" placeholder="Correo" name="Email" required>' +
                    '</div>' +
                    '<div class="input-dates">' +
                    '<label for="Pass">Contraseña:</label>' +
                    '<input type="password" class="form-control" placeholder="Contraseña" name="Pass" required>' +
                    '</div>' +
                    '<div class="Login-center">' +
                    '<label for="Remember">' +
                    '<input type="checkbox" class="form-control" name="Rem"> Recordarme' +
                    '</label>' +
                    '<a href="#">Contraseña Olvidada</a>' +
                    '</div>' +
                    '<div class="Login-foot">' +
                    '<span>' +
                    '<button type="submit" class="btn-go">Conexión</button>' +
                    '<h3>No tienes cuenta</h3>' +
                    '<button><a href="/whimcy/Views/Registro.php" class="btn-sing">Registrarse</a></button>' +
                    '</span>' +
                    '</div>' +
                    '</form>'
                ).show();
                $('#profile-section').hide();
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.error('Error fetching session data:', textStatus, errorThrown);
        });
    });
}
