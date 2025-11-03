function StartCart() {
  console.log("🛒 Iniciando StartCart...");

  // Esperar a que w3ls esté listo
  if (typeof w3ls === "undefined") {
    console.warn("w3ls no disponible todavía");
    return;
  }

  // Renderizar el minicart si no existe
  if (!document.querySelector("#PPsbmincart")) {
    w3ls.render();
    console.log("⚙️ Renderizando minicart...");
  }

  // Mostrar / ocultar carrito (Clicks)
  const btnCart = document.querySelector(".w3view-cart");
  if (btnCart) {
    btnCart.addEventListener("click", (e) => {
      e.preventDefault();
      e.stopPropagation();
      document.body.classList.toggle("sbmincart-showing");
    });
  }

  // Cerrar carrito
  const bindCloseEvents = () => {
    document.addEventListener("click", (e) => {
      if (
        e.target.closest(".sbmincart-closer") ||
        (!e.target.closest("#PPsbmincart") && !e.target.closest(".w3view-cart"))
      ) {
        document.body.classList.remove("sbmincart-showing");
      }
    });
  };

  // Esperar a que el carrito exista antes de vincular eventos
  const waitForCart = setInterval(() => {
    if (document.querySelector("#PPsbmincart")) {
      clearInterval(waitForCart);
      bindCloseEvents();
    }
  }, 300);
}
