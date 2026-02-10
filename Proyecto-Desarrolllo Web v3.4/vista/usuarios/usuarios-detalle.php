<?php

// Paginación
$registrosPorPagina = 8;
$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($paginaActual - 1) * $registrosPorPagina;

// Obtener todos los alumnos
$todos = UsuarioControlador::obtenerTodos();
$totalUsuarios = count($todos);

// Cortar el array para esta página
$usuarios = array_slice($todos, $inicio, $registrosPorPagina);

// Calcular número total de páginas
$totalPaginas = ceil($totalUsuarios / $registrosPorPagina);

include __DIR__ . '/../layout/header.php';
?>

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <a href="index.php?accion=menu" class="btn btn-secondary mb-3">← Volver al Menú</a>
    </div>

    <h3>Listado de Usuarios</h3>
    <table class="table table-bordered mt-3">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th style="width: 250px;">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $a): ?>
                <tr>
                    <td><?= $a['id'] ?></td>
                    <td><?= $a['nombre'] ?></td>
                    <td><?= $a['correo'] ?></td>
                    <td><?= $a['rol'] ?></td>
                    <td class="text-center">
                        <a href="index.php?accion=editarUsuario&id=<?= $a['id'] ?>" class="btn  btn-warning me-2"><i class="bi bi-pencil"></i>Editar</a>
                        <a onclick="return confirm('¿Está seguro de eliminar esta venta?')"
                            href="index.php?accion=eliminarUsuario&id=<?= $a['id'] ?>"
                            class="btn  btn-danger">
                            <i class="bi bi-trash"></i> Eliminar
                        </a>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <nav>
        <ul class="pagination justify-content-center">
            <?php if ($paginaActual > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?accion=consultarUsuarios&pagina=<?= $paginaActual - 1 ?>">Anterior</a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
                <li class="page-item <?= ($i == $paginaActual) ? 'active' : '' ?>">
                    <a class="page-link" href="?accion=consultarUsuarios&pagina=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($paginaActual < $totalPaginas): ?>
                <li class="page-item">
                    <a class="page-link" href="?accion=consultarUsuarios&pagina=<?= $paginaActual + 1 ?>">Siguiente</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>

</div>

<?php
include __DIR__ . '/../layout/footer.php';
?>