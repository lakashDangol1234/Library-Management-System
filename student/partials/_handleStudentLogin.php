<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    include "../../partials/connection/_database.php";

    $phoneNumberOrEmail = $_POST['phoneNumberOrEmail'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `students` WHERE `email`='$phoneNumberOrEmail' OR `phone_number`='$phoneNumberOrEmail'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $numExistRows = $stmt->rowCount();
    if ($numExistRows <= 0) {
        header("location:/libr/student/student login/student_login?invalidCredentails=true");
        exit();
    } elseif ($numExistRows == 1) {
        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            if (password_verify($password, $row->password)){
                session_start();
                $_SESSION['sid'] = $row->sid;
                $_SESSION['student_name'] = $row->fullName;
                header('location:/libr/student/student library/dashboard/student_dashboard.php?login=success');
            }
            else{
                header('location:/libr/student/student login/student_login?invalidCredentails=true');
            }
        }
    }
}
