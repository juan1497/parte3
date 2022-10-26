<?php
require "./bd/Crud.php";
$obj = new Crud();
$datos = $obj->mostrarDatos(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>prueba</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <a type="button" class="btn btn-primary mb-4" onclick="redirectTo('create')">
                                Agregar Producto
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-dark">
                                <thead>
                                    <tr class="font-weight-bold">
                                        <td class="col-1 text-center ">Referencia</td>
                                        <td class="col-1 text-center">Nombre</td>
                                        <td class="col-2 text-center">Observaciones</td>
                                        <td class="col-1 text-center">Precio</td>
                                        <td class="col-1 text-center">Impuesto</td>
                                        <td class="col-1 text-center">Cantidad</td>
                                        <td class="col-1 text-center">Estado</td>
                                        <td class="col-1 text-center">Imagen</td>
                                        <td class="col-2 text-center">Acciones</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($datos as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="col-1 text-center "><?php echo $value['referencia'] ?></td>
                                            <td class="col-1 text-center "><?php echo $value['nombre_producto'] ?></td>
                                            <td class="col-2 text-center "><?php echo $value['observaciones'] ?> </td>
                                            <td class="col-1 text-center "><?php echo $value['precio'] ?> </td>
                                            <td class="col-1 text-center "><?php echo $value['impuesto'] ?> </td>
                                            <td class="col-1 text-center "><?php echo $value['cantidad'] ?> </td>
                                            <td class="col-1 text-center "><?php echo $value['estado'] ?> </td>
                                            <td class="col-1 text-center "><?php
                                                                            echo $value['imagen'] ?></td>
                                            <td class="col-2 text-center ">

                                                <a type="button" class="btn btn-primary" onclick="redirectTo('update',<?php echo $value['id'] ?>)">
                                                    editar
                                                </a>
                                                <a type=" button" class="btn btn-danger" onclick="redirectTo('delete',<?php echo $value['id'] ?>)">
                                                    borrar
                                                </a>
                                            </td>
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
    </div>
    <!-- modal insert -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>
                <div class="modal-body">
                    <form id="insertData" action="./procesos/insertarDatos.php" method="post" enctype="multipart/form-data">
                        <div class=" row">
                            <div class=" col-6">
                                <label>Referencia</label>
                                <input type="text" id="referencia" name="referencia" class="form-control form-control-sm">
                            </div>
                            <div class="col-6">
                                <label>Nombre</label>
                                <input type="text" id="nombre_producto" name="nombre_producto" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label>Observaciones</label>
                                <input type="text" id="observaciones" name="observaciones" class="form-control form-control-sm">
                            </div>

                            <div class="col-6">
                                <label>Precio</label>
                                <input type="number" id="precio" name="precio" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label>Impuesto</label>
                                <input type="number" id="impuesto" name="impuesto" class="form-control form-control-sm">
                            </div>


                            <div class="col-6">
                                <label>Cantidad</label>
                                <input type="number" id="cantidad" name="cantidad" class="form-control form-control-sm">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-12">
                                <div class="form-check ">
                                    <input class="form-check-input" name="estado" type="checkbox" id="estado">
                                    <label class="form-check-label" for="estado">Estado</label>
                                </div>

                            </div>

                            <div class="row mt-2">
                                <div class="col-12">
                                    <label>Imagen</label>
                                    <input type="file" accept="image/jpeg" id="imagen" name="imagen" class="form-control form-control-sm">
                                </div>
                            </div>

                            <div class=" mt-2 d-flex  flex-col justify-content-center">
                                <input type="submit" value="Guardar" data-bs-target="#exampleModal" data-bs-dismiss="modal" class="btn  btn-primary">
                            </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        const redirectTo = (name, id = null) => {
            switch (name) {
                case 'delete':
                    const resp = confirm("estas seguro");
                    if (resp) {
                        window.location.replace(`http://localhost:8080/parte3/procesos/eliminarDatos.php?id=${id}`)
                    }
                    break;
                case 'update':
                    window.location.replace(`http://localhost:8080/parte3/updateForm.php?id=${id}`)
                    break;
                case 'create':
                    window.location.replace(`http://localhost:8080/parte3/insertForm.php`)
                    break;
            }
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>