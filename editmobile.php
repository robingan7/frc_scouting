<html>
     <head>
    <title>HOME</title>
    <link rel="shortcut icon" href="ricon.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewpoint" content="width=device-width, intial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="indexStyleMobile.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <style>
        img[alt="www.000webhost.com"] {
            display: none;
        }
        input{
            padding-right: 20px;
        }
        body{
            background-color:rgb(179, 26, 158);
        }
    </style>

</head>
 <div id="backtohome">
    <a href="mobileversion.php"><i class="fas fa-home"></i></a>
    </div>
    <style>
    #backtohome a{
    margin-left: 85%;
    }

    #backtohome a:hover{
    color: white;
    }
</style>
<script src="indexScript.js"></script>
<script>
     $(document).ready(function () {
       
        $("#iconbutton_ed").click(function () {
            $("#editpage").css("top", "-100%");
        });

        $("#move").click(function () {
            $("#editpass").css("left", "50%");
        });
    });

</script>
<button id="move">Enter Edit Code</button>
<div id="editpass">


        <div class="close" onclick="toggleEdit()">
            <i class="fas fa-times-circle"></i>
        </div>
        <form method="post">
            <input id="txt" type="text" name="editpass" placeholder="Enter Edit Code">
            <input id="editbutton" type="submit" name="editpass-submit" onclick="editPass()" placeholder="SUBMIT">
        </form>
    </div>


    <?php
if(isset($_POST['editpass-submit'])){   
    if($_POST['editpass']=='3'){
        require_once 'edit_error.inc.php';
    }
    else{
        echo '<p>Wrong Code</p>';
    }
}    
if(isset($_POST['save2'])){
    //require 'periods.inc.php';
  require_once 'lgs.inc.php';

  $teamnumber = mysqli_real_escape_string($conn,$_POST['teamnumber']);
  $height = mysqli_real_escape_string($conn,$_POST['height']);
  $weight = mysqli_real_escape_string($conn,$_POST['weight']);
  $speed = mysqli_real_escape_string($conn,$_POST['speed']);
  $platformlevel=mysqli_real_escape_string($conn,$_POST['platformlevel']);
  $hatchlevel=mysqli_real_escape_string($conn,$_POST['hatchlevel']);
  $cargolevel=mysqli_real_escape_string($conn,$_POST['cargolevel']);
  $pickupspeed = mysqli_real_escape_string($conn,$_POST['pickupspeed']);
  $autonomous=mysqli_real_escape_string($conn,$_POST['autonomous']);
  $notes=mysqli_real_escape_string($conn,$_POST['notes']);
  if (empty($teamnumber) ) {
    header("Location: ../robotweb/index.php?error=emptyfields&uid=".$p5);
    exit();
  }

  else {
    $sql = "SELECT * FROM teams WHERE teamnumber=?;";
    
    $stmt = mysqli_stmt_init($conn);
  
    if (!mysqli_stmt_prepare($stmt, $sql)) {
    
      header("Location: ../robotweb/index.php?error=sqlerror");
      exit();
    }

      else {
        mysqli_stmt_bind_param($stmt, "s", $teamnumber);
      
        mysqli_stmt_execute($stmt);
      
        mysqli_stmt_store_result($stmt);
        
        $resultCount = mysqli_stmt_num_rows($stmt);
        
          $sql2="SELECT password2 FROM users WHERE teamnumber=$teamnumber;";
          $result2= mysqli_query($conn,$sql2);
          $row=mysqli_fetch_assoc($result2);
          $truepass= $row['password2'];

          if($truepass==$truepass){
            $sql="UPDATE teams SET height='$height', automous='$autonomous',weight='$weight',speed='$speed', hatchlevel='$hatchlevel',cargolevel='$cargolevel',pickupspeed='$pickupspeed' ,climbplatform='$platformlevel',notes='$notes' WHERE teamnumber=$teamnumber;";
          }
          else{
          header("Location: ../robotweb/index.php?error=wrongid");
          exit();
          }
        
       
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          //header("Location: ../robotweb/index.php?error=sqlerror2");
          exit();
        }
        else {
            
           //mysqli_stmt_bind_param($stmt, "sbiiiiiiiss", $teamnumber, $image, $speed,$weight,$height,$matchnumber,$autopoints,$teleboxes,$pickupspeed,$notes,$imagetype);
          mysqli_stmt_execute($stmt);
         require_once "lgs.inc.php";
            //$sql4="SELECT * FROM teams ";
            //$result = mysqli_query($conn,$sql4);
          //header("Location: ../robotweb/index.php?signup=success");
         require 'editMobile.inc.php';
        }
        
      }
    }

}

