document.addEventListener('DOMContentLoaded', () => {
    const productId = localStorage.getItem('product-id');
    const button = document.querySelector(".w3ls-cart-like");

    // En single.html
    if (window.location.pathname.includes("single.html")) {
        console.log("ID del producto:" + productId);
        
        if (productId && button) {
            button.setAttribute('data-product-id', productId);

            const isActive = localStorage.getItem(`favorite-${productId}`) === 'true';
            const icon = button.querySelector('i');

            if (isActive) {
                icon.className = 'fa-solid fa-heart-crack';
                button.setAttribute('data-active', 'true');
                button.innerHTML = '<i class="' + icon.className + '"></i> Quitar de mi lista';
            } else {
                icon.className = 'fas fa-heart';
                button.setAttribute('data-active', 'false');
                button.innerHTML = '<i class="' + icon.className + '"></i> Añadir a mi lista';
            }
        }

        // Evento de clic en el botón de favoritos
        button.addEventListener('click', e => {
            e.preventDefault();
            const isActiveNow = button.getAttribute('data-active') === 'true';
            const icon = button.querySelector('i');

            if (isActiveNow) {
                icon.className = 'fas fa-heart';
                button.setAttribute('data-active', 'false');
                button.innerHTML = '<i class="' + icon.className + '"></i> Añadir a mi lista';
                localStorage.setItem(`favorite-${productId}`, 'false');
            } else {
                icon.className = 'fa-solid fa-heart-crack';
                button.setAttribute('data-active', 'true');
                button.innerHTML = '<i class="' + icon.className + '"></i> Quitar de mi lista';
                localStorage.setItem(`favorite-${productId}`, 'true');
            }
        });
    }

    // En Favoritos.php
    if (window.location.pathname.includes("Favoritos.php")) {
        const products = document.querySelectorAll('.agile-products');
        let hasFavorites = false;

        products.forEach(product => {
            const pid = product.getAttribute('data-product-id');
            const isActive = localStorage.getItem(`favorite-${pid}`) === 'true';

            if (!isActive) {
                // Ocultar si no está en favoritos
                product.parentElement.style.display = 'none';
            } else {
                hasFavorites = true;
            }

            const favBtn = product.querySelector('.fav.w3ls-cart-like');
            if (favBtn) {
                favBtn.addEventListener('click', e => {
                    e.preventDefault();

                    // Quitar de favoritos
                    localStorage.setItem(`favorite-${pid}`, 'false');

                    const card = favBtn.closest('.col-md-3.product-grids');
                    if (card) card.remove();

                    // Revisar si no quedan favoritos
                    const container = document.querySelector('.products-row');
                    if (container && container.querySelectorAll('.col-md-3.product-grids').length === 0) {
                        container.innerHTML = `<h1 class="vacio">Todavía no tienes favoritos</h1>`;
                    }
                });
            }
        });

        if (!hasFavorites) {
            const container = document.querySelector('.products-row');
            container.innerHTML = `<h1 class="vacio">Todavía no tienes favoritos</h1>`;
        }
    }
});
