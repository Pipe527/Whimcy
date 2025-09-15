document.addEventListener('DOMContentLoaded', () => {
    const productId = localStorage.getItem('product-id');
    const button = document.querySelector(".w3ls-cart-like");

    function updateFavoriteButton(button, isActive) {
        const icon = button.querySelector('i');
        const config = isActive
            ? { className: 'fa-solid fa-heart-crack', active: 'true', text: 'Quitar de mi lista' }
            : { className: 'fas fa-heart', active: 'false', text: 'Añadir a mi lista' };

        icon.className = config.className;
        button.setAttribute('data-active', config.active);
        button.innerHTML = `<i class="${config.className}"></i> ${config.text}`;
    }
    // Crear array
    function getFavoritesList() {
        const list = localStorage.getItem('favorites-list');
        return list ? JSON.parse(list) : [];
    }
    function saveFavoritesList(list) {
        localStorage.setItem('favorites-list', JSON.stringify(list));
    }

    // En single.html
    if (window.location.pathname.includes("single.html")) {
        if (productId && button) {
            button.setAttribute('data-product-id', productId);

            const isActive = localStorage.getItem(`favorite-${productId}`) === 'true';
            updateFavoriteButton(button, isActive);
        }

        // Evento de clic en el botón de favoritos
        button.addEventListener('click', e => {
            e.preventDefault();
            let favorites = getFavoritesList();
            let isActiveNow = button.getAttribute('data-active') === 'true';

            if (isActiveNow) {
                // Quitar de favoritos
                favorites = favorites.filter(id => id !== productId);
                localStorage.setItem(`favorite-${productId}`, 'false');
                updateFavoriteButton(button, false);
            } else {
                // Agregar a favoritos
                if (!favorites.includes(productId)) favorites.push(productId);
                localStorage.setItem(`favorite-${productId}`, 'true');
                updateFavoriteButton(button, true);
            }

            saveFavoritesList(favorites);
        });
    }

    // En Favoritos.php
    if (window.location.pathname.includes("Favoritos.php")) {
        const container = document.querySelector('.products-row');

        function checkEmpty() {
            const visibles = container.querySelectorAll('.col-md-3.product-grids:not([style*="display: none"])');
            if (visibles.length === 0) {
                container.innerHTML = `<h1 class="vacio">Todavía no tienes favoritos</h1>`;
            }
        }

        const favorites = getFavoritesList();
        const products = document.querySelectorAll('.agile-products');
        let hasFavorites = false;

        products.forEach(product => {
            const pid = product.getAttribute('data-product-id');
            console.log("Producto:", pid, "¿Está en favoritos?", favorites.includes(pid));
            if (!favorites.includes(pid)) {
                product.parentElement.style.display = 'none';
            } else {
                hasFavorites = true;
            }

            const favBtn = product.querySelector('.fav.w3ls-cart-like');
            if (favBtn) {
                favBtn.addEventListener('click', e => {
                    e.preventDefault();
                    let updated = getFavoritesList().filter(id => id !== pid);
                    saveFavoritesList(updated);
                    localStorage.setItem(`favorite-${pid}`, 'false');

                    const card = favBtn.closest('.col-md-3.product-grids');
                    if (card) card.remove();

                    checkEmpty();
                });
            }
        });

        if (!hasFavorites) {
            checkEmpty();
        }
    }
});