if(isset($_POST['save3'])){
    //require 'periods.inc.php';
  require 'lgs.inc.php';

  
   $teamnumber = mysqli_real_escape_string($conn,$_POST['teamnumber']);
  $height = mysqli_real_escape_string($conn,$_POST['height']);
  $weight = mysqli_real_escape_string($conn,$_POST['weight']);
  //$image = file_get_contents($_FILES['image']['tmp_name']);
  $image=mysqli_real_escape_string($conn,$_FILES['image']['name']);
  $imagetype=mysqli_real_escape_string($conn,$_FILES['image']['type']);
  $speed = mysqli_real_escape_string($conn,$_POST['speed']);
  $platformlevel=mysqli_real_escape_string($conn,$_POST['platformlevel']);
  $hatchlevel=mysqli_real_escape_string($conn,$_POST['hatchlevel']);
  $cargolevel=mysqli_real_escape_string($conn,$_POST['cargolevel']);
  $pickupspeed = mysqli_real_escape_string($conn,$_POST['pickupspeed']);
  $autonomous=mysqli_real_escape_string($conn,$_POST['autonomous']);
  $notes=mysqli_real_escape_string($conn,$_POST['notes']);
  
  if (empty($teamnumber) ) {
   // header("Location: ../robotweb/index.php?error=emptyfields&uid=");
    echo 'Has to have a team number';
  }

  else {
      if (empty($image)|| empty($imagetype)) {
   // header("Location: ../robotweb/index.php?error=emptyfields&uid=");
    $image="";
    $imagetype="";
  }
    $sql = "SELECT * FROM teams WHERE teamnumber=?;";
    
    $stmt = mysqli_stmt_init($conn);
  
    if (!mysqli_stmt_prepare($stmt, $sql)) {
    
      header("Location: ../lunchweb/robotweb/index.php?error=sqlerror");
    
    }

      else {
          
        mysqli_stmt_bind_param($stmt, "s", $teamnumber);
      
        mysqli_stmt_execute($stmt);
      
        mysqli_stmt_store_result($stmt);
        
        $resultCount = mysqli_stmt_num_rows($stmt);
        if($resultCount==0){
          $sql = "INSERT INTO teams(teamnumber, image, speed, weight, height, automous,pickupspeed, climbplatform,cargolevel, hatchlevel,notes,imagetype) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);"; 
          // $sql = "INSERT INTO teams(teamnumber, image, speed, weight, height, matchnumber, autopoints, teleboxes, pickupspeed, standing, notes, imagetype) VALUES ('$teamnumber','$image','$speed','$weight','$height','$matchnumber','$autopoints','$teleboxes','$pickupspeed','','',$imagetype');"; 
          //echo 'hello3';
          $stmt = mysqli_stmt_init($conn);
      }

        else{
         echo '<h1>Team Already Exists</h1>';
        }
       
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          echo "<h1>Connection Error</h1>";
          //header("Location: ../robotweb/index.php?error=sqlerror2");
          
        }
        else {
          mysqli_stmt_bind_param($stmt, "sssiisssssss", $teamnumber, $image, $speed,$weight,$height,$autonomous,$platformlevel,$hatchlevel,$cargolevel,$pickupspeed,$notes,$imagetype);
          mysqli_stmt_execute($stmt);
          require "lgs.inc.php";
            $sql4="SELECT * FROM teams ";
            $result = mysqli_query($conn,$sql4);
            //echo 'hello';
          //header("Location: ../robotweb/index.php?signup=success");
          require 'editMobile.inc.php';
        }
        
      }
    }
}
if(isset($_POST['save4'])){
    //require 'periods.inc.php';
  require 'lgs.inc.php';

  
$teamnumber = mysqli_real_escape_string($conn,$_POST['teamnumber']);
  $region = mysqli_real_escape_string($conn,$_POST['region']);
  $matchnumber = mysqli_real_escape_string($conn,$_POST['matchnumber']);
  //$image = file_get_contents($_FILES['image']['tmp_name']);
  $alliance=mysqli_real_escape_string($conn,$_POST['alliance']);
  $autohatch=mysqli_real_escape_string($conn,$_POST['autohatch']);
  $autocargo=mysqli_real_escape_string($conn,$_POST['autocargo']);
  $cargolvl1=(integer)mysqli_real_escape_string($conn,$_POST['cargolvl1']);
  $cargolvl2=(integer)mysqli_real_escape_string($conn,$_POST['cargolvl2']);
  $cargolvl3=(integer)mysqli_real_escape_string($conn,$_POST['cargolvl3']);
  $hatchlvl1=(integer)mysqli_real_escape_string($conn,$_POST['hatchlvl1']);
  $hatchlvl2=(integer)mysqli_real_escape_string($conn,$_POST['hatchlvl2']);
  $hatchlvl3=(integer)mysqli_real_escape_string($conn,$_POST['hatchlvl3']);
  $cargoship=(integer)mysqli_real_escape_string($conn,$_POST['cargoship']);
  $hatchship=(integer)mysqli_real_escape_string($conn,$_POST['hatchship']);
  $platformlvl=mysqli_real_escape_string($conn,$_POST['platformlvl']);
  $numberOfCargo=$cargolvl1+$cargolvl2+$cargolvl3+$cargoship;
  $numberOfHatch=$hatchlvl1+$hatchlvl2+$hatchlvl3+$hatchship;
  $autopoints=$autocargo+$autohatch;
  $nothing="";
  if (empty($teamnumber) ) {
   // header("Location: ../robotweb/index.php?error=emptyfields&uid=");
    echo 'Has to have a team number';
  }

  else {
      if (empty($teamnumber)) {
          echo '<h3>Have to enter team number</h3>';
  }
    $sql = "SELECT * FROM teams WHERE teamnumber=?;";   
    $stmt = mysqli_stmt_init($conn);

    $sql11 = "SELECT * FROM matchperformance WHERE teamnumber=?;";   
    $stmt2 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
    
      header("Location: ../robotweb/index.php?error=sqlerror");
    
    }

      else {        
        mysqli_stmt_bind_param($stmt, "s", $teamnumber);    
        mysqli_stmt_execute($stmt);     
        mysqli_stmt_store_result($stmt);
        $resultCount = mysqli_stmt_num_rows($stmt);
       
          $sql11 = "INSERT INTO matchperformance(`matchnumber`, `teamnumber`, `alliance`, `numberOfHatch`, `numberOfCargo`, `autopoint`, `climbpoint`, `cargolvl1`, `cargolvl2`, `cargolvl3`, `hatchlvl1`, `hatchlvl2`, `hatchlvl3`, `region`, `cargoship`, `hatchship`, `autohatch`, `autocargo`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);"; 
          //$sql = "INSERT INTO matchperformance(matchnumber) VALUES (?)";
          $stmt2 = mysqli_stmt_init($conn);
        if($resultCount==0){
            $sql2 = "INSERT INTO teams(`teamnumber`, `image`, `speed`, `weight`, `height`, `autopoints`, `pickupspeed`, `notes`, `imagetype`, `climbplatform`, `cargolevel`, `hatchlevel`, `automous`, `totalcargo`, `totalhatch`, `cargolvl1`, `cargolvl2`, `cargolvl3`, `hatchlvl1`, `hatchlvl2`, `hatchlvl3`, `climbpoint`, `cargoship`, `hatchship`, `autohatch`, `autocargo`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
            $stmt = mysqli_stmt_init($conn);
        }
        else{
            $sql4="SELECT * FROM teams WHERE teamnumber=$teamnumber";
          $result3 = mysqli_query($conn,$sql4);
        
          if (mysqli_num_rows($result3)>0){
            $row2 = mysqli_fetch_assoc($result3);
            $autohatch2=(integer)$row2['autohatch']+$autohatch;
            $autocargo2=(integer)$row2['autocargo']+$autocargo;
            $cargolvl12=(integer)$row2['cargolvl1']+$cargolvl1;
            $cargolvl22=(integer)$row2['cargolvl2']+$cargolvl2;
            $cargolvl32=(integer)$row2['cargolvl3']+$cargolvl3;
            $hatchlvl12=(integer)$row2['hatchlvl1']+$hatchlvl1;
            $hatchlvl22=(integer)$row2['hatchlvl2']+$hatchlvl2;
            $hatchlvl32=(integer)$row2['hatchlvl3']+$hatchlvl3;
            $cargoship2=(integer)$row2['cargoship']+$cargoship;
            $hatchship2=(integer)$row2['hatchship']+$hatchship;
            $platformlvl2=(integer)$row2['climbpoint']+$platformlvl;
            $numberOfCargo2=$cargolvl12+$cargolvl22+$cargolvl32+$cargoship2;
            $numberOfHatch2=$hatchlvl12+$hatchlvl22+$hatchlvl32+$hatchship2;
            $autopoints2=$autocargo2+$autohatch2;
            
            $sql2 = "UPDATE teams SET autopoints='$autopoints2',totalcargo='$numberOfCargo2',`totalhatch`='$numberOfHatch2',`cargolvl1`='$cargolvl12',`cargolvl2`='$cargolvl22',`cargolvl3`='$cargolvl32',`hatchlvl1`='$hatchlvl12',`hatchlvl2`='$hatchlvl22',`hatchlvl3`='$hatchlvl32',`climbpoint`='$platformlvl2',`cargoship`='$cargoship2',`hatchship`='$hatchship2',`autohatch`='$autohatch2',`autocargo`='$autocargo2' WHERE teamnumber=$teamnumber;";
            
        }
        }
       
        if (!mysqli_stmt_prepare($stmt2, $sql11)) {
          echo "<h3>Connection Error</h3>";
        }
        else {
          mysqli_stmt_bind_param($stmt2, "issiissiiiiiisiiii", $matchnumber, $teamnumber, $alliance,$numberOfHatch,$numberOfCargo,$autopoints,$platformlvl,$cargolvl1,$cargolvl2,$cargolvl3,$hatchlvl1,$hatchlvl2,$hatchlvl3,$region,$cargoship,$hatchship,$autohatch,$autocargo);
          mysqli_stmt_execute($stmt2);
          if(mysqli_stmt_prepare($stmt, $sql2)){
              if($resultCount==0){
            mysqli_stmt_bind_param($stmt, "sssiiisssssssiiiiiiiiiiiii", $teamnumber, $nothing, $nothing,$nothing,$nothing,$autopoints,$nothing,$nothing,$nothing,$nothing,$nothing,$nothing,$nothing,$numberOfCargo,$numberOfHatch,$cargolvl1,$cargolvl2,$cargolvl3,$hatchlvl1,$hatchlvl2,$hatchlvl3,$platformlvl,$cargoship,$hatchship,$autohatch,$autocargo);
              }
            //mysqli_stmt_bind_param($stmt, "i", $teamnumber);
            mysqli_stmt_execute($stmt);
          }
          else{
              echo "<h3>Connection Error</h3>";
          }
          
          require "lgs.inc.php";
            $sql4="SELECT * FROM teams ";
            $result = mysqli_query($conn,$sql4);
          require 'editMobile.inc.php';
        }
    }
        
      
    }
}
if(isset($_POST['save5'])){
    //require 'periods.inc.php';
  require_once 'lgs.inc.php';
    $teamnumber = mysqli_real_escape_string($conn,$_POST['teamnumber']);
  $region = mysqli_real_escape_string($conn,$_POST['region2']);
  $matchnumber = mysqli_real_escape_string($conn,$_POST['matchnumber2']);
  //$image = file_get_contents($_FILES['image']['tmp_name']);
  $alliance=mysqli_real_escape_string($conn,$_POST['alliance']);
  $autohatch=mysqli_real_escape_string($conn,$_POST['autohatch']);
  $autocargo=mysqli_real_escape_string($conn,$_POST['autocargo']);
  $cargolvl1=(integer)mysqli_real_escape_string($conn,$_POST['cargolvl1']);
  $cargolvl2=(integer)mysqli_real_escape_string($conn,$_POST['cargolvl2']);
  $cargolvl3=(integer)mysqli_real_escape_string($conn,$_POST['cargolvl3']);
  $hatchlvl1=(integer)mysqli_real_escape_string($conn,$_POST['hatchlvl1']);
  $hatchlvl2=(integer)mysqli_real_escape_string($conn,$_POST['hatchlvl2']);
  $hatchlvl3=(integer)mysqli_real_escape_string($conn,$_POST['hatchlvl3']);
  $cargoship=(integer)mysqli_real_escape_string($conn,$_POST['cargoship']);
  $hatchship=(integer)mysqli_real_escape_string($conn,$_POST['hatchship']);
  $platformlvl=mysqli_real_escape_string($conn,$_POST['platformlvl']);
  $numberOfCargo=$cargolvl1+$cargolvl2+$cargolvl3+$cargoship;
  $numberOfHatch=$hatchlvl1+$hatchlvl2+$hatchlvl3+$hatchship;
  $autopoints=$autocargo+$autohatch;
  if (empty($teamnumber) ) {
    
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
        /*
          $sql2="SELECT password2 FROM users WHERE teamnumber=$teamnumber;";
          $result2= mysqli_query($conn,$sql2);
          $row=mysqli_fetch_assoc($result2);
          $truepass= $row['password2'];*/
           
          $sql2="SELECT * FROM matchperformance WHERE teamnumber=$teamnumber AND region='$region' AND matchnumber=$matchnumber;";
          $result2= mysqli_query($conn,$sql2);
          $row=mysqli_fetch_assoc($result2);

          $teamnumber3=$row['teamnumber'];
          $region3=$row['region'];
          $matchnumber3=$row['matchnumber'];
          $autohatch3=(integer)$row['autohatch'];
            $autocargo3=(integer)$row['autocargo'];
            $cargolvl13=(integer)$row['cargolvl1'];
            $cargolvl23=(integer)$row['cargolvl2'];
            $cargolvl33=(integer)$row['cargolvl3'];
            $hatchlvl13=(integer)$row['hatchlvl1'];
            $hatchlvl23=(integer)$row['hatchlvl2'];
            $hatchlvl33=(integer)$row['hatchlvl3'];
            $cargoship3=(integer)$row['cargoship'];
            $hatchship3=(integer)$row['hatchship'];
            $platformlvl3=(integer)$row['climbpoint'];
            $numberOfCargo3=$cargolvl13+$cargolvl23+$cargolvl33+$cargoship3;
            $numberOfHatch3=$hatchlvl13+$hatchlvl23+$hatchlvl33+$hatchship3;
            $autopoints3=$autocargo3+$autohatch3;
          if(1==1){
            $sql="UPDATE matchperformance SET matchnumber='$matchnumber',teamnumber='$teamnumber',alliance='$alliance',numberOfHatch='$numberOfHatch',numberOfCargo='$numberOfCargo',autopoint='$autopoints',climbpoint='$platformlvl',cargolvl1='$cargolvl1',cargolvl2='$cargolvl2',cargolvl3='$cargolvl3',hatchlvl1='$hatchlvl1',hatchlvl2='$hatchlvl2',hatchlvl3='$hatchlvl3',region='$region',cargoship='$cargoship',hatchship='$hatchship',autohatch='$autohatch',autocargo='$autocargo' WHERE teamnumber=$teamnumber AND region='$region' AND matchnumber=$matchnumber;";
          }
           if($resultCount==0){
            $sql2 = "INSERT INTO teams(`teamnumber`, `image`, `speed`, `weight`, `height`, `autopoints`, `pickupspeed`, `notes`, `imagetype`, `climbplatform`, `cargolevel`, `hatchlevel`, `automous`, `totalcargo`, `totalhatch`, `cargolvl1`, `cargolvl2`, `cargolvl3`, `hatchlvl1`, `hatchlvl2`, `hatchlvl3`, `climbpoint`, `cargoship`, `hatchship`, `autohatch`, `autocargo`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
            $stmt = mysqli_stmt_init($conn);
        }
        else{
            $sql4="SELECT * FROM teams WHERE teamnumber=$teamnumber";
          $result3 = mysqli_query($conn,$sql4);
        
          if (mysqli_num_rows($result3)>0){
            $row2 = mysqli_fetch_assoc($result3);
            $autohatch2=(integer)$row2['autohatch']+$autohatch-$autohatch3;
            $autocargo2=(integer)$row2['autocargo']+$autocargo-$autocargo3;
            $cargolvl12=(integer)$row2['cargolvl1']+$cargolvl1-$cargolvl13;
            $cargolvl22=(integer)$row2['cargolvl2']+$cargolvl2-$cargolvl23;
            $cargolvl32=(integer)$row2['cargolvl3']+$cargolvl3-$cargolvl33;
            $hatchlvl12=(integer)$row2['hatchlvl1']+$hatchlvl1-$hatchlvl13;
            $hatchlvl22=(integer)$row2['hatchlvl2']+$hatchlvl2-$hatchlvl23;
            $hatchlvl32=(integer)$row2['hatchlvl3']+$hatchlvl3-$hatchlvl33;
            $cargoship2=(integer)$row2['cargoship']+$cargoship-$cargoship3;
            $hatchship2=(integer)$row2['hatchship']+$hatchship-$hatchship3;
            $platformlvl2=(integer)$row2['climbpoint']+$platformlvl-$platformlvl3;
            $numberOfCargo2=$cargolvl12+$cargolvl22+$cargolvl32+$cargoship2;
            $numberOfHatch2=$hatchlvl12+$hatchlvl22+$hatchlvl32+$hatchship2;
            $autopoints2=$autocargo2+$autohatch2;
            
            $sql2 = "UPDATE teams SET autopoints='$autopoints2',totalcargo='$numberOfCargo2',`totalhatch`='$numberOfHatch2',`cargolvl1`='$cargolvl12',`cargolvl2`='$cargolvl22',`cargolvl3`='$cargolvl32',`hatchlvl1`='$hatchlvl12',`hatchlvl2`='$hatchlvl22',`hatchlvl3`='$hatchlvl32',`climbpoint`='$platformlvl2',`cargoship`='$cargoship2',`hatchship`='$hatchship2',`autohatch`='$autohatch2',`autocargo`='$autocargo2' WHERE teamnumber=$teamnumber;";
            
        }
        } 
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          echo "<h3>Connection Error1</h3>";
        }
        else {
        //mysqli_stmt_bind_param($stmt, "issiissiiiiiisiiiisss", $matchnumber, $teamnumber, $alliance,$numberOfHatch,$numberOfCargo,$autopoints,$platformlvl,$cargolvl1,$cargolvl2,$cargolvl3,$hatchlvl1,$hatchlvl2,$hatchlvl3,$region,$cargoship,$hatchship,$autohatch,$autocargo,$teamnumber,$region,$matchnumber);
          mysqli_stmt_execute($stmt);
          if(mysqli_stmt_prepare($stmt, $sql2)){
              if($resultCount==0){
            mysqli_stmt_bind_param($stmt, "sssiiisssssssiiiiiiiiiiiii", $teamnumber, $nothing, $nothing,$nothing,$nothing,$autopoints,$nothing,$nothing,$nothing,$nothing,$nothing,$nothing,$nothing,$numberOfCargo,$numberOfHatch,$cargolvl1,$cargolvl2,$cargolvl3,$hatchlvl1,$hatchlvl2,$hatchlvl3,$platformlvl,$cargoship,$hatchship,$autohatch,$autocargo);
              }
            //mysqli_stmt_bind_param($stmt, "i", $teamnumber);
            mysqli_stmt_execute($stmt);
          }
          else{
              echo "<h3>Connection Error</h3>";
          }
          
          require "lgs.inc.php";
            $sql4="SELECT * FROM teams ";
            $result = mysqli_query($conn,$sql4);
          require 'editMobile.inc.php';
        }
        
      }
    }

}
if (isset($_POST['editmatch'])) {
  //require 'periods.inc.php';
  require 'lgs.inc.php';

$info = $_POST['editmatch'];
list($teamnumber, $region, $matchnumber) = split('[/.-]', $info);
$sql = "SELECT * FROM matchperformance WHERE teamnumber=?;";
    
$stmt = mysqli_stmt_init($conn);
 
$sql6="SELECT * FROM matchperformance WHERE teamnumber=$teamnumber AND region='$region' AND matchnumber=$matchnumber;";
$result4 = mysqli_query($conn,$sql6);
$row2 = mysqli_fetch_assoc($result4);
require "editMobile.inc.php";
echo '
  <div id="editteaminfo2">

                <div class="editteam-btn" onclick="toggleEditTeam2()">
                    <i class="fas fa-times-circle"></i>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <h4>Team Number</h4>
                    <input type="text" name="teamnumber" value='.$row2['teamnumber'].' readonly><br>
                    <hr>
                    <h4>Region</h4>
                    <select name="region2" readonly>
                        <option value='.$row2['region'].'>'.$row2['region'].'</option>
                    </select>
                    <a href="mailto:gzt11111@gmail.com?subject=(old region) to (new region)">Click Here to Change Region</a>
                    <hr>
                    <h4>Match Number</h4>
                    <h5>Pay Attention on the Infomation Board</h5>
                    <select name="matchnumber2" readonly>
                        <option value='.$row2['matchnumber'].'>'.$row2['matchnumber'].'</option>
                    </select>
                    <a href="mailto:gzt11111@gmail.com?subject=(old number) to (new number)">Click Here to Change Match Number</a>
                    <hr>
                    <h4>Alliance</h4>
                    <h5>Pay Attention on the Infomation Board</h5>
                    <select name="alliance">
                        <option value='.$row2['alliance'].'>'.$row2['alliance'].'</option>
                        <option value="Blue">Blue</option>
                        <option value="Red">Red</option>
                    </select>
                    <hr>
                    <h4>Autonomous</h4>
                    <h5>Hatch</h5>
                    <select name="autohatch">
                        <option value='.$row2['autohatch'].'>'.$row2['autohatch'].'Points</option>
                        <option value=2>1</option>
                        <option value=4>2</option>
                        <option value=6>3</option>
                    </select>
                    <h5>Cargo</h5>
                    <select name="autocargo">
                        <option value='.$row2['autocargo'].'>'.$row2['autocargo'].'Points</option>
                        <option value=3>1</option>
                        <option value=6>2</option>
                        <option value=9>3</option>
                    </select>
                    <hr>
                    <img id="rocketimg" src="media/rocket.png" width="800" height="1200">
                    <div class="cargolvl1">
                        <input type="text" id="cargolvl1" name="cargolvl1" value='.$row2['cargolvl1'].'>
                        <br>
                        <i onclick="addc1();" class="fas fa-plus-square"></i>
                        <i onclick="minusc1()" class="fas fa-minus-square"></i>
                        
                    </div>
                    <div class="cargolvl2">
                        <input type="text" id="cargolvl2" name="cargolvl2" value='.$row2['cargolvl2'].'>
                        <br>
                        <i onclick="addc2();" class="fas fa-plus-square"></i>
                        <i onclick="minusc2()" class="fas fa-minus-square"></i>
                    </div>
                    <div class="cargolvl3">
                        <input type="text" id="cargolvl3" name="cargolvl3" value='.$row2['cargolvl3'].'>
                        <br>
                        <i onclick="addc3();" class="fas fa-plus-square"></i>
                        <i onclick="minusc3()" class="fas fa-minus-square"></i>
                    </div>

                    <div class="hatchlvl1">
                        <input type="text" id="hatchlvl1" name="hatchlvl1" value='.$row2['hatchlvl1'].'>
                        <br>
                        <i onclick="addh1();" class="fas fa-plus-square"></i>
                        <i onclick="minush1()" class="fas fa-minus-square"></i>
                    </div>
                    <div class="hatchlvl2">
                        <input type="text" id="hatchlvl2" name="hatchlvl2" value='.$row2['hatchlvl2'].'>
                        <br>
                        <i onclick="addh2();" class="fas fa-plus-square"></i>
                        <i onclick="minush2()" class="fas fa-minus-square"></i>
                    </div>
                    <div class="hatchlvl3">
                        <input type="text" id="hatchlvl3" name="hatchlvl3" value='.$row2['hatchlvl3'].'>
                        <br>
                        <i onclick="addh3();" class="fas fa-plus-square"></i>
                        <i onclick="minush3()" class="fas fa-minus-square"></i>
                    </div>
                    <img id="shipimg" src="media/ship.png" width="400" height="280">
                    <div class="hatchship">
                        <input type="text" id="hatchship" name="hatchship" value='.$row2['hatchship'].'>
                        <br>
                        <i onclick="addsh();" class="fas fa-plus-square"></i>
                        <i onclick="minussh()" class="fas fa-minus-square"></i>
                    </div>
                    <div class="cargoship">
                        <input type="text" id="cargoship" name="cargoship" value='.$row2['cargoship'].'>
                        <br>
                        <i onclick="addsc();" class="fas fa-plus-square"></i>
                        <i onclick="minussc()" class="fas fa-minus-square"></i>
                    </div>
                    <script>
                        function addc1(){
                            var oldvalue=document.getElementById("cargolvl1").value;
                            document.getElementById("cargolvl1").value=1+parseInt(oldvalue);
                        }

                        function minusc1(){
                            var oldvalue=document.getElementById("cargolvl1").value;
                            document.getElementById("cargolvl1").value=parseInt(oldvalue)-1;
                        }
                         function addc2(){
                            var oldvalue=document.getElementById("cargolvl2").value;
                            document.getElementById("cargolvl2").value=1+parseInt(oldvalue);
                        }

                        function minusc2(){
                            var oldvalue=document.getElementById("cargolvl2").value;
                            document.getElementById("cargolvl2").value=parseInt(oldvalue)-1;
                        }
                         function addc3(){
                            var oldvalue=document.getElementById("cargolvl3").value;
                            document.getElementById("cargolvl3").value=1+parseInt(oldvalue);
                        }

                        function minusc3(){
                            var oldvalue=document.getElementById("cargolvl3").value;
                            document.getElementById("cargolvl3").value=parseInt(oldvalue)-1;
                        }

                        function addh1(){
                            var oldvalue=document.getElementById("hatchlvl1").value;
                            document.getElementById("hatchlvl1").value=1+parseInt(oldvalue);
                        }

                        function minush1(){
                            var oldvalue=document.getElementById("hatchlvl1").value;
                            document.getElementById("hatchlvl1").value=parseInt(oldvalue)-1;
                        }
                         function addh2(){
                            var oldvalue=document.getElementById("hatchlvl2").value;
                            document.getElementById("hatchlvl2").value=1+parseInt(oldvalue);
                        }

                        function minush2(){
                            var oldvalue=document.getElementById("hatchlvl2").value;
                            document.getElementById("hatchlvl2").value=parseInt(oldvalue)-1;
                        }
                         function addh3(){
                            var oldvalue=document.getElementById("hatchlvl3").value;
                            document.getElementById("hatchlvl3").value=1+parseInt(oldvalue);
                        }

                        function minush3(){
                            var oldvalue=document.getElementById("hatchlvl3").value;
                            document.getElementById("hatchlvl3").value=parseInt(oldvalue)-1;
                        }
                        function addsh(){
                            var oldvalue=document.getElementById("hatchship").value;
                            document.getElementById("hatchship").value=1+parseInt(oldvalue);
                        }

                        function minussh(){
                            var oldvalue=document.getElementById("hatchship").value;
                            document.getElementById("hatchship").value=parseInt(oldvalue)-1;
                        }

                        function addsc(){
                            var oldvalue=document.getElementById("cargoship").value;
                            document.getElementById("cargoship").value=1+parseInt(oldvalue);
                        }

                        function minussc(){
                            var oldvalue=document.getElementById("cargoship").value;
                            document.getElementById("cargoship").value=parseInt(oldvalue)-1;
                        }
                    </script>
                    
                    <hr>
                    <h4>Climb Plaform</h4>
                    <select name="platformlvl">
                        <option value='.$row2['climbpoint'].'>'.$row2['climbpoint'].'Points</option>
                        ';
                        require 'platlvl_select.php';
                        echo'
                    </select>
                    <br>
                    <hr>
                    <input value="Edit" type="submit" name="save5">
                    
                </form>
            </div>
            ';
 }?>
 <?php
