async function puntuar() {
    // Primero, solicitamos al usuario que ingrese un mensaje
    const { value: text } = await Swal.fire({
      input: "textarea",
      inputLabel: "Reseña",
      inputPlaceholder: "Ingresa tus comentarios...",
      inputAttributes: {
        "aria-label": "Type your message here"
      },
      showCancelButton: true
    });

    // Si el usuario ingresa un mensaje
    if (text) {
      // Luego, solicitamos al usuario que ingrese una calificación
      const { value: rating } = await Swal.fire({
        title: "Tu calificación?",
        icon: "question",
        input: "range",
        inputLabel: "De 1 - 5",
        inputAttributes: {
          min: "1",
          max: "5",
          step: "1"
        },
        inputValue: 2
      });

      // Si el usuario selecciona una calificación
      if (rating !== undefined) {
        // Mostramos el mensaje ingresado y la calificación seleccionada
        Swal.fire({
          title: "Mensaje y Calificación",
          html: `Mensaje: <pre>${text}</pre><br>Calificación: ${rating}`,
          showCancelButton: true,
          confirmButtonText: "Aceptar",
          cancelButtonText: "Cancelar"
        }).then((result) => {
          if (result.isConfirmed) {
            // Aquí puedes realizar acciones adicionales si el usuario confirma
          } else if (result.dismiss === Swal.DismissReason.cancel) {
            // Aquí puedes realizar acciones adicionales si el usuario cancela
          }
        });
      }
    }
  }