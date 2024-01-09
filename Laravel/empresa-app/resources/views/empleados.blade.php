<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados Lista</title>
</head>
<body>
    <h2>Empleados</h2>
    <table>
    @foreach($empleados as $empleado)
    <tr>
        <td>{{ $empleado->nombre }}</td>
        <td>{{ $empleado->email }}</td>
        <td>{{ $empleado->dni }}</td>
        <td>{{ $empleado->telefono }}</td>
        <td>{{ $empleado->salario }}</td>
    </tr>
    @endforeach
    </table>
</body>
</html>