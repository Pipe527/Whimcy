// GLOBAL
function aplicarFiltrosDeEtiqueta() {
    var checkboxesSeleccionados = $('[data-cat]:checked');
    
    if (checkboxesSeleccionados.length === 0) {
        $('.agile-products').parent().show();
            return;
    }
    
    $('.agile-products').parent().hide();
    checkboxesSeleccionados.each(function() {
        var catProduct = $(this).data('cat');
        $('.agile-products[category*="'+catProduct+'"]').parent().show();
    });
}

function offNavidad() {
     // tag
      document.querySelectorAll(".agile-products[category*='navidad'] .new-tag h6").forEach(tag => {
           tag.innerText = "50%";
      });
      // Precio
      document.querySelectorAll(".agile-products[category*='navidad']").forEach(prod => {
       const h6 = prod.querySelector(".agile-product-text h6");
       const inputPrecio = prod.querySelector("input.precio");
       const link = prod.querySelector("a[data-product-id]");
       
       if (h6 && inputPrecio && link) {
           const precioOriginal = parseInt(h6.querySelector("del").innerText.replace(/\D/g, ""));
           if (!isNaN(precioOriginal)) {
               const precioDescuento = Math.round(precioOriginal * 0.40);
               h6.innerHTML = `<del>$${precioOriginal}</del> $${precioDescuento}`;
               inputPrecio.value = precioDescuento;
               let onclick = link.getAttribute("onclick");
               if (onclick) {
                   onclick = onclick.replace(/,\s*'?\d+'?\)/, `,'${precioDescuento}')`);
                   link.setAttribute("onclick", onclick);
               }
           }
       }
    });
}

function offHalloween() {
     // tag
      document.querySelectorAll(".agile-products[category*='gift'] .new-tag h6").forEach(tag => {
           tag.innerText = "50%";
      });
      // Precio
      document.querySelectorAll(".agile-products[category*='gift']").forEach(prod => {
       const h6 = prod.querySelector(".agile-product-text h6");
       const inputPrecio = prod.querySelector("input.precio");
       const link = prod.querySelector("a[data-product-id]");
       
       if (h6 && inputPrecio && link) {
           const precioOriginal = parseInt(h6.querySelector("del").innerText.replace(/\D/g, ""));
           if (!isNaN(precioOriginal)) {
               const precioDescuento = Math.round(precioOriginal * 0.40);
               h6.innerHTML = `<del>$${precioOriginal}</del> $${precioDescuento}`;
               inputPrecio.value = precioDescuento;
               let onclick = link.getAttribute("onclick");
               if (onclick) {
                   onclick = onclick.replace(/,\s*'?\d+'?\)/, `,'${precioDescuento}')`);
                   link.setAttribute("onclick", onclick);
               }
           }
       }
    });
}

