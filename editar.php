<?php include('adicional/encabezado.php') ?>
<!--fefwedsdfdf-->
<?php
    if(!isset($_GET['codigo'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once ('modelo/conexion.php');
    // 
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare("select * from registro where id = ?;");
    $sentencia->execute([$codigo]);
    $registro = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar registro:
                </div>

                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">N° de partida: </label>
                        <input type="text" class="form-control" name="txtnropartida" required 
                        value="<?php echo $registro->nro_partida; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dirección: </label>
                        <input type="text" class="form-control" name="txtdireccion" autofocus required
                        value="<?php echo $registro->direccion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio de Venta: </label>
                        <input type="number" class="form-control" name="txtprecioventa" autofocus required
                        value="<?php echo $registro->precio_venta; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de Propiedad: </label>
                        <input type="text" class="form-control" name="txttipopropiedad" autofocus required
                        value="<?php echo $registro->tipo_propiedad; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tamaño M2: </label>
                        <input type="number" class="form-control" name="txttamaño_cuadrados" autofocus required
                        value="<?php echo $registro->tamaño_metros_cuadrados; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">N° de habitaciones : </label>
                        <input type="number" class="form-control" name="txtnrohabitaciones" autofocus required
                        value="<?php echo $registro->nro_habitaciones; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">N° de baños: </label>
                        <input type="number" class="form-control" name="txtnrobaños" autofocus required
                        value="<?php echo $registro->nro_baños; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de construccion: </label>
                        <input type="date" class="form-control" name="txtfechaconstruccion" autofocus required
                        value="<?php echo $registro->fecha_construccion; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre Agente </label>
                        <input type="text" class="form-control" name="txtnombreagente" autofocus required
                        value="<?php echo $registro->nombre_agente_inmo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Comentario: </label>
                        <input type="text" class="form-control" name="txtcomentario" autofocus required
                        value="<?php echo $registro->comentario; ?>">
                    </div>
                    <!-- El id en el q guarda la variable-->
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $registro->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>