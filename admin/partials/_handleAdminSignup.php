<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {
  include "../../partials/connection/_database.php";
  $fullName = $_POST['full_name'];
  $email = $_POST['email'];
  $phoneNumber = $_POST['phone_number'];
  $password = $_POST['password'];



  // Checking whether the admin already exists or not 
  $sql = "SELECT * FROM admin WHERE email=:EMAIL OR phone_number=:PHONE_NUMBER";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(":EMAIL", $email);
  $stmt->bindParam(":PHONE_NUMBER", $phoneNumber);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_OBJ);

  if ($stmt->rowCount() != 0) {
    // admin already exists
    header("location:/libr/admin/admin signup/admin_signup.php?userExists=true");
  } else {
    // If admin does not exists then , sign up is successfull
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `admin` (`fullName`, `email`, `phone_number`, `password`, `regDate`) VALUES (:FULL_NAME, :EMAIL, :PHONE_NUMBER, :PASSWORD, current_timestamp()); ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":FULL_NAME", $fullName);
    $stmt->bindParam(":EMAIL", $email);
    $stmt->bindParam(":PHONE_NUMBER", $phoneNumber);
    $stmt->bindParam(":PASSWORD", $hash);
    $result=$stmt->execute();

    if($result){
      $sql = "SELECT * FROM admin where email = :EMAIL";
      $stmt=$conn->prepare($sql);
      $stmt->bindParam(":EMAIL",$email);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_OBJ);
      session_start();
      $_SESSION['admin_id'] = $row->admin_id;
      $_SESSION['admin_name'] = $row->fullName;
      header("location: /libr/admin/admin library/dashboard/admin_dashboard.php");
    }
  }
}
?>