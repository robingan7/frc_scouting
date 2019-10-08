<?php
?>
<html>

       

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