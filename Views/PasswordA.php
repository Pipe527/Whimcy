<!DOCTYPE html>
<html lang="es">
<head>
<title>Recuperar contraseña</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../Css/style.css" rel="stylesheet" type="text/css" media="all" />    
<!-- //Custom Theme files -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link href="../Css/font-awesome.css" rel="stylesheet"> 
<!-- js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/b59d19b6f4.js"></script> 
<script src="../JS/jquery-2.2.3.min.js"></script> 
<script src="../JS/jquery-scrolltofixed-min.js" type="text/javascript"></script><!-- fixed nav js -->
<script>
    $(document).ready(function() {

        // Dock the header to the top of the window when scrolled past the banner. This is the default behaviour.

        $('.header-two').scrollToFixed();  
        // previous summary up the page.

        var summaries = $('.summary');
        summaries.each(function(i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];

            summary.scrollToFixed({
                marginTop: $('.header-two').outerHeight(true) + 10, 
                zIndex: 999
            });
        });
    });
</script>
<!-- //js --> 
<!-- web-fonts -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'> 
<!-- web-fonts -->  
<!-- start-smooth-scrolling -->
<script type="text/javascript" src="../JS/move-top.js"></script>
<script type="text/javascript" src="../JS/easing.js"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!-- //end-smooth-scrolling -->
<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
		
			var defaults = {
				containerID: 'toTop', 
				containerHoverID: 'toTopHover', 
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->
</head>
<body>
	<!-- header -->
	<div class="header">	</div>
		<div class="header-three"><!-- header-three -->
			<div class="container">

			</div>
		</div>
	</div>
	<!-- //header -->
	 <div class="Fondo-body"> 	
	<!-- login-recover -->
		<div class="login-box">
			<div id="cardA" class="card card-outline card-primary">
				<div class="card-header text-center">
				<b>Recupera tu contraseña</b>
				</div>
				<div class="card-body">
				<p class="login-box-msg">Ingresa tu correo electrónico. Te confirmaremos el cambio de contraseña.</p>
				<form class="recover-form" id="recoverForm" method="post">
					<div class="input-group mb-3">
					<input type="email" name="email" class="form-control" placeholder="Correo" required>
					<div class="input-group-append">
						<div class="input-group-text">
						<span class="fas fa-envelope"></span>
						</div>
					</div>
					</div>
					<div class="row">
					<div class="col-12">
						<button type="submit" class="btn btn-primary btn-block">Solicitar Contraseña</button>
					</div>
					<!-- /.col -->
					</div>
				</form>
				<p class="mt-3 mb-1">
					<a href="login.html" onclick="redirigirLogin(event)">Iniciar sesion</a>
				</p>
				</div><!-- /.login-card-body -->
			</div>
		</div>
	</div>
	<!-- footer-top -->
</div>
	<!-- //subscribe --> 
	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-info w3-agileits-info">
				<div class="col-md-4 address-left agileinfo">
					<div class="footer-logo header-logo">
					<ul>
						<li><i class="fa fa-map-marker"></i> 123 San Sebastian, Bogotá Colombia.</li>
						<li><i class="fa fa-mobile"></i> 333 222 3333 </li>
						<li><i class="fa fa-phone"></i> +222 11 4444 </li>
						<li><i class="fa fa-envelope-o"></i> <a href="mailto:mail@whimcy.com"> mail@whimcy.com</a></li>
					</ul>
					</div> 
				</div>
				<div class="col-md-8 address-right">
					<div class="col-md-4 footer-grids">
						<h3>Compañia</h3>
						<ul>
							<li><a href="about.html">Sobre Nosotros</a></li>
							<li><a href="marketplace.html">Mercado</a></li>  
							<li><a href="values.html">Nuestros Valores</a></li>  
							<li><a href="privacy.html">Politica de privacidad</a></li>
						</ul>
					</div>
					<div class="col-md-4 footer-grids">
						<h3>Servicios</h3>
						<ul>
							<li><a href="#">Contactenos</a></li>
							<li><a href="login.html" onclick="redirigirLogin(event)">Regresar</a></li> 
							<li><a href="Mapa.html">Restaurantes</a></li>
							<li><a href="Mapa.html#Seccion01">Zonas</a></li>
							<li><a href="login.html" onclick="redirigirLogin(event)">Estado de orden</a></li>
						</ul> 
					</div>
					<div class="col-md-4 footer-grids">
						<h3>Metodos de pago</h3>
						<ul>
							<li><i class="fa fa-laptop" aria-hidden="true"></i> Nequi</li>
							<li><i class="fa fa-money" aria-hidden="true"></i> En efectivo</li>
							<li><i class="fa fa-pie-chart" aria-hidden="true"></i>Daviplata</li>
							<li><i class="fa fa-gift" aria-hidden="true"></i> PSE</li>
							<li><i class="fa fa-credit-card" aria-hidden="true"></i> Trageta Dedito/Credito</li>
						</ul>  
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	
	<!-- //footer -->		
	<div class="copy-right"> 
		<div class="container">
			<p>© 2016 Smart bazaar . All rights reserved | Design by <a href="http://w3layouts.com"> W3layouts.</a></p>
		</div>
	</div> 
	<style> 
	    /* Reajustes */
		.address-right {
			display: none;
		}
		.address-left {
			right: unset;
			bottom: 6.2vh;
			padding: unset;
			margin: auto;
		}
		.exp {
			margin-left: 3.3vw;
		}
		.col-md-8.address-right,
		.col-md-8.address-right *,
		.col-md-8.address-right *::before,
		.col-md-8.address-right *::after {
			box-sizing: content-box !important;
		}
		form {
			margin-top: 0.7em;
		}
		.footer {
			height: 32.2vh;
			background-size: cover;
		}
		.Fondo-body {
			height: 520px;
		}
		.login-box {
			padding: 0px 15.015vw;
			position: relative;
  			top: 6em;
		}
		[type="submit"]:not(:disabled), button:not(:disabled) {
			width: 100%;
		}
		@media (max-width:400px) {
			.exp {
				margin-right: -9.7vw;
			}
			.login-box {
				padding: unset;
			}
		}
	</style>
	<!-- cart-js -->
	<script src="../JS/minicart.js"></script>
	<script src="../JS/StartCart.js"></script>  
	<!-- //cart-js --> 
	 <!-- submenus -->
	<script src="../JS/SubMenus.js"></script>
	<script src="../JS/Assest/sessionManager.js"></script>
	<script src="../JS/FormAnimation.js"></script>
	<!-- menu js aim -->
	<script src="../JS/jquery.menu-aim.js"> </script>
	<script src="../JS/main.js"></script> <!-- Resource jQuery -->
	<!-- //menu js aim --> 
	<!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="../JS/bootstrap.js"></script>
	<!-- Importar el Menu /HTML -->
	<script>
		document.addEventListener("DOMContentLoaded", async () => {
			try {
				const response = await fetch("/whimcy/Views/Menu.php");
				if (!response.ok) throw new Error("Error al cargar Menu.php");

				const html = await response.text();
				document.querySelector(".header").innerHTML = html;
				
				// Activar scripts del menú
				if (typeof inicializarHeaderNav === "function") inicializarHeaderNav();
				if (typeof inicializarLogin === "function") inicializarLogin();
				setTimeout(() => {
					if (typeof StartCart === "function") StartCart();
				}, 200);

			} catch (err) {
				console.error(err);
			}
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