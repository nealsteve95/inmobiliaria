<?php
// Este oculto no se a que hace referencia tal vez al id
if (empty($_POST["txtnropartida"]) || empty($_POST["txtdireccion"]) || empty($_POST["txtprecioventa"]) || empty($_POST["txttamaño_cuadrados"]) || empty($_POST["txtnrohabitaciones"]) 
   || empty($_POST["txtnrobaños"]) || empty($_POST["txtfechaconstruccion"]) || empty($_POST["txtnombreagente"]) || empty($_POST["txtcomentario"]) ) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once("modelo/conexion.php");
$nro_partida = $_POST["txtnropartida"];
$direccion = $_POST["txtdireccion"];
$precio_venta = $_POST["txtprecioventa"];
//$precio_venta = preg_replace("/[^0-9]","",$precio_venta);
$tipo_propiedad= $_POST["txttipopropiedad"];
$tamaño_metros_cuadrados=$_POST["txttamaño_cuadrados"];
//$tamaño_metros_cuadrados= preg_replace("/[^0-9]","",$tamaño_metros_cuadrados);
$nro_habitaciones = $_POST["txtnrohabitaciones"];
//$nro_habitaciones = preg_replace("/[^0-9]","",$nro_habitaciones);
$nro_baños = $_POST["txtnrobaños"];
//$nro_baños = preg_replace("/[^0-9]","",$nro_baños);
$fecha_construccion =$_POST["txtfechaconstruccion"];
$nombre_agente = $_POST["txtnombreagente"];
$comentario = $_POST["txtcomentario"];

$sentencia = $bd->prepare("INSERT INTO registro(nro_partida,direccion,precio_venta,tipo_propiedad,tamaño_metros_cuadrados,nro_habitaciones,nro_baños,fecha_construccion,nombre_agente_inmo,comentario) VALUES (?,?,?,?,?,?,?,?,?,?);");
$resultado = $sentencia->execute([$nro_partida,$direccion,$precio_venta,$tipo_propiedad,$tamaño_metros_cuadrados,$nro_habitaciones,$nro_baños,$fecha_construccion,$nombre_agente,$comentario]);

if ($resultado === TRUE ){
    header('Location: index.php?mensaje=registrado');
}  else{
    header('Location: index.php?mensaje=error');
   exit();
}
?>

