<?php
session_start();
session_unset();
session_destroy();
header("location:/libr/student/student login/student_login.php");
?>