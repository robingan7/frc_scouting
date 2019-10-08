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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
</head>
<script src="indexScript.js"></script>
<script src="pass_load_part.js"></script>
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
                <li class="list3" onclick="toggleChart()"><a>Chart Team</a></li>
            </ul>
        </li>
        <li class="special2" onclick="toggleExplore()"><a>Explore</a></li>
        <li><a class="special3" onclick="toggleEdit()">Update Info</a></li>
        <li><a href="https://smblyrequired.com/" class="special4">About us</a></li>
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

    <div id="chartteam">
        <div class="toggle-btn" onclick="toggleChart()">
            <i class="fas fa-times-circle"></i>
        </div>
        <div class="rank2">
                <select id="chteamnumber">
                    <option value="nothing">Team Number</option>
                    <?php
                    require_once 'lgs.inc.php';
                    $query = "SELECT * FROM teams;";
                    $result = mysqli_query($conn, $query);
                    $already=array("Robin Gan");
                    if(mysqli_num_rows($result) > 0){
                        while($rows = mysqli_fetch_array($result)){
                        $teamnum=$rows['teamnumber'];
                        $judge=true;
                        foreach ($already as $num){
                            if($teamnum==$num){
                                $judge=false;
                            }
                        }
                        if($judge){
                            echo '<option value='.$teamnum.'>'.$teamnum.'</option>';
                        }
                    }
                    }
                    ?>
                </select>
            </div>

            <div class="rank2">
                <select id="chregion">
                    <option value="nothing">Region</option>
                    <?php
                    require_once 'lgs.inc.php';
                    $query = "SELECT * FROM matchperformance;";
                    $result = mysqli_query($conn, $query);
                    $already=array("Robin Gan");
                    if(mysqli_num_rows($result) > 0){
                        while($rows = mysqli_fetch_array($result)){
                        $teamnum=$rows['region'];
                        $judge=true;
                        foreach ($already as $num){
                            if($teamnum==$num){
                                $judge=false;
                            }
                        }
                        array_push($already,$teamnum);
                        if($judge){
                            echo '<option value='.$teamnum.'>'.$teamnum.'</option>';
                        }
                    }
                    }
                    ?>
                </select>
            </div>

             <div class="rank2">
                <select id="chfeature">
                    <option value="nothing">Feature</option>
                    <option value="autopoint">Total Autonmous Points</option>
                    <option value="autohatch">Hatch in Autonmous</option>
                    <option value="autocargo">Cargo in Autonmous</option>
                    <option value="numberOfCargo">Total Cargo</option>
                    <option value="numberOfHatch">Total Hatch</option>
                    <option value="cargolvl1">Cargo Level1</option>
                    <option value="cargolvl2">Cargo Level2</option>
                    <option value="cargolvl3">Cargo Level3</option>
                    <option value="hatchlvl1">Hatch Level1</option>
                    <option value="hatchlvl2">Hatch Level2</option>
                    <option value="hatchlvl3">Hatch Level3</option>
                    <option value="cargoship">Cargo Cargoship</option>
                    <option value="hatchship">Hatch Cargoship</option>
                    <option value="climbpoint">Climb Points</option>           
                </select>
            </div>
            <div id="graphresult"></div>  
                       
            <div class="rank3">
                <select id="chteamnumber2">
                    <option value="nothing">Team Number</option>
                    <?php
                    require_once 'lgs.inc.php';
                    $query = "SELECT * FROM teams;";
                    $result = mysqli_query($conn, $query);
                    $already=array("Robin Gan");
                    if(mysqli_num_rows($result) > 0){
                        while($rows = mysqli_fetch_array($result)){
                        $teamnum=$rows['teamnumber'];
                        $judge=true;
                        foreach ($already as $num){
                            if($teamnum==$num){
                                $judge=false;
                            }
                        }
                        if($judge){
                            echo '<option value='.$teamnum.'>'.$teamnum.'</option>';
                        }
                    }
                    }
                    ?>
                </select>
            </div>

            <div class="rank3">
                <select id="chregion2">
                    <option value="nothing">Region</option>
                    <?php
                    require_once 'lgs.inc.php';
                    $query = "SELECT * FROM matchperformance;";
                    $result = mysqli_query($conn, $query);
                    $already=array("Robin Gan");
                    if(mysqli_num_rows($result) > 0){
                        while($rows = mysqli_fetch_array($result)){
                        $teamnum=$rows['region'];
                        $judge=true;
                        foreach ($already as $num){
                            if($teamnum==$num){
                                $judge=false;
                            }
                        }
                        array_push($already,$teamnum);
                        if($judge){
                            echo '<option value='.$teamnum.'>'.$teamnum.'</option>';
                        }
                    }
                    }
                    ?>
                </select>
            </div>

             <div class="rank3">
                <select id="chfeature2">
                    <option value="nothing">Feature</option>
                    <option value="autopoint">Total Autonmous Points</option>
                    <option value="autohatch">Hatch in Autonmous</option>
                    <option value="autocargo">Cargo in Autonmous</option>
                    <option value="numberOfCargo">Total Cargo</option>
                    <option value="numberOfHatch">Total Hatch</option>
                    <option value="cargolvl1">Cargo Level1</option>
                    <option value="cargolvl2">Cargo Level2</option>
                    <option value="cargolvl3">Cargo Level3</option>
                    <option value="hatchlvl1">Hatch Level1</option>
                    <option value="hatchlvl2">Hatch Level2</option>
                    <option value="hatchlvl3">Hatch Level3</option>
                    <option value="cargoship">Cargo Cargoship</option>
                    <option value="hatchship">Hatch Cargoship</option>
                    <option value="climbpoint">Climb Points</option>           
                </select>
            </div>
            <div id="graphresult2"></div>                     
        </div>

    </div>