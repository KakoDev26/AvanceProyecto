<?php
require_once __DIR__ . '/../../controlador/ProveedorControlador.php';

// Paginación
$registrosPorPagina = 8;
$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($paginaActual - 1) * $registrosPorPagina;

// Obtener todos los proveedores
$todos = ProveedorControlador::obtenerTodos();
$totalProveedores = count($todos);

// Cortar el array para esta página
$proveedores = array_slice($todos, $inicio, $registrosPorPagina);

// Calcular número total de páginas
$totalPaginas = ceil($totalProveedores / $registrosPorPagina);

include __DIR__ . '/../layout/header.php';
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="index.php?accion=menu" class="btn btn-secondary mb-3">← Volver al Menú</a>
    </div>

    <h3>Listado de Proveedores</h3>
    <div class="table-responsive">
        <table class="table table-bordered mt-3">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Empresa</th>
                    <th>Contacto</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th style="width: 250px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proveedores as $p): ?>
                    <tr>
                        <td><?= $p['id'] ?></td>
                        <td><?= $p['empresa'] ?></td>
                        <td><?= $p['contacto'] ?></td>
                        <td><?= $p['telefono'] ?></td>
                        <td><?= $p['email'] ?></td>
                        <td class="text-center">
                            <a href="index.php?accion=editarProveedor&id=<?= $p['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="index.php?accion=eliminarProveedor&id=<?= $p['id'] ?>"
                                onclick="return confirm('¿Está seguro de eliminar este proveedor?')"
                                class="btn btn-sm btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <nav>
        <ul class="pagination justify-content-center">
            <?php if ($paginaActual > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?accion=consultarProveedores&pagina=<?= $paginaActual - 1 ?>">Anterior</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <li class="page-item <?= ($i == $paginaActual) ? 'active' : '' ?>">
                    <a class="page-link" href="?accion=consultarProveedores&pagina=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($paginaActual < $totalPaginas): ?>
                <li class="page-item">
                    <a class="page-link" href="?accion=consultarProveedores&pagina=<?= $paginaActual + 1 ?>">Siguiente</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>