if (isset($_POST['editteam'])) {
  //require 'periods.inc.php';
  require_once 'lgs.inc.php';

$teamnumber = $_POST['editteam'];

$sql = "SELECT * FROM teams WHERE teamnumber=?;";
    
    $stmt = mysqli_stmt_init($conn);
  
$sql6="SELECT * FROM teams WHERE teamnumber=$teamnumber;";
$result4 = mysqli_query($conn,$sql6);
$row2 = mysqli_fetch_assoc($result4);
require "editMobile.inc.php";
  echo '
  <div id="editteaminfo2">
  
                <form method="post">
                 <div class="editteam-btn" onclick="toggleEditTeam2()">
                    <i class="fas fa-times-circle"></i>
                </div>
                <h4>Team Number</h4>
                   
                    <input type="text" name="teamnumber" value='.$row2['teamnumber'].' readonly><br>
                    <a href="mailto:gzt11111@gmail.com?subject=(old number) to (new number)">Click Here to Change Team Number</a>
                    <hr>
                    <h4>Height</h4>
                    <input type="text" name="height" value='.$row2['height'].'>
                    <hr>
                    <h4>Weight</h4>
                    <input type="text" name="weight" value='.$row2['weight'].'>
                    <hr>
                    <h4>Image</h4>
                    <input type="file" name="image">
                    <img src="data:'.$row2['imagetype'].';base64,'.base64_encode($row2["image"]).'"width="200"/>
                    <hr>
                    <h4>Can do autonomous?</h4>
                    <select name="autonomous">
                        <option value='.$row2['automous'].'>'.$row2['automous'].'</option>
                         ';
                        require 'auto_select.php';
                        echo'
                    </select>
                    <hr>
                    <h4>Speed</h4>
                    <select name="speed">
                        <option value='.$row2['speed'].'>'.$row2['speed'].'</option>
                         ';
                        require 'speed_select.php';
                        echo'
                    </select>
                    <hr>
                    <h4>Pickup Speed</h4>
                    <select name="pickupspeed">
                        <option value='.$row2['pickupspeed'].'>'.$row2['pickupspeed'].'</option>
                        ';
                        require 'speed_select.php';
                        echo'
                    </select>
                    <hr>
                     <h4>Climb Platform Level</h4>
                    <select name="platformlevel">
                        <option value='.$row2['climbplatform'].'>'.$row2['climbplatform'].'</option>
                        ';
                        require 'lvl_select.php';
                        echo'
                    </select>
                    <hr>
                     <h4>Cargo Level</h4>
                    <select name="cargolevel">
                        <option value='.$row2['cargolevel'].'>'.$row2['cargolevel'].'</option>
                         ';
                        require 'platlvl_select.php';
                        echo'
                    </select>
                    <hr>
                    <h4>Hatch Level</h4>
                    <select name="hatchlevel">
                        <option value='.$row2['hatchlevel'].'>'.$row2['hatchlevel'].'</option>
                         ';
                        require 'lvl_select.php';
                        echo'
                    </select>
                    <hr>
                    <h4>Notes</h4>
                    <textarea name="notes" rows="5" cols="40">'.$row2['notes'].'</textarea>
                    <hr>
                    <input value="SAVE" type="submit" name="save2">
                    
                </form>
            </div>
            ';
 } ?>
 <?php

 if(isset($_POST["addMatch"])) {
     require "editMobile.inc.php";
  //require 'periods.inc.php';
  echo '
  <div id="editteaminfo2">

                <div class="editteam-btn" onclick="toggleEditTeam2()">
                    <i id="team" class="fas fa-times-circle"></i>
                </div>
                <form method="post" enctype="multipart/form-data">
                     <div id="list-example" class="list-group">
        <a class="list-group-item list-group-item-action" href="#team">Team#</a>
        <a class="list-group-item list-group-item-action" href="#auto">Autonomous</a>
        <a class="list-group-item list-group-item-action" href="#rocket">Rocket</a>
        <a class="list-group-item list-group-item-action" href="#test">Climb</a>
    </div>
    <style>
        #list-example a{
            color: black;
            
            background-color: white;
            border-radius: 20%;
            text-align: center;
        }
        #list-example{
            float: right;
            position: fixed;
            width: 10%;
            margin-left: 780px;
            margin-top:-50px;
        }
    </style>    
                    <h4>Team Number</h4>
                    <input type="text" name="teamnumber" value=""><br>
                    <hr>
                    <h4>Region</h4>
                    <select name="region">
                         ';
                        require 'region_select.php';
                        echo'
                    </select>
                    <hr>
                    <h4>Match Number</h4>
                    <h5>Pay Attention on the Infomation Board</h5>
                    <select name="matchnumber">
                         ';
                        require 'matchnum_select.php';
                        echo'
                    </select>
                    <hr>
                    <h4 id="auto">Alliance</h4>
                    <h5>Pay Attention on the Infomation Board</h5>
                    <select name="alliance">
                        <option value="null"></option>
                        <option value="Blue">Blue</option>
                        <option value="Red">Red</option>
                    </select>
                    <hr>
                    <h4>Autonomous</h4>
                    <h5>Hatch</h5>
                    <select name="autohatch">
                        <option value=0>0</option>
                        <option value=2>1</option>
                        <option value=4>2</option>
                        <option value=6>3</option>
                    </select>
                    <h5>Cargo</h5>
                    <select id="rocket" name="autocargo">
                        <option value=0>0</option>
                        <option value=3>1</option>
                        <option value=6>2</option>
                        <option value=9>3</option>
                    </select>
                    <hr>
                    <img id="rocketimg" src="media/rocket.png" width="800" height="1200">
                    <div class="cargolvl1">
                        <input type="text" id="cargolvl1" name="cargolvl1" value=0>
                        <br>
                        <i onclick="addc1();" class="fas fa-plus-square"></i>
                        <i onclick="minusc1()" class="fas fa-minus-square"></i>
                        
                    </div>
                    <div class="cargolvl2">
                        <input type="text" id="cargolvl2" name="cargolvl2" value=0>
                        <br>
                        <i onclick="addc2();" class="fas fa-plus-square"></i>
                        <i onclick="minusc2()" class="fas fa-minus-square"></i>
                    </div>
                    <div class="cargolvl3">
                        <input type="text" id="cargolvl3" name="cargolvl3" value=0>
                        <br>
                        <i onclick="addc3();" class="fas fa-plus-square"></i>
                        <i onclick="minusc3()" class="fas fa-minus-square"></i>
                    </div>

                    <div class="hatchlvl1">
                        <input type="text" id="hatchlvl1" name="hatchlvl1" value=0>
                        <br>
                        <i onclick="addh1();" class="fas fa-plus-square"></i>
                        <i onclick="minush1()" class="fas fa-minus-square"></i>
                    </div>
                    <div class="hatchlvl2">
                        <input type="text" id="hatchlvl2" name="hatchlvl2" value=0>
                        <br>
                        <i onclick="addh2();" class="fas fa-plus-square"></i>
                        <i onclick="minush2()" class="fas fa-minus-square"></i>
                    </div>
                    <div class="hatchlvl3">
                        <input type="text" id="hatchlvl3" name="hatchlvl3" value=0>
                        <br>
                        <i onclick="addh3();" class="fas fa-plus-square"></i>
                        <i onclick="minush3()" class="fas fa-minus-square"></i>
                    </div>
                    <img id="shipimg" src="media/ship.png" width="400" height="280">
                    <div class="hatchship">
                        <input type="text" id="hatchship" name="hatchship" value=0>
                        <br>
                        <i onclick="addsh();" class="fas fa-plus-square"></i>
                        <i onclick="minussh()" class="fas fa-minus-square"></i>
                    </div>
                    <div class="cargoship">
                        <input type="text" id="cargoship" name="cargoship" value=0>
                        <br>
                        <i onclick="addsc();" class="fas fa-plus-square"></i>
                        <i onclick="minussc()" class="fas fa-minus-square"></i>
                    </div>
                    <script>
                        function addc1(){
                            var oldvalue=document.getElementById("cargolvl1").value;
                            document.getElementById("cargolvl1").value=1+parseInt(oldvalue);
                        }

                        function minusc1(){
                            var oldvalue=document.getElementById("cargolvl1").value;
                            document.getElementById("cargolvl1").value=parseInt(oldvalue)-1;
                        }
                         function addc2(){
                            var oldvalue=document.getElementById("cargolvl2").value;
                            document.getElementById("cargolvl2").value=1+parseInt(oldvalue);
                        }

                        function minusc2(){
                            var oldvalue=document.getElementById("cargolvl2").value;
                            document.getElementById("cargolvl2").value=parseInt(oldvalue)-1;
                        }
                         function addc3(){
                            var oldvalue=document.getElementById("cargolvl3").value;
                            document.getElementById("cargolvl3").value=1+parseInt(oldvalue);
                        }

                        function minusc3(){
                            var oldvalue=document.getElementById("cargolvl3").value;
                            document.getElementById("cargolvl3").value=parseInt(oldvalue)-1;
                        }

                        function addh1(){
                            var oldvalue=document.getElementById("hatchlvl1").value;
                            document.getElementById("hatchlvl1").value=1+parseInt(oldvalue);
                        }

                        function minush1(){
                            var oldvalue=document.getElementById("hatchlvl1").value;
                            document.getElementById("hatchlvl1").value=parseInt(oldvalue)-1;
                        }
                         function addh2(){
                            var oldvalue=document.getElementById("hatchlvl2").value;
                            document.getElementById("hatchlvl2").value=1+parseInt(oldvalue);
                        }

                        function minush2(){
                            var oldvalue=document.getElementById("hatchlvl2").value;
                            document.getElementById("hatchlvl2").value=parseInt(oldvalue)-1;
                        }
                         function addh3(){
                            var oldvalue=document.getElementById("hatchlvl3").value;
                            document.getElementById("hatchlvl3").value=1+parseInt(oldvalue);
                        }

                        function minush3(){
                            var oldvalue=document.getElementById("hatchlvl3").value;
                            document.getElementById("hatchlvl3").value=parseInt(oldvalue)-1;
                        }
                        function addsh(){
                            var oldvalue=document.getElementById("hatchship").value;
                            document.getElementById("hatchship").value=1+parseInt(oldvalue);
                        }

                        function minussh(){
                            var oldvalue=document.getElementById("hatchship").value;
                            document.getElementById("hatchship").value=parseInt(oldvalue)-1;
                        }

                        function addsc(){
                            var oldvalue=document.getElementById("cargoship").value;
                            document.getElementById("cargoship").value=1+parseInt(oldvalue);
                        }

                        function minussc(){
                            var oldvalue=document.getElementById("cargoship").value;
                            document.getElementById("cargoship").value=parseInt(oldvalue)-1;
                        }
                    </script>
                    
                    <hr>
                    <h4 id="test">Climb Plaform</h4>
                    <select name="platformlvl">
                         ';
                        require 'platlvl_select.php';
                        echo'
                    </select>
                    <br>
                    <hr>
                    <input value="ADD" type="submit" name="save4">
                    
                </form>
            </div>
            ';
 }
