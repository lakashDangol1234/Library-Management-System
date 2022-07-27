<?php
session_start();
if (empty($_SESSION['admin_id']) && empty($_SESSION['admin_name'])) {
    header("location:/libr/admin/admin login/admin_login.php");
}
?>