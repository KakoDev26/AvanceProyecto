<?php
require_once __DIR__ . '/../dao/ProveedorDao.php';
require_once __DIR__ . '/../modelo/Proveedor.php';

class ProveedorControlador
{
    public static function guardarProveedor()
    {
        $proveedor = new Proveedor();
        $proveedor->empresa = $_POST['empresa'];
        $proveedor->contacto = $_POST['contacto'];
        $proveedor->telefono = $_POST['telefono'];
        $proveedor->email = $_POST['email'];
        $proveedor->direccion = $_POST['direccion'];

        $dao = new ProveedorDao();
        if ($dao->registrar($proveedor)) {
            header("Location: index.php?accion=consultarProveedores");
        } else {
            echo "Error al registrar proveedor.";
        }
        exit;
    }

    public static function obtenerTodos()
    {
        $dao = new ProveedorDao();
        return $dao->listarTodos();
    }

    public static function obtenerPorId($id)
    {
        $dao = new ProveedorDao();
        return $dao->buscarPorId($id);
    }

    public static function editarProveedor()
    {
        $proveedor = new Proveedor();
        $proveedor->id = $_POST['id'];
        $proveedor->empresa = $_POST['empresa'];
        $proveedor->contacto = $_POST['contacto'];
        $proveedor->telefono = $_POST['telefono'];
        $proveedor->email = $_POST['email'];
        $proveedor->direccion = $_POST['direccion'];

        $dao = new ProveedorDao();
        $dao->actualizar($proveedor);

        header("Location: index.php?accion=consultarProveedores");
        exit;
    }

    public static function eliminarProveedor($id)
    {
        $dao = new ProveedorDao();
        if ($dao->eliminar($id)) {
            header("Location: index.php?accion=consultarProveedores");
        } else {
            echo "Error al eliminar proveedor.";
        }
        exit;
    }
}