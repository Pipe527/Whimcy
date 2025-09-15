function getFavoritesList() {
    const list = localStorage.getItem('favorites-list');
    return list ? JSON.parse(list) : [];
}

function getProductImage(pid) {
    if (pid === "15") return "/whimcy/images/g16.png";
    if (pid === "16") return "/whimcy/images/g15.png";
    return `/whimcy/images/g${pid}.png`;
}

document.addEventListener('DOMContentLoaded', () => {
    const favorites = getFavoritesList();
    const carouselInner = document.querySelector('#favoritesCarousel .carousel-inner');

    if (favorites.length === 0) {
        carouselInner.innerHTML = `
        <div class="carousel-item active">
            <div class="d-flex flex-column justify-content-center align-items-center">
            <h5 class="mb-3">Todavía no tienes favoritos</h5>
            <a href="/whimcy/views/products.php" class="btn btn-primary">
                Editar favoritos
            </a>
            </div>
        </div>`;
    } else {
        favorites.forEach((pid, index) => {
            const imgPath = getProductImage(pid);

            const item = document.createElement('div');
            item.classList.add('carousel-item');
            if (index === 0) item.classList.add('active'); // primera activa

            item.innerHTML = `
            <img src="${imgPath}" class="d-block mx-auto" alt="Producto ${pid}" style="max-width:200px; max-height:200px;">
            <div class="carousel-caption d-none d-md-block">
                <h6><a href="/whimcy/views/Favoritos.php" class="text-white text-decoration-none">Editar favoritos</a></h6>
            </div>
            `;

            carouselInner.appendChild(item);
        });
    }
});