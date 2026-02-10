<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="container mt-4">
    <a href="index.php?accion=menu" class="btn btn-secondary btn-sm mb-3">← Volver al Menú</a>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h4 class="text-center mb-4">Registrar Venta</h4>

            <form action="index.php?accion=guardarVenta" method="POST">
                <div class="mb-2">
                    <label class="form-label">Producto</label>
                    <input type="text" name="producto" class="form-control form-control-sm" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Cantidad</label>
                    <input type="number" id="cantidad" name="cantidad" class="form-control form-control-sm" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Precio Unitario</label>
                    <input type="number" id="precioUnitario" step="0.01" name="precioUnitario" class="form-control form-control-sm" required>
                </div>
                <div class="mb-2">
                    <label class="form-label">Total</label>
                    <input type="number" id="total" step="0.01" name="total" class="form-control form-control-sm" readonly>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const cantidadInput = document.getElementById('cantidad');
    const precioInput = document.getElementById('precioUnitario');
    const totalInput = document.getElementById('total');

    function calcularTotal() {
        const cantidad = parseFloat(cantidadInput.value) || 0;
        const precio = parseFloat(precioInput.value) || 0;
        const total = cantidad * precio;
        totalInput.value = total.toFixed(2);
    }

    cantidadInput.addEventListener('input', calcularTotal);
    precioInput.addEventListener('input', calcularTotal);
</script>

<?php include __DIR__ . '/../layout/footer.php'; ?>