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
    <div class="main">
    <img src="media/robot.png">
    </div>
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
        <h2>By 5805 Robin Gan</h2>
    </div>
    
    <ul>
        <li><a href="teamMobile.php" class="special1">Teams</a>
        </li>
        <li><a href="exploremobile.php" class="special2" onclick="toggleExplore()">Explore</a></li>
        <li><a href="editmobile.php" class="special3" onclick="toggleEdit()">Update Info</a></li>
        <li><a href="https://smblyrequired.com/" class="special4">About us</a></li>
    </ul>
    <style>
    .main img{
        height: 720px;
        width: 700px;
        position: absolute;
    top:50%;
    left:50%;
    margin-top: -780px;
    margin-left: -350px;
    }
    .scouticon img{
        width: 200px;
        margin-left:-120px;
    }
    .blue{
        width: 800px;
        height: 800px;
        margin-left: -380px;
        margin-top:-630px;
    }
    ul li{
        font-size: 50px;
        width: 200px;
        height: 200px;
        padding-top: 30px;
    }
    ul li:nth-child(2){
        margin-top:-80px;
        margin-left: 400px;
    }

    ul li:nth-child(3){
        margin-top:-40px;
        margin-left: 200px;
    }
.special1{
    height: 100%;
    background-color: rgb(247, 10, 10);
}

.special2{
    height: 100%;
    background-color: rgb(223, 122, 6);
}

.special3{
    height: 100%;
    background-color: rgb(25, 127, 196);
}

.special4{
    height: 100%;
    background-color: rgb(10, 163, 22);
}
.explore img{
    width: 150px;
    height: 150px;
    margin-top: -80px;
      margin-left: 180px;
}

.yoda img{
    width: 150px;
    height: 150px;
    margin-top: 100px;
    margin-left: -220px;
}

.teams img{
    width: 150px;
    height: 150px;
    margin-top: -80px;
    margin-left: 200px;
}

.update img{
    width: 150px;
    height: 80px;
      margin-top: 100px;
       margin-left: -220px;
}

 ul li:nth-child(1){
        margin-top:-80px;
        margin-left: 200px;
    }

    ul li:nth-child(4){
        margin-top:-46px;
        margin-left: 400px;
    }

    ul li ul{
    
    margin-top: -70px;
    margin-left:-410px;
    
}

.redlight img{
    display:none;
}
.bluelight img{
   display:none;
}
ul li{
    height: 175px;
}
ul li .list3{
    background-color:  rgb(247, 10, 10);
    margin-left: 200px;
    margin-top: -35px;
}
.scouticon h1{
    margin-top: -85px;
    margin-left: 140px;
    font-size: 50px;
    font-family: "Arial Black", Gadget, sans-serif;
    color: rgb(9, 162, 223);
}

.scouticon hh{
    margin-top: 25px;
    margin-left: -20px;
    position: absolute;
    font-family: "Arial Black", Gadget, sans-serif;
    color:black;
    font-style: italic;
    font-size: 65px;
}

.scouticon h2{
    position: absolute;
    font-family: "Arial Black", Gadget, sans-serif;
    color: rgb(9, 162, 223);
    font-size: 50px;
    margin-left: -10px;
    margin-top: 0;
}

</style>

    </div>