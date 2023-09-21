<?php
$css = array('./styles/signin.css');
$current = 'signin';
include('includes/header.php');

if ($session->is_signed_in()) {
    redirect("./index.php");
}

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    //Method to check database user

    $user_found = Users::verify_user($username, $password);

    if ($user_found) {
        $session->login($user_found);
        $permission_url = show_user_permissions($session->user_id);
        redirect("/UNA/admin/{$permission_url}profile.php");
    } else {
        $the_message = "Tu contraseña o nombre de usario son incorrectos";
    }
} else {
    $the_message = "";
    $username = "";
    $password = "";
}
?>

<div class="container">
    <h1 class="text-primary py-3 center">Inicia Sesión</h1>
    <h3 class="center"> <?php echo $the_message; ?></h3>
    <div class="forma">
        <form class="" action="" method="post">
            <div class="txt_field">
                <input type="text" name="username" value="<?php echo htmlentities($username); ?>" required />
                <span></span>
                <label for="username">Nombre de Usuario</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" value="<?php echo htmlentities($password); ?>" required />
                <span></span>
                <label for="password">Contraseña</label>
            </div>
            <div class="py-2 center">
                <input type="submit" name="submit" value="Ingresar" class="btn bg-dark center" />
            </div>
            <div class="tex_align py-1">
                <span class="py-3">¿Olvidó la contraseña?
                    <a class="text-primary" href="contact.html">Contáctenos</a></span>
            </div>
            <div class="signup_link tex_align py-1">
                ¿No tienes cuenta?
                <a class="text-primary" href="signup.php">crea tu cuenta.</a>
            </div>
        </form>


    </div>
</div>
<div class="clr"></div>

<footer id="main-footer" class="sign_in_footer">
    <p>Artículos de Limpieza &copy; 2023, Todos los derechos reservados.</p>
</footer>
</body>

</html>