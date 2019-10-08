<?php
if (isset($_POST['1'])) {
  header("Location: ../lunchweb/loginpage.php");
  exit();
}
if (isset($_POST['save2'])) {

  
  //require 'periods.inc.php';
  require 'lgs.inc.php';

  
  $teamnumber = $_POST['teamnumber'];
  $height = $_POST['height'];
  $weight = $_POST['weight'];
  //$image = file_get_contents($_FILES['image']['tmp_name']);
  $image=$_FILES['image'];
  $imagetype=$_FILES['image']['type'];
  $speed = $_POST['speed'];
  $matchnumber = $_POST['matchnumber'];
  $autopoints = $_POST['autopoints'];
  $pickupspeed = $_POST['pickupspeed'];
  
  $teleboxes=$_POST['teleboxes'];
 
  if (empty($teamnumber)) {
    header("Location: ../robotweb/index.php?error=emptyfields&uid=");
    exit();
  }

  else {
    $sql = "SELECT * FROM teams WHERE teamnumber=?;";
    
    $stmt = mysqli_stmt_init($conn);
  
    if (!mysqli_stmt_prepare($stmt, $sql)) {
    
      header("Location: ../lunchweb/robotweb/index.php?error=sqlerror");
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
        header("Location: ../robotweb/index.php?error=wrongpassword".$truepass.$pass);
        echo "hello";
        exit();
      }

      }

        else{
          $sql2="SELECT password2 FROM users WHERE teamnumber=$teamnumber;";
          $result2= mysqli_query($conn,$sql2);
          $row=mysqli_fetch_assoc($result2);
          $truepass= $row['password2'];

          if($truepass==$truepass){
            $sql="UPDATE teams SET height='$height', weight='$weight', image='$image' , speed='$speed', matchnumber='$matchnumber', autopoints='$autopoints',pickupspeed='$pickupspeed' ,teleboxes='$teleboxes' ,imagetype='$imagetype' WHERE teamnumber=$teamnumber;";
          }
          else{
          header("Location: ../robotweb/index.php?error=wrongid");
          exit();
          }
        }
       
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          
          header("Location: ../robotweb/index.php?error=sqlerror2");
          exit();
        }
        else {

        
          mysqli_stmt_bind_param($stmt, "ssssssssss", $teamnumber, $height, $weight,$image,$imagetype,$speed,$matchnumber,$autopoints,$pickupspeed,$teleboxes);
          
          mysqli_stmt_execute($stmt);
         
          header("Location: ../robotweb/index.php?signup=success");
          echo "hello";
          exit();
        }
        
      }
    }

  
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
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
