<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Reporte de Conductores</title>

    <style>

        body{
            font-family: Arial, Helvetica, sans-serif;
            font-size:11px;
        }

        h2,h3,p{
            text-align:center;
            margin:3px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        table,th,td{
            border:1px solid black;
        }

        th{
            background:#0d6efd;
            color:white;
            padding:6px;
        }

        td{
            padding:5px;
            text-align:center;
        }

    </style>

</head>

<body>

<h2>UNP</h2>
<h3>Sistema de Gestión de Vehículos</h3>

<p>
Reporte General de Conductores
</p>

<table>

<thead>

<tr>

<th>#</th>
<th>Cédula</th>
<th>Nombre Completo</th>
<th>Teléfono</th>
<th>Correo</th>
<th>Licencia</th>
<th>Vence</th>
<th>Cargo</th>
<th>Estado</th>

</tr>

</thead>

<tbody>

@foreach($conductores as $conductor)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $conductor->cedula }}</td>

<td>{{ $conductor->nombre }} {{ $conductor->apellido }}</td>

<td>{{ $conductor->telefono }}</td>

<td>{{ $conductor->correo }}</td>

<td>{{ $conductor->licencia }}</td>

<td>{{ \Carbon\Carbon::parse($conductor->vence_licencia)->format('d/m/Y') }}</td>

<td>{{ $conductor->cargo }}</td>

<td>{{ $conductor->estado }}</td>

</tr>

@endforeach

</tbody>

</table>

</body>

</html>