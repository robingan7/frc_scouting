<?php
if(isset($_POST['save2l'])){
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
    
      header("Location: ../lunchweb/robotweb/index.php?error=sqlerror");
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
          
            require 'head_to_compare.inc.php'; 
            require 'explorepage.inc.php'; 
            require 'use_funindex.inc.php'; 
            require 'editpage.php';  
            require 'editpage2.php';
        }
        
      }
    }

}

if(isset($_POST['save3l'])){
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
          mysqli_stmt_bind_param($stmt, "sssiisssssss", $teamnumber, $image, $speed,$weight,$height,$autonomous,$pickupspeed,$platformlevel,$cargolevel,$hatchlevel,$notes,$imagetype);
          mysqli_stsmt_execute($stmt);
          require "lgs.inc.php";
            $sql4="SELECT * FROM teams ";
            $result = mysqli_query($conn,$sql4);
            //echo 'hello';
            //header("Location: ../robotweb/index.php?signup=success");
            require 'head_to_compare.inc.php'; 
            require 'explorepage.inc.php'; 
            require 'use_funindex.inc.php';   
          require 'editpage2.php';
        }
        
      }
    }
}

if(isset($_POST['save4l'])){
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
  $notes=mysqli_real_escape_string($conn,$_POST['notes']);
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
    
      header("Location: ../lunchweb/robotweb/index.php?error=sqlerror");
    
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
            $sql2 = "INSERT INTO teams(`teamnumber`, `image`, `speed`, `weight`, `height`, `autopoints`, `pickupspeed`, `notes`, `imagetype`, `climbplatform`, `cargolevel`, `hatchlevel`, `automous`, `totalcargo`, `totalhatch`, `cargolvl1`, `cargolvl2`, `cargolvl3`, `hatchlvl1`, `hatchlvl2`, `hatchlvl3`, `climbpoint`, `cargoship`, `hatchship`, `autohatch`, `autocargo`, `notes`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
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
            mysqli_stmt_bind_param($stmt, "sssiiisssssssiiiiiiiiiiiiis", $teamnumber, $nothing, $nothing,$nothing,$nothing,$autopoints,$nothing,$nothing,$nothing,$nothing,$nothing,$nothing,$nothing,$numberOfCargo,$numberOfHatch,$cargolvl1,$cargolvl2,$cargolvl3,$hatchlvl1,$hatchlvl2,$hatchlvl3,$platformlvl,$cargoship,$hatchship,$autohatch,$autocargo,$notes);
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
          require 'head_to_compare.inc.php'; 
            require 'explorepage.inc.php'; 
            require 'use_funindex.inc.php'; 
            require 'editpage.php';  
          require 'editpage2.php';
        }
    }
        
      
    }
}

if(isset($_POST['save5l'])){
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
  $notes=mysqli_real_escape_string($conn,$_POST['notes']);
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
            $sql2 = "INSERT INTO teams(`teamnumber`, `image`, `speed`, `weight`, `height`, `autopoints`, `pickupspeed`, `notes`, `imagetype`, `climbplatform`, `cargolevel`, `hatchlevel`, `automous`, `totalcargo`, `totalhatch`, `cargolvl1`, `cargolvl2`, `cargolvl3`, `hatchlvl1`, `hatchlvl2`, `hatchlvl3`, `climbpoint`, `cargoship`, `hatchship`, `autohatch`, `autocargo`, `notes`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"; 
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
            mysqli_stmt_bind_param($stmt, "sssiiisssssssiiiiiiiiiiiiis", $teamnumber, $nothing, $nothing,$nothing,$nothing,$autopoints,$nothing,$nothing,$nothing,$nothing,$nothing,$nothing,$nothing,$numberOfCargo,$numberOfHatch,$cargolvl1,$cargolvl2,$cargolvl3,$hatchlvl1,$hatchlvl2,$hatchlvl3,$platformlvl,$cargoship,$hatchship,$autohatch,$autocargo,$notes);
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
           require 'head_to_compare.inc.php'; 
            require 'explorepage.inc.php'; 
            require 'use_funindex.inc.php';  
            require 'editpage.php'; 
          require 'editpage2.php';
        }
        
      }
    }

}


