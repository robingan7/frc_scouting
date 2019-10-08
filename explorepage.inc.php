<script>
$(document).ready(function () {

load_data_search();
load_rank("","","");
load_match("5805","nothing","nothing");
file_rank("totalcargo","","");
function load_data_search(query) {
    $.ajax({
        url: "search.php",
        method: "POST",
        data: { query: query },
        success: function (data) {
            $('#display_rank').html(data);
        }
    });
}

function load_rank(con1,con2,con3) {
    $.ajax({
        url: "loadrank.php",
        method: "POST",
        data: { con1: con1,
        con2: con2,
        con3: con3 },
        success: function (data) {
            $('#display_rank').html(data);
        }
    });
}
function load_match(con1,con2,con3) {
    $.ajax({
        url: "load_match.php",
        method: "POST",
        data: { con1: con1,
        con2: con2,
        con3: con3 },
        success: function (data) {
            $('#display_match_rank').html(data);
        }
    });
}
$('#teamnumber').change(function(){
    var con1=$('#teamnumber').val();
    var con2=$('#region').val();
    var con3=$('#matchnumber').val();
    load_match(con1,con2,con3);
});

$('#matchnumber').change(function(){
    var con1=$('#teamnumber').val();
    var con2=$('#region').val();
    var con3=$('#matchnumber').val();
    load_match(con1,con2,con3);
});

$('#region').change(function(){
    var con1=$('#teamnumber').val();
    var con2=$('#region').val();
    var con3=$('#matchnumber').val();
    load_match(con1,con2,con3);
});

$('#condition1').change(function(){
    var con1=$('#condition1').val();
    var con2=$('#condition2').val();
    var con3=$('#condition3').val();
    load_rank(con1,con2,con3);
});

$('#condition2').change(function(){
    var con1=$('#condition1').val();
    var con2=$('#condition2').val();
    var con3=$('#condition3').val();
    load_rank(con1,con2,con3);
});

$('#condition3').change(function(){
    var con1=$('#condition1').val();
    var con2=$('#condition2').val();
    var con3=$('#condition3').val();
    load_rank(con1,con2,con3);
});

$('.search-txt-ex').keyup(function () {
    var search = $(this).val();
    if (search != '') {
        load_data_search(search);
    }
    else {
        load_data_search();
    }
});

function file_rank(con1,con2,con3) {
    $.ajax({
        url: "headerchanger.php",
        method: "POST",
        data: { con1: con1,
        con2: con2,
        con3: con3}
    });
}

$('#download_team').click(function(){
    var con1=$('#condition1').val();
    var con2=$('#condition2').val();
    var con3=$('#condition3').val();
    file_rank(con1,con2,con3);
});
});
</script>
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
                <input class="search-txt-ex" type="text" name="searchValue" placeholder="Team Number">
                <a class="search-btn" href="#">
                    <i class="fas fa-search"></i>
                </a>
            </form>
            <div id="download_team">
            <i name="export" class="fas fa-file-download"></i>
            </div>  
            </div>
            <div class="rank">
                <select id="condition1">
                    <option value="">Condition1</option>
                    <option value="autopoints">Total Autonmous Points</option>
                    <option value="autohatch">Hatch in Autonmous</option>
                    <option value="autocargo">Cargo in Autonmous</option>
                    <option value="totalcargo">Total Cargo</option>
                    <option value="totalhatch">Total Hatch</option>
                    <option value="cargolvl1">Cargo Level1</option>
                    <option value="cargolvl2">Cargo Level2</option>
                    <option value="cargolvl3">Cargo Level3</option>
                    <option value="hatchlvl1">Hatch Level1</option>
                    <option value="hatchlvl2">Hatch Level2</option>
                    <option value="hatchlvl3">Hatch Level3</option>
                    <option value="cargoship">Cargo Cargoship</option>
                    <option value="hatchship">Hatch Cargoship</option>          
                </select>
                 <select id="condition2">
                    <option value="">Condition2</option>
                    <option value="autopoints">Total Autonmous Points</option>
                    <option value="autohatch">Hatch in Autonmous</option>
                    <option value="autocargo">Cargo in Autonmous</option>
                    <option value="totalcargo">Total Cargo</option>
                    <option value="totalhatch">Total Hatch</option>
                    <option value="cargolvl1">Cargo Level1</option>
                    <option value="cargolvl2">Cargo Level2</option>
                    <option value="cargolvl3">Cargo Level3</option>
                    <option value="hatchlvl1">Hatch Level1</option>
                    <option value="hatchlvl2">Hatch Level2</option>
                    <option value="hatchlvl3">Hatch Level3</option>
                    <option value="cargoship">Cargo Cargoship</option>
                    <option value="hatchship">Hatch Cargoship</option>          
                </select>
                 <select id="condition3">
                    <option value="">Condition3</option>
                    <option value="autopoints">Total Autonmous Points</option>
                    <option value="autohatch">Hatch in Autonmous</option>
                    <option value="autocargo">Cargo in Autonmous</option>
                    <option value="totalcargo">Total Cargo</option>
                    <option value="totalhatch">Total Hatch</option>
                    <option value="cargolvl1">Cargo Level1</option>
                    <option value="cargolvl2">Cargo Level2</option>
                    <option value="cargolvl3">Cargo Level3</option>
                    <option value="hatchlvl1">Hatch Level1</option>
                    <option value="hatchlvl2">Hatch Level2</option>
                    <option value="hatchlvl3">Hatch Level3</option>
                    <option value="cargoship">Cargo Cargoship</option>
                    <option value="hatchship">Hatch Cargoship</option>          
                </select>
            </div>
            <div id="display_rank"></div>
            </div>
        <style>
            #display_rank{
                overflow-x:scroll;
                margin-left: 80px;
            }
            #display_match_rank{
                margin-left:180px;
                width: 60%;
                overflow-x:scroll;
            }
             .lock{
                position: absolute;
                left:0em;
                text-align: center;
                border: 1px solid #2f3640;
                background-color: rgb(149, 223, 106);
                width: 80px;
                background-color: rgb(111, 164, 233);
            }
            .lock2{
                width:60px;
                position: absolute;
                left: 0em;
            }
            .lock2:nth-child(2){
                margin-left:60px;
            }
             .lock2:nth-child(3){
                margin-left:120px;
            }
            .lock2:nth-child(odd){
                background-color: rgb(111, 164, 233);
            }
             .lock2:nth-child(even){
                background-color: #fff;
            }
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
            <div class="rank2">
                <select id="teamnumber">
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
                <select id="region">
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
                <select id="matchnumber">
                    <option value="nothing">Match Number</option>
                    <?php
                    require_once 'lgs.inc.php';
                    $query = "SELECT * FROM matchperformance;";
                    $result = mysqli_query($conn, $query);
                    $already=array("Robin Gan");
                    if(mysqli_num_rows($result) > 0){
                        while($rows = mysqli_fetch_array($result)){
                        $teamnum=$rows['matchnumber'];
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

            <div id="display_match_rank"></div>
        </div>

        <div class="bluepage">
            <iframe src="https://www.thebluealliance.com/teams" height="150" scrolling="yes">
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
        </div>    