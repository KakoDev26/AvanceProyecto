<?php include __DIR__ . '/layout/header.php'; ?>
<main>
    <div class="container mt-5 flex-grow-1">

        <h2 class="text-center mb-4">Inicio de Sesión</h2>
        <script src="https://kit.fontawesome.com/e68fc070ec.js" crossorigin="anonymous"></script>
        <form action="index.php?accion=procesarLogin" method="POST" class="mx-auto" style="max-width: 450px;">

            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa-regular fa-user"></i>
                    </span>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                </div>

            </div>

            <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fa-solid fa-lock"></i> </span>
                    <input type="password" class="form-control" name="clave" placeholder="Clave" required>
                </div>
            </div>

            

            <div class="mb-3 d-grid">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
        </form>
    </div>
</main>
<?php include __DIR__ . '/layout/footer.php'; ?>