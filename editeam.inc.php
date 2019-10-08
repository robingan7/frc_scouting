<?php?>
<style>
        #editteaminfo2{
            top:50%; /*50%*/
    left:50%;
    background:rgb(179, 26, 158);
    position: absolute;
    width:50%;
    height:66%;
    border: 2px solid white;
    overflow-y: scroll;
    margin-left: -35%;/*-500px;*/
    transition:.2s;
    margin-top:-230px;
    text-align:center;
        }
        
   #editteaminfo2 i{
       font-size:35px;
   }   
   
   #editteaminfo2 i:hover{
       color:white;
   }  
   
   #editteaminfo2.active{
       display:none;
   }


   #editteaminfo2 input{
    border: 2px #aaa solid;
    width: 200px;
    height:30px;
    margin-top: 20px;
    background-color: #87CEFA;
    transition: .2s;
    
}

#editteaminfo2 input:focus + i{
            color:#87CEFA;
          }
#editteaminfo2 input:focus{
    background-color: white;
}     

#editteaminfo2 input[type="submit"]{
    background-color: rgb(188, 223, 32);
    border-radius: 20px;
    margin-top:20px;
    width: 80px;
    height: 35px;
    margin-left:-20px;

}

#editteaminfo2 input[type="submit"]:hover{
    background-color:#87CEFA;
}


  </style>
  <script>
    function toggleEditTeam2() {
    document.getElementById("editteaminfo2").classList.toggle("active");

}
    $(document).ready(function{
    $(".toggle-btn").click(function{
        $("#editpage").css("top", "50%");
        //$("#editpage").css("opacity", "1");
        $("#editpage").css("display", "inline");
    });
     });
  </script>
  <div id="editteaminfo2">

                <div class="editteam-btn" onclick="toggleEditTeam2()">
                    <i class="fas fa-times-circle"></i>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <h4>Team Number</h4>
                   
                    <input type="text" name="teamnumber" value='.$row2['teamnumber'].' readonly><br>
                    <a href="mailto:gzt11111@gmail.com?subject=(old number) to (new number)">Click Here to Change Team Number</a>
                    <hr>
                    <h4>Height</h4>
                    <input type="text" name="height" value='.$row2['height'].'>
                    <hr>
                    <h4>Weight</h4>
                    <input type="text" name="weight" value='.$row2['weight'].'>
                    <hr>
                    <h4>Image</h4>
                    <input type="file" name="image">
                    <img src="data:'.$row2['imagetype'].';base64,'.base64_encode($row2["image"]).'"width="200"/>
                    <hr>
                    <h4>Speed</h4>
                    <input type="text" name="speed" value='.$row2['speed'].'>
                    <hr>
                    <h4>Match Number</h4>
                    <input type="text" name="matchnumber" value='.$row2['matchnumber'].'>
                    <hr>
                    <h4>Autopoints</h4>
                    <input type="text" id="autopoints" name="autopoints" value='.$row2['autopoints'].'> 
                    <br>
                    <input type="text" id="change"  name="changevalue" placeholder="Value To Change" >
                    <i onclick="add()" class="fas fa-plus-square"></i>
                    <i onclick="minus()" class="fas fa-minus-square"></i>
                    <script>
                        function add(){
                            var changevalue=document.getElementById("change").value;
                            if(changevalue==""){
                                changevalue=0;
                            }
                            var oldvalue=document.getElementById("autopoints").value;
                            document.getElementById("autopoints").value=parseInt(changevalue)+parseInt(oldvalue);
                        }

                        function minus(){
                            var changevalue=document.getElementById("change").value;
                            if(changevalue==""){
                                changevalue=0;
                            }
                            var oldvalue=document.getElementById("autopoints").value;
                            document.getElementById("autopoints").value=parseInt(oldvalue)-parseInt(changevalue);
                        }
                    </script>
                    <br>
                    <hr>
                    <h4>Tele points</h4>
                    <input type="text" name="teleboxes" value='.$row2['teleboxes'].'>
                    <hr>
                    <h4>Pickup Speed</h4>
                    <input type="text" name="pickupspeed" value='.$row2['pickupspeed'].'>
                    <hr>
                    <h4>Notes</h4>
                    <input type="text" name="notes" value="'.$row2['notes'].'">
                    <hr>
                    <input value="SAVE" type="submit" name="save2">
                    
                </form>
            </div>
            