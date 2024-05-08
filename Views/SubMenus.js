const btn = document.querySelector('.bton'); 
const navbar = document.querySelector('.M1');


btn.addEventListener('click', (event) => {
    event.preventDefault(); // Previene la acción por defecto del enlace
    navbar.classList.toggle('active');
});

const btnCombos = document.querySelector('.exp'); // Selecciona el enlace "Combos"
const Nav = document.querySelector('.M2');

btnCombos.addEventListener('click', (event) => {
    event.preventDefault();
    Nav.classList.toggle('activo');
});

