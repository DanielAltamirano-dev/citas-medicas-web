<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Cita Médica</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5"> 
        <h2 class="text-center mb-4">Agregar Cita Médica</h2>
        <form id="crearCitaForm">
            <!-- Campo oculto para la acción -->
            <input type="hidden" name="action" value="crear">

            <!-- Nombre del paciente -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Paciente</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del paciente" required>
            </div>

            <!-- Especialidad -->
            <div class="mb-3">
                <label for="especialidad" class="form-label">Especialidad</label>
                <select class="form-select" id="especialidad" name="especialidad" required>
                    <option value="" disabled selected>Seleccione una especialidad</option>
                    <option value="Medicina general">Medicina General</option>
                    <option value="pediatría">Pediatria</option>
                    <option value="dermatología">Dermatologia</option>
                </select>
            </div>

            <!-- Fecha -->
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha de la cita</label>
                <input type="date" class="form-control" id="fecha" name="fecha_cita" required>
            </div>

            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary w-100">Agregar Cita</button>
        </form>
        <!-- Lleva a la pagina del listado de citas medicas -->
    <a href="/listado-citas" class="btn btn-primary mt-3">Lista de citas medicas</a>
    </div>

    <script src="../public/js/agendar-cita.js"></script>
    

</body>
</html>