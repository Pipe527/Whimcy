document.addEventListener("DOMContentLoaded", () => {
  const input = document.getElementById("newAddress");
  const select = document.getElementById("savedAddresses");
  const addBtn = document.getElementById("addAddressBtn");
  const editBtn = document.getElementById("editAddressBtn");
  const addressForm = document.getElementById("addresForm");

  // --- Inicializar tooltips ---
  const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  tooltipTriggerList.forEach(el => new bootstrap.Tooltip(el));

  // Borrador temporal
  let direcciones = [];

  // Cargar direcciones guardadas
  const guardadas = JSON.parse(localStorage.getItem("direcciones")) || [];
  if (guardadas.length > 0) {
    direcciones = [...guardadas];
    renderDirecciones(null, direcciones.length - 1);
  } else {
    renderEmpty();
  }

  // Regex simple pero funcional para direcciones en Colombia
  function EsDireccionColombiana(direccion) {
    const tiposVia = "(Calle|Cra|Carrera|Cl|Diagonal|Diag|Transversal|Tv|Av|Avenida|Cll)";
    const regex = new RegExp(`^${tiposVia}\\s+\\d+[A-Z]?(?:\\s*#\\s*\\d+[A-Z]?(?:-\\d+[A-Z]?)?)?$`, "i");
    return regex.test(direccion.trim());
  }

  function renderEmpty() {
    select.innerHTML = "";
    const option = document.createElement("option");
    option.value = "";
    option.text = "-- No tienes direcciones aún --";
    select.add(option);
    editBtn.disabled = true;
  }

  function renderDirecciones(value = null, selectedIndex = null) {
    select.innerHTML = "";
    direcciones.forEach((dir) => {
      const option = document.createElement("option");
      option.value = dir;
      option.text = dir;
      select.add(option);
    });

    if (direcciones.length > 0) {
      select.selectedIndex = selectedIndex !== null ? selectedIndex : direcciones.length - 1;
      editBtn.disabled = false;
    } else {
      renderEmpty();
    }
  }

  // Añadir dirección
  addBtn.addEventListener("click", (e) => {
    e.preventDefault();
    const value = input.value.trim();
    if (!value) return;

    if (!EsDireccionColombiana(value)) {
      alert("⚠️ La dirección no tiene un formato válido de Colombia (Ej: Calle 10 # 20-30).");
      return;
    }

    // máximo 4 direcciones, elimina la más antigua
    if (direcciones.length >= 4) {
      direcciones.shift();
    }

    direcciones.push(value);
    renderDirecciones(value);
    input.value = "";
  });

  // Seleccionar para editar
  select.addEventListener("change", () => {
    if (select.value) {
      input.value = select.value;
      editBtn.disabled = false;
    } else {
      input.value = "";
      editBtn.disabled = true;
    }
  });

  // Editar dirección
  editBtn.addEventListener("click", (e) => {
    e.preventDefault();
    const index = select.selectedIndex;
    if (index === -1 || !select.value) return;

    const newValue = input.value.trim();
    if (!EsDireccionColombiana(newValue)) {
      alert("⚠️ La dirección no tiene un formato válido de Colombia (Ej: Calle 10 # 20-30).");
      return;
    }

    direcciones[index] = newValue;
    renderDirecciones(newValue, index);
    input.value = "";
  });

  // Resetear todo
  const resetBtn = document.getElementById("resetAddressesBtn");
  resetBtn.addEventListener("click", () => {
    if (confirm("¿Seguro que quieres borrar todas las direcciones?")) {
      localStorage.removeItem("direcciones");
      direcciones = [];
      renderEmpty();
    }
  });

  // Guardar direcciones
  addressForm.addEventListener("submit", (e) => {
    e.preventDefault();
    localStorage.setItem("direcciones", JSON.stringify(direcciones));

    // Pasar la última dirección guardada a Configuración
    if (direcciones.length > 0) {
      document.getElementById("radioPrimary2").value = direcciones[direcciones.length - 1];
      console.log(`${direcciones[direcciones.length - 1]}`);
    } else {
      document.getElementById("radioPrimary2").value = "";
      console.log("Sin dirección");
    }

    const msg = document.getElementById("saveMessage");
    msg.classList.remove("d-none");
    setTimeout(() => msg.classList.add("d-none"), 3000);

  });
});
