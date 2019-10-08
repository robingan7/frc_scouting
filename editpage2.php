<head>
<script src="indexScript.js"></script>
<link rel="stylesheet" href="indexStyle.css">
</head>
<div id="editpass">
        <div class="close" onclick="toggleEdit()">
            <i class="fas fa-times-circle"></i>
        </div>

        <input id="txt" type="text" name="editpass" placeholder="Enter Edit Code">
        <input id="editbutton" type="submit" name="editpass-submit" onclick="editPass()" placeholder="SUBMIT">

    </div>
<div id="editpage2">
        
        <div id="iconbutton" onclick="toggleInside2()">
            <i class="fas fa-times-circle"></i>
        </div>
        
        <form method="post">
        <input type="submit" name="addTeam" value="Add Team">
        <input type="submit" name="addMatch" value="Add New Match">
         <?php
                require 'lgs.inc.php';
                $sql4="SELECT * FROM teams ";
                $result = mysqli_query($conn,$sql4);
                while($rows= mysqli_fetch_assoc($result)){
                ?>
                
                <input type="submit" name="editteam" value="<?php echo $rows['teamnumber']?>">
                 
                <?php } 
                ?>

                <?php
                require_once 'lgs.inc.php';
                $sql4="SELECT * FROM matchperformance ";
                $result = mysqli_query($conn,$sql4);
                while($rows= mysqli_fetch_assoc($result)){
                ?>
                
                <input type="submit" name="editmatch" value="<?php echo $rows['teamnumber']?>/<?php echo $rows['region']?>/<?php echo $rows['matchnumber']?>">
                 
                <?php } 
                ?> 
                <style>
                    #editpage2 input[type="submit"]{
                        background-color: rgb(188, 223, 32);
                        border-radius: 20px;
                        margin-top:20px;
                        width: 80px;
                        height: 35px;
                        margin-left:-20px;

                    }

                    #editpage2 input[type="submit"]{
                        margin-left:5px;
                    }

                    #editpage2 input[type="submit"]:hover{
                        background-color:#87CEFA;
                    }

                    #editpage2 input[name="addTeam"]{
                        margin-top:-35px;
                        margin-left:235px;
                        background-color:#87CEFA;
                        position:fixed;
                    }

                    #editpage2 input[name="addTeam"]:hover{
                        background-color:rgb(188, 223, 32);
                    }

                    #editpage2 input[name="addMatch"]{
                        margin-top:-35px;
                        margin-left:55px;
                        width:150px;
                        background-color:#87CEFA;
                        position:fixed;
                        font-size: 15px;
                    }

                    #editpage2 input[name="addMatch"]:hover{
                        background-color:rgb(188, 223, 32);
                    }
                </style>
        </form>  
</div>