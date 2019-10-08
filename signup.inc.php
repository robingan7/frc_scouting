<?php
if (isset($_POST['1'])) {
  header("Location: ../lunchweb/loginpage.php");
  exit();
}
if (isset($_POST['signup-submit'])) {

  
  require 'lgs.inc.php';

  
  $username = mysqli_real_escape_string($conn,$_POST['username']);
  
  $password = mysqli_real_escape_string($conn,$_POST['password']);
  $passwordRepeat = mysqli_real_escape_string($conn,$_POST['comfirmpassword']);

  if (empty($passwordRepeat)){
    echo 'hello';
  }
  if (empty($username) || empty($password) || empty($passwordRepeat)) {
    header("Location: ../robotweb/index.php?error=emptyfields&uid=".$username." password=".$password." con: ".$passwordRepeat);
    exit();
  }

  else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../robotweb/index.php?error=invaliduid&mail=".$email);
    exit();
  }
  
  else if (!isset($_POST['checkbox'])) {
    header("Location: ../robotweb/index.php?error=notcheck");
    exit();
  }
  
  else if ($password !== $passwordRepeat) {
    header("Location: ../robotweb/index.php?error=passwordcheck&uid=".$username."&mail=".$email."password=".$password." ".$passwordRepeat);
    exit();
  }
  else {

  //$password=password_hash($password,PASSWORD_DEFAULT);
    $sql2="SELECT teamnumber FROM teams WHERE teamnumber=$username;";

    $result2=mysqli_query($conn, $sql2);

    if(mysqli_num_rows($result2)==0){
      $sql3="INSERT INTO `teams`(`teamnumber`) VALUES ($username)";
      $insert=mysqli_query($conn,$sql3);
    }

    $sql = "SELECT teamnumber FROM users WHERE teamnumber=?;";
    
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      
      header("Location: ../robotweb/index.php?error=sqlerror");
      exit();
    }
    else {
     
      mysqli_stmt_bind_param($stmt, "s", $username);
     
      mysqli_stmt_execute($stmt);
     
      mysqli_stmt_store_result($stmt);
     
      $resultCount = mysqli_stmt_num_rows($stmt);
     
      mysqli_stmt_close($stmt);
     
      if ($resultCount > 0) {
        header("Location: ../robotweb/index.php?error=usertaken&mail=");
        exit();
      }
      else {
       
        $sql = "INSERT INTO users (teamnumber, password2) VALUES (?, ?);";
        
        $stmt = mysqli_stmt_init($conn);
       
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          header("Location: ../robotweb/index.php?error=sqlerror1");
          exit();
        }
        else {
          mysqli_stmt_bind_param($stmt, "ss", $username, $password);
          
          mysqli_stmt_execute($stmt);
        
          header("Location: ../robotweb/index.php?signup=success");
          exit();

        }
      }
    }
  }
  
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
 
  header("Location: ../robotweb/index.php");
  exit();
}