<?php
    print_r($_POST);
    if (!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include('modelo/conexion.php');
    $codigo = $_POST['codigo'];
    $nro_partida = $_POST["txtnropartida"];
    echo $nro_partida;
    $direccion = $_POST["txtdireccion"];
    echo $direccion;
    $precio_venta = $_POST["txtprecioventa"];
    echo $precio_venta;
    //$precio_venta = preg_replace("/[^0-9]","",$precio_venta)
    $tipo_propiedad= $_POST["txttipopropiedad"];
    echo $tipo_propiedad;
    $tamaño_metros_cuadrados=$_POST["txttamaño_cuadrados"];
    echo $tamaño_metros_cuadrados;
    //$tamaño_metros_cuadrados= preg_replace("/[^0-9]","",$tamaño_metros_cuadrados);
    $nro_habitaciones = $_POST["txtnrohabitaciones"];
    echo $nro_habitaciones;
    //$nro_habitaciones = preg_replace("/[^0-9]","",$nro_habitaciones);
    $nro_baños = $_POST["txtnrobaños"];
    echo $nro_baños;
    //$nro_baños = preg_replace("/[^0-9]","",$nro_baños);
    $fecha_construccion =$_POST["txtfechaconstruccion"];
    echo $fecha_construccion;
    $nombre_agente = $_POST["txtnombreagente"];
    echo $nombre_agente;
    $comentario = $_POST["txtcomentario"];
    echo $comentario; 
    
    $sentencia = $bd->prepare("UPDATE registro SET nro_partida=?, direccion = ?, precio_venta = ?, tipo_propiedad = ?,tamaño_metros_cuadrados = ?,nro_habitaciones = ?,nro_baños = ?,fecha_construccion = ?,nombre_agente_inmo = ?,comentario = ? where id = ?;");
    $resultado = $sentencia->execute([$nro_partida,$direccion,$precio_venta,$tipo_propiedad,$tamaño_metros_cuadrados,$nro_habitaciones,$nro_baños,$fecha_construccion,$nombre_agente,$comentario,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=Cambio hecho');
    } else {
        header('Location: index.php?mensaje=Error');
        exit();
    }

?>