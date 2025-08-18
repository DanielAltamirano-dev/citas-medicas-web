$(document).ready(function () {
    // Realiza una solicitud GET al controlador para obtener las citas
    $.ajax({
        url: '../controllers/CitaController.php',
        method: 'GET',
        success: function (response) {
            // Verificar si la respuesta contiene datos
            if (response && Array.isArray(response)) {
                const citasBody = $('#citas-body');
                response.forEach(cita => {
                    // Crea una fila para cada registro de cita
                    const row = `
                                <tr>
                                    <td>${cita.nombre_paciente}</td>
                                    <td>${cita.especialidad}</td>
                                    <td>${cita.fecha}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm eliminar-cita" data-id="${cita.id}">Eliminar</button>
                                    </td>
                                </tr>
                            `;
                    citasBody.append(row);
                });
            } else {
                alert('No se encontraron citas.');
            }
        },
        error: function () {
            alert('Error al obtener las citas.');
        }
    });

    // Logica para eliminar una cita
    $(document).on('click', '.eliminar-cita', function () {
        const citaId = $(this).data('id');
        const confirmacion = confirm('¿Estás seguro de que deseas eliminar esta cita?');
        if (confirmacion) {
            // Realiza una solicitud POST a la funcion del controlador
            $.ajax({
                url: '../controllers/CitaController.php',
                method: 'POST',
                data: {
                    action: 'eliminar',
                    id: citaId
                },
                success: function (response) {
                    if (response.success) {
                        alert('Cita eliminada correctamente.');
                        // Elimina la fila de la tabla correspondiente a la cita eliminada
                        $(`button[data-id="${citaId}"]`).closest('tr').remove();
                    } else {
                        alert('Error al eliminar la cita: ' + response.message);
                    }
                },
                error: function () {
                    alert('Error al intentar eliminar la cita.');
                }
            });
        }
    });
});
