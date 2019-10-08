<?php
if(isset($POST['save'])){
    $conn = mysqli_connect('localhost','root','','frcscouting');
    if(!$conn){
        die("Connection fail".mysquli_connect_error());
    }
    
}