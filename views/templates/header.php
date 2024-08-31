<header class="header">
    <div class="header__contenedor">
        <nav class="header__navegacion">
            <p class="header__user"><?php echo $_SESSION['Email'] . " [ " . $_SESSION['Nombre'] . " " . $_SESSION['Apellido'] . " ] " ?> </p>
            <!-- <a href="<?php echo is_Admin() ? '/admin/dashboard' : '/finalizar-registro' ?>" class="header__enlace">Administrar</a> -->
            <form class="header__form" method="post" action="/user/logout">
                <input type="submit" value="Cerrar Sesion" class="header__submit">
            </form>
        </nav>
        <div class="header__contenido">
            <a href="/">
                <h1 class="header__logo">&#60;Casos de Dengue/></h1>
            </a>
        </div>
    </div>
</header>
<div class="barra">
    <div class="barra__contenido">
        <a href="/">
            <h1 class="barra__logo">&#60;DengueTrack /></h1>
        </a>
        <nav class="navegacion">
            <a title="Casos por año" href="/dashboard1" class="navegacion__enlace <?php echo pagina_Actual('/dashboard1') ? 'navegacion__enlace--fijo' : ''; ?>">Casos por año</a>
            <a title="Casos por sexo" href="/dashboard2" class="navegacion__enlace <?php echo pagina_Actual('/dashboard2') ? 'navegacion__enlace--fijo' : ''; ?>">Casos por sexo</a>
            <a title="Casos por departamento" href="/dashboard3" class="navegacion__enlace <?php echo pagina_Actual('/dashboard3') ? 'navegacion__enlace--fijo' : ''; ?>">Casos por departamento</a>
            <a title="Casos por provincia" href="/dashboard4" class="navegacion__enlace <?php echo pagina_Actual('/dashboard4') ? 'navegacion__enlace--fijo' : ''; ?>">Casos por provincia</a>
            <a title="Casos por distrito" href="/dashboard5" class="navegacion__enlace <?php echo pagina_Actual('/dashboard5') ? 'navegacion__enlace--fijo' : ''; ?>">Casos por distrito</a>
            <a title="Casos por grupos etarios" href="/dashboard6" class="navegacion__enlace <?php echo pagina_Actual('/dashboard6') ? 'navegacion__enlace--fijo' : ''; ?>">Casos por grupos etarios</a>
            <a title="Casos por grupos etarios" href="/dashboard7" class="navegacion__enlace <?php echo pagina_Actual('/dashboard7') ? 'navegacion__enlace--fijo' : ''; ?>">Comparativa de casos y habitantes</a>
        </nav>
    </div>
</div>