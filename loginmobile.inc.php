<?php
error_reporting(E_ERROR | E_PARSE);
if (isset($_POST['signup-submit2'])) {
$mailuid = $_POST['username'];
$password = $_POST['password'];   
 
  require 'lgs.inc.php';
  //require 'periods.inc.php';
  

  if (empty($mailuid) || empty($password)) {
    header("Location: ../robotweb/teamMobile.php?error=emptyfields&mailuid");
    exit();
  }
  else {

    
    $sql = "SELECT * FROM users WHERE teamnumber=? OR password2=?;";
    
    $stmt = mysqli_stmt_init($conn);
   
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      
      header("Location: ../robotweb/teamMobile.php?error=sqlerror");
      exit();
    }
    else {

      
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $password);
      
      mysqli_stmt_execute($stmt);
     
      $result = mysqli_stmt_get_result($stmt);
      
      if ($row = mysqli_fetch_assoc($result)) {
        
        $pwdCheck = password_verify($password, $row['password2']);
      
        if ($password == $row['password2']) {
          

          session_start();
          
          $_SESSION['username'] = $row['teamnumber'];
          $number = $row['teamnumber'];
          $_SESSION['username'] = $row['teamnumber'];

          $sql4="SELECT * FROM teams WHERE teamnumber=$number";
          $result3 = mysqli_query($conn,$sql4);
        
          if (mysqli_num_rows($result3)>0){
            $row2 = mysqli_fetch_assoc($result3);
            //echo $row2['image'];
          }
          else{
              $sql6 = "INSERT INTO teams(teamnumber, image, speed, weight, height, matchnumber, autopoints, teleboxes, pickupspeed, standing, notes,imagetype) VALUES ('$mailuid',null,0,0,0,0,0,0,0,'','','');";
              $result4 = mysqli_query($conn,$sql6);
              $row2 = mysqli_fetch_assoc($result4);
          }
        
         require 'lgs.inc.php';
            $gene="SELECT * FROM teams ";
            $genere = mysqli_query($conn,$gene);

            $tele="SELECT * FROM `teams` ORDER BY `teams`.`teleboxes` DESC;";
            $telere = mysqli_query($conn,$tele);

            $auto="SELECT * FROM teams ORDER BY `autopoints` DESC";
            $autore = mysqli_query($conn,$auto);

            $spe="SELECT * FROM `teams` ORDER BY `teams`.`speed` DESC;";
            $spere = mysqli_query($conn,$spe);
            /*
          echo '<a href="loginpage.php" action="out.inc.php" class="buttonstyle3">
            <input type="submit" name="logout" value="Log Out">
            </a>';*/
          echo'
        <?php 
        echo "hello";
        ?>
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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <style>
        img[alt="www.000webhost.com"] {
            display: none;
        }
    </style>

</head>
<script src="indexScriptMobile.js"></script>
<script>

$(document).ready(function () {
        load_data();
 function load_data(query)
 {
  $.ajax({
   url:"search.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $("#result").html(data);
   }
  });
 }
 $(".search-txt").keyup(function(){
  var search = $(this).val();
  if(search != "")
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
 function load_data2(query)
 {
  $.ajax({
   url:"search.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $("#result2").html(data);
   }
  });
 }

 $(".search-txt2").keyup(function(){
  var search = $(this).val();
  if(search != "")
  {
   load_data2(search);
  }
  else
  {
   load_data2();
  }
 });
    });

</script>

<body>
    <div class="buttons">
    <button class="yourteam">Your Team</button>
    <button class="compareteam">Compare Team</button>
    <button class="chartteam">Chart Team</button>
    </div>
    <div id="sidebar">
        <div class="" onclick="toggleEditTeam()">
            <i2 class="fas fa-edit"></i2>
        </div>
        <style>
            body{
                background-color:rgb(172, 74, 74);
            }
            h2{
                color:black;
                text-align: center;
                font-size:100px;
            }

            h4{
                font-size:40px;
            }

            h3{
                font-size:80px;
                 color:rgb(9, 162, 223);
            }

           
            #sidebar{
                color:rgb(233, 164, 16);
                text-align: center;
                font-size:30px;
                overflow-y:scroll;
                height:250%;
            }

           i{ 
                font-size:70px;
                margin-right: 0%;
            }

            i:hover{ 
                color:white;
            }

            i2{ 
                position:absolute;
                margin-top:290px;
                transform: translateX(190px);
                transition:.2s;
                color:rgb(9, 162, 223);
                font-size:70px;
            }

            i3{
                margin-left:30px;
                transform: translateY(20px);
                transition:.2s;
            }

            i2:hover{
                color: white;
            }
            hr{
                background-color:blue;
            }
            h4{
                display:block;
                color:rgb(9, 162, 223);
                margin:0;
            }
            #sidebar ul{
                float:left;
                padding-top:3px;
                transform: translateY(-50px);
                
            }
            #sidebar ul li2{
                font-size:70px;
                float:left;
                 transform: translateX(120px);
                 
            }

             #sidebar ul .note{
               margin-top:20px;
            }

            input{
                border: 2px #aaa solid;
                width: 200px;
                height:30px;
                margin-top: 20px;
                background-color: #87CEFA;
                transition: .2s;
            }

            input[type="text"]:focus{
                background-color:white;
            }

            #editteaminfo{
                display:none;
            }


            #editteaminfo{
                position: absolute;
                left:0%;
                opacity: 1;
                width: 100%;
                height:100%;
                background: rgb(172, 74, 74);
                transition: .3s linear;
                margin-top:-380px;
                font-size:40px;
            }

            #editteaminfo.active{
                display:inline;
            }
            input{
                border: 2px #aaa solid;
                width: 450px;
                height:70px;
                margin-top: 20px;
                background-color: #87CEFA;
                transition: .2s;
                font-size:30px;
            }
            input[type="submit"]{
                background-color: rgb(188, 223, 32);
                border-radius: 20px;
                margin-top:20px;
                width: 220px;
                height: 85px;
                margin-left:-20px;
                font-size:40px;
                 padding-right:15px;

            }

            input[type="submit"]:hover{
                background-color:#87CEFA;

            }

            #editteaminfo input[type="file"]
                font-size: 40px;
                color:black;
            }

            a{
                font-size:20px;
                color: white;
                
            }

            a input[name="logout"]{
                background-color: rgb(188, 223, 32);
                border-radius: 20px;
                margin-top:20px;
                width: 220px;
                height: 85px;
                margin-left:-20px;
                font-size:40px;
                 padding-right:15px;
            }

            #editteaminfo button{
                width:50px;
                color: red;
            }
            
            #editteaminfo button:hover{
                background-color:#aaa;
            }  
           

