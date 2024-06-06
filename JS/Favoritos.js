document.addEventListener('DOMContentLoaded', () => {
    const button = document.querySelector('.w3ls-cart-like');
    const productId = button.getAttribute('data-product-id');
    const isActive = localStorage.getItem(`favorite-${productId}`) === 'true';
    const icon = button.querySelector('i');

    if (isActive) {
        icon.className = 'fas fa-heart';
        button.innerHTML = '<i class="' + icon.className + '"></i> Quitar de mi lista';
        button.setAttribute('data-active', 'true');
    } else {
        icon.className = 'fa fa-heart-o';
        button.innerHTML = '<i class="' + icon.className + '"></i> Añadir a mi lista';
        button.setAttribute('data-active', 'false');
    }
});

//Al presionar el boton
function favoritos() {
    const button = document.querySelector('.w3ls-cart-like');
    const icon = button.querySelector('i');
    const productId = button.getAttribute('data-product-id');
    const isActive = button.getAttribute('data-active') === 'true';

    if (isActive) {
        // Cambiar botón
        icon.className = 'fa fa-heart-o';
        button.innerHTML = '<i class="' + icon.className + '"></i> Añadir a mi lista';
        button.setAttribute('data-active', 'false');
        localStorage.setItem(`favorite-${productId}`, 'false');
        console.log(isActive);
    } else {
        icon.className = 'fas fa-heart';
        button.innerHTML = '<i class="' + icon.className + '"></i>' + ' Quitar de mi lista';
        button.setAttribute('data-active', 'true');
        localStorage.setItem(`favorite-${productId}`, 'true');
        console.log(isActive);
    }
}
