<?php
session_start();
if (empty($_SESSION['sid']) && empty($_SESSION['student_name'])) {
    header("location:/libr/student/student login/student_login.php");
}
?>