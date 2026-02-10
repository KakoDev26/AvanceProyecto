<?php include __DIR__ . '/../layout/header.php'; ?>

<main>
    <div class="container mt-4">
        <a href="index.php?accion=menu" class="btn btn-secondary btn-sm mb-3">← Volver al Menú</a>

        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <h4 class="text-center mb-4">Registrar Proveedor</h4>

                <form action="index.php?accion=guardarProveedor" method="POST">
                    <div class="mb-2">
                        <label class="form-label">Empresa</label>
                        <input type="text" name="empresa" class="form-control form-control-sm" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Contacto</label>
                        <input type="text" name="contacto" class="form-control form-control-sm" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Teléfono</label>
                        <input type="text" name="telefono" class="form-control form-control-sm" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control form-control-sm" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Dirección</label>
                        <textarea name="direccion" class="form-control form-control-sm" rows="3"></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php include __DIR__ . '/../layout/footer.php'; ?>