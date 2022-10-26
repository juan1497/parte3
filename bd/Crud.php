<?php
require "db.php";

class Crud extends Conexion
{

    function mostrarDatos()
    {
        $sql = "SELECT id,
                    referencia,
                    nombre_producto,
                    observaciones,
                    precio,
                    impuesto,
                    cantidad,
                    estado,
                    imagen 
                    FROM modulo_producto ;";
        $query = Conexion::conectar()->prepare($sql);
        $query->execute();
        return $query->fetchAll();
        $query->close;
    }
    function insertarDatos($datos)
    {
        $sql = 'INSERT INTO modulo_producto (
                    referencia,
                    nombre_producto,
                    observaciones,
                    precio,
                    impuesto,
                    cantidad,
                    estado,
                    imagen ) VALUES(
                        :referencia,
                        :nombre_producto,
                        :observaciones,
                        :precio,
                        :impuesto,
                        :cantidad,
                        :estado,
                        :imagen);
                    ';
        $query = Conexion::conectar()->prepare($sql);
        $query->bindParam(':referencia', $datos['referencia'], PDO::PARAM_STR);
        $query->bindParam(':nombre_producto', $datos['nombre_producto'], PDO::PARAM_STR);
        $query->bindParam(':observaciones', $datos['observaciones'], PDO::PARAM_STR);
        $query->bindParam(':precio', $datos['precio'], PDO::PARAM_INT);
        $query->bindParam(':impuesto', $datos['impuesto'], PDO::PARAM_INT);
        $query->bindParam(':cantidad', $datos['cantidad'], PDO::PARAM_INT);
        $query->bindParam(':estado', $datos['estado'], PDO::PARAM_STR);
        $query->bindParam(':imagen', $datos['imagen'], PDO::PARAM_LOB);
        return  $query->execute();
        $query->close;
    }
    function eliminarDatos($id)
    {
        $sql = "DELETE FROM modulo_producto WHERE id=:id;";
        $query = Conexion::conectar()->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        return  $query->execute();
        $query->close;
    }
    function obtenerDatos($id)
    {
        $sql = "SELECT id,
                    referencia,
                    nombre_producto,
                    observaciones,
                    precio,
                    impuesto,
                    cantidad,
                    estado,
                    imagen 
                    FROM modulo_producto where id=:id;";
        $query = Conexion::conectar()->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();
        $query->close;
    }
    function actualizarDatos($datos)
    {
        $sql = 'UPDATE  modulo_producto SET 
            referencia=:referencia,
            nombre_producto=:nombre_producto,
            observaciones=:observaciones,
            precio=:precio,
            impuesto=:impuesto,
            cantidad=:cantidad,
            estado=:estado,
            imagen=:imagen
            WHERE id=:id;
            ';
        $query = Conexion::conectar()->prepare($sql);
        $query->bindParam(':id', $datos['id'], PDO::PARAM_INT);
        $query->bindParam(':referencia', $datos['referencia'], PDO::PARAM_STR);
        $query->bindParam(':nombre_producto', $datos['nombre_producto'], PDO::PARAM_STR);
        $query->bindParam(':observaciones', $datos['observaciones'], PDO::PARAM_STR);
        $query->bindParam(':precio', $datos['precio'], PDO::PARAM_INT);
        $query->bindParam(':impuesto', $datos['impuesto'], PDO::PARAM_INT);
        $query->bindParam(':cantidad', $datos['cantidad'], PDO::PARAM_INT);
        $query->bindParam(':estado', $datos['estado'], PDO::PARAM_STR);
        $query->bindParam(':imagen', $datos['imagen'], PDO::PARAM_LOB);
        return  $query->execute();
        $query->close;
    }
}
