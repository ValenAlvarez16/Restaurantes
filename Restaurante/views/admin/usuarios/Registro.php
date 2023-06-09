<?php
require_once('C:\xampp\htdocs\Restaurante\controllers\UsuarioController.php');
    if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['Documento']) && isset($_POST['telefono']) && isset($_POST['correo']) && isset($_POST['clave']) && isset($_POST['IdRol'])) {
        $usuarioController = new UsuarioController();
        //$usuarioController->create(); //llamamos la funcion create del controlador
    }
?>



<main class="d-flex">

    <?php
    include("../admin.php");
    ?>

    <div class="m-auto">
        <?php
        if (isset($respuestas)) {
            echo " <div class='alert alert-success text-center'> Usuario Registrado</div> ";
        }else if (isset($respuestas) && $respuestas == false) {
            echo " <div class='alert alert-danger text-center'> Usuario No Registrado</div> ";
        }
        ?>
        <h1 class="fw-bold text-primario font-monospace text-center">Crear Usuario</h1>
        <form action="" method="post" class="m-auto">

            <div class="d-flex gap-4">
                <div class="form-outline mb-4">
                    <label class="form-label fw-bold text-primario font-monospace" for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label fw-bold text-primario font-monospace" for="apellido">Apellido</label>
                    <input type="text" id="apellido" name="apellido" class="form-control form-control-lg" />
                </div>
            </div>

            <div class="d-flex gap-4">
                <div class="form-outline mb-4">
                    <label class="form-label fw-bold text-primario font-monospace" for="Documento">Documento</label>
                    <input type="number" id="Documento" name="Documento" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label fw-bold text-primario font-monospace" for="telefono">Telefono</label>
                    <input type="number" id="telefono" name="telefono" class="form-control form-control-lg" />
                </div>
            </div>

            <div class="d-flex gap-4">
                <div class="form-outline mb-4">
                    <label class="form-label fw-bold text-primario font-monospace" for="correo">Correo</label>
                    <input type="email" id="correo" name="correo" class="form-control form-control-lg" />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label fw-bold text-primario font-monospace" for="clave">Contraseña</label>
                    <input type="password" id="clave" name="clave" class="form-control form-control-lg" />
                </div>
            </div>

            <div class="form-outline mb-4">
                <label for="IdRol" class="form-label fw-bold text-primario font-monospace">Rol</label>
                <?php
                include_once("../../../models/Usuario.php");
                $usuario = new Usuario();

                echo "<select name='IdRol'>";
                foreach ($usuario->SelectRoles() as $rol) {
                    echo "<option value='" . $rol['id'] . "'>" . $rol['Nombre'] . "</option>";
                }
                echo "</select>";
                ?>
            </div>
            <input type="submit" class="button-primario bg-primario text-white" value="Registrar Usuario">
            <div class="alert alert-danger text-center alerta" role="alert">
            <?php
            require_once('C:\xampp\htdocs\Restaurante\controllers\UsuarioController.php');
            $usuarioController = new UsuarioController();
            if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['Documento']) && isset($_POST['telefono']) && isset($_POST['correo']) && isset($_POST['clave']) && isset($_POST['IdRol'])) {
                if (!$usuarioController->create()) {
                    echo "Contraseña con parámetros no válidos";
                    echo "<br>";
                }
                if($usuarioController->validarCorreo()){
                    echo "El campo después del '@' tiene más de 5 caracteres.";
                }else{
                    echo "El campo después del '@' no cumple con el requisito de longitud.";
                }
            }
            ?>
            </div>
        </form>
    </div>

</main>