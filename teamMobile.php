<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
?>
<html>

        <head method="get">
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

        body{
            background-color:rgb(172, 74, 74);
        }
    </style>

</head>
<?php
          // Here we create an error message if the user made an error trying to sign up.
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyfields") {
              echo '<h2 class="signuperror">Fill in all fields!</h2>';
            }
            else if ($_GET["error"] == "wrongid") {
              echo '<h1 class="signuperror">Wrong password!</h1>';
            }
            else if ($_GET["error"] == "wrongpwd") {
              echo '<h1 class="signuperror">Wrong Password!</h1>
              ';
              
            }
            else if ($_GET["error"] == "invalidmail") {
              echo '<h2 class="signuperror">Invalid e-mail!</h2>';
            }
            else if ($_GET["error"] == "passwordcheck") {
              echo '<h2 class="signuperror">Your passwords do not match!</h2>';
            }
            else if ($_GET["error"] == "sqlerror1") {
              echo '<h2 class="signuperror">Please Check All the Fields!</h2>';
            }
          }
          // Here we create a success message if the new user was created.
          else if (isset($_GET["signup"])) {
            if ($_GET["signup"] == "success") {
              echo '<h2 class="signupsuccess">Update successful!</h2>';
            }
          }
          ?>
<script src="indexScriptMobile.js"></script>
<body>
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
    <div id="sidebar">
        
        <form action="loginmobile.inc.php" method="post">

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

        <form action="signupmobile.inc.php" method="post">
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
        

</body>
</html>