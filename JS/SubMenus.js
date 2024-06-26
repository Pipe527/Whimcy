(function($) {
    // Botones
    const btn = document.querySelector('.bton'); 
    const navbar = document.querySelector('.M1');

    if (btn && navbar) {
        btn.addEventListener('click', (event) => {
            event.preventDefault(); // Previene la acción por defecto del enlace
            navbar.classList.toggle('active');
        });
    }

    const btnprom = document.querySelector('.m'); // Selecciona el enlace "prom"
    const Nav = document.querySelector('.M2');

    if (btnprom && Nav) {
        btnprom.addEventListener('click', (event) => {
            event.preventDefault();
            Nav.classList.toggle('activo');
        });
    }

    const btnRes = document.querySelector('.r'); 
    const navv = document.querySelector('.M3');

    if (btnRes && navv) {
        btnRes.addEventListener('click', (event) => {
            event.preventDefault(); 
            navv.classList.toggle('active');
        });
    }

    const btnAd = document.querySelector('.ad');
    const Navvv = document.querySelector('.M4');

    if (btnAd && Navvv) {
        btnAd.addEventListener('click', (event) => {
            event.preventDefault();
            Navvv.classList.toggle('activo');
        });
    }

    //Login botones
    const btnLog = document.querySelector('.z.us');
    const NNavvv = document.querySelector('.Lgn'); 
    const profileNav = document.querySelector('.profile');

    if (btnLog && NNavvv && profileNav) {
        btnLog.addEventListener('click', (event) => {
            event.preventDefault();
            const loggedIn = localStorage.getItem('loggedIn') === 'true';
            console.log(loggedIn);
            if (loggedIn) {
                profileNav.classList.toggle('actived');
                NNavvv.classList.remove('actived'); // Asegurarse de que el formulario de inicio de sesión no esté activo
            } else {
                NNavvv.classList.toggle('actived');
                profileNav.classList.remove('actived'); // Asegurarse de que el perfil del usuario no esté activo
            }
        });
    }

    //Obtener ruta de imagen - texto y precio
    window.cambiarImagen = function(ruta, texto, precio) {
        localStorage.setItem('imagen', ruta);
        localStorage.setItem('h3Valor', texto);
        localStorage.setItem('precio', precio);
        window.location.href = 'single.html';
    }

    $(document).ready(function() {
        const links = $('.links');

        links.each(function() {
            $(this).on('click', function(event) {
                event.preventDefault();

                // Obtener la sección correspondiente desde el atributo de datos
                const section = $(this).data('section');

                if (section) {
                    // Redireccionar a Mapa.html con el hash de la sección
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
        ].filter(slider => slider.element.length > 0 && slider.slides.length > 0); // Filtra sliders que no existen

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

    // Botones del centro
    function redireccionar() {
        const a = $("#Boa");
        const b = $("#Bob");

        if (a.length > 0) {
            a.on('click', function() {
                window.location.href = 'offers.html';
            });
        }

        if (b.length > 0) {
            b.on('click', function() {
                window.location.href = 'offers.html#Targeta';
            });
        }
    }

    redireccionar();
})(jQuery);
