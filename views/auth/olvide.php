<main class="login login__olvide">
    <div class="login__contenedor">
        <h2 class="login__titulo">Recuperar Cuenta</h2>
        <?php include __DIR__ . '/../templates/alertas.php' ?>
        <form class="formulario"  method="post">
            <div class="formulario__campo">
                <input 
                type="email" 
                class="formulario__input" 
                placeholder="Ingresar Correo" 
                name="Email">
            </div>
            <input 
            type="submit" 
            class="formulario__submit--login" 
            value="Recuperar Cuenta">
        </form>
        <div class="login__enlaces">
            <a href="/user/login">¿Ya tienes cuenta? Inicia Sesión</a>
            <a href="/user/crear-cuenta">¿Aún no tienes una cuenta? Create Una</a>
        </div>
    </div>
</main>