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
                    <h4>Region</h4>
                    <select name="region">
                        <?php require 'region_select.php';?>
                    </select>
                    <hr>
                    <h4>Match Number</h4>
                    <h5>Pay Attention on the Infomation Board</h5>
                    <select name="matchnumber">
                        <?php require 'matchnum_select.php';?>
                    </select>
                    <hr>
                    <h4>Alliance</h4>
                    <h5>Pay Attention on the Infomation Board</h5>
                    <select name="alliance">
                        <option value="null"></option>
                        <option value="Blue">Blue</option>
                        <option value="Red">Red</option>
                    </select>
                    <hr>
                    <h4>Autonomous</h4>
                    <h5>Hatch</h5>
                    <select name="autohatch">
                        <option value=0>0</option>
                        <option value=2>1</option>
                        <option value=4>2</option>
                        <option value=6>3</option>
                    </select>
                    <h5>Cargo</h5>
                    <select name="autocargo">
                        <option value=0>0</option>
                        <option value=3>1</option>
                        <option value=6>2</option>
                        <option value=9>3</option>
                    </select>
                    <hr>
                    <img src="media/rocket.png" width="300" height="500">
                    <div class="cargolvl1">
                        <input type="text" id="cargolvl1" name="cargolvl1" value=0>
                        <br>
                        <i onclick="addc1();" class="fas fa-plus-square"></i>
                        <i onclick="minusc1()" class="fas fa-minus-square"></i>
                        
                    </div>
                    <div class="cargolvl2">
                        <input type="text" id="cargolvl2" name="cargolvl2" value=0>
                        <br>
                        <i onclick="addc2();" class="fas fa-plus-square"></i>
                        <i onclick="minusc2()" class="fas fa-minus-square"></i>
                    </div>
                    <div class="cargolvl3">
                        <input type="text" id="cargolvl3" name="cargolvl3" value=0>
                        <br>
                        <i onclick="addc3();" class="fas fa-plus-square"></i>
                        <i onclick="minusc3()" class="fas fa-minus-square"></i>
                    </div>

                    <div class="hatchlvl1">
                        <input type="text" id="hatchlvl1" name="hatchlvl1" value=0>
                        <br>
                        <i onclick="addh1();" class="fas fa-plus-square"></i>
                        <i onclick="minush1()" class="fas fa-minus-square"></i>
                    </div>
                    <div class="hatchlvl2">
                        <input type="text" id="hatchlvl2" name="hatchlvl2" value=0>
                        <br>
                        <i onclick="addh2();" class="fas fa-plus-square"></i>
                        <i onclick="minush2()" class="fas fa-minus-square"></i>
                    </div>
                    <div class="hatchlvl3">
                        <input type="text" id="hatchlvl3" name="hatchlvl3" value=0>
                        <br>
                        <i onclick="addh3();" class="fas fa-plus-square"></i>
                        <i onclick="minush3()" class="fas fa-minus-square"></i>
                    </div>
                    <img src="media/ship.png" width="300" height="180">
                    <div class="hatchship">
                        <input type="text" id="hatchship" name="hatchship" value=0>
                        <br>
                        <i onclick="addsh();" class="fas fa-plus-square"></i>
                        <i onclick="minussh()" class="fas fa-minus-square"></i>
                    </div>
                    <div class="cargoship">
                        <input type="text" id="cargoship" name="cargoship" value=0>
                        <br>
                        <i onclick="addsc();" class="fas fa-plus-square"></i>
                        <i onclick="minussc()" class="fas fa-minus-square"></i>
                    </div>
                    <script>
                        function addc1(){
                            var oldvalue=document.getElementById("cargolvl1").value;
                            document.getElementById("cargolvl1").value=1+parseInt(oldvalue);
                        }

                        function minusc1(){
                            var oldvalue=document.getElementById("cargolvl1").value;
                            document.getElementById("cargolvl1").value=parseInt(oldvalue)-1;
                        }
                         function addc2(){
                            var oldvalue=document.getElementById("cargolvl2").value;
                            document.getElementById("cargolvl2").value=1+parseInt(oldvalue);
                        }

                        function minusc2(){
                            var oldvalue=document.getElementById("cargolvl2").value;
                            document.getElementById("cargolvl2").value=parseInt(oldvalue)-1;
                        }
                         function addc3(){
                            var oldvalue=document.getElementById("cargolvl3").value;
                            document.getElementById("cargolvl3").value=1+parseInt(oldvalue);
                        }

                        function minusc3(){
                            var oldvalue=document.getElementById("cargolvl3").value;
                            document.getElementById("cargolvl3").value=parseInt(oldvalue)-1;
                        }

                        function addh1(){
                            var oldvalue=document.getElementById("hatchlvl1").value;
                            document.getElementById("hatchlvl1").value=1+parseInt(oldvalue);
                        }

                        function minush1(){
                            var oldvalue=document.getElementById("hatchlvl1").value;
                            document.getElementById("hatchlvl1").value=parseInt(oldvalue)-1;
                        }
                         function addh2(){
                            var oldvalue=document.getElementById("hatchlvl2").value;
                            document.getElementById("hatchlvl2").value=1+parseInt(oldvalue);
                        }

                        function minush2(){
                            var oldvalue=document.getElementById("hatchlvl2").value;
                            document.getElementById("hatchlvl2").value=parseInt(oldvalue)-1;
                        }
                         function addh3(){
                            var oldvalue=document.getElementById("hatchlvl3").value;
                            document.getElementById("hatchlvl3").value=1+parseInt(oldvalue);
                        }

                        function minush3(){
                            var oldvalue=document.getElementById("hatchlvl3").value;
                            document.getElementById("hatchlvl3").value=parseInt(oldvalue)-1;
                        }
                        function addsh(){
                            var oldvalue=document.getElementById("hatchship").value;
                            document.getElementById("hatchship").value=1+parseInt(oldvalue);
                        }

                        function minussh(){
                            var oldvalue=document.getElementById("hatchship").value;
                            document.getElementById("hatchship").value=parseInt(oldvalue)-1;
                        }

                        function addsc(){
                            var oldvalue=document.getElementById("cargoship").value;
                            document.getElementById("cargoship").value=1+parseInt(oldvalue);
                        }

                        function minussc(){
                            var oldvalue=document.getElementById("cargoship").value;
                            document.getElementById("cargoship").value=parseInt(oldvalue)-1;
                        }
                    </script>
                    
                    <hr>
                    <h4>Climb Plaform</h4>
                    <select name="platformlvl">
                        <?php require 'platlvl_select.php';?>
                    </select>
                    <br>
                    <hr>
                     <h4>Notes</h4>
                    <textarea name="notes" rows="5" cols="40"></textarea>
                    <hr>
                    <input value="ADD" type="submit" name="save4l">
                    
                </form>
            </div>
            