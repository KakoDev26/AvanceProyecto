<?php
require_once __DIR__ . '/../bd/conexion.php';
require_once __DIR__ . '/../modelo/Ventas.php';

class VentasDao
{
    public function registrar($venta)
    {
        $conexion = new Conexion();
        $pdo = $conexion->conectar();

        $sqlInsert = "INSERT INTO ventas (producto, cantidad, precioUnitario, total)
                      VALUES (:producto, :cantidad, :precioUnitario, :total)";

        $stmt = $pdo->prepare($sqlInsert);

        return $stmt->execute([
            ':producto' => $venta->producto,
            ':cantidad' => $venta->cantidad,
            ':precioUnitario' => $venta->precioUnitario,
            ':total' => $venta->total
        ]);
    }

    public function listarTodos()
    {
        $conexion = new Conexion();
        $pdo = $conexion->conectar();

        $sql = "SELECT id, producto, cantidad, precioUnitario, total
                FROM ventas
                ORDER BY id";

        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function buscarPorId($id)
    {
        $conexion = new Conexion();
        $pdo = $conexion->conectar();

        $sql = "SELECT id, producto, cantidad, precioUnitario, total
                FROM ventas
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $venta = new Venta();
            $venta->id = $row['id'];
            $venta->producto = $row['producto'];
            $venta->cantidad = $row['cantidad'];
            $venta->precioUnitario = $row['precioUnitario'];
            $venta->total = $row['total'];
            return $venta;
        }

        return null;
    }

    public function actualizar($venta)
    {
        $conexion = new Conexion();
        $pdo = $conexion->conectar();

        $sqlUpdate = "UPDATE ventas SET producto = :producto, cantidad = :cantidad, 
                      precioUnitario = :precioUnitario, total = :total 
                      WHERE id = :id";

        $stmt = $pdo->prepare($sqlUpdate);

        return $stmt->execute([
            ':producto' => $venta->producto,
            ':cantidad' => $venta->cantidad,
            ':precioUnitario' => $venta->precioUnitario,
            ':total' => $venta->total,
            ':id' => $venta->id
        ]);
    }

    public function eliminar($id)
    {
        $conexion = new Conexion();
        $pdo = $conexion->conectar();

        $sqlDelete = "DELETE FROM ventas WHERE id = :id";

        $stmt = $pdo->prepare($sqlDelete);

        return $stmt->execute([':id' => $id]);
    }
}
