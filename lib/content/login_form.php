<h4>Log In</h4>
<form action="loading.php" method="POST" name="register" id="registerForm">
    <div id="field" name="field">
        <input type="text" id="username" name="username" max="20" value="<?=Input::get('username')?>" required placeholder="Username">
    </div>
    <div id="field" name="field">
        <input type="password" id="password" name="password" max="20" required placeholder="Password">
    </div>
    <div id="field" name="field">
        <label for="remember" title="This option is less safe than logging in each time you want to do something, but we ain't judging.">Remember? </label>
        <input type="checkbox" id="remember" name="remember" value="yes">
    </div>
    <div id="field" name="field">
        <input type="submit" id="submit" name="submit" value="Submit">
    </div>
    <input type="hidden" id="token" name="token" value="<?=Token::csrf();?>">
    <input type="hidden" id="action" name="action" value="logIn">
    
</form>
<p>
    No account yet? <a href="register.php">Register here</a>.
</p>

