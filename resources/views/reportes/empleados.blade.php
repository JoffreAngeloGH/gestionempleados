<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Reporte de Empleados</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Reporte de Empleados</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Salario Base</th>
                <th>Salario Final</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado['nombre'] }}</td>
                    <td>{{ $empleado['tipo'] }}</td>
                    <td>S/. {{ number_format($empleado['salario_base'], 2) }}</td>
                    <td>S/. {{ number_format($empleado['salario_final'], 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
