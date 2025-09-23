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
          attachFormListeners();
        })
        .catch(err => {
          console.error("Error cargando UsersEdit.php:", err);
          card.innerHTML = "<p>Error al cargar contenido</p>";
        });
    }
  },
  "payment-form": {
    action: "/whimcy/Views/UsersPayment.php",
    expects: "json",
    cardSelector: "#cardC",
    successHandler: (card, data) => {
      if (data.status !== "success") {
      // Si es error de validación
      fetch("/Whimcy/Views/UsersPayment.php")
        .then(res => res.text())
        .then(html => {
          card.innerHTML = `
            <div class="alert alert-danger text-center">${data.message}</div>
            <div class="text-center mt-2 text-muted n">Recargando...</div>
            ${html}
          `;
          attachFormListeners();
          MethodChange();

          setTimeout(() => {
            fetch("/Whimcy/Views/UsersPayment.php")
              .then(res => res.text())
              .then(html => {
                card.innerHTML = html;
                attachFormListeners();
                MethodChange();
              })
              .catch(err => {
                console.error("Error recargando UsersPayment.php:", err);
                card.innerHTML = "<p>Error al recargar contenido</p>";
              });
          }, 2000);
        })
        .catch(err => {
          console.error("Error recargando UsersPayment.php:", err);
          card.innerHTML = "<p>Error al recargar contenido</p>";
        });

      return;
      } else {
        // Éxito
        card.innerHTML = `
          <div class="alert alert-success text-center mb-3">
            ✅ ${data.message}
          </div>
          <div class="text-center">
            <button id="backBtn" class="btn btn-primary">Volver</button>
          </div>
        `;
        const backBtn = card.querySelector("#backBtn");
        backBtn.addEventListener("click", () => {
          location.reload();
        });
      };
    }
  },
  "default-payment-form": {
  action: "/Whimcy/Views/UsersPayment.php",
  expects: "json",
  cardSelector: "#cardC",
  successHandler: (card, data) => {
    if (data.status !== "success") {
      card.innerHTML = `
        <div class="alert alert-danger">
          ${data.message}
          <br><br>
          <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-sm btn-warning mt-2" id="retryBtn">
              Reintentar
            </button>
          </div>
        </div>
      `;
      card.querySelector("#retryBtn").addEventListener("click", () => {
        location.reload();
      });
      return;
    }
    fetch("/Whimcy/Views/UsersPayment.php")
      .then(res => res.text())
      .then(html => {
        card.innerHTML = html;
        attachFormListeners();
        MethodChange();
      })
      .catch(err => {
        console.error("Error cargando UsersPayment.php:", err);
        card.innerHTML = "<p>Error al cargar contenido</p>";
      });
  }
 }
}

// Object.entries(paths) = devuevlve array de pares
function attachFormListeners() {
  Object.entries(paths).forEach(([className, config]) => {
    document.querySelectorAll(`.${className}`).forEach(form => {
      if (form.dataset.listenerAttached) return; // evitar duplicados

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
            config.successHandler(card, data);
          })
          .catch(err => console.error("Error en la petición:", err));
      });

      form.dataset.listenerAttached = "true"; // marcar para no duplicar
    });
  });
}

document.addEventListener("DOMContentLoaded", attachFormListeners);

// Funciones adicionales

function CancelarEdit(e) {
  e.preventDefault();
  location.href = location.pathname;
}
