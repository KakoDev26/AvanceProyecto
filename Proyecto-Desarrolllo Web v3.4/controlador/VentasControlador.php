<?php
require_once __DIR__ . '/../dao/VentasDao.php';
require_once __DIR__ . '/../modelo/Ventas.php';


class VentasControlador
{
    public static function guardar($producto, $cantidad, $precioUnitario, $total)
    {
        $venta = new Venta();
        $venta->producto = $producto;
        $venta->cantidad = $cantidad;
        $venta->precioUnitario = $precioUnitario;
        $venta->total = $total;

        $dao = new VentasDAO();
        return $dao->registrar($venta);
    }


    public static function obtenerTodos()
    {
        $dao = new VentasDAO();
        return $dao->listarTodos();
    }

    public static function obtenerPorId($id)
    {
        $dao = new VentasDAO();
        return $dao->buscarPorId($id);
    }

    public static function guardarVenta()
    {
        $venta = new Venta();
        $venta->producto = $_POST['producto'];
        $venta->cantidad = $_POST['cantidad'];
        $venta->precioUnitario = $_POST['precioUnitario'];
        $venta->total = $_POST['total'];

        $dao = new VentasDAO();
        if ($dao->registrar($venta)) {
            header("Location: index.php?accion=consultar");
        } else {
            echo "Error al registrar venta.";
        }
        exit;
    }

    public static function editarVenta()
    {
        $venta = new Venta();
        $venta->id = $_POST['id'];
        $venta->producto = $_POST['producto'];
        $venta->cantidad = $_POST['cantidad'];
        $venta->precioUnitario = $_POST['precioUnitario'];
        $venta->total = $_POST['total'];

        $dao = new VentasDao();
        $dao->actualizar($venta);

        header("Location: index.php?accion=consultar");
        exit;
    }

    public static function eliminar($id)
    {
        $dao = new VentasDao();
        if ($dao->eliminar($id)) {
            header("Location: index.php?accion=consultar");
        } else {
            echo "Error al eliminar venta.";
        }
        exit;
    }
}
