<?php
if (isset($_POST['1'])) {
  header("Location: ../lunchweb/loginpage.php");
  exit();
}
if (isset($_POST['save'])) {

  
  //require 'periods.inc.php';
  require_once 'lgs.inc.php';

  
  $teamnumber = mysqli_real_escape_string($conn,$_POST['teamnumber']);
  $height = mysqli_real_escape_string($conn,$_POST['height']);
  $weight = mysqli_real_escape_string($conn,$_POST['weight']);
  $image="";
  //$image = file_get_contents($_FILES['image']['tmp_name']);
  //$image=mysqli_real_escape_string($conn,$_FILES['image']);
  $imagetype=mysqli_real_escape_string($conn,$_FILES['image']['type']);
  $speed = mysqli_real_escape_string($conn,$_POST['speed']);
  $platformlevel=mysqli_real_escape_string($conn,$_POST['platformlevel']);
  $hatchlevel=mysqli_real_escape_string($conn,$_POST['hatchlevel']);
  $cargolevel=mysqli_real_escape_string($conn,$_POST['cargolevel']);
  $pickupspeed = mysqli_real_escape_string($conn,$_POST['pickupspeed']);
  $autonomous=mysqli_real_escape_string($conn,$_POST['autonomous']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
 
  if (empty($teamnumber) || empty($password)) {
    header("Location: ../index.php?error=emptyfields&uid=");
    exit();
  }

  else {
    $sql = "SELECT * FROM teams WHERE teamnumber=?;";
    
    $stmt = mysqli_stmt_init($conn);
  
    if (!mysqli_stmt_prepare($stmt, $sql)) {
    
      header("Location: ../index.php?error=sqlerror");
      exit();
    }

      else {
        mysqli_stmt_bind_param($stmt, "s", $teamnumber);
      
        mysqli_stmt_execute($stmt);
      
        mysqli_stmt_store_result($stmt);
        
        $resultCount = mysqli_stmt_num_rows($stmt);
        

        if($resultCount==0){
          $sql="SELECT * FROM users WHERE teamnumber=$teamnumber;";
          $result= mysqli_query($conn,$sql);
          $row=mysqli_fetch_assoc($result);
          $truepass= $row['password2'];
          if($password==$truepass){
          $sql = "INSERT INTO teams(`teamnumber`, `image`, `speed`, `weight`, `height`, `matchnumber`, `autopoints`, `teleboxes`, `pickupspeed`,'imagetype') VALUES ('$teamnumber','$height','$weight','$image','$speed','$matchnumber','$autopoints','$pickupspeed','$imagetype');";   
      }
      else{
        header("Location: ../index.php?error=wrongpassword");
        echo "hello";
        exit();
      }

      }

        else{
          $sql2="SELECT password2 FROM users WHERE teamnumber=$teamnumber;";
          $result2= mysqli_query($conn,$sql2);
          $row=mysqli_fetch_assoc($result2);
          $truepass= $row['password2'];

          if($password==$truepass){
            $sql="UPDATE teams SET height=?, automous=?,weight=?, image=?, speed=?, hatchlevel=?,cargolevel=?,pickupspeed=? ,climbplatform=?,imagetype=? WHERE teamnumber=?;";
          }
          else{
          header("Location: ../index.php?error=wrongid");
          exit();
          }
        }
       
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          
          header("Location: ../index.php?error=sqlerror2");
          exit();
        }
        else {

        
         mysqli_stmt_bind_param($stmt, "sssssssssss", $height,$autonomous, $weight,$image,$speed,$hatchlevel,$cargolevel,$pickupspeed,$plaformlevel,$imagetype,$teamnumber);
          
          mysqli_stmt_execute($stmt);
         
          header("Location: ../index.php?signup=success");
          exit();
        }
        
      }
    }
}
else {
    /*
    if(isset($_POST['addAuto'])){
        require 'lgs.inc.php';
        $teamnumber = $_POST['teamnumber'];
        $stmt = mysqli_stmt_init($conn);
        $sql2="SELECT autopoints FROM teams WHERE teamnumber=$teamnumber;";
        $result2= mysqli_query($conn,$sql2);
        $row=mysqli_fetch_assoc($result2);
        $value_to_add=$_POST['autoAdd'];
        $value= $row['autopoints'];
        $final=$value+$value_to_add;
        echo $value_to_add;
        $sql2="UPDATE teams SET autopoints='$final' WHERE teamnumber=$teamnumber;";
        mysqli_stmt_bind_param($stmt, "d", $final);
          
        mysqli_stmt_execute($stmt);
         
        header("Location: ../robotweb/login.inc.php");
        //exit();
    }
    else{
  */
  header("Location: ../robotweb/inde2x.php");
  exit();
    
}
