<?php
require 'config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    if (
        $user === ADMIN_USER &&
        password_verify($pass, ADMIN_PASS)
    ) {
        $_SESSION['admin'] = true;
        header('Location: index.php');
        exit;
    }

    $error = "Invalid username or password";
}
?>

<!DOCTYPE html>
<html>
<body>
<h2>Admin Login</h2>

<?php if($error): ?>
<p><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST">
    <input name="username" placeholder="Username" required>
    <input name="password" type="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
</body>
</html>