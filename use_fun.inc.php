<?
error_reporting(E_ERROR | E_PARSE);
if(isset($_POST['save2'])){
    //require 'periods.inc.php';
  require 'lgs.inc.php';

  
  $teamnumber = $_POST['teamnumber'];
  $height = $_POST['height'];
  $weight = $_POST['weight'];
  //$image = file_get_contents($_FILES['image']['tmp_name']);
  //$image=$_FILES['image'];
  $image="";
  $imagetype=$_FILES['image']['type'];
  $speed = $_POST['speed'];
  $matchnumber = $_POST['matchnumber'];
  $autopoints = $_POST['autopoints'];
  $pickupspeed = $_POST['pickupspeed'];
  $notes=$_POST['notes'];
  $teleboxes=$_POST['teleboxes'];
 
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
            $sql="UPDATE teams SET teamnumber='$teamnumber',height='$height', weight='$weight', image='$image' , speed='$speed', matchnumber='$matchnumber', autopoints='$autopoints',pickupspeed='$pickupspeed' ,teleboxes='$teleboxes' ,imagetype='$imagetype',notes='$notes' WHERE teamnumber=$teamnumber;";
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
         require 'non_editpage2.php';
         require 'editpage.inc.php';
        }
        
      }
    }

}

if(isset($_POST['save3'])){
    //require 'periods.inc.php';
  require 'lgs.inc.php';

  
  $teamnumber = $_POST['teamnumber'];
  $image = file_get_contents($_FILES['image']['tmp_name']);
  $speed = $_POST['speed'];
  $weight = $_POST['weight'];
  $height = $_POST['height'];
  $matchnumber = $_POST['matchnumber'];
  $autopoints = $_POST['autopoints'];
  $teleboxes=$_POST['teleboxes'];
  $pickupspeed = $_POST['pickupspeed'];
  $notes=$_POST['notes'];
  //$image=$_FILES['image'];
  //$image="";
  $imagetype=$_FILES['image']['type'];
  
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
        
        mysqli_stmt_close($stmt);
        if($resultCount==0){
           $sql = "INSERT INTO teams(teamnumber, image, speed, weight, height, matchnumber, autopoints, teleboxes, pickupspeed, notes,imagetype) VALUES (?,?,?,?,?,?,?,?,?,?,?);"; 
          // $sql = "INSERT INTO teams(teamnumber, image, speed, weight, height, matchnumber, autopoints, teleboxes, pickupspeed, standing, notes, imagetype) VALUES ('$teamnumber','$image','$speed','$weight','$height','$matchnumber','$autopoints','$teleboxes','$pickupspeed','','',$imagetype');"; 
          //echo 'hello3';
          $stmt = mysqli_stmt_init($conn);
      }

        else{
          echo '<h1>Team Already Exists</h1>';
        }
       
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          //echo "hello2";
          //header("Location: ../robotweb/index.php?error=sqlerror2");
          exit();
        }
        else {
          mysqli_stmt_bind_param($stmt, "sssiisssssss", $teamnumber, $image, $speed,$weight,$height,$autonomous,$pickupspeed,$platformlevel,$cargolevel,$hatchlevel,$notes,$imagetype);
          mysqli_stmt_execute($stmt);
          require "lgs.inc.php";
            $sql4="SELECT * FROM teams ";
            $result = mysqli_query($conn,$sql4);
          //header("Location: ../robotweb/index.php?signup=success");
          
        require 'non_editpage2.php';
         require 'editpage.inc.php';
          
          exit();
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

 require 'edit_set.inc.php';
  require 'modindex.inc.php';
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


  </style>
  <script>
    function toggleEditTeam2() {
    document.getElementById("editteaminfo2").classList.toggle("active");

}
    $(document).ready(function(){
    $(".toggle-btn").click(function{
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
                    <h4>Speed</h4>
                    <input type="text" name="speed" value='.$row2['speed'].'>
                    <hr>
                    <h4>Match Number</h4>
                    <input type="text" name="matchnumber" value='.$row2['matchnumber'].'>
                    <hr>
                    <h4>Autopoints</h4>
                    <input type="text" id="autopoints" name="autopoints" value='.$row2['autopoints'].'> 
                    <br>
                    <input type="text" id="change"  name="changevalue" placeholder="Value To Change" >
                    <i onclick="add()" class="fas fa-plus-square"></i>
                    <i onclick="minus()" class="fas fa-minus-square"></i>
                    <script>
                        function add(){
                            var changevalue=document.getElementById("change").value;
                            if(changevalue==""){
                                changevalue=0;
                            }
                            var oldvalue=document.getElementById("autopoints").value;
                            document.getElementById("autopoints").value=parseInt(changevalue)+parseInt(oldvalue);
                        }

                        function minus(){
                            var changevalue=document.getElementById("change").value;
                            if(changevalue==""){
                                changevalue=0;
                            }
                            var oldvalue=document.getElementById("autopoints").value;
                            document.getElementById("autopoints").value=parseInt(oldvalue)-parseInt(changevalue);
                        }
                    </script>
                    <br>
                    <hr>
                    <h4>Tele points</h4>
                    <input type="text" name="teleboxes" value='.$row2['teleboxes'].'>
                    <hr>
                    <h4>Pickup Speed</h4>
                    <input type="text" name="pickupspeed" value='.$row2['pickupspeed'].'>
                    <hr>
                    <h4>Notes</h4>
                    <input type="text" name="notes" value="'.$row2['notes'].'">
                    <hr>
                    <input value="SAVE" type="submit" name="save2">
                    
                </form>
            </div>
            
            ';
 } 

 if(isset($_POST["addTeam"])) {
  //require 'periods.inc.php';
  require_once 'lgs.inc.php';

   require 'edit_set.inc.php';
require 'modindex.inc.php';
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


  </style>
  <script>
    function toggleEditTeam2() {
    document.getElementById("editteaminfo2").classList.toggle("active");

}
    $(document).ready(function(){
    $(".toggle-btn").click(function{
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
                    <img src="data:"";base64,"" width="200"/>
                    <hr>
                    <h4>Speed</h4>
                    <input type="text" name="speed" value="">
                    <hr>
                    <h4>Match Number</h4>
                    <input type="text" name="matchnumber" value="">
                    <hr>
                    <h4>Autopoints</h4>
                    <input type="text" id="autopoints" name="autopoints" value=""> 
                    <br>
                    <input type="text" id="change"  name="changevalue" placeholder="Value To Change" >
                    <i onclick="add()" class="fas fa-plus-square"></i>
                    <i onclick="minus()" class="fas fa-minus-square"></i>
                    <script>
                        function add(){
                            var changevalue=document.getElementById("change").value;
                            if(changevalue==""){
                                changevalue=0;
                            }
                            var oldvalue=document.getElementById("autopoints").value;
                            document.getElementById("autopoints").value=parseInt(changevalue)+parseInt(oldvalue);
                        }

                        function minus(){
                            var changevalue=document.getElementById("change").value;
                            if(changevalue==""){
                                changevalue=0;
                            }
                            var oldvalue=document.getElementById("autopoints").value;
                            document.getElementById("autopoints").value=parseInt(oldvalue)-parseInt(changevalue);
                        }
                    </script>
                    <br>
                    <hr>
                    <h4>Tele points</h4>
                    <input type="text" name="teleboxes" value="">
                    <hr>
                    <h4>Pickup Speed</h4>
                    <input type="text" name="pickupspeed" value="">
                    <hr>
                    <h4>Notes</h4>
                    <input type="text" name="notes" value="">
                    <hr>
                    <input value="ADD" type="submit" name="save3">
                    
                </form>
            </div>
            
            '; 
 }
    