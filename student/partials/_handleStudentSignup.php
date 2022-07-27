<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {
  include "../../partials/connection/_database.php";
  $fullName = $_POST['full_name'];
  $email = $_POST['email'];
  $phoneNumber = $_POST['phone_number'];
  $password = $_POST['password'];



  // Checking whether the student already exists or not 
  $sql = "SELECT * FROM students WHERE email=:EMAIL OR phone_number=:PHONE_NUMBER";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(":EMAIL", $email);
  $stmt->bindParam(":PHONE_NUMBER", $phoneNumber);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_OBJ);

  if ($stmt->rowCount() != 0) {
    // Student already exists
    header("location:/libr/student/student signup/student_signup.php?userExists=true");
  } else {
    // If student does not exists then , sign up is successfull
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO `students` (`fullName`, `email`, `phone_number`, `password`, `regDate`) VALUES (:FULL_NAME, :EMAIL, :PHONE_NUMBER, :PASSWORD, current_timestamp()); ";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":FULL_NAME", $fullName);
    $stmt->bindParam(":EMAIL", $email);
    $stmt->bindParam(":PHONE_NUMBER", $phoneNumber);
    $stmt->bindParam(":PASSWORD", $hash);
    $result=$stmt->execute();

    if($result){
      $sql = "SELECT * FROM students where email = :EMAIL";
      $stmt=$conn->prepare($sql);
      $stmt->bindParam(":EMAIL",$email);
      $stmt->execute();
      $row = $stmt->fetch(PDO::FETCH_OBJ);
      session_start();
      $_SESSION['sid'] = $row->sid;
      $_SESSION['student_name'] = $row->fullName;
      header("location: /libr/student/student library/dashboard/student_dashboard.php");
    }
  }
}
