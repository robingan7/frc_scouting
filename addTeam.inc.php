<?php require 'editteaminfo2_style.php';
?>
  <div id="editteaminfo2">

                <div class="editteam-btn" onclick="toggleEditTeam2()">
                    <i class="fas fa-times-circle"></i>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <h4>Team Number</h4>
                   
                    <input type="text" name="teamnumber" value=""><br>
                    
                    <hr>
                    <h4>Height</h4>
                    <input type="text" name="height" value="">
                    <hr>
                    <h4>Weight</h4>
                    <input type="text" name="weight" value="">
                    <hr>
                    <h4>Image</h4>
                    <input type="file" name="image">
                    <img src="" width="200"/>
                    <hr>
                    <h4>Can do autonomous?</h4>
                    <select name="autonomous">
                        <?php require 'auto_select.php';?>
                    </select>
                    <hr>
                    <h4>Speed</h4>
                    <select name="speed">
                        <?php require 'speed_select.php';?>
                    </select>
                    <hr>
                    <h4>Pickup Speed</h4>
                    <select name="pickupspeed">
                        <?php require 'speed_select.php';?>
                    </select>
                    <hr>
                     <h4>Climb Platform Level</h4>
                    <select name="platformlevel">
                        <?php require 'platlvl_select.php';?>
                    </select>
                    <hr>
                     <h4>Cargo Level</h4>
                    <select name="cargolevel">
                        <?php require 'lvl_select.php';?>
                    </select>
                    <hr>
                    <h4>Hatch Level</h4>
                    <select name="hatchlevel">
                        <?php require 'lvl_select.php';?>
                    </select>
                    <br>
                    <hr>
                    <h4>Notes</h4>
                    <textarea name="notes" rows="5" cols="40"></textarea>
                    <hr>
                     <h4>Notes</h4>
                    <textarea name="notes" rows="5" cols="40"></textarea>
                    <hr>
                    <input value="ADD" type="submit" name="save3">
                    
                </form>
            </div>
            