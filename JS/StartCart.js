function StartCart() {
    if (typeof w3ls === "undefined") {
        console.error("⚠️ minicart.js no está cargado");
        return;
    }

    // Clear (si ya existe)
    const oldCart = document.querySelector(".w3ls-cart");
    if (oldCart) oldCart.remove();

    // Renderizar de nuevo
    w3ls.render();

    w3ls.cart.on('w3sb_checkout', function (evt) {
        if (this.subtotal() > 0) {
            this.items().forEach(item => {
                item.set('shipping', 0);
                item.set('shipping2', 0);
            });
        }
    });

    document.querySelectorAll('.cart form').forEach(f => {
        f.addEventListener('submit', e => {
            e.preventDefault();
            console.log("Click en carrito -> ");
            // Forzar apertura manual (por si acaso)
            if (typeof w3ls.cart.show === "function") {
                w3ls.cart.show();
            }
        });
    });
}
