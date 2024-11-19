<h1 class="page-title">Login</h1>
<p class="page-description">Inicia sesión con tus datos</p>
<form class="form" method="POST" action="/">
    <div class="form_field">
        <label for="email">Email</label>
        <input type="email"
            id="email"
            placeholder="Tu Email"
            name="email">
    </div>
    <div class="form_field">
        <label for="password">Contraseña</label>
        <input type="password" 
            id="password" 
            placeholder="Tu Contraseña" 
            name="password">
    </div>
    <input type="submit" class="boton" value="Iniciar Sesion">
</form>
<div class="acciones">
    <a href="/signup">¿No tienes cuenta? Crear una</a>
    <a href="/forgot">¿Olvidaste tu contraseña?</a>
</div>