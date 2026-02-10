<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="container mt-4">
    <a href="index.php?accion=consultarProveedores" class="btn btn-secondary btn-sm mb-3">← Volver</a>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h4 class="mb-3 text-center">Editar Proveedor</h4>

            <form action="index.php?accion=actualizarProveedor" method="POST">
                <input type="hidden" name="id" value="<?= $proveedor->id ?>">

                <div class="mb-2">
                    <label class="form-label">Empresa</label>
                    <input type="text" name="empresa" class="form-control form-control-sm" 
                           value="<?= $proveedor->empresa ?>" required>
                </div>

                <div class="mb-2">
                    <label class="form-label">Contacto</label>
                    <input type="text" name="contacto" class="form-control form-control-sm" 
                           value="<?= $proveedor->contacto ?>" required>
                </div>

                <div class="mb-2">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control form-control-sm" 
                           value="<?= $proveedor->telefono ?>">
                </div>

                <div class="mb-2">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control form-control-sm" 
                           value="<?= $proveedor->email ?>">
                </div>

                <div class="mb-2">
                    <label class="form-label">Dirección</label>
                    <textarea name="direccion" class="form-control form-control-sm" rows="3"><?= $proveedor->direccion ?></textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>