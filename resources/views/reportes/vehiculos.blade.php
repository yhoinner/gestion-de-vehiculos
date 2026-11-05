<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<style>

body{
    font-family: DejaVu Sans;
    font-size:12px;
}

h1{
    text-align:center;
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
    padding:8px;
}

td{
    padding:6px;
}

.fecha{
    text-align:right;
    margin-bottom:20px;
}

</style>

</head>

<body>

<h1>SISTEMA DE GESTIÓN DE VEHÍCULOS UNP</h1>

<h2 style="text-align:center">
Reporte General de Vehículos
</h2>

<div class="fecha">

Fecha:
{{ now()->format('d/m/Y H:i') }}

</div>

<table>

<thead>

<tr>

<th>Placa</th>
<th>Marca</th>
<th>Línea</th>
<th>Modelo</th>
<th>Estado</th>

</tr>

</thead>

<tbody>

@foreach($vehiculos as $vehiculo)

<tr>

<td>{{ $vehiculo->placa }}</td>
<td>{{ $vehiculo->marca }}</td>
<td>{{ $vehiculo->linea }}</td>
<td>{{ $vehiculo->modelo }}</td>
<td>{{ $vehiculo->estado }}</td>

</tr>

@endforeach

</tbody>

</table>

<p style="margin-top:20px">

<strong>Total de vehículos:</strong>

{{ $vehiculos->count() }}

</p>

</body>

</html>