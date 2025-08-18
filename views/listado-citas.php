<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Citas Medicas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody id="citas-body">
                <!-- Datos traidos desde la base de datos -->                
            </tbody>
        </table>

        <a href="agendar-cita" class="btn btn-primary mt-3">Agregar cita médica</a>
    </div>

    <script src="../public/js/listado-citas.js"></script>
    
</body>
</html>