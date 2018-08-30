<?php
$this->template->menu('duvidas');
?>
<style> 
#panel, #panel2, #panel3, #panel4, #panel5, #panel6, #flip, #flip2, #flip3, #flip4, #flip5, #flip6 {
    padding: 10px;
    color: #ffffff;
    text-align: justify;
    background-color: #1f9baa;
   }

#panel, #panel2, #panel3, #panel4, #panel5, #panel6 {
    background-color: #ffffff;
    padding: 10px;
    display: none;
    color: #000000;
}

</style>

<div class="w3-container w3-cor-dental w3-padding">
    <div class="w3-center w3-mobile w3-bar" style="color: #1f9baa; margin-top: 60px">
        <a><img class="w3-image w3-hide-small" src="../../imagens/logo.png" alt="Dental Solident" style="width: 50px"> </a>
        <a href="http://academicosolident.com.br" target="_blank" class="w3-btn w3-hide-small w3-border-right w3-border-white w3-text-white w3-xlarge w3-hover-white fa fa-graduation-cap"> Acadêmico</a>
        <a href="http://academicosolident.com.br/fidelidade/" target="_blank" class="w3-btn w3-hide-small w3-border-right w3-border-white  w3-text-white w3-xlarge w3-hover-white fa fa-gift"> Programa Fidelidade</a>                       
        <a href="<?php echo base_url(); ?>inicio/catalogo" target="_blank" class="w3-btn w3-hide-small w3-border-right w3-border-white w3-text-white w3-xlarge w3-hover-white fa fa-usd" onmouseover="mOver(this)" onmouseout="mOut(this)"> Catálogo</a>
        <a href="<?php echo base_url(); ?>inicio/cursos" target="_blank" class="w3-btn w3-hide-small w3-text-white w3-xlarge w3-hover-white fa fa-certificate" onmouseover="mOver2(this)" onmouseout="mOut2(this)"> Cursos</a>
       
    </div> 
    <!-- small screens -->
    <div class="w3-content w3-center">
        <a href="http://academicosolident.com.br" target="_blank" class="w3-btn w3-hide-medium w3-hide-large w3-hide-medium w3-text-white w3-hover-white fa fa-graduation-cap"> Acadêmico</a>
        <a href="http://academicosolident.com.br/fidelidade/" target="_blank" class="w3-btn w3-hide-medium w3-hide-large w3-hide-medium w3-text-white w3-hover-white fa fa-gift"> Programa Fidelidade</a>                     
    </div>    
    <div class="w3-content w3-center">
        <a href="<?php echo base_url(); ?>inicio/catalogo" target="_blank" class="w3-btn w3-hide-medium w3-hide-large w3-hide-medium w3-text-white w3-hover-white fa fa-usd" onmouseover="mOver(this)" onmouseout="mOut(this)"> Catálogo</a>
        <a href="<?php echo base_url(); ?>inicio/cursos" target="_blank" class="w3-btn w3-hide-medium w3-hide-large w3-hide-medium w3-text-white w3-hover-white fa fa-certificate" onmouseover="mOver2(this)" onmouseout="mOut2(this)"> Cursos</a>
    </div>
</div>


<div class="w3-container w3-padding-64 w3-margin-top">
    <div class="w3-content w3-large">
        <h2 class="" style="color: #1f9baa">Dúvidas mais Frequentes</h2>
        <div class="w3-border w3-border-white">
            <h4 style="color: #1f9baa" class="w3-xlarge">Cadastro</h4>
            <div id="flip">Já sou cliente Dental Solident &nbsp <i class="fa fa-caret-down"></i></div>
            <div id="panel"><p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p></div>
        </div>        
        
        <div class="w3-border w3-border-white">
            <div id="flip2">Já sou cliente Dental Solident &nbsp <i class="fa fa-caret-down"></i></div>
            <div id="panel2">
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
            </div>
        </div>
        
        <div class="w3-margin-top">
        <h4 style="color: #1f9baa">Processo de Compra</h4>
        <div class="w3-border w3-border-white">
            <div id="flip3">Já sou cliente Dental Solident &nbsp <i class="fa fa-caret-down"></i></div>
            <div id="panel3">
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
            </div>
        </div>
        </div>     
               
        <div class="w3-margin-top">
        <h4 style="color: #1f9baa">Produtos</h4>
        <div class="w3-border w3-border-white">
            <div id="flip4">Já sou cliente Dental Solident &nbsp <i class="fa fa-caret-down"></i></div>
            <div id="panel4">
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
            </div>            
        </div>
        <div class="w3-border w3-border-white">
            <div id="flip5">Já sou cliente Dental Solident &nbsp <i class="fa fa-caret-down"></i></div>
            <div id="panel5">
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
            </div>            
        </div>
        <div class="w3-border w3-border-white">
            <div id="flip6">Já sou cliente Dental Solident &nbsp <i class="fa fa-caret-down"></i></div>
            <div id="panel6">
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
            </div>            
        </div>
        </div>
        
        
    </div>


    
</div>

<script> 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");        
    });
     $("#flip2").click(function(){
        $("#panel2").slideToggle("slow");        
    });
    $("#flip3").click(function(){
        $("#panel3").slideToggle("slow");        
    });
    $("#flip4").click(function(){
        $("#panel4").slideToggle("slow");        
    });
    $("#flip5").click(function(){
        $("#panel5").slideToggle("slow");        
    });
     $("#flip6").click(function(){
        $("#panel6").slideToggle("slow");        
    });
}); 
</script>

</div>