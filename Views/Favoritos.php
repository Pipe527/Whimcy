<?php session_start(); require_once($_SERVER['DOCUMENT_ROOT'] . '/whimcy/Controllers/Paths.php');?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="../Css/style.css" rel="stylesheet" type="text/css" media="all" /> 
    <title>Favoritos</title>
    <!-- font-awesome icons -->
    <link href="../Css/font-awesome.css" rel="stylesheet"> 
    <!-- //font-awesome icons -->
    <!-- web-fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
    <!-- web-fonts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- Perfil -->
    <script src="../JS/Perfil.js"></script> 
    <!-- scroll to fixed--> 
    <script src="../JS/jquery-scrolltofixed-min.js" type="text/javascript"></script>
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
</head>
<body>
    <div class="header"> </div>
        <div class="Fondo-body">
            <!-- breadcrumbs -->
            <div class="container">
                <ol class="breadcrumb breadcrumb1">
                    <li><a href="index.html">Inicio</a></li>
                    <li><a href="products.php">Pedir</a></li>
                    <li class="active">Favoritos</li>
                </ol>
                <div class="clearfix"> </div>
            </div>
            <div class="products-row">
					<div class="col-md-3 product-grids"> 
						<div class="agile-products" data-price="100-10000" category="market1 Off bebida cold" data-ref="10-0" data-product-id="1">
							<div class="new-tag"><h6>10%<br>Off</h6></div>
							<a href="single.html" onclick="cambiarImagen('../images/g1.png','Coca Cola','2250')"><img src="../images/g1.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="single.html" onclick="cambiarImagen('../images/g1.png','Coca Cola','2250')">Coca Cola</a></h5> 
								<h6><del>$2500</del> $2250</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="w3ls_item" value="Coca Cola"/> 
									<input class="precio" type="hidden" name="amount" value="2250" /> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
								</form>
                                <button class="fav w3ls-cart-like" data-product-id="1" data-active="false">
                                    <i class="fa-solid fa-heart-crack" aria-hidden="true"></i>
                                </button> 
							</div>
						</div> 
					</div>   
					<div class="col-md-3 product-grids">
						<div class="agile-products" data-price="0-100" category="market3 combos new" data-ref="0-0" data-product-id="2">
							<div class="new-tag"><h6>New</h6></div>
							<a href="single.html" onclick="cambiarImagen('../images/g2.png','Gourmet','100')" ><img src="../images/g2.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="single.html" onclick="cambiarImagen('../images/g2.png','Gourmet','100')">Gourmet </a></h5> 
								<h6><del>$150</del> $100</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="w3ls_item" value="Gourmet "/> 
									<input class="precio" type="hidden" name="amount" value="100"/> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
                                    <button class="fav w3ls-cart-like" data-product-id="2" data-active="false">
                                        <i class="fa-solid fa-heart-crack" aria-hidden="true"></i>
                                    </button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 product-grids"> 
						<div class="agile-products" data-price="100-10000" category="market1 Off combos" data-ref="30-20" data-product-id="3">
							<div class="new-tag"><h6>20%<br>Off</h6></div>
							<a href="single.html" onclick="cambiarImagen('../images/g3.png','Refrigerios','4800')"><img src="../images/g3.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="single.html" onclick="cambiarImagen('../images/g3.png','Refrigerios','4800')">Refrigerios</a></h5> 
								<h6><del>$6000</del> $4800</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="w3ls_item" value="Refrigerios" /> 
									<input class="precio" type="hidden" name="amount" value="4800" /> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
                                    <button class="fav w3ls-cart-like" data-product-id="3" data-active="false">
                                        <i class="fa-solid fa-heart-crack" aria-hidden="true"></i>
                                    </button>
								</form> 
							</div>
						</div> 
					</div>  
					<div class="col-md-3 product-grids">
						<div class="agile-products" data-price="0-100" category="market3" data-ref="0-0" data-product-id="4">
							<div class="new-tag"><h6>Venta</h6></div>
							<a href="single.html" onclick="cambiarImagen('../images/g4.png','Raisin Bran','40')"><img src="../images/g4.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="single.html" onclick="cambiarImagen('../images/g4.png','Raisin Bran','40')">Raisin Bran</a></h5> 
								<h6><del>$42</del> $40</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="w3ls_item" value="Raisin Bran"/> 
									<input class="precio" type="hidden" name="amount" value="40"/> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
                                    <button class="fav w3ls-cart-like" data-product-id="4" data-active="false">
                                        <i class="fa-solid fa-heart-crack" aria-hidden="true"></i>
                                    </button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 product-grids">
						<div class="agile-products" data-price="100-10000" category="market1 combos" data-ref="0-0" data-product-id="5">
							<div class="new-tag"><h6>Venta</h6></div>
							<a href="single.html" onclick="cambiarImagen('../images/g5.png','Frutos secos','3500')"><img src="../images/g5.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="single.html" onclick="cambiarImagen('../images/g5.png','Frutos secos','3500')">Frutos secos</a></h5> 
								<h6><del>$3700</del> $3500</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="w3ls_item" value="Frutos secos"/> 
									<input class="precio" type="hidden" name="amount" value="3500"/> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
                                    <button class="fav w3ls-cart-like" data-product-id="5" data-active="false">
                                        <i class="fa-solid fa-heart-crack" aria-hidden="true"></i>
                                    </button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 product-grids">
						<div class="agile-products" data-price="0-100" category="market1 prep bebida" data-ref="0-0" data-product-id="6">
							<div class="new-tag"><h6>Venta</h6></div>
							<a href="single.html"  onclick="cambiarImagen('../images/g6.png','Nescafe Café','10')"><img src="../images/g6.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="single.html" onclick="cambiarImagen('../images/g6.png','Nescafe Café','10')">Nescafe Café</a></h5> 
								<h6><del>$12</del> $10</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="w3ls_item" value="Nescafe Café"/> 
									<input class="precio" type="hidden" name="amount" value="10"/> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
                                    <button class="fav w3ls-cart-like" data-product-id="6" data-active="false">
                                        <i class="fa-solid fa-heart-crack" aria-hidden="true"></i>
                                    </button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 product-grids"> 
						<div class="agile-products" data-price="15000-30000" category="food Off Top" data-ref="10-0" data-product-id="7">
							<div class="new-tag"><h6>10%<br>Off</h6></div>
							<a href="single.html" onclick="cambiarImagen('../images/g7.png','Botana','22500')"><img src="../images/g7.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="single.html" onclick="cambiarImagen('../images/g7.png','Botana','22500')">Botana</a></h5> 
								<h6><del>$25000</del> $22500</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="w3ls_item" value="Botana"/> 
									<input class="precio" type="hidden" name="amount" value="22500" /> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
                                    <button class="fav w3ls-cart-like" data-product-id="7" data-active="false">
                                        <i class="fa-solid fa-heart-crack" aria-hidden="true"></i>
                                    </button>
								</form> 
							</div>
						</div> 
					</div>   
					<div class="col-md-3 product-grids">
						<div class="agile-products" data-price="mas" category="Bar licor Esp Off bebida cold new" data-ref="0-0" data-product-id="8">
							<div class="new-tag"><h6>New</h6></div>
							<a href="single.html" onclick="cambiarImagen('../images/g8.png','Coctel de jabalí','46000')"><img src="../images/g8.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="single.html" onclick="cambiarImagen('../images/g8.png','Coctel de jabalí','46000')">Coctel de jabalí </a></h5> 
								<h6><del>$47500</del> $46000</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="w3ls_item" value="Coctel de jabalí"/> 
									<input class="precio" type="hidden" name="amount" value="46000"/> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
                                    <button class="fav w3ls-cart-like" data-product-id="8" data-active="false">
                                        <i class="fa-solid fa-heart-crack" aria-hidden="true"></i>
                                    </button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 product-grids"> 
						<div class="agile-products" data-price="15000-30000" category="Bar licor Off bebida cold" data-ref="10-0" data-product-id="9">
							<div class="new-tag"><h6>10%<br>Off</h6></div>
							<a href="single.html" onclick="cambiarImagen('../images/g9.png','Coctel Margarita','27000')"><img src="../images/g9.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="single.html" onclick="cambiarImagen('../images/g9.png','Coctel Margarita','27000')">Coctel Margarita</a></h5> 
								<h6><del>$30000</del> $27000</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="w3ls_item" value="Coctel Margarita" /> 
									<input class="precio" type="hidden" name="amount" value="27000" /> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
                                    <button class="fav w3ls-cart-like" data-product-id="9" data-active="false">
                                        <i class="fa-solid fa-heart-crack" aria-hidden="true"></i>
                                    </button>
								</form> 
							</div>
						</div> 
					</div>  
					<div class="col-md-3 product-grids">
						<div class="agile-products" data-price="10000-15000" category="Bar food Off" data-ref="10-0" data-product-id="10">
							<div class="new-tag"><h6>10% <br>Off</h6></div>
							<a href="single.html" onclick="cambiarImagen('../images/g10.png','Halloumi Fries','14130')"><img src="../images/g10.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="single.html" onclick="cambiarImagen('../images/g10.png','Halloumi Fries','14130')">Halloumi Fries </a></h5> 
								<h6><del>$15700</del> $14130</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="w3ls_item" value="Halloumi Fries"/> 
									<input class="precio" type="hidden" name="amount" value="14130"/> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
                                    <button class="fav w3ls-cart-like" data-product-id="10" data-active="false">
                                        <i class="fa-solid fa-heart-crack" aria-hidden="true"></i>
                                    </button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 product-grids">
						<div class="agile-products" data-price="15000-30000" category="food" data-ref="0-0" data-product-id="11">
							<div class="new-tag"><h6>Venta</h6></div>
							<a href="single.html" onclick="cambiarImagen('../images/g11.png','Picada','26000')"><img src="../images/g11.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="single.html" onclick="cambiarImagen('../images/g11.png','Picada','26000')">Picada</a></h5> 
								<h6><del>$27000</del> $26000</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="w3ls_item" value="Picada"/> 
									<input class="precio" type="hidden" name="amount" value="26000"/> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
                                    <button class="fav w3ls-cart-like" data-product-id="11" data-active="false">
                                        <i class="fa-solid fa-heart-crack" aria-hidden="true"></i>
                                    </button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 product-grids">
						<div class="agile-products" data-price="10000-15000" category="market2 dessert Top" data-ref="0-0"data-product-id="12">
							<div class="new-tag"><h6>Venta</h6></div>
							<a href="single.html" onclick="cambiarImagen('../images/g12.png','McFlurry Oreo','11500')"><img src="../images/g12.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="single.html" onclick="cambiarImagen('../images/g12.png','McFlurry Oreo','11500')">McFlurry Oreo</a></h5> 
								<h6><del>$12000</del> $11500</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="w3ls_item" value="McFlurry Oreo"/> 
									<input class="precio" type="hidden" name="amount" value="11500"/> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
                                    <button class="fav w3ls-cart-like" data-product-id="12" data-active="false">
                                        <i class="fa-solid fa-heart-crack" aria-hidden="true"></i>
                                    </button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 product-grids"> 
						<div class="agile-products" data-price="100-10000" category="market2 Off dessert" data-ref="10-0" data-product-id="13">
							<div class="new-tag"><h6>10%<br>Off</h6></div>
							<a href="single.html" onclick="cambiarImagen('../images/g13.png','Helado','8100')"><img src="../images/g13.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="single.html" onclick="cambiarImagen('../images/g13.png','Helado','8100')">Helado</a></h5> 
								<h6><del>$9000</del> $8100</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="w3ls_item" value="Helado"/> 
									<input class="precio" type="hidden" name="amount" value="8100" /> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
                                    <button class="fav w3ls-cart-like" data-product-id="13" data-active="false">
                                        <i class="fa-solid fa-heart-crack" aria-hidden="true"></i>
                                    </button>
								</form> 
							</div>
						</div> 
					</div>   
					<div class="col-md-3 product-grids">
						<div class="agile-products" data-price="100-10000" category="market2 food combos prep new" data-ref="0-0" data-product-id="14">
							<div class="new-tag"><h6>New</h6></div>
							<a href="single.html" onclick="cambiarImagen('../images/g14.png','Frijoles MC','10000')"><img src="../images/g14.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="single.html" onclick="cambiarImagen('../images/g14.png','Frijoles MC','10000')">Frijoles MC </a></h5> 
								<h6><del>$10500</del> $10000</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="w3ls_item" value="Frijoles MC "/> 
									<input class="precio" type="hidden" name="amount" value="10000"/> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
                                    <button class="fav w3ls-cart-like" data-product-id="14" data-active="false">
                                        <i class="fa-solid fa-heart-crack" aria-hidden="true"></i>
                                    </button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3 product-grids"> 
						<div class="agile-products" data-price="15000-30000" category="food Top Off" data-ref="30-20" data-product-id="15">
							<div class="new-tag"><h6>20%<br>Off</h6></div>
							<a href="single.html" onclick="cambiarImagen('../images/g16.png','Chorote Paisa','22320')"><img src="../images/g16.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="single.html" onclick="cambiarImagen('../images/g16.png','Chorote Paisa','22320')">Chorote Paisa</a></h5> 
								<h6><del>$27.900</del> $22320</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="w3ls_item" value="Chorote Paisa" /> 
									<input class="precio" type="hidden" name="amount" value="22320" /> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
                                    <button class="fav w3ls-cart-like" data-product-id="15" data-active="false">
                                        <i class="fa-solid fa-heart-crack" aria-hidden="true"></i>
                                    </button>
								</form> 
							</div>
						</div> 
					</div>  
					<div class="col-md-3 product-grids">
						<div class="agile-products" data-price="100-10000" category="market2 food Off" data-ref="30-20" data-product-id="16">
							<div class="new-tag"><h6>20%<br>Off</h6></div>
							<a href="single.html" onclick="cambiarImagen('../images/g15.png','Hamburguesa','4800')"><img src="../images/g15.png" class="img-responsive" alt="img"></a>
							<div class="agile-product-text">              
								<h5 class="Rtext"><a href="single.html" onclick="cambiarImagen('../images/g15.png','Hamburguesa','4800')">Hamburguesa</a></h5> 
								<h6><del>$6000</del> $4800</h6> 
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart"/>
									<input type="hidden" name="add" value="1"/> 
									<input type="hidden" name="w3ls_item" value="Hamburguesa"/> 
									<input class="precio" type="hidden" name="amount" value="4800"/> 
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Añadir carrito</button>
                                    <button class="fav w3ls-cart-like" data-product-id="16" data-active="false">
                                        <i class="fa-solid fa-heart-crack" aria-hidden="true"></i>
                                    </button>
								</form>
							</div>
						</div>
					</div>
			<div class="clearfix"> </div>
		</div>
    </div>
    
    <!-- Footer -->
    <div class="footer">
		<div class="container">
			<div class="footer-info w3-agileits-info">
				<div class="col-md-4 address-left agileinfo">
					<div class="footer-logo header-logo">
					<ul>
						<li><i class="fa fa-map-marker"></i> 123 San Sebastian, Bogotá Colombia.</li>
						<li><i class="fa fa-mobile"></i> 333 222 3333 </li>
						<li><i class="fa fa-phone"></i> +222 11 4444 </li>
						<li><i class="fa fa-envelope-o"></i> <a href="mailto:example@mail.com"> mail@tastely.com</a></li>
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
							<li><a href="Mapa.html">Zonas</a></li>
							<li><a href="#">Estado de orden</a></li>
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
    <div class="copy-right"> 
		<div class="container">
			<p>© 2016 Smart bazaar . All rights reserved | Design by <a href="http://w3layouts.com"> W3layouts.</a></p>
		</div>
	</div>
    <!-- Reajustar estilos -->
    <style>
        .breadcrumb {
            margin-top: 2em;
            background-color: #464646;
        }
        .breadcrumb.breadcrumb1 li a {
            color: #35dbec;
        }
        .breadcrumb.breadcrumb1 > .active, .breadcrumb.breadcrumb1 li a:hover {
            color: #fff;
        }
        .fav.w3ls-cart-like {
            position: absolute;
            width: 75%;
            bottom: -50%;
            -webkit-transition: .6s all;
            -moz-transition: .6s all;
            -o-transition: .6s all;
            transition: .6s all;
            font-size: 1em;
            padding: .8em 0;
            color: #fff;
            background: #e10202d5;
        }
        .agile-products:hover .fav.w3ls-cart-like {
          bottom: 51%;
        }
        @media (min-width: 1200px) {
            .products-row {
                width: 1170px;
                padding: 0px 4em 4em 10em;
            } 
        }
    </style>
    <script src="../JS/jquery.menu-aim.js"> </script>
	<script src="../JS/main.js"></script> <!-- Resource jQuery --> 
	<script src="../JS/bootstrap.js"></script>
    <script src="../JS/Favoritos.js"></script>
    <!-- Importar el Menu -->
	<script>
        const base = "<?= $base ?>"; // siempre disponible desde PHP

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
	<!-- Enlaces dinamicos /Movil -->
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