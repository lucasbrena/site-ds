<div class="w3-container">
    <h5>Painel de Controle</h5>
</div>
<div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="<?php echo base_url() ?>painel/" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home"></i> Início</a>
    <a href="<?php echo base_url() ?>produto/lista_produto" class="w3-bar-item w3-button w3-padding w3-hover-text-red"><i class="fa fa-list fa-fw"></i>  Gerenciar Produtos</a>
    <a href="<?php echo base_url() ?>produto/mostra_categoria" class="w3-bar-item w3-button w3-padding w3-hover-text-red"><i class="fa fa-bullseye fa-fw"></i>  Gerenciar Categorias</a>
    <a href="<?php echo base_url() ?>produto/mostra_grupo" class="w3-bar-item w3-button w3-padding w3-hover-text-red"><i class="fa fa-diamond fa-fw"></i>  Gerenciar Grupos</a>
    <div class="w3-border-top w3-margin-top">
        <a href="<?php echo base_url() ?>curso/lista_curso" class="w3-bar-item w3-button w3-padding w3-hover-text-blue"><i class="fa fa-list fa-fw"></i> Gerenciar Cursos</a>
        <a href="<?php echo base_url() ?>base" class="w3-bar-item w3-button w3-padding"><i class="fa fa-gg-circle"></i>  Sincronizar com DC-Info</a> 
   </div>
    <div class="w3-border-top w3-margin-top">
        <a href="<?php echo base_url() ?>slide/lista_slide" class="w3-bar-item w3-button w3-padding w3-hover-text-green"><i class="fa fa-list fa-fw"></i> Gerenciar Slides</a>
        
   </div>
    
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
