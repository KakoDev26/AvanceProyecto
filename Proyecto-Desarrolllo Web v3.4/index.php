<?php
session_start();


require_once 'controlador/UsuarioControlador.php';
require_once 'controlador/VentasControlador.php';
require_once 'controlador/ProductosControlador.php';
require_once 'controlador/ProveedorControlador.php';
$productocontrol = new ProductosControlador();

$accion = $_GET['accion'] ?? 'inicio';



if (isset($_SESSION['usuario']) && in_array($accion, ['login', 'inicio'])) {
    header("Location: index.php?accion=menu");
    exit;
}


$accionesProtegidas = [
    'menu',
    'registrarVenta',
    'guardarVenta',
    'consultarVentas',
    'editarVenta',
    'actualizarVenta',
    'eliminarVenta',
    'logout'
];

if (in_array($accion, $accionesProtegidas) && !isset($_SESSION['nombre'])) {
    header("Location: index.php?accion=login");
    exit;
}


switch ($accion) {

    // LOGIN
    case 'login':
        include 'vista/login.php';
        break;

    case 'procesarLogin':
        UsuarioControlador::procesarLogin($_POST['nombre'],  $_POST['clave']);
        break;

    case 'logout':
        UsuarioControlador::logout();
        break;


    // MENÚ
    case 'menu':
        include 'vista/menu.php';
        break;


    //VENTAS


    case 'registrar':
        include 'vista/ventas/registrar.php';
        break;

    case 'guardarVenta':
        VentasControlador::guardarVenta();
        break;

    case 'consultar':
        include 'vista/ventas/consultar.php';
        break;

    case 'editar':
        $venta = VentasControlador::obtenerPorId($_GET['id']);
        include 'vista/ventas/editar.php';
        break;

    case 'actualizarVenta':
        VentasControlador::editarVenta();
        break;

    case 'eliminar':
        VentasControlador::eliminar($_GET['id']);
        break;

    // USUARIOS

    case 'agregarUsuario':
        include 'vista/usuarios/usuarios-agregar.php';
        break;

    case 'guardarUsuario':
        UsuarioControlador::guardarUsuario();
        break;

    case 'consultarUsuarios':
        include 'vista/usuarios/usuarios-detalle.php';
        break;

    case 'editarUsuario':
        $usuario = UsuarioControlador::obtenerPorId($_GET['id']);
        include 'vista/usuarios/usuarios-editar.php';
        break;

    case 'actualizarUsuario':
        UsuarioControlador::editarUsuario();
        break;

    case 'eliminarUsuario':
        UsuarioControlador::eliminarUsuario($_GET['id']);
        break;

    // PRODUCTOS
    case 'agregarProductos':
        include 'vista/productos/productos-agregar.php';
        break;
    case 'registrarProducto':
        $productocontrol->guardarProducto();
        break;
    case 'consultarProducto':
        include 'vista/productos/productos-detalle.php';
        break;
    case 'editarProducto':
        $producto = $productocontrol->obtenerId($_GET['id']);
        include 'vista/productos/productos-editar.php';
        break;

    case 'actualizarProducto':
        $productocontrol->editarProducto();
        break;
    case 'eliminarProducto':
        $productocontrol->eliminarProducto($_GET['id']);
        break;

    // PROVEEDORES
    case 'registrarProveedor':
        include 'vista/proveedores/proveedor-agregar.php';
        break;

    case 'guardarProveedor':
        require_once 'controlador/ProveedorControlador.php';
        ProveedorControlador::guardarProveedor();
        break;

    case 'consultarProveedores':
        include 'vista/proveedores/proveedor-detalle.php';
        break;

    case 'editarProveedor':
        require_once 'controlador/ProveedorControlador.php';
        $proveedor = ProveedorControlador::obtenerPorId($_GET['id']);
        include 'vista/proveedores/proveedor-editar.php';
        break;

    case 'actualizarProveedor':
        require_once 'controlador/ProveedorControlador.php';
        ProveedorControlador::editarProveedor();
        break;

    case 'eliminarProveedor':
        require_once 'controlador/ProveedorControlador.php';
        ProveedorControlador::eliminarProveedor($_GET['id']);
        break;

    default:
        include 'vista/inicio.php';
        break;
}
