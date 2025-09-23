// Globales
function getFecha() {
    const now = new Date();
    const month = now.getMonth() + 1;
    const day = now.getDate();
    return { day, month };
}

// Pasar a global
window.getFecha = getFecha;
