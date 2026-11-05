<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">

<title>Reporte de Mantenimientos</title>

<style>

body{
    font-family: Arial, Helvetica, sans-serif;
    font-size:10px;
}

h2,h3{
    text-align:center;
    margin:5px;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

table,th,td{
    border:1px solid #000;
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

<h3>Reporte General de Mantenimientos</h3>

<table>

<thead>

<tr>

<th>#</th>
<th>Vehículo</th>
<th>Tipo</th>
<th>Fecha</th>
<th>Taller</th>
<th>Km</th>
<th>Costo</th>
<th>Técnico</th>
<th>Estado</th>

</tr>

</thead>

<tbody>

@foreach($mantenimientos as $mantenimiento)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $mantenimiento->vehiculo->placa }}</td>

<td>{{ $mantenimiento->tipo }}</td>

<td>{{ \Carbon\Carbon::parse($mantenimiento->fecha)->format('d/m/Y') }}</td>

<td>{{ $mantenimiento->taller }}</td>

<td>{{ number_format($mantenimiento->kilometraje,0,',','.') }}</td>

<td>$ {{ number_format($mantenimiento->costo,0,',','.') }}</td>

<td>{{ $mantenimiento->tecnico }}</td>

<td>{{ $mantenimiento->estado }}</td>

</tr>

@endforeach

</tbody>

</table>

<br>

<p style="text-align:right">

Fecha de generación:

{{ now()->format('d/m/Y H:i') }}

</p>

</body>

</html>