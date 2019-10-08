<script>
     $(document).ready(function () {
       
        $("#iconbutton_ed").click(function () {
            $("#editpage").css("top", "-100%");
        });
        });
</script>        
   
<div id="editpage">
        
        <div id="iconbutton_ed">
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
                
        </form>  
        
    </div>
</html>    