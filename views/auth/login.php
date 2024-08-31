<main class="login login__sign-in">
    <div class="login__contenedor">
        <h1 class="login__titulo">Login | DengueTrack</h1>
        <?php include __DIR__ . '/../templates/alertas.php' ?>
        <form class="formulario"  method="post">
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
            value="Ingresar">
        </form>
        <div class="login__enlaces">
            <a href="/user/crear-cuenta">¿Aún no tienes una cuenta? Create Una</a>
            <a href="/user/olvide-cuenta">¿Olvidaste tu Contraseña? Recuperala</a>
        </div>
    </div>
</main>