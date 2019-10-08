 <?php
 /*
 require 'lgs.inc.php';

$teamnumber = 5805;

$sql = "SELECT * FROM teams WHERE teamnumber=?;";
    
    $stmt = mysqli_stmt_init($conn);
  
$sql6="SELECT * FROM teams WHERE teamnumber=$teamnumber;";
$result4 = mysqli_query($conn,$sql6);
$row2 = mysqli_fetch_assoc($result4);
 echo $row2["image"];
?>
<html>
<img src="data:<?php $row2['imagetype']?>;base64,<?php base64_encode($row2["image"])?> " width=200/>
 
<select value="2">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
</select>    
</html>*/
?>
 <input type="text" id="cargolvl1" name="cargolvl1" value=0>
                        <br>
                        <button onclick="addc1()" class="fas fa-plus-square">add</button>
                        <i onclick="minusc1()" class="fas fa-minus-square"></i>
                        <script>
                         function addc1(){
                            var oldvalue=document.getElementById("cargolvl1").value;
                            document.getElementById("cargolvl1").value=1+parseInt(oldvalue);
                        }

                        function minusc1(){
                            var changevalue=1;
                            if(changevalue==""){
                                changevalue=0;
                            }
                            var oldvalue=document.getElementById("cargolvl1").value;
                            document.getElementById("autopoints").value=parseInt(oldvalue)-parseInt(changevalue);
                        }
                    </script>
 