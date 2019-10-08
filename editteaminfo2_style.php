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

#editteaminfo2 #change{
    width:95px;
}
#editteaminfo2 select{
    background: blueviolet;
    color: #fff;
    width: 100px;
    height: 30px;
    margin-left:0%;
    border: none;
    font-size: 15px;
    border-radius: 30px;
    box-shadow: 0 0 3px red;
    outline: none;
    padding: 5px;
}                  

 #editteaminfo2 .cargolvl1{
    margin-left: -190px;
    margin-top: -40px;
    transform: translateY(-120px);
    text-align:center;
}
#editteaminfo2 .cargolvl2{
    margin-left: -190px;
    margin-top: -40px;
    transform: translateY(-260px);
    text-align:center;
}
#editteaminfo2 .cargolvl3{
    margin-left: -190px;
    margin-top: -40px;
    transform: translateY(-400px);
    text-align:center;
}

#editteaminfo2 .hatchlvl1{
    margin-left: 50%;
    margin-top: -40px;
    transform: translateY(-230px);
    text-align:center;
    width: 80px;
}
#editteaminfo2 .hatchlvl2{
    margin-left: 50%;
    margin-top: -40px;
    transform: translateY(-360px);
    text-align:center;
    width: 80px;
}
#editteaminfo2 .hatchlvl3{
    margin-left: 50%;
    margin-top: -180px;
    transform: translateY(-380px);
    text-align:center;
    width: 80px;
}
#editteaminfo2 .hatchship{
    margin-left: 50px;
    margin-top:-110px;
    transform: translateY(40px);
    text-align:center;
}
#editteaminfo2 .cargoship{
    margin-left: -150px;   
    transform: translateY(-150px);
    text-align:center;
}

#editteaminfo2 input[name="cargolvl1"]{
    border-radius: 80px;
    width: 65px;
}
#editteaminfo2 input[name="cargolvl2"]{
    border-radius: 60px;
    width: 65px;
}
#editteaminfo2 input[name="cargolvl3"]{
    border-radius: 60px;
    width: 65px;
}
#editteaminfo2 input[name="hatchlvl1"]{
    width: 35px;
    border-radius: 60px;
}
#editteaminfo2 input[name="hatchlvl2"]{
    border-radius: 60px;
    width: 35px;
}
#editteaminfo2 input[name="hatchlvl3"]{
    border-radius: 60px;
    width: 35px;
}
#editteaminfo2 input[name="hatchship"]{
    border-radius: 60px;
    width: 65px;
}
#editteaminfo2 input[name="cargoship"]{
    border-radius: 60px;
    width: 65px;
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
