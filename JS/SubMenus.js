// Botones
const btn = document.querySelector('.bton'); 
const navbar = document.querySelector('.M1');


btn.addEventListener('click', (event) => {
    event.preventDefault(); // Previene la acción por defecto del enlace
    navbar.classList.toggle('active');
});

const btnprom = document.querySelector('.m'); // Selecciona el enlace "prom"
const Nav = document.querySelector('.M2');

btnprom.addEventListener('click', (event) => {
    event.preventDefault();
    Nav.classList.toggle('activo');
});

const btnRes = document.querySelector('.r'); 
const navv = document.querySelector('.M3');


btnRes.addEventListener('click', (event) => {
    event.preventDefault(); 
    navv.classList.toggle('active');
});

const btnAd = document.querySelector('.ad');
const Navvv = document.querySelector('.M4');

btnAd.addEventListener('click', (event) => {
    event.preventDefault();
    Navvv.classList.toggle('activo');
});

const btnLog = document.querySelector('.z.us');
const NNavvv = document.querySelector('.Lgn'); 
const profileNav = document.querySelector('.profile');

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


//Obtener ruta de imagen - texto y precio
function cambiarImagen(ruta, texto, precio) {
    localStorage.setItem('imagen', ruta);
    localStorage.setItem('h3Valor', texto);
    localStorage.setItem('precio', precio);
    window.location.href = 'single.html';
}

document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.links');

    links.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();

            // Obtener la sección correspondiente desde el atributo de datos
            const section = this.getAttribute('data-section');

            if (section) {
                // Redireccionar a Mapa.html con el hash de la sección
                window.location.href = 'Mapa.html#' + section;
            }
        });
    });
});

// Slider principal
document.addEventListener('DOMContentLoaded', function() {
    const sliders = [
        { element: document.querySelector('.slide1 ul'), slides: document.querySelectorAll('.slide1 ul li'), currentIndex: 0, intervalId: null },
        { element: document.querySelector('.slide2 ul'), slides: document.querySelectorAll('.slide2 ul li'), currentIndex: 0, intervalId: null },
        { element: document.querySelector('.slide3 ul'), slides: document.querySelectorAll('.slide3 ul li'), currentIndex: 0, intervalId: null },
    ].filter(slider => slider.element !== null && slider.slides.length > 0); // Filtra sliders que no existen

    function updateSlide(slider) {
        slider.currentIndex++;
        if (slider.currentIndex === slider.slides.length) {
            slider.currentIndex = 0;
        }

        const offset = -slider.currentIndex * 100;
        slider.element.style.transform = `translateX(${offset}%)`;
    }

    function goToSlide(slider, index) {
        slider.currentIndex = index;
        const offset = -slider.currentIndex * 100;
        slider.element.style.transform = `translateX(${offset}%)`;
    }

    function startSlider(slider) {
        slider.intervalId = setInterval(() => updateSlide(slider), 5000);
    }

    function stopSlider(slider) {
        clearInterval(slider.intervalId);
    }

    sliders.forEach(slider => {
        startSlider(slider);

        slider.element.addEventListener('mouseover', () => stopSlider(slider));
        slider.element.addEventListener('mouseout', () => startSlider(slider));
    });

    const leftControl = document.querySelector('.left');
    if (leftControl) {
        leftControl.addEventListener('click', function(event) {
            event.preventDefault();
            sliders.forEach(slider => {
                stopSlider(slider);
                slider.currentIndex--;
                if (slider.currentIndex < 0) {
                    slider.currentIndex = slider.slides.length - 1;
                }
                const offset = -slider.currentIndex * 100;
                slider.element.style.transform = `translateX(${offset}%)`;
                startSlider(slider);
            });
        });
    }

    const rightControl = document.querySelector('.right');
    if (rightControl) {
        rightControl.addEventListener('click', function(event) {
            event.preventDefault();
            sliders.forEach(slider => {
                stopSlider(slider);
                updateSlide(slider);
                startSlider(slider);
            });
        });
    }

    const controls = document.querySelectorAll('.slide-controls ul li a');
    if (controls.length > 0) {
        controls.forEach((control, index) => {
            control.addEventListener('click', function(event) {
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
    const a = document.getElementById("Boa");
    const b = document.getElementById("Bob");

    if (a) {
        a.onclick = function() {
            window.location.href = 'offers.html';
        };
    } 

    if (b) {
        b.onclick = function() {
            window.location.href = 'offers.html#Targeta';
        };
    }
}

redireccionar();

