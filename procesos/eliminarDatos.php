<?php
require "../bd/Crud.php";
$id = $_GET['id'];

if (Crud::eliminarDatos($id)) {
    Header("Location: ../index.php");
}
