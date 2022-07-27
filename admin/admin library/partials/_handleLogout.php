<?php
session_start();
session_unset();
session_destroy();
header("location:/libr/admin/admin login/admin_login.php");
?>