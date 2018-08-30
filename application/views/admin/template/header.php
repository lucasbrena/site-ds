<!DOCTYPE html>
<html>
    <title>Painel Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
        .mySlides {display:none}
    </style>
    
    <body class="w3-light-grey">

       
        <div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
            <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
            <span class="w3-bar-item w3-right">DentalSolident</span>
        </div>
 
      
        <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
            <div class="w3-container w3-row">                
                
                <div class="w3-container w3-padding"><i style="font-size:24px" class="fa">&#xf2be;</i><span> Welcome, <?php echo $usuario?></span><br></div>
               
                <div class="w3-display-top">
                    <a href="<?php echo base_url()?>login/logout" class="w3-bar-item w3-button"><i class="fa fa-power-off"> Logout</i></a>
                 </div>
                </div>
            <hr>
            