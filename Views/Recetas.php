<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/whimcy/Controllers/Paths.php'); 
      require_once(__DIR__ . "/../Conexion.php");

 session_start();

 $editando = false;
 $recetaEditar = [
     'idMenu' => '',
     'Menu' => '',
     'Receta' => '',
     'Imagen' => ''
 ];

 if (isset($_GET['editar'])) {
     $editando = true;
     $idMenu = intval($_GET['editar']);
     $sqlEdit = "SELECT * FROM receta WHERE idMenu = $idMenu AND idUsuarios = " . $_SESSION['idUsuarios'];
     $resultEdit = $Con->query($sqlEdit);
     if ($resultEdit->num_rows > 0) {
         $recetaEditar = $resultEdit->fetch_assoc();
     }
 }
 // Datos de recetas
 $sql = "SELECT r.idMenu, r.Menu, r.Receta, r.Imagen, r.idUsuarios, u.Nickname
        FROM receta r
        INNER JOIN usuarios u ON r.idUsuarios = u.idUsuarios
        ORDER BY r.idMenu DESC";

$result = $Con->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foros-Recetas</title>
    <link rel="stylesheet" href="../Css/Foros.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital@1&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b59d19b6f4.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<?php
 if (!isset($_SESSION['idUsuarios'])) {
    echo "<div class='body center sin-login-container'>
     <p class='Sin-login'>Usuario no autenticado</p>
     <small>Error: debes iniciar sesión para ver las recetas</small>
    </div>
     <a href='login.html' class='login center'>
      <button class='return'>Iniciar sesión</button>
     </a>";
    exit;
 }