#chooseteam{
    position: absolute;
    width: 100%;
    height:100%;
    background: rgb(172, 74, 74);
    left:0%;
    
    transition: .3s linear;
}

#chooseteam .toggle-btn{
    margin-top: 10px;
    margin-left: 10px;
}

 #chooseteam .toggle-btn i{ 
    font-size: 50px;
    color: black;
    transition: .2s;
    opacity: 1;
}

#chooseteam .toggle-btn i:hover{
    
    color: white;
}

#chooseteam.active{
    left:0%;


}
#chooseteam i{
    
    
    font-size: 33px;
    color: black;
    transition: .2s;
    opacity: 1;
    
    
}

#chooseteam i:hover{
    
    color: white;
}
#chooseteam .search-box{
    background: #2f3640;
    height:100px;
    border-radius:40px;
    padding:5px;
    width: 450px;
    margin-left: 20%;
    margin-top:60px;
}
#chooseteam .search-btn{
    color: #e84118;
    float:right;
    width:40px;
    height:40px;
    border-radius:50%;
    border-width: 2px;
    margin-top:-40px;
    background: #2f3640;
    border-color: #e84118;
    display:flex;
    justify-content: center;
    align-items: center;
    
}

#chooseteam .search-txt{
    border:none;
    background:none;
    outline: none;
    float: left;
    padding: 0;
    border-radius:20px;
    color: white;
    font-size: 40px;
    transition: 0.2s;
    line-height: 40px;
    
   
}

#chooseteam .search-txt:focus {
    box-shadow: 0 0 2px 2px red;
}

#chooseteam .search-txt2{
    border:none;
    background:none;
    outline: none;
    float: left;
    padding: 0;
    border-radius:20px;
    color: white;
    font-size: 40px;
    transition: 0.2s;
    line-height: 40px;
    
   
}

#chooseteam .search-txt2:focus {
    box-shadow: 0 0 2px 2px red;
}

#drop_hatch{
    display:inline;
    color: black;
   
}
#drop_cargo{
    display:inline;
    color: black;
}
#drop_cargo li2{
    margin-top:-15px; 
}
#drop_hatch li2{
    margin-top:-15px;
}

#sidebar i4{
    position: absolute;
    margin-left: 10px;
    margin-top:25px;
    font-size: 25px;
    color: blue;
    transition: 0.3s;
}

#sidebar i4:hover{
    color: red;
}

#sidebar i5{
    position: absolute;
    margin-left: 55px;
    margin-top:10px;
    font-size: 25px;
    color: blue;
    transition: 0.3s;
}

