<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ficha del Vehículo</title>

    <style>

        body{
            font-family: Arial, Helvetica, sans-serif;
            font-size:12px;
            color:#222;
        }

        h1,h2,h3{
            margin:0;
            padding:0;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:10px;
        }

        table th,
        table td{
            border:1px solid #999;
            padding:6px;
        }

        th{
            background:#003366;
            color:white;
        }

        .titulo{
            text-align:center;
            margin-bottom:20px;
        }

        .info td:first-child{
            width:180px;
            font-weight:bold;
            background:#efefef;
        }

        .seccion{
            margin-top:25px;
            margin-bottom:8px;
            color:#003366;
        }

        .pie{
            margin-top:30px;
            text-align:center;
            font-size:10px;
            color:#666;
        }

    </style>

</head>

<body>

<div class="titulo">

    <h2>UNP</h2>

    <h3>Sistema de Gestión Vehicular</h3>

    <h1>FICHA DEL VEHÍCULO</h1>

</div>

<table class="info">

<tr>
    <td>Placa</td>
    <td>{{ $vehiculo->placa }}</td>
</tr>

<tr>
    <td>Marca</td>
    <td>{{ $vehiculo->marca }}</td>
</tr>

<tr>
    <td>Línea</td>
    <td>{{ $vehiculo->linea }}</td>
</tr>

<tr>
    <td>Modelo</td>
    <td>{{ $vehiculo->modelo }}</td>
</tr>

<tr>
    <td>Año</td>
    <td>{{ $vehiculo->anio }}</td>
</tr>

<tr>
    <td>Color</td>
    <td>{{ $vehiculo->color }}</td>
</tr>

<tr>
    <td>Estado</td>
    <td>{{ $vehiculo->estado }}</td>
</tr>

</table>

<h3 class="seccion">Historial de Préstamos</h3>

<table>

<tr>

<th>Fecha</th>

<th>Conductor</th>

<th>Destino</th>

<th>Estado</th>

</tr>

@forelse($vehiculo->prestamos as $prestamo)

<tr>

<td>{{ $prestamo->fecha_salida }}</td>

<td>

{{ $prestamo->conductor->nombre }}

{{ $prestamo->conductor->apellido }}

</td>

<td>{{ $prestamo->destino }}</td>

<td>{{ $prestamo->estado }}</td>

</tr>

@empty

<tr>

<td colspan="4" align="center">

Sin registros

</td>

</tr>

@endforelse

</table>

<h3 class="seccion">Historial de Mantenimientos</h3>

<table>

<tr>

<th>Fecha</th>

<th>Tipo</th>

<th>Taller</th>

<th>Estado</th>

</tr>

@forelse($vehiculo->mantenimientos as $mantenimiento)

<tr>

<td>{{ $mantenimiento->fecha }}</td>

<td>{{ $mantenimiento->tipo }}</td>

<td>{{ $mantenimiento->taller }}</td>

<td>{{ $mantenimiento->estado }}</td>

</tr>

@empty

<tr>

<td colspan="4" align="center">

Sin registros

</td>

</tr>

@endforelse

</table>

<h3 class="seccion">Documentos</h3>

<table>

<tr>

<th>Tipo</th>

<th>Expedición</th>

<th>Vencimiento</th>

</tr>

@forelse($vehiculo->documentos as $documento)

<tr>

<td>{{ $documento->tipo }}</td>

<td>{{ $documento->fecha_expedicion }}</td>

<td>{{ $documento->fecha_vencimiento }}</td>

</tr>

@empty

<tr>

<td colspan="3" align="center">

Sin documentos

</td>

</tr>

@endforelse

</table>

<div class="pie">

Generado el:
{{ now()->format('d/m/Y H:i') }}

<br><br>

Sistema de Gestión Vehicular - UNP

</div>

</body>
</html>