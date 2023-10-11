<?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger text-center w-80 mx-auto fw-bold" role="alert">
        Username already taken.
    </div>
<?php endif; ?>

<form action="register_process.php" method="POST">
    <input type="text" name="nim" placeholder="Username" /><br />
    <input type="password" name="password" placeholder="Password" /><br />
    <input type="submit" />
</form>

<p>Already have an account?</p>
<a href="login.php">Login</a>