#sidebar i5:hover{
    color: red;
}

#totalhatch{
    margin-left: 10px;
}
select{
    background: blueviolet;
    color: #fff;
    width: 300px;
    height: 90px;
    margin-left:0%;
    border: none;
    font-size: 85px;
    border-radius: 30px;
    box-shadow: 0 0 3px red;
    outline: none;
    padding: 5px;
}

h4{
    font-size: 75px;
}
        </style>  
<script>
$(document).ready(function () {
            $("#chooseteam").hide();
            $("#chartteam").hide();
            $("#sidebar").show();



            $(".yourteam").click(function () {
                $("#chooseteam").hide();
                $("#sidebar").show();
                $("#chartteam").hide();
            });

            $(".compareteam").click(function () {
                $("#chooseteam").show();
                $("#sidebar").hide();
                $("#chartteam").hide();
            });

            $(".charttea,").click(function () {
                $("#chooseteam").hide();
                $("#sidebar").hide();
                $("#chartteam").show();
            });
            
             });
</script>
            <h2>Welcome </h2> <h3>'.$row2['teamnumber'].'</h3>
            <hr>
            <ul>
                <li2> Height: '.$row2['height'].'</li2><br>
                <li2></li2><br>
                <li2></li2><br>
                <li2> Weight: '.$row2['weight'].'</li2><br>
                <li2></li2><br>
                <li2></li2><br>
                
                <li2> Image: </li2><br>
                <li2> 
                <embed src="data:'.$row2['imagetype'].';base64,'.base64_encode($row2['image']).'"width="200"/><br>
                </li2><br>
                
                <li2>Autonomous Points: '.$row2['autopoints'].'</li2><br>
                <li2> Speed: '.$row2['speed'].'</li2><br>
                <li2> Total Climb Points: '.$row2['climbpoint'].'</li2><br>
                <li2> Total Cargo: '.$row2['totalcargo'].'</li2><br>
               
                <div id="drop_cargo">
                
                    <li2> Level 1: '.$row2['cargolvl1'].'-----</li2><br>
                    <li2> Level 2: '.$row2['cargolvl2'].'-----</li2><br>
                    <li2> Level 3: '.$row2['cargolvl3'].'-----</li2><br>
                </div>
                
                <li2 id="totalhatch"> Total Hatch: '.$row2['totalhatch'].'</li2>
                <div id="drop_hatch">
                <br>
                    <li2> Level 1: '.$row2['hatchlvl1'].'-----</li2><br>
                    <li2> Level 2: '.$row2['hatchlvl2'].'-----</li2><br>
                    <li2> Level 3: '.$row2['hatchlvl3'].'-----</li2><br>
                </div>
                <li2> Pickup Speed: '.$row2['pickupspeed'].'</li2><br>
                <li2> Platform Level: '.$row2['climbplatform'].'</li2><br>
                <li2> Cargo Level: '.$row2['cargolevel'].'</li2><br>
                <li2> Hatch Level: '.$row2['hatchlevel'].'</li2><br>
                <li2>Have automous?'.$row2['automous'].'</li2><br>
                <li2>Notes</li2><br>
                <li2><textarea name="notes" rows="5" cols="40" readonly>'.$row2['notes'].'</textarea></li2>
                <br>
            </ul>
            <a href="teamMobile.php" action="out.inc.php">
                     <input type="submit" name="logout" value="Log Out">
                </a>
        
            <div id="editteaminfo">

                <div class="toggle-btn" onclick="toggleEditTeam()">
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
                    <h4>Can do autonomous?</h4>
                    <select name="autonomous">
                        <option value='.$row2['automous'].'>'.$row2['automous'].'</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                        <option value="Vision_System">Vision_System</option>
                    </select>
                    <hr>
                    <h4>Speed</h4>
                    <select name="speed">
                        <option value='.$row2['speed'].'>'.$row2['speed'].'</option>
                        <option value="Slow">Slow</option>
                        <option value="Medium">Medium</option>
                        <option value="Fast">Fast</option>
                    </select>
                    <hr>
                    <h4>Pickup Speed</h4>
                    <select name="pickupspeed">
                        <option value='.$row2['pickupspeed'].'>'.$row2['pickupspeed'].'</option>
                        <option value="Slow">Slow</option>
                        <option value="Medium">Medium</option>
                        <option value="Fast">Fast</option>
                    </select>
                    <hr>
                     <h4>Climb Platform Level</h4>
                    <select name="platformlevel">
                        <option value='.$row2['climbplatform'].'>'.$row2['climbplatform'].'</option>
                        <option value="Level1">Level1</option>
                        <option value="Level2">Level2</option>
                        <option value="Level3">Level3</option>
                    </select>
                    <hr>
                     <h4>Cargo Level</h4>
                    <select name="cargolevel">
                        <option value='.$row2['cargolevel'].'>'.$row2['cargolevel'].'</option>
                        <option value="Level1">Level1</option>
                        <option value="Level2">Level2</option>
                        <option value="Level3">Level3</option>
                    </select>
                    <hr>
                    <h4>Hatch Level</h4>
                    <select name="hatchlevel">
                        <option value='.$row2['hatchlevel'].'>'.$row2['hatchlevel'].'</option>
                        <option value="Level1">Level1</option>
                        <option value="Level2">Level2</option>
                        <option value="Level3">Level3</option>
                    </select>
                    <hr>
                    <h4>Password</h4>
                    <input type="text" name="password"  placeholder="Enter password for editing info"  value="">
                    <hr>
                    <input value="SAVE" type="submit" name="save">
                </form>
            </div>
    </div>
    <div id="chooseteam">
        <div class="search-box">
         <form method="post">
                <input class="search-txt" type="text" name="searchValue" placeholder="Team Number">
                
            </form>  
            
        </div>
        <div id="result"></div>
        <div class="search-box">
         <form method="post">
                <input class="search-txt2" type="text" name="searchValue" placeholder="Team Number">
                
            </form>  
            
        </div>    
        
        <div id="result2"></div>
    </div>
    </body>
    </html>';
          exit();
        }
        
        else if ($password !== $row['password']) {

          
          header("Location: ../robotweb/teamMobile.php?error=wrongpwd");
          exit();

        }
      }
      else {
        header("Location: ../robotweb/teamMobile.php?login=wronguidpwd");
        exit();
      }
    }
  }
  
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
   if (isset($_POST['save'])) {

  
  //require 'periods.inc.php';
  require_once 'lgs.inc.php';

  
  $teamnumber = mysqli_real_escape_string($conn,$_POST['teamnumber']);
  $height = mysqli_real_escape_string($conn,$_POST['height']);
  $weight = mysqli_real_escape_string($conn,$_POST['weight']);
  //$image = file_get_contents($_FILES['image']['tmp_name']);
  $image=mysqli_real_escape_string($conn,$_FILES['image']);
  $imagetype=mysqli_real_escape_string($conn,$_FILES['image']['type']);
  $speed = mysqli_real_escape_string($conn,$_POST['speed']);
  $platformlevel=mysqli_real_escape_string($conn,$_POST['platformlevel']);
  $hatchlevel=mysqli_real_escape_string($conn,$_POST['hatchlevel']);
  $cargolevel=mysqli_real_escape_string($conn,$_POST['cargolevel']);
  $pickupspeed = mysqli_real_escape_string($conn,$_POST['pickupspeed']);
  $autonomous=mysqli_real_escape_string($conn,$_POST['autonomous']);
  $password = mysqli_real_escape_string($conn,$_POST['password']);
 
  if (empty($teamnumber) || empty($password)) {
    header("Location: ../robotweb/teamMobile.php?error=emptyfields&uid=".$p5);
    exit();
  }

  else {
    $sql = "SELECT * FROM teams WHERE teamnumber=?;";
    
    $stmt = mysqli_stmt_init($conn);
  
    if (!mysqli_stmt_prepare($stmt, $sql)) {
    
      header("Location: ../lunchweb/robotweb/teamMobile.php?error=sqlerror");
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
        header("Location: ../robotweb/teamMobile.php?error=wrongpassword".$truepass.$pass);
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
            $sql="UPDATE teams SET height='$height', automous='$autonomous',weight='$weight', image='$image' , speed='$speed', hatchlevel='$hatchlevel',cargolevel='$cargolevel',pickupspeed='$pickupspeed' ,climbplatform='$platformlevel',imagetype='$imagetype',notes='$notes' WHERE teamnumber=$teamnumber;";
          }
          else{
          header("Location: ../robotweb/teamMobile.php?error=wrongid");
          exit();
          }
        }
       
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          
          header("Location: ../robotweb/teamMobile.php?error=sqlerror2");
          exit();
        }
        else {

        
          mysqli_stmt_bind_param($stmt, "ssssssssss", $teamnumber, $height, $weight,$image,$imagetype,$speed,$matchnumber,$autopoints,$pickupspeed,$teleboxes);
          
          mysqli_stmt_execute($stmt);
         
          header("Location: ../robotweb/teamMobile.php?signup=success");
          echo "hello";
          exit();
        }
        
      }
    }
}

  //header("Location: ../robotweb/index1.php");
  exit();
} 
