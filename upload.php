<?php
require 'config.php';

if (!isset($_SESSION['admin'])) {
    die('Unauthorized');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!empty($_FILES['image']['name'])) {

        $uploadDir = 'uploads/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $name = time() . '_' .
                basename($_FILES['image']['name']);

        $target = $uploadDir . $name;

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            $target
        );

        header('Location: index.php');
        exit;
    }
}