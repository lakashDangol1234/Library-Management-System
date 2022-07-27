<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    include "../../partials/connection/_database.php";
  
    $phoneNumberOrEmail = $_POST['phoneNumberOrEmail'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `admin` WHERE `email`='$phoneNumberOrEmail' OR `phone_number`='$phoneNumberOrEmail'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $numExistRows = $stmt->rowCount();
    if ($numExistRows <= 0) {
        header("location:/libr/admin/admin login/admin_login?invalidCredentails=true");

    } elseif ($numExistRows == 1) {
        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            if (password_verify($password, $row->password)) {
                session_start();
                echo $row->admin_id;
                $_SESSION['admin_id'] = $row->admin_id;
                $_SESSION['admin_name'] = $row->fullName;
                header("location:/libr/admin/admin library/dashboard/admin_dashboard.php?login=success");
            }
            else{
                header('location:/libr/admin/admin login/admin_login.php?invalidCredentails=true');
            }
        }
    }
}
