<?php 
        
        
        echo'
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
                $("#editpage").css("opacity", "1");

                /*
                setTimeout(function () {
                        $("#editpage").css("top", "50%");
                //$("#editpage").css("opacity", "1");
                $("#editpage").css("display", "inline");
                    },1000);*/
            }
            else {
                alert("Wrong Password");
            }

        });
        $("#iconbutton").click(function () {
             $("#editpage").css("top", "-50%");
        });

        $("#diffrank").change(function(){
            var varselected =$("#diffrank option:selected");
            if(varselected.val()=="speed"){
                $("#telerank").hide();
                 $(".table1").hide();
                $("#autorank").hide();
                $("#trs").hide();
                $("#speedrank").show();
            }
            else if(varselected.val()=="autopoints"){
                $("#telerank").hide();
                $("#autorank").show();
                $("#trs").hide();
                $("#speedrank").hide();
            }
            else if(varselected.val()=="telepoints"){
                $("#telerank").show();
                $("#autorank").hide();
                $("#trs").hide();
                $("#speedrank").hide();
            }
             else if(varselected.val()=="rankby"){
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
    </body>
    </html>';