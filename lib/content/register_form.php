<div class="form-cont">
<form action="loading.php" method="POST" name="register" id="registerForm">
    <h4>Register</h4>
    <fieldset>
        <input type="text" id="username" name="username" max="20" value="<?=Input::get('username')?>"required placeholder="Username">
        <input type="password" id="password" name="password" max="20" required placeholder="Password">
        <input type="password" id="password_again" name="password_again" max="20" required placeholder="Password again">
        <input type="email" id="email" name="email" max="60" required placeholder="Valid E-mail">
        <input type="email_again" id="email_again" name="email_again" max="60" required placeholder="E-mail again">
        <label for="remember">Remember? </label><input type="checkbox" id="remember" name="remember" value="yes">

    </fieldset>
    <div id="submit" >
        <input type="submit" id="submit" name="submit" value="Submit">
    </div>
    
    <input type="hidden" id="token" name="token" value="<?=Token::csrf();?>">
    <input type="hidden" id="action" name="action" value="registerUser">

<p>Already have an account? <a href="login.php">Log in here</a>.</p>
</form>
</div>
