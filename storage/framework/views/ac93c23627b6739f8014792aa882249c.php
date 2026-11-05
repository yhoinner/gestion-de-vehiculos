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
<?php echo e(now()->format('d/m/Y H:i')); ?>


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

<?php $__currentLoopData = $vehiculos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehiculo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<tr>

<td><?php echo e($vehiculo->placa); ?></td>
<td><?php echo e($vehiculo->marca); ?></td>
<td><?php echo e($vehiculo->linea); ?></td>
<td><?php echo e($vehiculo->modelo); ?></td>
<td><?php echo e($vehiculo->estado); ?></td>

</tr>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</tbody>

</table>

<p style="margin-top:20px">

<strong>Total de vehículos:</strong>

<?php echo e($vehiculos->count()); ?>


</p>

</body>

</html><?php /**PATH C:\laragon\www\GestionVehiculos\resources\views/reportes/vehiculos.blade.php ENDPATH**/ ?>