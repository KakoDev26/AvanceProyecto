<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="container mt-4">
    <a href="index.php?accion=consultarUsuarios" class="btn btn-secondary btn-sm mb-3">← Volver</a>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h4 class="mb-3 text-center">Editar Usuarios</h4>

            <form action="index.php?accion=actualizarUsuario" method="POST">
                <input type="hidden" name="id" value="<?= $usuario->id ?>">

                <div class="mb-2">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control form-control-sm" value="<?= $usuario->nombre ?>" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Correo</label>
                    <input type="email" name="correo" class="form-control form-control-sm" value="<?= $usuario->correo ?>" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Rol</label>
                    <input type="text" name="rol" class="form-control form-control-sm" value="<?= $usuario->rol ?>" required>
                </div>


                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>