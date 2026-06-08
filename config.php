<?php
session_start();

define('ADMIN_USER', 'admin');
define('ADMIN_PASS', password_hash('ChangeMe123!', PASSWORD_DEFAULT));
?>