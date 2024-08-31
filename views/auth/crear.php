<main class="login login__log-in">
    <div class="login__contenedor">
        <h2 class="login__titulo">Crear Cuenta | Perú</h2>
        <?php include_once  __DIR__ . '/../templates/alertas.php'?>
        <form class="formulario"   method="post">
            <div class="formulario__campo">
                <input 
                type="text" 
                class="formulario__input" 
                placeholder="Nombre" 
                name="Nombre" 
                value="<?php echo $usuario->Nombre ?>">
            </div>
            <div class="formulario__campo">
                <input 
                type="text" 
                class="formulario__input" 
                placeholder="Apellido" 
                name="Apellido" 
                value="<?php echo $usuario->Apellido ?>">
            </div>
            <div class="formulario__campo">
                <input 
                type="email" 
                class="formulario__input" 
                placeholder="Ingresar Correo" 
                name="Email" 
                value="<?php echo $usuario->Email ?>">
            </div>
            <div class="formulario__campo">
                <input 
                type="password" 
                class="formulario__input" 
                placeholder="Ingresar Contraseña" 
                name="Password">
            </div>
            <input 
            type="submit" 
            class="formulario__submit--login" 
            value="Crear Cuenta">
        </form>
        <div class="login__enlaces">
            <a href="/user/login">¿Ya tienes cuenta? Inicia Sesión</a>
            <a href="/user/olvide-cuenta">¿Olvidaste tu Contraseña? Recuperala</a>
        </div>
    </div>
</main>