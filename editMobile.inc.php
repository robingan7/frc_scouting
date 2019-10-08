<html>
    <head>
        <link rel="stylesheet" href="indexStyleMobile.css">
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
-->
</head>
    <!-- Compiled and minified JavaScript -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>-->
<link rel="stylesheet" href="indexStyleMobile.css">   

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    (document).ready(function () {
    $("#iconbutton_ed").click(function () {
            $("#editpage2").css("top", "-100%");
            //location.reload();
            //alert("SAVED!!!");
        });
     });    
</script>  
<style>
body{
    background-color:rgb(179, 26, 158);
}
</style>
<div id="editpage2">
        
        <div id="iconbutton" onclick="toggleInside2()">
            <i class="fas fa-times-circle"></i>
        </div>
        
        <form method="post">
        <input id="addMatch" type="submit" name="addMatch" value="Add New Match">
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