$(document).ready(function(){
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
        $('.agile-products').parent().show();
        $('html, body').animate({ scrollTop: 0 }, 'slow');
    });

    // Si el parámetro "category" es especifico, aplicar el filtro
    $(document).ready(function(){
    setTimeout(function() {
        // Obtener los parámetros de la URL
        const urlParams = new URLSearchParams(window.location.search);
        const category = urlParams.get('category');
        console.log('Category:', category); // Depuración

        if (category) {
            $('.agile-products[category*="' + category + '"]').addClass('filtro-activo');
            $('.agile-products').parent().hide();
            $('.agile-products[category*="' + category + '"]').parent().show();
        }
    }, 100);
});


    // Filtro por rango de precios
    $(document).ready(function(){
        // Función para aplicar filtros de precio
        function aplicarFiltrosDePrecio() {
            // Obtener todos los checkboxes seleccionados
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
    });
    
});

//Filtros por descuento
$(document).ready(function(){
    // Función para aplicar filtros de descuento
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
});

