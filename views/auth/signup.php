<h1 class="page-title">Crear cuenta</h1>
<p class="page-description">Llena el siguiente formulario para crear una cuenta</p>

<?php 
include_once __DIR__ . '/../templates/alertas.php';
?>

<form class="form" method="POST" action="/signup">
    <div class="form_field">
        <label for="nombre">Nombre</label>
        <input type="text"
            name="nombre"
            id="nombre"
            placeholder="Tu Nombre"
            value="<?php echo s($usuario->nombre); ?>">
    </div>
    <div class="form_field">
        <label for="apellido">Apellido</label>
        <input type="text"
            name="apellido"
            id="apellido"
            placeholder="Tu Apellido"
            value="<?php echo s($usuario->apellido); ?>">
    </div>
    <div class="form_field">
        <label for="telefono">Teléfono</label>
        <input type="tel"
            name="telefono"
            id="telefono"
            placeholder="Tu Telefono"
            value="<?php echo s($usuario->telefono); ?>">
    </div>
    <div class="form_field">
        <label for="email">Email</label>
        <input type="email"
            id="email"
            placeholder="Tu Email"
            name="email"
            value="<?php echo s($usuario->email); ?>">
    </div>
    <div class="form_field">
        <label for="password">Contraseña</label>
        <input type="password"
            id="password"
            placeholder="Tu Contraseña"
            name="password">
    </div>
    <input type="submit" class="boton" value="Crear Cuenta">
    <div class="acciones">
        <a href="/">¿Ya tienes una cuenta? Iniciar Sesion</a>
        <a href="/forgot">¿Olvidaste tu contraseña?</a>
    </div>
</form>