if (isset($_POST['editteam'])) {
  //require 'periods.inc.php';
  require 'lgs.inc.php';

$teamnumber = $_POST['editteam'];

$sql = "SELECT * FROM teams WHERE teamnumber=?;";
    
    $stmt = mysqli_stmt_init($conn);
  
$sql6="SELECT * FROM teams WHERE teamnumber=$teamnumber;";
$result4 = mysqli_query($conn,$sql6);
$row2 = mysqli_fetch_assoc($result4);
require 'head_to_compare.inc.php'; 
require 'explorepage.inc.php'; 
require 'editteaminfo2_style.php';
  echo '
  <style>
        #editteaminfo2{
            top:50%; /*50%*/
    left:50%;
    background:rgb(179, 26, 158);
    position: absolute;
    width:50%;
    height:66%;
    border: 2px solid white;
    overflow-y: scroll;
    margin-left: -35%;/*-500px;*/
    transition:.2s;
    margin-top:-230px;
    text-align:center;
        }
        
   #editteaminfo2 i{
       font-size:35px;
   }   
   
   #editteaminfo2 i:hover{
       color:white;
   }  
   
   #editteaminfo2.active{
       display:none;
   }


   #editteaminfo2 input{
    border: 2px #aaa solid;
    width: 200px;
    height:30px;
    margin-top: 20px;
    background-color: #87CEFA;
    transition: .2s;
    
}

#editteaminfo2 input:focus + i{
            color:#87CEFA;
          }
#editteaminfo2 input:focus{
    background-color: white;
}     

#editteaminfo2 input[type="submit"]{
    background-color: rgb(188, 223, 32);
    border-radius: 20px;
    margin-top:20px;
    width: 80px;
    height: 35px;
    margin-left:-20px;

}

#editteaminfo2 input[type="submit"]:hover{
    background-color:#87CEFA;
}

#editteaminfo2 #change{
    width:95px;
}
select{
    background: blueviolet;
    color: #fff;
    width: 100px;
    height: 30px;
    margin-left:0%;
    border: none;
    font-size: 15px;
    border-radius: 30px;
    box-shadow: 0 0 3px red;
    outline: none;
    padding: 5px;
}                  
  </style>
  <script>
    function toggleEditTeam2() {
    document.getElementById("editteaminfo2").classList.toggle("active");

}
    $(document).ready(function{
    $(".toggle-btn").click(function{
        $("#editpage").css("top", "50%");
        //$("#editpage").css("opacity", "1");
        $("#editpage").css("display", "inline");
    });
     });
  </script>
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
                        require 'platlvl_select.php';
                        echo'
                    </select>
                    <hr>
                     <h4>Cargo Level</h4>
                    <select name="cargolevel">
                        <option value='.$row2['cargolevel'].'>'.$row2['cargolevel'].'</option>
                        ';
                        require 'speed_select.php';
                        echo'
                    </select>
                    <hr>
                    <h4>Hatch Level</h4>
                    <select name="hatchlevel">
                        <option value='.$row2['hatchlevel'].'>'.$row2['hatchlevel'].'</option>
                        ';
                        require 'speed_select.php';
                        echo'
                    </select>
                    <hr>
                    <h4>Notes</h4>
                    <textarea name="notes" rows="5" cols="40">'.$row2['notes'].'</textarea>
                    <hr>
                    <input value="SAVE" type="submit" name="save2l">
                    
                </form>
            </div>
            
            ';
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
require 'head_to_compare.inc.php'; 
require 'explorepage.inc.php'; 
require 'editpage.php';  
echo '
<style>
        #editteaminfo2{
            top:50%; /*50%*/
    left:50%;
    background:rgb(179, 26, 158);
    position: absolute;
    width:50%;
    height:66%;
    border: 2px solid white;
    overflow-y: scroll;
    margin-left: -35%;/*-500px;*/
    transition:.2s;
    margin-top:-230px;
    text-align:center;
        }
        
   #editteaminfo2 i{
       font-size:35px;
       color:white;
   }   
   
   #editteaminfo2 i:hover{
       color:black;
   }  
   
   #editteaminfo2.active{
       display:none;
   }


   #editteaminfo2 input{
    border: 2px #aaa solid;
    width: 200px;
    height:30px;
    margin-top: 0px;
    background-color: #87CEFA;
    transition: .2s;
    
}

