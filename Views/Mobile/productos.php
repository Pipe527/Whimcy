<!DOCTYPE html>
<html lang="es">
<head>
<title>Menús del día</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Smart Bazaar Responsive web template, Pedir a domicilio, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="../../Css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../../Css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="../../Css/menu.css" rel="stylesheet" type="text/css" media="all" /> <!-- menu style -->  
<link href="../../Css/animate.min.css" rel="stylesheet" type="text/css" media="all" />     
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="../../Css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- web-fonts -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
<!-- web-fonts -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
<!-- scroll to fixed--> 
<script src="../../JS/jquery-scrolltofixed-min.js" type="text/javascript"></script>
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
<!-- //scroll to fixed--> 
<!-- start-smooth-scrolling -->
<script type="text/javascript" src="../../JS/move-top.js"></script>
<script type="text/javascript" src="../../JS/easing.js"></script>
<script src="../../JS/Filtros.js"></script> <!-- Filtrar -->	
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
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
		};
		
		$().UItoTop({ easingType: 'easeOutQuart' });
		
	});
</script>
<!-- //smooth-scrolling-of-move-up -->  
<!-- the jScrollPane script -->
<script type="text/javascript" src="../../JS/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" id="sourcecode">
	$(function()
	{
		$('.scroll-pane').jScrollPane();
	});
