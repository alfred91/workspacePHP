<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwinds.com"></script>
</head>

<body>
    <h2>Incidencias</h2>
    <table class="table-fixed">
        <thead>
            <tr>
                <th>Latitud</th>
                <th>Longitud</th>
                <th>Ciudad</th>
                <th>Direccion</th>
                <th>Descripcion</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border px-4 py-2">{{$incidencia->latitud}}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">{{$incidencia->longitud}}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">{{$incidencia->ciudad}}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">{{$incidencia->direccion}}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">{{$incidencia->descripcion}}</td>
            </tr>
            <tr>
                <td class="border px-4 py-2">{{$incidencia->estado}}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>