#editteaminfo2 input:focus + i{
            color:#87CEFA;
          }
#editteaminfo2 input:focus{
    background-color: white;
}     

#editteaminfo2 input[type="submit"]{
    background-color: rgb(188, 223, 32);
    border-radius: 20px;
    margin-top:20px;
    width: 80px;
    height: 35px;
    margin-left:-20px;
}

#editteaminfo2 input[type="submit"]:hover{
    background-color:#87CEFA;
}

select{
    background: blueviolet;
    color: #fff;
    width: 100px;
    height: 30px;
    margin-left:0%;
    border: none;
    font-size: 15px;
    border-radius: 30px;
    box-shadow: 0 0 3px red;
    outline: none;
    padding: 5px;
}

.cargolvl1{
    margin-left: -190px;
    margin-top: -40px;
    transform: translateY(-120px);
    text-align:center;
}
.cargolvl2{
    margin-left: -190px;
    margin-top: -40px;
    transform: translateY(-240px);
    text-align:center;
}
.cargolvl3{
    margin-left: -190px;
    margin-top: -40px;
    transform: translateY(-340px);
    text-align:center;
}

.hatchlvl1{
    margin-left: 190px;
    margin-top: -40px;
    transform: translateY(-150px);
    text-align:center;
}
.hatchlvl2{
    margin-left: 190px;
    margin-top: -40px;
    transform: translateY(-290px);
    text-align:center;
}
.hatchlvl3{
    margin-left: 190px;
    margin-top: -180px;
    transform: translateY(-270px);
    text-align:center;
}
.hatchship{
    margin-left: 50px;
    margin-top:-110px;
    transform: translateY(40px);
    text-align:center;
}
.cargoship{
    margin-left: -150px;   
    transform: translateY(-120px);
    text-align:center;
}
#editteaminfo2 input[name="cargolvl1"]{
    width: 65px;
}
#editteaminfo2 input[name="cargolvl2"]{
    width: 65px;
}
#editteaminfo2 input[name="cargolvl3"]{
    width: 65px;
}
#editteaminfo2 input[name="hatchlvl1"]{
    width: 65px;
}
#editteaminfo2 input[name="hatchlvl2"]{
    width: 65px;
}
#editteaminfo2 input[name="hatchlvl3"]{
    width: 65px;
}
#editteaminfo2 input[name="hatchship"]{
    width: 65px;
}
#editteaminfo2 input[name="cargoship"]{
    width: 65px;
}
  </style>
  <script>
    function toggleEditTeam2() {
    document.getElementById("editteaminfo2").classList.toggle("active");

}
    $(document).ready(function{
    $(".toggle-btn").click(function(){
        $("#editpage").css("top", "50%");
        //$("#editpage").css("opacity", "1");
        $("#editpage").css("display", "inline");
    });
     });

  </script>
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
                    <img src="media/rocket.png" width="300" height="500">
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
                    <img src="media/ship.png" width="300" height="180">
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
                     <h4>Notes</h4>
                    <textarea name="notes" rows="5" cols="40">'.$row2['notes'].'</textarea>
                    <hr>
                    <input value="Edit" type="submit" name="save5l">
                    
                </form>
            </div>
            ';
 }?>
 <?

 if(isset($_POST["addTeam"])) {
     require_once 'lgs.inc.php';
  require 'head_to_compare.inc.php'; 
require 'explorepage.inc.php'; 
require 'editpage.php';   
  require 'addTeamLogin.inc.php';
 }

 if(isset($_POST["addMatch"])) {
     require_once 'lgs.inc.php';
    require 'head_to_compare.inc.php'; 
    require 'explorepage.inc.php'; 
    require 'editpage.php';
  require 'addMatchLogin.inc.php';
  
 }
?> 