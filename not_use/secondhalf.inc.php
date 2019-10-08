<html>
<body>
<div id="explorepage">
        <div class="close" onclick="toggleExplore()">
            <i class="fas fa-times-circle"></i>
        </div>

        <button class="team">By Teams</button>
        <button class="match">By Matches</button>
        <button class="bluea"><strong>Blue Alliance</strong></button>

        <div class="teampage">
            <div class="search-box">
            <form action="search.php" method="post">
                <input class="search-txt" type="text" name="searchValue" placeholder="Team Number">
                <a class="search-btn" href="#">
                    <i class="fas fa-search"></i>
                </a>
            </form>    
            </div>
            <div id="result"></div>
            <div class="rank">
                <select id="diffrank">
                    <option value="rankby">Rank By</option>
                    <option value="speed">Speed</option>
                    <option value="autopoints">Auto Points</option>
                    <option value="telepoints">Tele Points</option>
                </select>
            </div>

            <script>
                 
            </script>    
            
                <table id="trs">
                <tr>
                    <th>Team Number</th>
                    <th>Match Number</th>
                    <th>Auto Points</th>
                    <th>Tele Points</th>
                    <th>Pick Up Speed</th>
                    <!--<th><button name="alldetail" onclick="toggleDetail()">View Detail</button></th>-->
                    <th>Image</th>
                    <th>Speed</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>Standing</th>
                    
                </tr>
                <?php
                require 'lgs.inc.php';
                $sql4="SELECT * FROM teams ";
                $result = mysqli_query($conn,$sql4);
                while($rows= mysqli_fetch_assoc($result)){
                ?>

                 
                
                <tr >
                    <th><?php echo $rows['teamnumber'];?></th>
                    <th><?php echo $rows['matchnumber'];?></th>
                    <th><?php echo $rows['autopoints'];?></th>
                    <th><?php echo $rows['teleboxes'];?></th>
                    <th><?php echo $rows['pickupspeed'];?></th>
                    <!--<th><button name="detail" value="">Click</button></th>-->
                    <th><?php echo $rows['image'];?></th>
                    <th><?php echo $rows['speed'];?></th>
                    <th><?php echo $rows['height'];?></th>
                    <th><?php echo $rows['weight'];?></th>
                    <th><?php echo $rows['standing'];?></th>
                
                   
                </tr>
                
                <?php }?>
                </table>

                <table id="telerank">
                <tr>
                    <th>Team Number</th>
                    <th>Tele Points</th>
                    <th>Auto Points</th>
                    <th>Match Number</th>
                    <th>Pick Up Speed</th>
                    <!--<th><button name="alldetail" onclick="toggleDetail()">View Detail</button></th>-->
                    <th>Image</th>
                    <th>Speed</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>Standing</th>
                    
                </tr>
                <?php
                require 'lgs.inc.php';
                $sql4="SELECT * FROM `teams` ORDER BY `teams`.`teleboxes` DESC;";
                $result = mysqli_query($conn,$sql4);
                while($rows= mysqli_fetch_assoc($result)){
                ?>

                 
                
                <tr >
                    <th><?php echo $rows['teamnumber'];?></th>
                    <th><?php echo $rows['teleboxes'];?></th>
                    <th><?php echo $rows['autopoints'];?></th>
                    <th><?php echo $rows['matchnumber'];?></th>
                    <th><?php echo $rows['pickupspeed'];?></th>
                    <!--<th><button name="detail" value="">Click</button></th>-->
                    <th><?php echo $rows['image'];?></th>
                    <th><?php echo $rows['speed'];?></th>
                    <th><?php echo $rows['height'];?></th>
                    <th><?php echo $rows['weight'];?></th>
                    <th><?php echo $rows['standing'];?></th>
                
                   
                </tr>
                
                <?php }?>
                </table>

                <table id="autorank">
                 <tr>
                    <th>Team Number</th>
                    <th>Auto Points</th>
                    <th>Speed</th>
                    <th>Tele Points</th>
                    <th>Pick Up Speed</th>
                    <!--<th><button name="alldetail" onclick="toggleDetail()">View Detail</button></th>-->
                    <th>Image</th>
                    <th>matchnumber</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>Standing</th>
                    
                </tr>    
                    <?php
                require 'lgs.inc.php';
                $sql4="SELECT * FROM teams ORDER BY `autopoints` DESC";
                $result = mysqli_query($conn,$sql4);
                while($rows= mysqli_fetch_assoc($result)){
                ?>

                <tr >
                    <th><?php echo $rows['teamnumber'];?></th>
                    <th><?php echo $rows['autopoints'];?></th>
                    <th><?php echo $rows['speed'];?></th>
                    <th><?php echo $rows['teleboxes'];?></th>
                    <th><?php echo $rows['pickupspeed'];?></th>
                    <!--<th><button name="detail" value="">Click</button></th>-->
                    <th><?php echo $rows['image'];?></th>
                    <th><?php echo $rows['matchnumber'];?></th>
                    <th><?php echo $rows['height'];?></th>
                    <th><?php echo $rows['weight'];?></th>
                    <th><?php echo $rows['standing'];?></th>
                </tr>
                <?php }?>
                </table>
                
                <table id="speedrank">
                <tr>
                    <th>Team Number</th>
                    <th>Speed</th>
                    <th>Auto Points</th>
                    <th>Tele Points</th>
                    <th>Pick Up Speed</th>
                    <!--<th><button name="alldetail" onclick="toggleDetail()">View Detail</button></th>-->
                    <th>Image</th>
                    <th>Match Number</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>Standing</th>
                    
                </tr>
                <?php
                require 'lgs.inc.php';
                $sql4="SELECT * FROM `teams` ORDER BY `teams`.`speed` DESC;";
                $result = mysqli_query($conn,$sql4);
                while($rows= mysqli_fetch_assoc($result)){
                ?>

                 
                
                <tr >
                    <th><?php echo $rows['teamnumber'];?></th>
                    <th><?php echo $rows['speed'];?></th>
                    <th><?php echo $rows['autopoints'];?></th>
                    <th><?php echo $rows['teleboxes'];?></th>
                    <th><?php echo $rows['pickupspeed'];?></th>
                    <!--<th><button name="detail" value="">Click</button></th>-->
                    <th><?php echo $rows['image'];?></th>
                    <th><?php echo $rows['matchnumber'];?></th>
                    <th><?php echo $rows['height'];?></th>
                    <th><?php echo $rows['weight'];?></th>
                    <th><?php echo $rows['standing'];?></th>
                
                   
                </tr>
                
                <?php }?>
                </table>
           

        </div>
        <style>
            #explorepage .table1 button{
                            background-color: rgb(111, 164, 233);
            }

             #explorepage .table1 button:hover{
                            background-color: #87CEFA;
            }

        @media screen and (max-width:830px){
            #explorepage .table1 th:nth-child(n+7):nth-child(-n+11){
                display:none;
            }
            #trs.active{
                color: red;
                display:inline;
            }
        }

            #editpass{
                left:-50%;
            }
            #editpass.active{
            left:50%;
            opacity: 1;
            }

            
        </style>    
                    
                        

        <div class="matchpage">
            <div class="search-box">
                <input class="search-txt" type="text" name="" placeholder="Match Name">
                <a class="search-btn" href="#">
                    <i class="fas fa-search"></i>
                </a>
            </div>

            <div class="rank">
                <select>
                    <option>Date</option>
                    <option>2019.1.5</option>
                    <option>2019.1.6</option>
                    <option>2019.1.7</option>
                </select>
            </div>

            <div class="rank2">
                <select>
                    <option>Region</option>
                    <option>Orange County</option>
                    <option>LA</option>
                    <option>四川绵阳</option>
                </select>
            </div>

            <table class="table1">
                <tr>
                    <th>Date</th>
                    <th>Region</th>
                    <th>Red Team</th>
                    <th>Blue Team</th>
                    <th>Round</th>
                    <th>View Detail</th>
                </tr>

                <tr>
                    <th>2019.1.5</th>
                    <th>Orange County</th>
                    <th>5805,0000,0001</th>
                    <th>0002,0003,0004</th>
                    <th>2</th>
                    <th><a href="http://robingan.ga/">Click</a></th>
                </tr>

                <tr>
                    <th>2019.1.5</th>
                    <th>LA</th>
                    <th>0005,0006,0007</th>
                    <th>0008,0009,0010</th>
                    <th>2</th>
                    <th><a href="http://robingan.ga/">Click</a></th>
                </tr>
            </table>
        </div>

        <div class="bluepage">
            <iframe src="" width="80%" height="150" scrolling="yes">
            </iframe>
        </div>

        <script>
            $(".matchpage").hide();
            $(".bluepage").hide();


            $(".team").click(function () {
                $(".matchpage").hide();
                $(".teampage").show();
                $(".bluepage").hide();
                $("#explorepage").css("background", "rgb(223, 122, 6)");

            });

            $(".match").click(function () {
                $(".matchpage").show();
                $(".teampage").hide();
                $(".bluepage").hide();
                $("#explorepage").css("background", "rgb(206, 20, 60)");
            });

            $(".bluea").click(function () {
                $(".bluepage").show();
                $(".teampage").hide();
                $(".matchpage").hide();
                $("#explorepage").css("background", "rgb(18, 140, 211)");
            });
        </script>
    </div>

    <div id="editpass">


        <div class="close" onclick="toggleEdit()">
            <i class="fas fa-times-circle"></i>
        </div>

        <input id="txt" type="text" name="editpass" placeholder="Enter Edit Code">
        <input id="editbutton" type="submit" name="editpass-submit" onclick="editPass()" placeholder="SUBMIT">

    </div>
    <?php
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
          
          //header("Location: ../robotweb/index.php?error=sqlerror2");
          exit();
        }
        else {
          //mysqli_stmt_bind_param($stmt, "ssssssssss", $teamnumber, $height, $weight,$image,$imagetype,$speed,$matchnumber,$autopoints,$pickupspeed,$teleboxes);
          
          //mysqli_stmt_execute($stmt);
         // require "lgs.inc.php";
            //$sql4="SELECT * FROM teams ";
            //$result = mysqli_query($conn,$sql4);
          //header("Location: ../robotweb/index.php?signup=success");
          echo '
             <div id="editpage">
        
        <div id="iconbutton" onclick="toggleInside()">
            <i class="fas fa-times-circle"></i>
        </div>
        <form method="post">';
         
                while($rows= mysqli_fetch_assoc($result)){
              
                echo '<input type="submit" name="editteam" value="'.$rows['teamnumber'].'">';
                
                }
                echo '
                <style>
                    #editpage input[type="submit"]{
                        background-color: rgb(188, 223, 32);
                        border-radius: 20px;
                        margin-top:20px;
                        width: 80px;
                        height: 35px;
                        margin-left:-20px;

                    }

                    #editpage input[type="submit"]{
                        margin-left:5px;
                    }

                    #editpage input[type="submit"]:hover{
                        background-color:#87CEFA;
                    }
                </style>
        </form>  
        
    </div>
          ';
          
          
        }
        
      }
    }


  
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
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
          echo 'hello3';
          $stmt = mysqli_stmt_init($conn);
      }

        else{
          echo '<h1>Team Already Exists</h1>';
        }
       
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          echo "hello2";
          //header("Location: ../robotweb/index.php?error=sqlerror2");
          exit();
        }
        else {

        
          mysqli_stmt_bind_param($stmt, "sbiiiiiiiss", $teamnumber, $image, $speed,$weight,$height,$matchnumber,$autopoints,$teleboxes,$pickupspeed,$notes,$imagetype);
          mysqli_stmt_execute($stmt);
          require "lgs.inc.php";
            $sql4="SELECT * FROM teams ";
            $result = mysqli_query($conn,$sql4);
          //header("Location: ../robotweb/index.php?signup=success");
          echo '
             <div id="editpage">
        
        <div id="iconbutton" onclick="toggleInside()">
            <i class="fas fa-times-circle"></i>
        </div>
        <form method="post">';
         
                while($rows= mysqli_fetch_assoc($result)){
              
                echo '<input type="submit" name="editteam" value="'.$rows['teamnumber'].'">';
                
                }
                echo '
                <style>
                    #editpage input[type="submit"]{
                        background-color: rgb(188, 223, 32);
                        border-radius: 20px;
                        margin-top:20px;
                        width: 80px;
                        height: 35px;
                        margin-left:-20px;

                    }

                    #editpage input[type="submit"]{
                        margin-left:5px;
                    }

                    #editpage input[type="submit"]:hover{
                        background-color:#87CEFA;
                    }
                </style>
        </form>  
        
    </div>
          ';
          
          exit();
        }
        
      }
    }


  
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
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
    $(document).ready(function{
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
 } ?>
 <?php

 if(isset($_POST["addTeam"])) {
  //require 'periods.inc.php';


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
    $(document).ready(function{
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

        ?>         
    <div id="editpage">
        
        <div id="iconbutton" onclick="toggleInside()">
            <i class="fas fa-times-circle"></i>
        </div>
        
        <form method="post">
        <input type="submit" name="addTeam" value="Add Team">
         <?php
                require 'lgs.inc.php';
                $sql4="SELECT * FROM teams ";
                $result = mysqli_query($conn,$sql4);
                while($rows= mysqli_fetch_assoc($result)){
                ?>
                
                <input type="submit" name="editteam" value="<?php echo $rows['teamnumber']?>">
                 
                <?php } 
                ?>
                <style>
                    #editpage input[type="submit"]{
                        background-color: rgb(188, 223, 32);
                        border-radius: 20px;
                        margin-top:20px;
                        width: 80px;
                        height: 35px;
                        margin-left:-20px;

                    }

                    #editpage input[type="submit"]{
                        margin-left:5px;
                    }

                    #editpage input[type="submit"]:hover{
                        background-color:#87CEFA;
                    }

                    #editpage input[name="addTeam"]{
                        margin-top:-35px;
                        margin-left:235px;
                        background-color:#87CEFA;
                        position:fixed;
                    }

                    #editpage input[name="addTeam"]:hover{
                        background-color:rgb(188, 223, 32);
                    }
                </style>
        </form>  
        
    </div>
    </body>
    </html>