<?php
require 'config.php';

$images = [];

if (is_dir('uploads')) {
    $images = array_reverse(
        glob('uploads/*.{jpg,jpeg,png,gif,webp}',
        GLOB_BRACE)
    );
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Game Gallery</title>
<style>
body{
    background:#111;
    color:white;
    font-family:Arial;
}
.gallery{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(250px,1fr));
    gap:20px;
}
.gallery img{
    width:100%;
    border-radius:12px;
}
</style>
</head>
<body>

<h1>Game Gallery</h1>

<?php if(isset($_SESSION['admin'])): ?>

<form action="upload.php"
      method="POST"
      enctype="multipart/form-data">

    <input type="file"
           name="image"
           accept="image/*"
           required>

    <button>Upload</button>
</form>

<p><a href="logout.php">Logout</a></p>

<?php else: ?>

<p><a href="login.php">Admin Login</a></p>

<?php endif; ?>

<div class="gallery">
<?php foreach($images as $img): ?>
    <img src="<?= htmlspecialchars($img) ?>">
<?php endforeach; ?>
</div>

</body>
</html>