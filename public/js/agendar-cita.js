// Maneja la respuesta al crear la cita
document.getElementById('crearCitaForm').addEventListener('submit', async function (event) {
    event.preventDefault(); // Evita el envío predeterminado del formulario

    const fechaInput = document.getElementById('fecha').value;

    // Formatea la fecha seleccionada a la fecha local
    const [year, month, day] = fechaInput.split('-'); // Dividir el valor en año, mes y día
    const fechaSeleccionada = new Date(year, month - 1, day); 

    const fechaActual = new Date();
    fechaActual.setHours(0, 0, 0, 0); // Establece la hora a 00:00:00 para comparar solo la fecha    

    // Imprimir las fechas en la consola
    console.log('Fecha seleccionada:', fechaSeleccionada);
    console.log('Fecha actual:', fechaActual);

    // Validar que la fecha no sea en el pasado
    if (fechaSeleccionada < fechaActual) {
        alert('La fecha de la cita no puede ser anterior a la actual.');
        return; // Detiene el flujo
    }

    const formData = new FormData(event.target);

    try {
        const response = await fetch('../controllers/CitaController.php', {
            method: 'POST',
            body: formData
        });

        const data = await response.json();

        if (response.ok && data.success) {
            alert('Cita creada exitosamente');
            // Redirige a la pagina de la lista de citas
            window.location.href = '/listado-citas';
        } else {
            alert(data.error || 'Error al crear la cita');
        }
    } catch (error) {
        alert('Error de conexión con el servidor');
    }
});