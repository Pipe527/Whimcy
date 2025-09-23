function MethodChange() {
  const methodEl = document.getElementById("method");
  if (!methodEl) return;

  function toggleFields() {
    const val = methodEl.value;
    document.getElementById("daviplataFields")?.classList.toggle("d-none", val !== "daviplata");
    document.getElementById("cardFields")?.classList.toggle("d-none", val !== "card");
    document.getElementById("paypalFields")?.classList.toggle("d-none", val !== "paypal");
  }

  // limpiar y volver a enlazar
  methodEl.removeEventListener("change", toggleFields);
  methodEl.addEventListener("change", toggleFields);

  // inicializa según el valor actual
  toggleFields();
}