</script>
<!-- //the jScrollPane script -->
<script type="text/javascript" src="../../JS/jquery.mousewheel.js"></script>
<!-- the mousewheel plugin --> 
</head>
<body>
	 	
	<!-- products -->
	<div class="Fondo-body">
	<div class="products">	 
		<div class="container">
			<div class="col-md-9 product-w3ls-right">
				<!-- breadcrumbs --> 
				<ol class="breadcrumb breadcrumb1">
					<li><a href="index.html">Inicio</a></li>
					<li class="active">Pedir</li>
				</ol> 
				<div class="clearfix"> </div>
				<!-- //breadcrumbs -->
				<div class="product-top">
					<h4>Tienda general</h4>
					<ul> 
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Filtrar por<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#" class="categorias" category="Top">Destacado</a></li> 
								<li><a href="#" class="categorias" category="Off">Descuentos</a></li>
								<li><a href="#" class="categorias" category="dessert">Postres</a></li> 
								<li><a href="#" class="categorias" category="market">Mercado</a></li> 
							</ul> 
						</li>
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Restaurantes<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="#" class="categorias" category="market1">Exito</a></li> 
								<li><a href="#" class="categorias" category="market2">McDonals</a></li>
								<li><a href="#" class="categorias" category="food">Comidas</a></li> 
								<li><a href="#" class="categorias" category="market3">Otro</a></li> 
							</ul> 
						</li>
					</ul> 
					<div class="clearfix"> </div>
				</div>
				<div class="products-row">
					<div class="col-md-3 product-grids"> 
						<div class="agile-products" data-price="100-10000" category="market1 Off bebida cold" data-ref="10-0">
							<div class="new-tag"><h6>10%<br>Off</h6></div>
							<a href="../single.html" onclick="cambiarImagen('../../images/g1.png','Coca Cola','2250')"><img src="../../images/g1.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="../single.html" onclick="cambiarImagen('../../images/g1.png','Coca Cola','2250')">Coca Cola</a></h5> 
								<h6><del>$2500</del> $2250</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="w3ls_item" value="Coca Cola"/> 
									<input class="precio" type="hidden" name="amount" value="2250" /> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
								</form> 
							</div>
						</div> 
					</div>   
					<div class="col-md-3 product-grids">
						<div class="agile-products" data-price="0-100" category="market3 combos new" data-ref="0-0">
							<div class="new-tag"><h6>New</h6></div>
							<a href="../single.html" onclick="cambiarImagen('../../images/g2.png','Gourmet','100')" ><img src="../../images/g2.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="../single.html" onclick="cambiarImagen('../../images/g2.png','Gourmet','100')">Gourmet </a></h5> 
								<h6><del>$150</del> $100</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="w3ls_item" value="Gourmet "/> 
									<input class="precio" type="hidden" name="amount" value="100"/> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 product-grids"> 
						<div class="agile-products" data-price="100-10000" category="market1 Off combos" data-ref="30-20">
							<div class="new-tag"><h6>20%<br>Off</h6></div>
							<a href="../single.html" onclick="cambiarImagen('../../images/g3.png','Refrigerios','4800')"><img src="../../images/g3.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="../single.html" onclick="cambiarImagen('../../images/g3.png','Refrigerios','4800')">Refrigerios</a></h5> 
								<h6><del>$6000</del> $4800</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="w3ls_item" value="Refrigerios" /> 
									<input class="precio" type="hidden" name="amount" value="4800" /> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
								</form> 
							</div>
						</div> 
					</div>  
					<div class="col-md-3 product-grids">
						<div class="agile-products" data-price="0-100" category="market3" data-ref="0-0">
							<div class="new-tag"><h6>Venta</h6></div>
							<a href="../single.html" onclick="cambiarImagen('../../images/g4.png','Raisin Bran','40')"><img src="../../images/g4.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="../single.html" onclick="cambiarImagen('../../images/g4.png','Raisin Bran','40')">Raisin Bran</a></h5> 
								<h6><del>$42</del> $40</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="w3ls_item" value="Raisin Bran"/> 
									<input class="precio" type="hidden" name="amount" value="40"/> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 product-grids">
						<div class="agile-products" data-price="100-10000" category="market1 combos" data-ref="0-0">
							<div class="new-tag"><h6>Venta</h6></div>
							<a href="../single.html" onclick="cambiarImagen('../../images/g5.png','Frutos secos','3500')"><img src="../../images/g5.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="../single.html" onclick="cambiarImagen('../../images/g5.png','Frutos secos','3500')">Frutos secos</a></h5> 
								<h6><del>$3700</del> $3500</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="w3ls_item" value="Frutos secos"/> 
									<input class="precio" type="hidden" name="amount" value="3500"/> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 product-grids">
						<div class="agile-products" data-price="0-100" category="market1 prep bebida" data-ref="0-0">
							<div class="new-tag"><h6>Venta</h6></div>
							<a href="../single.html"  onclick="cambiarImagen('../../images/g6.png','Nescafe Café','10')"><img src="../../images/g6.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="../single.html" onclick="cambiarImagen('../../images/g6.png','Nescafe Café','10')">Nescafe Café</a></h5> 
								<h6><del>$12</del> $10</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="w3ls_item" value="Nescafe Café"/> 
									<input class="precio" type="hidden" name="amount" value="10"/> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 product-grids"> 
						<div class="agile-products" data-price="15000-30000" category="food Off Top" data-ref="10-0">
							<div class="new-tag"><h6>10%<br>Off</h6></div>
							<a href="../single.html" onclick="cambiarImagen('../../images/g7.png','Botana','22500')"><img src="../../images/g7.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="../single.html" onclick="cambiarImagen('../../images/g7.png','Botana','22500')">Botana</a></h5> 
								<h6><del>$25000</del> $22500</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="w3ls_item" value="Botana"/> 
									<input class="precio" type="hidden" name="amount" value="22500" /> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
								</form> 
							</div>
						</div> 
					</div>   
					<div class="col-md-3 product-grids">
						<div class="agile-products" data-price="mas" category="Bar licor Esp Off bebida cold new" data-ref="0-0">
							<div class="new-tag"><h6>New</h6></div>
							<a href="../single.html" onclick="cambiarImagen('../../images/g8.png','Coctel de jabalí','46000')"><img src="../../images/g8.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="../single.html" onclick="cambiarImagen('../../images/g8.png','Coctel de jabalí','46000')">Coctel de jabalí </a></h5> 
								<h6><del>$47500</del> $46000</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="w3ls_item" value="Coctel de jabalí"/> 
									<input class="precio" type="hidden" name="amount" value="46000"/> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 product-grids"> 
						<div class="agile-products" data-price="15000-30000" category="Bar licor Off bebida cold" data-ref="10-0">
							<div class="new-tag"><h6>10%<br>Off</h6></div>
							<a href="../single.html" onclick="cambiarImagen('../../images/g9.png','Coctel Margarita','27000')"><img src="../../images/g9.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="../single.html" onclick="cambiarImagen('../../images/g9.png','Coctel Margarita','27000')">Coctel Margarita</a></h5> 
								<h6><del>$30000</del> $27000</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="w3ls_item" value="Coctel Margarita" /> 
									<input class="precio" type="hidden" name="amount" value="27000" /> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
								</form> 
							</div>
						</div> 
					</div>  
					<div class="col-md-3 product-grids">
						<div class="agile-products" data-price="10000-15000" category="Bar food Off" data-ref="10-0">
							<div class="new-tag"><h6>10% <br>Off</h6></div>
							<a href="../single.html" onclick="cambiarImagen('../../images/g10.png','Halloumi Fries','14130')"><img src="../../images/g10.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="../single.html" onclick="cambiarImagen('../../images/g10.png','Halloumi Fries','14130')">Halloumi Fries </a></h5> 
								<h6><del>$15700</del> $14130</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="w3ls_item" value="Halloumi Fries"/> 
									<input class="precio" type="hidden" name="amount" value="14130"/> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 product-grids">
						<div class="agile-products" data-price="15000-30000" category="food" data-ref="0-0">
							<div class="new-tag"><h6>Venta</h6></div>
							<a href="../single.html" onclick="cambiarImagen('../../images/g11.png','Picada','26000')"><img src="../../images/g11.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="../single.html" onclick="cambiarImagen('../../images/g11.png','Picada','26000')">Picada</a></h5> 
								<h6><del>$27000</del> $26000</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="w3ls_item" value="Picada"/> 
									<input class="precio" type="hidden" name="amount" value="26000"/> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 product-grids">
						<div class="agile-products" data-price="10000-15000" category="market2 dessert Top" data-ref="0-0">
							<div class="new-tag"><h6>Venta</h6></div>
							<a href="../single.html" onclick="cambiarImagen('../../images/g12.png','McFlurry Oreo','11500')"><img src="../../images/g12.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="../single.html" onclick="cambiarImagen('../../images/g12.png','McFlurry Oreo','11500')">McFlurry Oreo</a></h5> 
								<h6><del>$12000</del> $11500</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="w3ls_item" value="McFlurry Oreo"/> 
									<input class="precio" type="hidden" name="amount" value="11500"/> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 product-grids"> 
						<div class="agile-products" data-price="100-10000" category="market2 Off dessert" data-ref="10-0">
							<div class="new-tag"><h6>10%<br>Off</h6></div>
							<a href="../single.html" onclick="cambiarImagen('../../images/g13.png','Helado','8100')"><img src="../../images/g13.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="../single.html" onclick="cambiarImagen('../../images/g13.png','Helado','8100')">Helado</a></h5> 
								<h6><del>$9000</del> $8100</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="w3ls_item" value="Helado"/> 
									<input class="precio" type="hidden" name="amount" value="8100" /> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
								</form> 
							</div>
						</div> 
					</div>   
					<div class="col-md-3 product-grids">
						<div class="agile-products" data-price="100-10000" category="market2 food combos prep new" data-ref="0-0">
							<div class="new-tag"><h6>New</h6></div>
							<a href="../single.html" onclick="cambiarImagen('../../images/g14.png','Frijoles MC','10000')"><img src="../../images/g14.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="../single.html" onclick="cambiarImagen('../../images/g14.png','Frijoles MC','10000')">Frijoles MC </a></h5> 
								<h6><del>$10500</del> $10000</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="w3ls_item" value="Frijoles MC "/> 
									<input class="precio" type="hidden" name="amount" value="10000"/> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 product-grids"> 
						<div class="agile-products" data-price="15000-30000" category="food Top Off" data-ref="30-20">
							<div class="new-tag"><h6>20%<br>Off</h6></div>
							<a href="../single.html" onclick="cambiarImagen('../../images/g16.png','Chorote Paisa','22320')"><img src="../../images/g16.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="../single.html" onclick="cambiarImagen('../../images/g16.png','Chorote Paisa','22320')">Chorote Paisa</a></h5> 
								<h6><del>$27.900</del> $22320</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="w3ls_item" value="Chorote Paisa" /> 
									<input class="precio" type="hidden" name="amount" value="22320" /> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
								</form> 
							</div>
						</div> 
					</div>  
					<div class="col-md-3 product-grids">
						<div class="agile-products" data-price="100-10000" category="market2 food Off" data-ref="30-20">
							<div class="new-tag"><h6>20%<br>Off</h6></div>
							<a href="../single.html" onclick="cambiarImagen('../../images/g15.png','Hamburguesa','4800')"><img src="../../images/g15.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="../single.html" onclick="cambiarImagen('../../images/g15.png','Hamburguesa','4800')">Hamburguesa</a></h5> 
								<h6><del>$6000</del> $4800</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="w3ls_item" value="Hamburguesa"/> 
									<input class="precio" type="hidden" name="amount" value="4800"/> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
								</form>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<!-- add-products --> 
				<div class="w3ls-add-grids w3agile-add-products">
					<a href="#"> 
						<h4>TOP 10 DE MENUS ELEGIDOS CON UN<span>20%</span> DE DESCUENTO</h4>
						<h6>Comprar ahora <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h6>
					</a>
				</div> 
				<!-- //add-products -->
			</div>
			<div class="col-md-3 rsidebar">
				<div class="rsidebar-top">
					<div class="slider-left">
						<h4>Filtrar por precio</h4>            
						<div class="row row1 scroll-pane">
							<label class="checkbox"><input type="checkbox" data-range="0-100" name="checkbox"><i></i>0 - $100 </label>
							<label class="checkbox"><input type="checkbox" data-range="100-10000" name="checkbox"><i></i>$100 - $10000 </label> 
							<label class="checkbox"><input type="checkbox" data-range="10000-15000" name="checkbox"><i></i>$10000 - $15000  </label> 
							<label class="checkbox"><input type="checkbox" data-range="15000-30000" name="checkbox"><i></i>$15000 - $30000 </label> 
							<label class="checkbox"><input type="checkbox" data-range="30000-35000" name="checkbox"><i></i>$30000 - $35000 </label> 
							<label class="checkbox"><input type="checkbox" data-range="35000-40000" name="checkbox"><i></i>$35000 - $40000  </label> 
							<label class="checkbox"><input type="checkbox" data-range="mas" name="checkbox"><i></i>Más</label> 
						</div> 
					</div>
					<div class="sidebar-row">
						<a href="#" class="todo"> Quitar filtros</a>
						<h4> Especificos</h4>
						<ul class="faq">
							<li class="item1"><a href="#">Bares<span class="glyphicon glyphicon-menu-down"></span></a>
								<ul>
									<li class="subitem1"><a href="#" class="categorias" category="Bar">Todos</a></li>										
									<li class="subitem1"><a href="#" class="categorias" category="licor">Licores</a></li>										
									<li class="subitem1"><a href="#" class="categorias" category="Esp">Especial</a></li>										
								</ul>
							</li>
							<li class="item2"><a href="#">Bebidas<span class="glyphicon glyphicon-menu-down"></span></a>
								<ul>
									<li class="subitem1"><a href="#" class="categorias" category="cold">Frias </a></li>										
									<li class="subitem1"><a href="#" class="categorias" category="licor">Con alcohol </a></li>										
									<li class="subitem1"><a href="#" class="categorias" category="prep">Preparar </a></li>										
									<li class="subitem1"><a href="#" class="categorias" category="bebida">Todos</a></li>										
								</ul>
							</li>
							<li class="item3"><a href="#">Productos<span class="glyphicon glyphicon-menu-down"></span></a>
								<ul>
									<li class="subitem1"><a href="#" class="categorias" category="combos"> Combos</a></li>										
									<li class="subitem1"><a href="#" class="categorias" category="prep">Preparados </a></li>										
									<li class="subitem1"><a href="#" class="categorias" category="new">Nuevos</a></li>										
								</ul>
							</li>
						</ul>
						<!-- script for tabs -->
						<script type="text/javascript">
							$(function() {
							
								var menu_ul = $('.faq > li > ul'),
									   menu_a  = $('.faq > li > a');
								
								menu_ul.hide();
							
								menu_a.click(function(e) {
									e.preventDefault();
									if(!$(this).hasClass('active')) {
										menu_a.removeClass('active');
										menu_ul.filter(':visible').slideUp('normal');
										$(this).addClass('active').next().stop(true,true).slideDown('normal');
									} else {
										$(this).removeClass('active');
										$(this).next().stop(true,true).slideUp('normal');
									}
								});
							
							});
						</script>
						<!-- script for tabs -->
					</div>
					<div class="sidebar-row">
						<h4>DESCUENTOS</h4>
						<div class="row row1 scroll-pane">
							<label class="checkbox"><input type="checkbox" data-off="0-10" name="checkbox"><i></i>Del - 10% (0)</label>
							<label class="checkbox"><input type="checkbox" data-off="70-60" name="checkbox"><i></i>70% - 60% (0)</label>
							<label class="checkbox"><input type="checkbox" data-off="50-40" name="checkbox"><i></i>50% - 40% (1)</label>
							<label class="checkbox"><input type="checkbox" data-off="30-20" name="checkbox"><i></i>30% - 20% (3)</label>
							<label class="checkbox"><input type="checkbox" data-off="10-5" name="checkbox"><i></i>10% - 5% (5)</label>
							<label class="checkbox"><input type="checkbox" data-off="30-20" name="checkbox"><i></i>30% - 20% (3)</label>
							<label class="checkbox"><input type="checkbox" data-off="10-5" name="checkbox"><i></i>10% - 5% (5)</label>
							<label class="checkbox"><input type="checkbox" data-off="0-0" name="checkbox"><i></i>Otros(8)</label>
						</div>
					</div>
					<div class="sidebar-row">
						<h4>Etiqueta</h4>
						<div class="row row1 scroll-pane">
							<label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Favortiros</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Venta</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Nuevos</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Descuentos</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Recientes</label>
							<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Mercado</label> 
						</div>
					</div>			 
				</div>
				<div class="related-row">
					<h4>Busquedas relacionadas</h4>
					<ul>
						<li><a href="productos.php">Postres </a></li>
						<li><a href="productos.php">Helados</a></li>
						<li><a href="productos.php">Comidas</a></li>
						<li><a href="productos.php">Bebidas </a></li>
						<li><a href="productos.php">Comida rapida</a></li>
						<li><a href="productos.php">McDonalds</a></li>
						<li><a href="productos.php">Bandejas</a></li>
						<li><a href="productos.php">Sopas</a></li>
						<li><a href="productos.php">Pollo</a></li>
						<li><a href="productos.php">KFC</a></li>
					</ul>
				</div>
				<div class="related-row">
					<h4>MENUS DESTACADOS</h4>
					<div class="galry-like">  
						<a href="../single.html" onclick="cambiarImagen('../../images/g16.png','Chorote Paisa','22320')"><img src="../../images/g16.png" class="img-responsive" alt="img"></a>             
						<h4><a href="productos.php" onclick="cambiarImagen('../../images/g16.png','Chorote Paisa','22320')">Chorote Paisa</a></h4> 
						<h5>$22320</h5>       
					</div>
				</div>
			</div>
			<div class="clearfix"> </div>
			<!-- recommendations -->
			
			<!-- //recommendations -->
		</div>
	</div>
	</div>
	<!--//products-->  
	<!-- footer-top -->
	<div class="w3agile-ftr-top">
		<div class="container">
			<div class="ftr-toprow">
				<div class="col-md-4 ftr-top-grids">
					<div class="ftr-top-left">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div> 
					<div class="ftr-top-right">
						<h4>DOMICILIO GRATIS</h4>
						<p>Ciertos restaurantes te ofreceran domicilios gratis, según donde lo pidas </p>
					</div> 
					<div class="clearfix"> </div>
				</div> 
				<div class="col-md-4 ftr-top-grids">
					<div class="ftr-top-left">
						<i class="fa fa-user" aria-hidden="true"></i>
					</div> 
					<div class="ftr-top-right">
						<h4>CUIDADO DEL CLIENTE</h4>
						<p>Restaurantes con calidad y servicios garantizados, y gran variedad alimentaria. </p>
					</div> 
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 ftr-top-grids">
					<div class="ftr-top-left">
						<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
					</div> 
					<div class="ftr-top-right">
						<h4>BUENA CALIDAD</h4>
						<p>Los mejoraes servicios de entrega a docmicilio, con los mejores restaurantes! </p>
					</div>
					<div class="clearfix"> </div>
				</div> 
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //footer-top -->  
	<!-- subscribe -->
	<div class="subscribe"> 
		<div class="container">
			<div class="col-md-6 social-icons w3-agile-icons">
				<h4>Mantenerse en contacto</h4>  
				<ul>
					<li><a href="#" class="fa fa-facebook icon facebook"> </a></li>
					<li><a href="#" class="fa fa-twitter icon twitter"> </a></li>
					<li><a href="#" class="fa fa-google-plus icon googleplus"> </a></li>
					<li><a href="#" class="fa fa-dribbble icon dribbble"> </a></li>
					<li><a href="#" class="fa fa-rss icon rss"> </a></li> 
				</ul>
				<ul class="apps"> 
					<li><h4>Descarga nuestra App : </h4> </li>
					<li><a href="#" class="fa fa-apple"></a></li>
					<li><a href="#" class="fa fa-windows"></a></li>
					<li><a href="#" class="fa fa-android"></a></li>
				</ul>
			</div> 
			<div class="col-md-6 subscribe-right">
				<h4>Unete y descubre nuestros descuentos!</h4> 
				<form action="#" method="post"> 
					<input type="text" name="email" placeholder="Enter your Email..." required="">
					<input type="submit" value="Subscribe">
				</form>
				<div class="clearfix"> </div> 
			</div>
			<div class="clearfix"> </div>
		</div>
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
						<li><i class="fa fa-envelope-o"></i> <a href="mailto:example@mail.com"> mail@whimcy.com</a></li>
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
							<li><a href="login.html">Regresar</a></li> 
							<li><a href="Mapa.html">Restaurantes</a></li>
							<li><a href="Mapa.html">Zonas</a></li>
							<li><a href="login.html">Estado de orden</a></li>
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
	</div>
	<!-- //footer --> 		
	<div class="copy-right"> 
		<div class="container">
			<p>© 2016 Smart bazaar . All rights reserved | Design by <a href="http://w3layouts.com"> W3layouts.</a></p>
		</div>
	</div>
		<!-- cart-js -->
		<script src="../../JS/minicart.js"></script>
		<script>
			w3ls.render();
	
			w3ls.cart.on('w3sb_checkout', function (evt) {
				var items, len, i;
	
				if (this.subtotal() > 0) {
					items = this.items();
	
					for (i = 0, len = items.length; i < len; i++) {
						items[i].set('shipping', 0);
						items[i].set('shipping2', 0);
					}
				}
			});
		</script>  
	<!-- //cart-js -->
	<script src="../../JS/jquery.menu-aim.js"> </script>
	<script src="../../JS/main.js"></script> <!-- Resource jQuery --> 
	<script src="../../JS/bootstrap.js"></script>
	<!-- Abrir submenus -->
	<script src="../../JS/SubMenus.js"></script>
</body>
</html>