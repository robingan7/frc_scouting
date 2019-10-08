
<html>

        <head>
    <title>HOME</title>
    <link rel="shortcut icon" href="ricon.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewpoint" content="width=device-width, intial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="indexStyle.css">
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
    </style>

</head>

<script src="indexScript.js"></script>
<script>

    $(document).ready(function () {
        $("#editbutton").click(function () {
            var frame = $("#txt").val();
            var key = "3";
            if (frame == key) {
                $("#editpage").css("top", "50%");
                //$("#editpage").css("opacity", "1");
                $("#editpage").css("display", "inline");
                /*
                setTimeout(function () {
                        $("#editpage").css("top", "-50%");
                        $("#editpage").css("opacity", "0");
                        
                        $("#editpass").css("opacity", "0");
                    },1000);*/
            }
            else {
                alert("Wrong Password");
            }

        });
        $("#iconbutton").click(function () {
            $("#editpage").css("top", "-50%");
            //location.reload();
            //alert("SAVED!!!");
        });
        
        $('#diffrank').change(function(){
            var varselected =$('#diffrank option:selected');
            if(varselected.val()=='speed'){
                $("#telerank").hide();
                 $(".table1").hide();
                $("#autorank").hide();
                $("#trs").hide();
                $("#speedrank").show();
            }
            else if(varselected.val()=='autopoints'){
                $("#telerank").hide();
                $("#autorank").show();
                $("#trs").hide();
                $("#speedrank").hide();
            }
            else if(varselected.val()=='telepoints'){
                $("#telerank").show();
                $("#autorank").hide();
                $("#trs").hide();
                $("#speedrank").hide();
            }
             else if(varselected.val()=='rankby'){
                $("#telerank").hide();
                $("#autorank").hide();
                $("#trs").show();
                $("#speedrank").hide();
            }
            else{
                $("#telerank").hide();
                $("#autorank").hide();
                $("#trs").show();
                $("#speedrank").hide();
            }

        });

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
 <?php
          // Here we create an error message if the user made an error trying to sign up.
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyfields") {
              echo '<p class="signuperror">Fill in all fields!</p>';
            }
            else if ($_GET["error"] == "wrongid") {
              echo '<p class="signuperror">Wrong password!</p>';
            }
            else if ($_GET["error"] == "wrongpassword") {
              echo '<p class="signuperror">Wrong Password!</p>';
            }
            else if ($_GET["error"] == "invalidmail") {
              echo '<p class="signuperror">Invalid e-mail!</p>';
            }
            else if ($_GET["error"] == "passwordcheck") {
              echo '<p class="signuperror">Your passwords do not match!</p>';
            }
            else if ($_GET["error"] == "sqlerror1") {
              echo '<p class="signuperror">Please Check All the Fields!</p>';
            }
          }
          // Here we create a success message if the new user was created.
          else if (isset($_GET["signup"])) {
            if ($_GET["signup"] == "success") {
              echo '<p class="signupsuccess">Update successful!</p>';
            }
          }
          ?>
<body>
    <a href="https://www.firstinspires.org/robotics/frc"><img src="media/robot.png"></a>
    <div class="blue"></div>
    <div class="scouticon">
        <img src="media/scouticon.png">
        <img src="media/redicon.png">
        <hh>EAGLES</hh>

        <div class="redlight">
            <img src="media/redlight.png">
        </div>

        <div class="bluelight">
            <img src="media/bluel.png">
        </div>

        <h1><strong>Scouting System</strong></h1>
        <h2>By 5805</h2>
    </div>

    <div class="update">
        <img src="media/update.png">
    </div>

    <div class="teams">
        <img src="media/twolights.png">
    </div>

    <div class="explore">
        <img src="media/explore.png">
    </div>

    <div class="yoda">
        <img src="media/yoda.png">
    </div>

    <ul>
        <li><a class="special1">Teams</a>
            <ul>
                <li class="list1" onclick="toggleMyteam()"><a>My Team</a></li>
                <li class="list2" onclick="toggleChoose()"><a>Compare Teams</a></li>
            </ul>
        </li>
        <li class="special2" onclick="toggleExplore()"><a>Explore</a></li>
        <li><a class="special3" onclick="toggleEdit()">Update Info</a></li>
        <li><a class="special4">About us</a></li>
    </ul>

    <div id="sidebar">
        <div class="toggle-btn" onclick="toggleMyteam()">
            <i class="fas fa-times-circle"></i>
        </div>
        <form action="login.inc.php" method="post">

            <div class="login">
                <h1>Returning User</h1>

                <input type="text" name="username" placeholder="Team Number">
                <i class="fa fa-users fa-lg fa-fw" aria-hidden="true">
                </i>

                <input type="password" name="password" placeholder="Put Password">
                <i class="fa fa-key fa-lg fa-fw" aria-hidden="true">
                </i>

                <div class="buttonstyle" action="login.inc.php" method="post">
                    <button type="submit" name="signup-submit2">LOGIN</button>
                </div>
                <a href="#">Lost your password</a><br>
            </div>
        </form>

        <form action="signup.inc.php" method="post">
            <div class="signup">
                <h1>New User</h1>

                <input type="text" name="username" placeholder="Team Number">
                <i class="fa fa-users fa-lg fa-fw" aria-hidden="true">
                </i>

                <input type="password" name="password" placeholder="Put Password">
                <i class="fa fa-key fa-lg fa-fw" aria-hidden="true">
                </i>

                <input type="password" name="comfirmpassword" placeholder="Confirm Password">
                <i class="fa fa-key fa-lg fa-fw" aria-hidden="true">
                </i>

                <div class="checkStyle">
                    <input type="checkbox" id="terms" name="checkbox" value="">
                    <label for="terms">I agree to</label>
                    <a href="">terms and condition</a>
                </div>

                <div class="buttonstyle">
                    <button type="submit" name="signup-submit">SUMBIT</button>
                </div>
            </div>
        </form>
    </div>

    <div id="chooseteam">
        <div class="toggle-btn" onclick="toggleChoose()">
            <i class="fas fa-times-circle"></i>
        </div>
        <div class="search-box">
         <form method="post">
                <input class="search-txt" type="text" name="searchValue" placeholder="Team Number">
                <a name="compareTeam" class="search-btn" href="#">
                    <i class="fas fa-plus"></i>
                </a>
            </form>  
            
        </div>
        <div id="result"></div>
        <div class="search-box">
         <form method="post">
                <input class="search-txt2" type="text" name="searchValue" placeholder="Team Number">
                <a name="compareTeam" class="search-btn" href="#">
                    <i class="fas fa-plus"></i>
                </a>
            </form>  
            
        </div>    
        
        <div id="result2"></div>
    </div>

    <div id="explorepage">
        <div class="close" onclick="toggleExplore()">
            <i class="fas fa-times-circle"></i>
        </div>

        <button class="team">By Teams</button>
        <button class="match">By Matches</button>
        <button class="bluea"><strong>Blue Alliance</strong></button>

        <div class="teampage">
            <div class="search-box">
                <input class="search-txt" type="text" name="" placeholder="Team Number">
                <a class="search-btn" href="#">
                    <i class="fas fa-search"></i>
                </a>
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
    
</body>


</html>