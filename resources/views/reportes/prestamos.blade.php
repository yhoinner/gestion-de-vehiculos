<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">

<title>Reporte de Préstamos</title>

<style>

body{
    font-family:Arial, Helvetica, sans-serif;
    font-size:10px;
}

h2,h3{
    text-align:center;
    margin:4px;
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

    padding:4px;
    text-align:center;

}

</style>

</head>

<body>

<h2>UNP</h2>

<h3>Sistema de Gestión de Vehículos</h3>

<h3>Reporte General de Préstamos</h3>

<table>

<thead>

<tr>

<th>#</th>
<th>Vehículo</th>
<th>Conductor</th>
<th>Dependencia</th>
<th>Destino</th>
<th>Salida</th>
<th>Regreso</th>
<th>Estado</th>

</tr>

</thead>

<tbody>

@foreach($prestamos as $prestamo)

<tr>

<td>{{ $loop->iteration }}</td>

<td>

{{ $prestamo->vehiculo->placa }}

</td>

<td>

{{ $prestamo->conductor->nombre }}
{{ $prestamo->conductor->apellido }}

</td>

<td>

{{ $prestamo->dependencia }}

</td>

<td>

{{ $prestamo->destino }}

</td>

<td>

{{ $prestamo->fecha_salida }}

<br>

{{ $prestamo->hora_salida }}

</td>

<td>

@if($prestamo->fecha_regreso)

{{ $prestamo->fecha_regreso }}

<br>

{{ $prestamo->hora_regreso }}

@else

No registra

@endif

</td>

<td>

{{ $prestamo->estado }}

</td>

</tr>

@endforeach

</tbody>

</table>

</body>

</html>