<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Citas Medicas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de citas médicas</h1>
        
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Especialidad</th>
                    <th>Fecha Cita</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Juan Pérez</td>
                    <td>Cardiología</td>
                    <td>16/08/2025</td>
                </tr>
            </tbody>
        </table>

        <a href="agendar-cita" class="btn btn-primary mt-3">Agregar cita médica</a>
    </div>
</body>
</html>