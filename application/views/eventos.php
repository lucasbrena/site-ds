<?php
$this->template->menu('eventos');
?>

<style> 
    #panel, #panel2, #flip, #flip2 {
        padding: 10px;
        color: #ffffff;
        text-align: justify;
        background-color: #1f9baa;
    }

    #panel, #panel2 {
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
        <a href="<?php echo base_url(); ?>inicio/eventos" target="_blank" class="w3-btn w3-hide-small w3-border-right w3-border-white  w3-text-white w3-xlarge w3-hover-white fa fa-users"> Eventos</a>                       
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
        <h2 class="w3-xxlarge w3-border-bottom">Eventos Dental Solident</h2>
        <div class="w3-border w3-border-white"> 
           
                  
            <h4 class="w3-xlarge">Uma breve descricao dos eventos realizados pela Dental Solident.</h4>
                <p>"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti
                    atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique
                    sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis
                    est et expedita distinctio.</p>
            
            <div id="flip" class="w3-center w3-wide w3-xlarge">Eventos Dental Solident 1 &nbsp <i class="fa fa-caret-down"></i></div>
            <div id="panel"> 
                <div class="w3-row">
                    <div class="w3-third">
                        <img src="<?php echo base_url(); ?>imagens/produtos/1873_09090.jpg" style="width:100%" onclick="onClick(this)" alt="A boy surrounded by beautiful nature">
                        <img src="<?php echo base_url(); ?>imagens/produtos/1873_09090.jpg" style="width:100%" onclick="onClick(this)" alt="What a beautiful scenery this sunset">
                        <img src="<?php echo base_url(); ?>imagens/produtos/1873_09090.jpg" style="width:100%" onclick="onClick(this)" alt="The Beach. Me. Alone. Beautiful">
                    </div>

                    <div class="w3-third">

                        <img src="<?php echo base_url(); ?>imagens/produtos/1873_09090.jpg" style="width:100%" onclick="onClick(this)" alt="Quiet day at the beach. Cold, but beautiful">
                        <img src="<?php echo base_url(); ?>imagens/produtos/1873_09090.jpg" style="width:100%" onclick="onClick(this)" alt="Waiting for the bus in the desert">
                        <img src="<?php echo base_url(); ?>imagens/produtos/1873_09090.jpg" style="width:100%" onclick="onClick(this)" alt="Nature again.. At its finest!">
                    </div>

                    <div class="w3-third">
                        <img src="<?php echo base_url(); ?>imagens/produtos/1873_09090.jpg" style="width:100%" onclick="onClick(this)" alt="Canoeing again">
                        <img src="<?php echo base_url(); ?>imagens/produtos/1873_09090.jpg" style="width:100%" onclick="onClick(this)" alt="A girl, and a train passing">
                        <img src="<?php echo base_url(); ?>imagens/produtos/1873_09090.jpg" style="width:100%" onclick="onClick(this)" alt="What a beautiful day!">
                    </div>
                </div>
            </div>
        </div>        

        
        
        
        <div class="w3-margin-top">
            <h4 class="w3-xlarge">Uma breve descricao dos eventos realizados pela Dental Solident.</h4>
                <p>"At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium.</p>
            <div class="w3-border w3-border-white">
                <div id="flip2" class="w3-center w3-wide w3-xlarge">Eventos Dental Solident 2 &nbsp <i class="fa fa-caret-down"></i></div>
                <div id="panel2"> 
                    <div class="w3-row">
                        <div class="w3-third">
                            <img src="<?php echo base_url(); ?>imagens/produtos/1873_09090.jpg" style="width:100%" onclick="onClick(this)" alt="A boy surrounded by beautiful nature">
                            <img src="<?php echo base_url(); ?>imagens/produtos/1873_09090.jpg" style="width:100%" onclick="onClick(this)" alt="What a beautiful scenery this sunset">
                            <img src="<?php echo base_url(); ?>imagens/produtos/1873_09090.jpg" style="width:100%" onclick="onClick(this)" alt="The Beach. Me. Alone. Beautiful">
                        </div>

                        <div class="w3-third">

                            <img src="<?php echo base_url(); ?>imagens/produtos/1873_09090.jpg" style="width:100%" onclick="onClick(this)" alt="Quiet day at the beach. Cold, but beautiful">
                            <img src="<?php echo base_url(); ?>imagens/produtos/1873_09090.jpg" style="width:100%" onclick="onClick(this)" alt="Waiting for the bus in the desert">
                            <img src="<?php echo base_url(); ?>imagens/produtos/1873_09090.jpg" style="width:100%" onclick="onClick(this)" alt="Nature again.. At its finest!">
                        </div>

                        <div class="w3-third">
                            <img src="<?php echo base_url(); ?>imagens/produtos/1873_09090.jpg" style="width:100%" onclick="onClick(this)" alt="Canoeing again">
                            <img src="<?php echo base_url(); ?>imagens/produtos/1873_09090.jpg" style="width:100%" onclick="onClick(this)" alt="A girl, and a train passing">
                            <img src="<?php echo base_url(); ?>imagens/produtos/1873_09090.jpg" style="width:100%" onclick="onClick(this)" alt="What a beautiful day!">
                        </div>
                    </div>
                </div>           
            </div>
        </div>
    </div>

</div>

<script>
    $(document).ready(function () {
        $("#flip").click(function () {
            $("#panel").slideToggle("slow");
        });
        $("#flip2").click(function () {
            $("#panel2").slideToggle("slow");
        });

    });
</script>

    

	

</div>