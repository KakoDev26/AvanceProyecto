<?php
require_once __DIR__ . '/../../controlador/VentasControlador.php';

// Paginación
$registrosPorPagina = 8;
$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($paginaActual - 1) * $registrosPorPagina;

// Obtener todas las ventas
$todos = VentasControlador::obtenerTodos();
$totalVentas = count($todos);

// Cortar el array para esta página
$ventas = array_slice($todos, $inicio, $registrosPorPagina);

// Calcular número total de páginas
$totalPaginas = ceil($totalVentas / $registrosPorPagina);

include __DIR__ . '/../layout/header.php';
?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="index.php?accion=menu" class="btn btn-secondary mb-3">
            ← Volver al Menú
        </a>
    </div>

    <h3 class="text-center">Listado de Ventas</h3>

    <div class="table-responsive">
        <table class="table table-bordered mt-3">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                    <th class="text-center" style="width: 250px;">Acciones</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($ventas as $v): ?>
                    <tr>
                        <td><?= $v['id'] ?></td>
                        <td><?= $v['producto'] ?></td>
                        <td><?= $v['cantidad'] ?></td>
                        <td><?= $v['precioUnitario'] ?></td>
                        <td><?= $v['total'] ?></td>

                        <td class="text-center">

                            <!-- BOTÓN EDITAR -->
                            <a href="index.php?accion=editar&id=<?= $v['id'] ?>"
                                class="btn  btn-warning me-2">
                                <i class="bi bi-pencil"></i> Editar
                            </a>

                            <!-- BOTÓN ELIMINAR -->
                            <a onclick="return confirm('¿Está seguro de eliminar esta venta?')"
                                href="index.php?accion=eliminar&id=<?= $v['id'] ?>"
                                class="btn  btn-danger">
                                <i class="bi bi-trash"></i> Eliminar
                            </a>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- PAGINACIÓN -->
    <nav>
        <ul class="pagination justify-content-center">

            <?php if ($paginaActual > 1): ?>
                <li class="page-item">
                    <a class="page-link"
                        href="?accion=consultarVentas&pagina=<?= $paginaActual - 1 ?>">
                        Anterior
                    </a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <li class="page-item <?= ($i == $paginaActual) ? 'active' : '' ?>">
                    <a class="page-link"
                        href="?accion=consultarVentas&pagina=<?= $i ?>">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>

            <?php if ($paginaActual < $totalPaginas): ?>
                <li class="page-item">
                    <a class="page-link"
                        href="?accion=consultarVentas&pagina=<?= $paginaActual + 1 ?>">
                        Siguiente
                    </a>
                </li>
            <?php endif; ?>

        </ul>
    </nav>

</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>