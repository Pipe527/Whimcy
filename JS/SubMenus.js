// =====================
//  VANILLA JAVASCRIPT
// =====================
(function() {
    function inicializarHeaderNav() {
        const mobileQuery = window.matchMedia("(max-width: 400px)");

        // --- Submenús móviles ---
        function initMobileCombos() {
            document.querySelector('.Padres').addEventListener('click', e => {
                const combo = e.target.closest('.combo');
                if (!combo) return;
                e.preventDefault();
                const submenu = combo.nextElementSibling;
                submenu?.classList.toggle('open');
            });
        }
        if (mobileQuery.matches) initMobileCombos();
        mobileQuery.addEventListener("change", (e) => {
            if (e.matches) initMobileCombos();
        });

        // --- Toggle M1, M2, M3, M4 y login/profile ---
        const botones = [
            { btn: '.bton', nav: '.M1', targetCambio: '.m' },
            { btn: '.m', nav: '.M2', targetCambio: '.m' },
            { btn: '.r', nav: '.M3', targetCambio: '.r' },
            { btn: '.ad', nav: '.M4', targetCambio: '.ad' }
        ];

        botones.forEach(({btn, nav, targetCambio}) => {
            const boton = document.querySelector(btn);
            const navv = document.querySelector(nav);
            const target = document.querySelector(targetCambio);

            if (boton && navv) {
                boton.addEventListener('click', e => {
                    e.preventDefault();
                    navv.classList.toggle('activo');
                    if (target) {
                        target.classList.toggle('cambio', navv.classList.contains('activo'));
                    }
                });
            }
        });


        // --- Toggle login/profile ---
        const btnLog = document.querySelector('.z.us');
        const loginNav = document.querySelector('.Lgn');
        const profileNav = document.querySelector('.profile');
        if (btnLog && loginNav && profileNav) {
            btnLog.addEventListener('click', (e) => {
                e.preventDefault();
                const loggedIn = localStorage.getItem('loggedIn') === 'true';
                if (loggedIn) {
                    profileNav.classList.toggle('actived');
                    loginNav.classList.remove('actived');
                } else {
                    loginNav.classList.toggle('actived');
                    profileNav.classList.remove('actived');
                }
            });
        }

        // --- Cerrar todo ---
        document.addEventListener('click', (e) => {
            const header = document.querySelector('header');
            
            if (!header.contains(e.target)) {
                document.querySelectorAll('.M1, .M2, .M3, .M4, .Lgn, .profile').forEach(el => el?.classList.remove('activo','actived'));
                document.querySelectorAll('.m, .r, .bton, .ad').forEach(el => el?.classList.remove('cambio'));
            }
        });

        // --- jQuery para menú principal/ Movil ---
        if (typeof jQuery !== "undefined") {
            $(function () {
                var $ul = $(".Padres");
                //Fijar grupos
                $ul.find("li").each(function () {
                    var $li = $(this);
                    if ($li.find(".Logo, .w3view-cart, .us").length) {
                        $li.addClass("nav-fixed");
                    }
                    if ($li.find("> a.bton, > a.m, > a.r, > a.ad").length) {
                        $li.addClass("nav-group");
                    }
                });

                $("#menu-toggle").on("click", function () {
                    const isOpen = $(".Padres").toggleClass("open").hasClass("open");
                    $(this).attr("aria-expanded", isOpen);

                    if (!isOpen) {
                        $(".SubMenu").removeClass("open");
                        $(".bton, .m, .r, .ad").removeClass("cambio");
                        $(".M1, .M2, .M3, .M4").removeClass("activo");
                    }
                });

                $(document).on('click', function (e) {
                    if (!$(e.target).closest('.combo, .SubMenu, #menu-toggle').length) {
                        $(".SubMenu").removeClass('open');
                        $(".bton, .m, .r, .ad").removeClass('cambio');
                    }
                });
            });
        }(jQuery);
    }

    // Hacer global la función
    window.inicializarHeaderNav = inicializarHeaderNav;

    //Obtener ruta de imagen - texto y precio
    window.cambiarImagen = function(ruta, texto, precio) {
        localStorage.setItem('imagen', ruta);
        localStorage.setItem('h3Valor', texto);
        localStorage.setItem('precio', precio);
        window.location.href = 'single.html';
    }

    // Botones del centro
    function redireccionar() {
        const a = document.querySelector("#Boa");
        const b = document.querySelector("#Bob");

        if (a) {
            a.addEventListener('click', function() {
                window.location.href = 'offers.html';
            });
        }

        if (b) {
            b.addEventListener('click', function() {
                window.location.href = 'offers.html#Targeta';
            });
        }
    }
    redireccionar();
})();


// =====================
//  SOLO jQuery
// =====================
if (typeof jQuery !== "undefined") {
    (function($) {
        // Links redireccionan con hash
        $(document).ready(function() {
            const links = $('.links');
            links.each(function() {
                $(this).on('click', function(event) {
                    event.preventDefault();
                    const section = $(this).data('section');
                    if (section) {
                        window.location.href = 'Mapa.html#' + section;
                    }
                });
            });
        });

        // Slider principal
        $(document).ready(function() {
            const sliders = [
                { element: $('.slide1 ul'), slides: $('.slide1 ul li'), currentIndex: 0, intervalId: null },
                { element: $('.slide2 ul'), slides: $('.slide2 ul li'), currentIndex: 0, intervalId: null },
                { element: $('.slide3 ul'), slides: $('.slide3 ul li'), currentIndex: 0, intervalId: null },
            ].filter(slider => slider.element.length > 0 && slider.slides.length > 0);

            function updateSlide(slider) {
                slider.currentIndex++;
                if (slider.currentIndex === slider.slides.length) {
                    slider.currentIndex = 0;
                }
                const offset = -slider.currentIndex * 100;
                slider.element.css('transform', `translateX(${offset}%)`);
            }

            function goToSlide(slider, index) {
                slider.currentIndex = index;
                const offset = -slider.currentIndex * 100;
                slider.element.css('transform', `translateX(${offset}%)`);
            }

            function startSlider(slider) {
                slider.intervalId = setInterval(() => updateSlide(slider), 5000);
            }

            function stopSlider(slider) {
                clearInterval(slider.intervalId);
            }

            sliders.forEach(slider => {
                startSlider(slider);
                slider.element.on('mouseover', () => stopSlider(slider));
                slider.element.on('mouseout', () => startSlider(slider));
            });

            const leftControl = $('.left');
            if (leftControl.length > 0) {
                leftControl.on('click', function(event) {
                    event.preventDefault();
                    sliders.forEach(slider => {
                        stopSlider(slider);
                        slider.currentIndex--;
                        if (slider.currentIndex < 0) {
                            slider.currentIndex = slider.slides.length - 1;
                        }
                        const offset = -slider.currentIndex * 100;
                        slider.element.css('transform', `translateX(${offset}%)`);
                        startSlider(slider);
                    });
                });
            }

            const rightControl = $('.right');
            if (rightControl.length > 0) {
                rightControl.on('click', function(event) {
                    event.preventDefault();
                    sliders.forEach(slider => {
                        stopSlider(slider);
                        updateSlide(slider);
                        startSlider(slider);
                    });
                });
            }

            const controls = $('.slide-controls ul li a');
            if (controls.length > 0) {
                controls.each(function(index) {
                    $(this).on('click', function(event) {
                        event.preventDefault();
                        sliders.forEach(slider => {
                            stopSlider(slider);
                            goToSlide(slider, index);
                            startSlider(slider);
                        });
                    });
                });
            }
        });
    })(jQuery);
}