if(isset($_POST["addTeam"])) {
    require "editMobile.inc.php";
    echo '
  <div id="editteaminfo2">

                <div class="editteam-btn" onclick="toggleEditTeam2()">
                    <i class="fas fa-times-circle"></i>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <h4>Team Number</h4>
                   
                    <input type="text" name="teamnumber" value=""><br>
                    
                    <hr>
                    <h4>Height</h4>
                    <input type="text" name="height" value="">
                    <hr>
                    <h4>Weight</h4>
                    <input type="text" name="weight" value="">
                    <hr>
                    <h4>Image</h4>
                    <input type="file" name="image">
                    <img src="" width="200"/>
                    <hr>
                    <h4>Can do autonomous?</h4>
                    <select name="autonomous">
                         ';
                        require 'auto_select.php';
                        echo'
                    </select>
                    <hr>
                    <h4>Speed</h4>
                    <select name="speed">
                         ';
                        require 'speed_select.php';
                        echo'
                    </select>
                    <hr>
                    <h4>Pickup Speed</h4>
                    <select name="pickupspeed">
                        ';
                        require 'speed_select.php';
                        echo'
                    </select>
                    <hr>
                     <h4>Climb Platform Level</h4>
                    <select name="platformlevel">
                        ';
                        require 'platlvl_select.php';
                        echo'
                    </select>
                    <hr>
                     <h4>Cargo Level</h4>
                    <select name="cargolevel">
                        ';
                        require 'lvl_select.php';
                        echo'
                    </select>
                    <hr>
                    <h4>Hatch Level</h4>
                    <select name="hatchlevel">
                        ';
                        require 'lvl_select.php';
                        echo'
                    </select>
                    <br>
                    <hr>
                    <h4>Notes</h4>
                    <textarea name="notes" rows="5" cols="40"></textarea>
                    <hr>
                    <input value="ADD" type="submit" name="save3">
                    
                </form>
            </div>   
    ';
}
        ?>    
        
