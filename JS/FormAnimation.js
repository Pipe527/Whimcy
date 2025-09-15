// Crear objetos segun cada Form
const paths = {
  "recover-form": {
    action: "/Whimcy/Controllers/recover-pass.php",
    expects: "json",
    cardSelector: "#cardA",
    successHandler: (card, data) => {
      card.innerHTML = `
        <div class="card-header text-center">
          <b>Correo enviado</b>
        </div>
        <div class="card-body">
          <p class="login-box-msg send">Hemos enviado un enlace de recuperación a tu correo electrónico.</p>
          <p class="mt-3 mb-1"><a href="/whimcy/Views/Login.html" onclick="redirigirLogin(event)">Iniciar sesión</a></p>
          <br>
          <p class="mt-3 mb-1"><a href="/whimcy/Views/PasswordB.php">Simular</a></p>
        </div>
      `;
    }
  },
  "edit-profile": {
    action: "/Whimcy/Controllers/UsersControl.php",
    expects: "text",
    cardSelector: "#cardB",
    successHandler: (card, data) => {
      fetch("/Whimcy/Views/UsersEdit.php") // Importar
        .then(res => res.text())
        .then(html => {
          card.innerHTML = html;
        })
        .catch(err => {
          console.error("Error cargando UsersEdit.php:", err);
          card.innerHTML = "<p>Error al cargar contenido</p>";
        });
    }
  }
};

// Object.entries(paths) = devuevlve array de pares
Object.entries(paths).forEach(([className, config]) => {
  document.querySelectorAll(`.${className}`).forEach(form => {
    form.addEventListener("submit", function (e) {
      if (form.id === "addresForm") { return; }
      e.preventDefault();

      const formData = new FormData(this);
      const parser = config.expects === "text" ? res => res.text() : res => res.json();

      fetch(config.action, { method: "POST", body: formData })
        .then(parser)
        .then(data => {
          console.log("Respuesta del servidor:", data);
          const card = document.querySelector(config.cardSelector);

          if (config.expects === "json" && data.status !== "success") {
            const cardBody = card.querySelector('.card-body');
            cardBody.innerHTML = `
              <div class="alert alert-danger">
                ${data.message}
                <br><br>
                <button type="button" class="btn btn-sm btn-warning mt-2" id="retryBtn">Reintentar</button>
              </div>
            `;

            cardBody.querySelector("#retryBtn").addEventListener("click", () => {
                location.reload();
            });
            return;
          }
          card.classList.add("animate__fadeOutLeft");

          card.addEventListener("animationend", function handler() {
            card.classList.remove("card-primary", "animate__fadeOutLeft");
            card.classList.add("card-secondary", "animate__fadeInRight");

            config.successHandler(card, data);

            card.removeEventListener("animationend", handler);
          });
        })
        .catch(err => {
          console.error("Error en la petición:", err);
          alert("Ocurrió un error en el servidor");
        });
    });
  });
});

// Funciones adicionales

function CancelarEdit(e) {
  e.preventDefault();
  location.href = location.pathname;
}
