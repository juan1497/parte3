<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Actualizando Producto</title>
</head>

<body>
    <div class="container col-8">
        <button onclick="back()" type="button" class="btn btn-primary mt-3">atras</button>
        <h5 class="mt-2 text-center" id="exampleModalLabel"> Crear Producto</h5>
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

    <script>
        const back = (id) => {
            const resp = confirm("estas seguro");
            if (resp) {
                window.location.replace(`http://localhost:8080/parte3/index.php`)
            }
        }
    </script>


</body>

</html>