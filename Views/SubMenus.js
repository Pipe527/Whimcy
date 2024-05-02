const btn = document.querySelector('.bton'); // Selecciona el elemento con la clase 'bton'
const navbar = document.querySelector('.M1');

btn.addEventListener('click', (event) => {
    event.preventDefault(); // Previene la acción por defecto del enlace
    navbar.classList.toggle('active');
});
