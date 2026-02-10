<?php include __DIR__ . '/../layout/header.php'; ?>

<div class="container mt-4">
  <a href="index.php?accion=consultarProducto" class="btn btn-secondary btn-sm mb-3">← Volver</a>

  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
      <h4 class="mb-3 text-center">Editar Productos</h4>

      <form action="index.php?accion=actualizarProducto" method="POST">
        <input type="hidden" name="id" value="<?= $producto->id ?>">

        <div class="mb-2">
          <label class="form-label">Nombre del Producto</label>
          <input type="text" name="nombre" class="form-control form-control-sm" value="<?= $producto->nombre ?>" required>
        </div>
        <div class="mb-2">
          <label class="form-label">Precio del Producto</label>
          <input type="text" name="precio" class="form-control form-control-sm" value="<?= $producto->precioUnitario ?>" required>
        </div>
        <div class="mb-2">
          <label class="form-label">Categoria</label>
          <input type="text" name="categoria" class="form-control form-control-sm" value="<?= $producto->categoria ?>" required>
        </div>
        <div class="mb-2">
          <label class="form-label">Stock</label>
          <input type="text" name="stock" class="form-control form-control-sm" value="<?= $producto->stock ?>" required>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary btn-sm">Actualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>