?>
<body>
    <div class="header"></div>
    <header>
        <!--NavBar Section-->
        <div class="navbar">
            <nav class="navigation hide" id="navigation">
                <span class="close-icon" id="close-icon" onclick="showIconBar()"><i class="fa fa-close"></i></span>
                <ul class="nav-list">
                    <li class="nav-item"><a href="forums.html">Foros</a></li>
                    <li class="nav-item"><a href="posts.html">Posts</a></li>
                    <li class="nav-item"><a href="detail.html">Temas</a></li>
                </ul>
            </nav>
            <a class="bar-icon" id="iconBar" onclick="hideIconBar()"><i class="fa fa-bars"></i></a>
            <div class="brand">Mis Foros</div>
        </div>
        <!--SearchBox Section-->
        <div class="search-box">
            <div>
                <select name="" id="">
                    <option value="Everything">Todo</option>
                    <option value="Titles">Popular</option>
                    <option value="Descriptions">Descripciones</option>
                </select>
                <input type="text" name="q" placeholder="search ...">
                <button><i class="fa fa-search"></i></button>
            </div>
        </div>
    <div class="container">
        <!--Navigation-->
        <div class="navigate">
            <span><a href="forums.html">Mis Foros - Foros</a> >> <a href="">Hilo General</a></span>
        </div>

        <!--Topic Section-->
        <div class="topic-container">
            <!--Original thread-->
            <div class="head">
                <div class="authors">Principal</div>
                <div class="content">Tema: Mensaje de administración</div>
            </div>

            <div class="body">
                <div class="authors">
                    <div class="username"><a href="">ADMIN</a></div>
                    <div>Administrador</div>
                    <img src="https://cdn.pixabay.com/photo/2015/11/06/13/27/ninja-1027877_960_720.jpg" alt="">
                    <div>Fecha: <u>4/5/2023</u></div>
                    <div>Hora: <u>04:58</u></div>
                </div>
                <div class="content">
                    <b>Saludos a todos, Bienvenidos a Tastely</b>
                    <h2>📢 Normas del Foro de Restaurantes, Recetas y Comidas</h2>
                    <p>
                        Bienvenido/a a nuestra comunidad gastronómica. Este espacio está diseñado 
                        para compartir experiencias, conocimientos y pasión por la cocina. 
                        Para mantener un ambiente respetuoso y organizado, ten en cuenta las 
                        siguientes normas:
                    </p>
                    <br>
                    <ul>
                        <li>🍽️ <b>Respeto mutuo:</b> Todos los miembros deben expresarse de manera cordial, evitando insultos o descalificaciones.</li>
                        <li>📌 <b>Temática adecuada:</b> Publica únicamente temas relacionados con restaurantes, recetas, técnicas culinarias, cultura gastronómica o alimentación.</li>
                        <li>📝 <b>Fuentes y créditos:</b> Si compartes recetas, fotos o artículos, menciona la fuente original cuando no sea de tu autoría.</li>
                        <li>🚫 <b>Prohibido el spam:</b> No se permite publicidad no autorizada ni enlaces ajenos al tema del foro.</li>
                        <li>✅ <b>Contenido útil:</b> Intenta que tus aportes sean claros, completos y de ayuda para otros miembros.</li>
                        <li>👩‍🍳 <b>Recetas propias:</b> ¡Nos encanta la creatividad! Si compartes una receta tuya, incluye ingredientes, pasos y, si es posible, fotos.</li>
                        <li>🔒 <b>Moderación:</b> El equipo de administración podrá editar, mover o eliminar publicaciones que no cumplan estas normas.</li>
                    </ul>
                    <p>
                        Nuestro objetivo es construir un espacio seguro, amigable y lleno de 
                        inspiración culinaria. 🍕🍷  
                        ¡Gracias por ser parte de esta comunidad!
                    </p>
                    <hr>
                    <p><i>— Administración del Foro</i></p>
                    <br>
                    <div class="comment">
                        <button onclick="showComment()">Comentar</button>
                    </div>
                </div>
            </div>
        </div>

        <!--Comment Area-->
        <div class="comment-area hide" id="comment-area">
            <textarea name="comment" id="" placeholder="Comenta aqui ... "></textarea>
            <input type="submit" value="Subir">
        </div>

        <div class="topic-container sub">
            <!--Recetas-->
            <div class="head">
                <div class="authors">Recetas</div>
                <div class="content" id="creator">Creador de recetas</div>
            </div>
            <!-- Formulario para crear nueva receta -->
            <div class="body">
                <div class="authors">
                    <div class="username"><a href="">Registrar de recetas</a></div>
                    <div>Listado</div>
                    <div>ID: <u><?= intval($recetaEditar['idMenu']) ?></u></div>
                    <div>Receta: <u>4586</u></div>
                </div>
                <div class="create">
                    <h2>Recetas del Foro</h2>
                    <?php if ($editando): ?>
                        <div class="aviso-editar">
                            <span>Estás editando la receta: <strong><?= htmlspecialchars($recetaEditar['Menu']) ?></strong></span>
                            <a href="Recetas.php" class="cancelar-btn">
                                Cancelar
                            </a>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="../Controllers/RecetaControl.php" enctype="multipart/form-data" style="margin-bottom:20px;">
                        <label>Imagen de la receta:</label>
                        <input type="file" name="imagen" accept="image/*" required>
                        <small style="display:block; color:#555;">Tamaño máximo permitido: 300 x 300 píxeles</small>
                        <label>Menú:</label>
                        <input type="text" name="menu" required placeholder="Ej: Arepas">
                        <label>Receta (un ingrediente por línea):</label>
                        <textarea name="receta" rows="5" required></textarea>
                        <label>Creado por:</label>
                        <input type="text" name="autor" value="<?= htmlspecialchars($_SESSION['Nickname']) ?>" disabled>
                        <!-- Para POST -->
                        <input type="hidden" name="autor" value="<?= htmlspecialchars($_SESSION['Nickname']) ?>">
                        <?php if ($editando): ?>
                        <input type="hidden" name="id" value="<?= $recetaEditar['idMenu'] ?>">
                        <button type="submit" name="Editar">Guardar cambios</button>
                        <?php else: ?>
                            <button type="submit">Añadir Receta</button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>

        <div class="topic-container">
            <div class="body f-c">
                <!-- Tabla de recetas -->
                <div class="table-head">
                    <div class="status">ID</div>
                    <div class="subjects">Menú</div>
                    <div class="subjects">Receta</div>
                    <div class="last-reply">Creado por ▼</div>
                </div>

                <?php while ($r = $result->fetch_assoc()): ?>
                <div class="table-row">
                    <div class="status"><?= $r["idMenu"] ?></div>
                    <div class="subjects">
                        <?= htmlspecialchars($r["Menu"]) ?>
                        <?php if (!empty($r["Imagen"])): ?>
                            <br>
                            <img src="<?= htmlspecialchars($r["Imagen"]) ?>" 
                                alt="Imagen receta" style="max-width:120px; margin-top:5px;">
                        <?php endif; ?>
                    </div>
                    <div class="subjects">
                        <ul class="receta-list">
                            <?php foreach (explode("\n", $r["Receta"]) as $ingrediente): ?>
                                <li><?= htmlspecialchars($ingrediente) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="last-reply">
                        <?= htmlspecialchars($r["Nickname"]) ?><br>
                        <?php if ($r['idUsuarios'] == $_SESSION['idUsuarios']): ?>
                            <a href="Recetas.php?editar=<?= $r['idMenu'] ?>">
                                <button class="edit-btn">Editar</button>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>
            </div>
        </div>
        

    </div>
    <footer>
        <span>&copy;  Selmi Abderrahim | All Rights Reserved</span>
    </footer>
    <!-- submenus -->
	<script src="../JS/SubMenus.js"></script>
	<script src="../JS/Assest/sessionManager.js"></script>
    <!-- Menus del Foro -->
    <script src="../JS/Second.js"></script>
    <!-- Importar el Menu /PHP -->
	<script>
        const base = "<?= $base ?>";

        $(document).ready(function () {
            $('.header').load(base + '/Views/Menu.php', function (response, status, xhr) {
                // Ejecutar los <script> que vinieron en Menu.php
                $(this).find("script").each(function(){
                    $.globalEval(this.text || this.textContent || this.innerHTML || "");
                });

                if (typeof inicializarLogin === "function") inicializarLogin();
                $.getScript(base + "/JS/SubMenus.js", function () {
                    if (typeof inicializarHeaderNav === "function") inicializarHeaderNav();
                });
                $.getScript(base + "/JS/minicart.js", function () {
                    if (typeof w3ls !== "undefined") {
                        w3ls.render();
                        w3ls.cart.on('w3sb_checkout', function (evt) {
                            if (this.subtotal() > 0) {
                                const items = this.items();
                                for (let i = 0; i < items.length; i++) {
                                    items[i].set('shipping', 0);
                                    items[i].set('shipping2', 0);
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
	<!-- Enlaces dinamicos/ Movil -->
	<script>
	function redirigirLogin(e) { 

        if (window.matchMedia("(max-width: 400px)").matches) {
			e.preventDefault();
            window.location.href = "Mobile/Inicio.php";
        } else {
            window.location.href = "login.html";
        }
    }
	</script>
</body>
</html>