<h4>Register</h4>
<form action="loading.php" method="POST" name="register" id="registerForm">
    <div id="field" name="field">
        <input type="text" id="username" name="username" max="20" value="<?=Input::get('username')?>"required placeholder="Username">
    </div>
    <div id="field" name="field">
        <input type="password" id="password" name="password" max="20" required placeholder="Password">
    </div>
    <div id="field" name="field">
        <input type="password" id="password_again" name="password_again" max="20" required placeholder="Password again">
    </div>
    <div id="field" name="field">
        <input type="email" id="email" name="email" max="60" required placeholder="Valid E-mail">
    </div>
    <div id="field" name="field">
        <input type="email_again" id="email_again" name="email_again" max="60" required placeholder="E-mail again">
    </div>
    <div id="field" name="field">
        <label for="remember">Remember? </label>
        <input type="checkbox" id="remember" name="remember" value="yes">
    </div>
    <div id="field" name="field">
        <input type="submit" id="submit" name="submit" value="Submit">
    </div>
    
    <input type="hidden" id="token" name="token" value="<?=Token::csrf();?>">
    <input type="hidden" id="action" name="action" value="registerUser">
</form>
<p>
    Already have an account? <a href="login.php">Log in here</a>.
</p>