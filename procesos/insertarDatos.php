<?php

require "../bd/Crud.php";
print_r($_FILES['imagen']);

if (
    (isset($_POST['referencia']) && $_POST['referencia'] !== '') &&
    (isset($_POST['nombre_producto']) && $_POST['nombre_producto'] !== '') &&
    (isset($_POST['observaciones']) && $_POST['observaciones'] !== '') &&
    (isset($_POST['precio']) && $_POST['precio'] !== '') &&
    (isset($_POST['impuesto']) && $_POST['impuesto'] !== '') &&
    (isset($_POST['cantidad']) && $_POST['cantidad'] !== '') &&
    isset($_FILES['imagen'])

) {
    if ($_FILES['imagen']['size'] < 200000 && $_FILES['imagen']['error'] == 0) {
        $datos = array(
            'referencia' => $_POST['referencia'],
            'nombre_producto' => $_POST['nombre_producto'],
            'observaciones' => $_POST['observaciones'],
            'precio' => (int)$_POST['precio'],
            'impuesto' => (int)$_POST['impuesto'],
            'cantidad' => (int)$_POST['cantidad'],
            'estado' => isset($_POST['estado']) ? 'activo' : 'inactivo',
            'imagen' => $_FILES['imagen']['name'],
        );
        switch (explode('.', explode('/', $_SERVER["HTTP_REFERER"])[4])[0]) {
            case "insertForm":
                if (Crud::insertarDatos($datos)) {
                    Header("Location: ../index.php");
                } else {
                    echo 'ha ocurrido un error';
                }
                break;
            case "updateForm":
                $datos['id'] = $_POST['id'];
                if (Crud::actualizarDatos($datos)) {
                    Header("Location: ../index.php");
                } else {
                    echo 'ha ocurrido un error';
                }
                break;
        }
    } else {
        echo "<button onClick='history.go(-1)' type='button'>atras</button> la imagen pesa mas de 200kb";
    }
} else {
    echo "<button onClick='history.go(-1)' type='button'>atras</button> todos los campos son obligatorios";
}
