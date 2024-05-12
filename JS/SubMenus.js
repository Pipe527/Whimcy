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

