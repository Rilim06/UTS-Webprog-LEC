<h1>Login</h1>
<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger text-center w-80 mx-auto fw-bold" role="alert">
        Username or Password incorrect.
    </div>
<?php endif; ?>
<form action="login_process.php" method="POST">
    <input type="text" name="nim" placeholder="Username" /><br />
    <input type="password" name="password" placeholder="Password" /><br />
    <button type="submit">Login</button>
</form>
<p>Don't have an account?</p>
<a href="register.php">Register Now</a>