$(document).ready(function(){
    // Inicializar Fechas
    // ⚠️ Debe existir la función getFecha()
    const { day, month } = getFecha();
    console.log("La fecha es: "+ day +"/ "+ month);

        if (month === 12) {
         offNavidad();
        } else if (month === 10 && day === 31) {
         console.log("La fecha es: "+ day +"/ "+ month);
         offHalloween();
        } else if (month === 2 && day === 14) {
         // Amor y amistad misma 
         offHalloween();
        } else {
         // default
        }
    // Filtro por categorias
    $('.categorias').click(function (event) {
       event.preventDefault();
       var catProduct = $(this).attr('category');
       // Clase para el filtro activo
       $('.categorias').removeClass('filtro-activo');
       $(this).addClass('filtro-activo');
       // Ocultar y mostrar productos
       $('.agile-products').parent().hide();
       $('.agile-products[category*="'+catProduct+'"]').parent().show();
    });
    
    //Limpiar categorias
    $(document).on('click', '.todo', function (event) {
        event.preventDefault();
        $('.categorias').removeClass('filtro-activo');
        $('[data-range]').prop('checked', false);
        $('[data-cat]').prop('checked', false);
        $('[data-off]').prop('checked', false);
        $('.agile-products').parent().show();
        $('html, body').animate({ scrollTop: 0 }, 'slow');
    });

    // Si el parámetro "category" es especifico, aplicar el filtro
    setTimeout(function() {
        // Obtener los parámetros de la URL
        const urlParams = new URLSearchParams(window.location.search);
        const category = urlParams.get('category');
        console.log('Category:', category); // Depuración

        if (!category) return;
         $('.agile-products').parent().hide();
         $('.agile-products[category*="' + category + '"]').parent().show();
    }, 100);


    // Filtro por rango de precios
        function aplicarFiltrosDePrecio() {
            var checkboxesSeleccionados = $('[data-range]:checked');
            
            // Si no hay checkboxes seleccionados, mostrar todos los productos
            if (checkboxesSeleccionados.length === 0) {
                $('.agile-products').parent().show();
                return;
            }
            
            $('.agile-products').parent().hide();
            // Mostrar productos que coincidan con cualquiera de los rangos seleccionados
            checkboxesSeleccionados.each(function() {
                var range = $(this).data('range');
                if (range === 'mas') {
                    // Mostrar productos con precio mayor a 40000 o precio no numérico
                    $('.agile-products').filter(function() {
                        var priceAttr = $(this).attr('data-price');
                        var price = parseInt(priceAttr);
                        if (isNaN(price)) {
                            return true;
                        }
                        return price > 40000;
                    }).parent().show();
                } else {
                    // Dividir el rango en min y max
                    var minMax = range.split('-');
                    var min = parseInt(minMax[0]);
                    var max = parseInt(minMax[1]);
                    // Mostrar productos dentro del rango
                    $('.agile-products').filter(function() {
                        var price = parseInt($(this).attr('data-price'));
                        return price >= min && price <= max;
                    }).parent().show();
                }
            });
        }
        // Evento al cambiar el estado de los checkboxes de rango de precios
        $('[data-range]').change(function() {
            aplicarFiltrosDePrecio();
        });
        // Inicializar filtros al cargar la página
        aplicarFiltrosDePrecio();

//Filtros por descuento
    function aplicarFiltrosDeDescuento() {
        // Obtener todos los checkboxes seleccionados
        var checkboxesSeleccionados = $('[data-off]:checked');
        
        // Si no hay checkboxes seleccionados, mostrar todos los productos
        if (checkboxesSeleccionados.length === 0) {
            $('.agile-products').parent().show();
            return;
        }
        
        $('.agile-products').parent().hide();
        // Mostrar productos que coincidan con cualquiera de los rangos seleccionados
        checkboxesSeleccionados.each(function() {
            var range = $(this).data('off');
            if (range === '0-0') {
                // Mostrar productos con bajo el 10%
                $('.agile-products').filter(function() {
                    var OffAttr = $(this).attr('data-ref');
                    var descuento = parseInt(OffAttr);
                    if (isNaN(descuento)) {
                        return true;
                    }
                    return descuento < 10;
                }).parent().show();
            } else {
                // Dividir el rango en min y max
                var minMax = range.split('-');
                var min = parseInt(minMax[1]);
                console.log("min: "+min);
                var max = parseInt(minMax[0]);
                console.log("max: "+max);
                // Mostrar productos dentro del rango
                $('.agile-products').filter(function() {
                    var descuento = parseInt($(this).attr('data-ref'));
                    return descuento >= min && descuento <= max;
                }).parent().show();
            }
        });
    }
    // Evento al cambiar el estado de los checkboxes de rango de descuentos
    $('[data-off]').change(function() {
        aplicarFiltrosDeDescuento();
    });
    // Inicializar filtros al cargar la página
    aplicarFiltrosDeDescuento();

//Filtros por etiqueta
    // Cambiar estado
    $('[data-cat]').change(function() {
        aplicarFiltrosDeEtiqueta();
    });
    // Al cargar la página
    aplicarFiltrosDeEtiqueta();
    // filtros desde la URL (parametro)
    setTimeout(function() {
        const urlParams = new URLSearchParams(window.location.search);
        const catebox = urlParams.get('data-cat');
        if (!catebox) return;
        $('[data-cat="'+catebox+'"]').prop('checked', true);
        aplicarFiltrosDeEtiqueta();
    }, 100);
});
