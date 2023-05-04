<!-- vinculo para el encabezado -->
<?php
include('adicional/encabezado.php');
?>

<!-- vinculo para la conexion general a la base de datos -->
<?php 
include("modelo/conexion.php");
echo "Se realizo la conexion correctamente"; 
// Al ingresar mostrara automaticamente toda la base de datos registrada
$sentencia = $bd -> query("select * from registro");
// El nombre de la variable debe ser el mismo de la tabla, por eso se llama registro
$registro = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Tarjeta que contiene la tabla de los datos-->
        <div class="col-md-10">
            <!-- inicio alerta -->

            <!-- Para el mensaje de error si colocas un dato numerico dentro del varchar se activa esta parte del algoritmo -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>
            <!-- Para el mensaje de error -->

            <!-- Cuando se registraron los datos -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            <!-- Cuando se registraron los datos -->
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- habria que evaluar el condicional -->       
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Registrar Propiedad
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">REGISTRO</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php
                            include('Componentes/registro.php');
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                        </div>
                    </div>
                </div>
            </div>


            <!-- fin alerta -->
            <!-- Card igual tarjeta -->
            <div class="card">
                <div class="card-header">
                    Lista de propiedades
                </div>
                <div class="p-4">
                    <!-- Como mover a la izquierda-->
                    <!-- Columnas de la tabla-->
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#id</th>
                                <th scope="col">nro_partida</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Precio </th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Tamaño</th>
                                <th scope="col">N° habitaciones</th>
                                <th scope="col">N° baños</th>
                                <th scope="col">Fecha construcción</th>
                                <th scope="col">Nombre agente</th>
                                <th scope="col">Comentario</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Recorre cada elemento de la tabla para eso es el foreach-->
                            <?php 
                                foreach($registro as $dato){ 
                            ?>
                           
                            <tr>
                                <td scope="row"><?php echo $dato->id; ?></td>
                                <td><?php echo $dato->nro_partida; ?></td>
                                <td><?php echo $dato->direccion; ?></td>
                                <td><?php echo $dato->precio_venta; ?></td>
                                <td><?php echo $dato->tipo_propiedad; ?></td>
                                <td><?php echo $dato->tamaño_metros_cuadrados; ?></td>
                                <td><?php echo $dato->nro_habitaciones; ?></td>
                                <td><?php echo $dato->nro_baños; ?></td>
                                <td><?php echo $dato->fecha_construccion; ?></td>
                                <td><?php echo $dato->nombre_agente_inmo; ?></td>        
                                <td><?php echo $dato->comentario; ?></td>
                            <!-- La razon por la que imprime no se cambiar la referencia es porque tiene el mismo nombre de nuestros archivos-->
                                <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?id=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        
    </div>
</div>





