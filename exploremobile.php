<?php
//error_reporting(E_ERROR | E_PARSE);
?>
<html>

        <head>
    <title>HOME</title>
    <link rel="shortcut icon" href="require.png" type="image/png">
    <meta charset="UTF-8">
    <meta name="viewpoint" content="width=device-width, intial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="indexStyleMobile.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <style>
        img[alt="www.000webhost.com"] {
            display: none;
        }
         body{
             background:rgb(223, 122, 6);
         }
    </style>
</head>
<body>
     <div id="backtohome">
    <a href="mobileversion.php"><i class="fas fa-home"></i></a>
    </div>
    <style>
    #backtohome a{
    margin-left: 85%;
    }

    #backtohome a:hover{
    color: white;
    }
</style>
<script src="indexScriptMobile.js"></script>
<?php require 'explorepage.inc.php'; ?>
<style>
 #display_rank{
    overflow-x:scroll;
    margin-left: 160px;
}
#display_match_rank{
    margin-left:390px;
    width: 62%;
    overflow-x:scroll;
}
.lock{
    position: absolute;
    left:0em;
    text-align: center;
    border: 1px solid #2f3640;
    background-color: rgb(149, 223, 106);
    width: 160px;
    background-color: rgb(111, 164, 233);
}
.lock2{
    font-size: 35px;
    width:130px;
    position: absolute;
    left: 0em;
    
}
.lock2:nth-child(2){
    margin-left:130px;
}
    .lock2:nth-child(3){
    margin-left:260px;
}
</style>    
</body>
</html>        
