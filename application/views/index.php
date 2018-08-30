<?php
$this->template->menu('index');
?>

<div id="inicio" class="w3-container w3-cor-dental w3-padding">
    <div class="w3-center w3-mobile w3-bar" style="color: #1f9baa; margin-top: 60px">
        <a><img class="w3-image w3-hide-small" src="imagens\logo.png" alt="Dental Solident" style="width: 50px"> </a>
        <a href="http://academicosolident.com.br" target="_blank" class="w3-btn w3-round w3-hide-small w3-border-right w3-border-white w3-text-white w3-xlarge w3-hover-white fa fa-graduation-cap"> Acadêmico</a>
        <a href="<?php echo base_url(); ?>inicio/eventos" target="_blank" class="w3-btn w3-round w3-hide-small w3-border-right w3-border-white  w3-text-white w3-xlarge w3-hover-white fa fa-users"> Eventos</a>                       
        <a href="<?php echo base_url(); ?>inicio/catalogo" target="_blank" class="w3-btn w3-round w3-hide-small w3-border-right w3-border-white w3-text-white w3-xlarge w3-hover-white fa fa-usd" onmouseover="mOver(this)" onmouseout="mOut(this)"> Catálogo</a>
        <a href="<?php echo base_url(); ?>inicio/cursos" target="_blank" class="w3-btn w3-round w3-hide-small w3-text-white w3-xlarge w3-hover-white fa fa-certificate" onmouseover="mOver2(this)" onmouseout="mOut2(this)"> Cursos</a>        
    </div>     
    <!-- small screens -->
    <div class="w3-content w3-center">
        <a href="http://academicosolident.com.br" target="_blank" class="w3-btn w3-hide-medium w3-hide-large w3-hide-medium w3-text-white w3-hover-white fa fa-graduation-cap"> Acadêmico</a>
        <a href="<?php echo base_url(); ?>inicio/eventos" target="_blank" class="w3-btn w3-hide-medium w3-hide-large w3-hide-medium w3-text-white w3-hover-white fa fa-gift"> Eventos</a>                     
    </div>    
    <div class="w3-content w3-center">
        <a href="<?php echo base_url(); ?>inicio/catalogo" target="_blank" class="w3-btn w3-hide-medium w3-hide-large w3-hide-medium w3-text-white w3-hover-white fa fa-usd" onmouseover="mOver(this)" onmouseout="mOut(this)"> Catálogo</a>
        <a href="<?php echo base_url(); ?>inicio/cursos" target="_blank" class="w3-btn w3-hide-medium w3-hide-large w3-hide-medium w3-text-white w3-hover-white fa fa-certificate" onmouseover="mOver2(this)" onmouseout="mOut2(this)"> Cursos</a>
    </div>
</div>  
  
<div id="slide-principal">
        
        <?php foreach ($slide as $row) { ?>                          
        <div class="mySlides w3-animate-fading"><img src="<?php echo base_url() . $row->imagens[0]->url_image; ?>"></div>                       
            <?php
        }
        ?> 
    
</div>

<!--
<div id="slide-principal">
     
    <div class="mySlides w3-animate-fading"><img src="<?php echo base_url(); ?>imagens\testeslide3.jpg"></div> 
    <div class="mySlides w3-animate-fading"><img src="<?php echo base_url(); ?>imagens\testeslide4.jpg"></div>
</div>
-->



<div id="slide-secundario" class="w3-black w3-hide-medium w3-hide-small">               
    <div class="mySlides2 w3-animate-right"><img src="<?php echo base_url(); ?>imagens\teste.jpg"></div>
    <div class="mySlides2 w3-animate-right"><img src="<?php echo base_url(); ?>imagens\teste2.jpg"></div>
</div>



<div class="w3-content w3-container w3-padding" id="about">              
    <div class="w3-container">
        <h3 class="w3-text-black" >O que fazemos</h3>
    </div>

    <p align="justify" class="w3-large w3-mobile"> Fundada em 1987, a Dental Solident atua na distribuição de insumos, equipamentos e instrumentais 
        odontológicos para todas as especialidades. São mais de 10 mil itens que garantem um portfólio completo na odontologia: Dentistica, Endodontia,
        Cirurgia, Ortodontia e muito mais. Toda a operação da empresa está centralizada em São Paulo, com profissionais treinados e capacitados em todas as áreas. São mais de 1.300 m² voltados 
        para o mundo odontológico. Os principais segmentos atendidos são: Órgãos públicos, clínicas odontológicas de todos os portes, Estudantes de 
        odontologia, Sindicatos e Associações.</p>
    <div class="w3-row">
        <div class="w3-col m6 w3-center w3-padding-large"> 
            <a href="http://academicosolident.com.br/" target="_blank"><button class="w3-btn  w3-round-xxlarge w3-cor-dental w3-text-white w3-large w3-opacity-min w3-hover-opacity-off"><i class="fa fa-graduation-cap w3-margin-right"></i>Academico Solident</button></a><br>
            <a href="http://academicosolident.com.br/" target="_blank"><img class="w3-margin-top w3-round-xlarge w3-image w3-opacity-min w3-hover-opacity-off" src="imagens\academico_index.png" alt="Academico Solident"></a>
        </div> 

        <!-- Hide this text on small devices -->
        <div align="justify" class="w3-col m6 w3-padding-large">
            <p class="w3-large">A Academico DentalSolident tem a missão de fornercer equipamentos
                da melhor qualidade para estudantes de graduação em Odontologio. Visand..... </p>
        </div>
    </div>


    <p class="w3-large w3-center w3-padding-16" id="marcas"><h3 class="w3-center"></h3></p>
<h2 class="w3-text-black">Nossas Marcas</h2>
<div class="w3-mobile w3-row w3-center">
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\0.png" alt="angelus"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\1.png" alt="3m"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\2.png" alt="voco"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\50.png" alt="maquira"></div>
    
</div>  
<div class="w3-mobile w3-row w3-center"> 
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\4.png" alt="angelus"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\5.png" alt="microdont"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\6.png" alt="fami"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\7.png" alt="sdi"></div>
</div> 
<div class="w3-mobile w3-row w3-center">
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\8.png" alt="kg"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\9.png" alt="fgm"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\10.png" alt="colgate"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\11.png" alt="kodak"></div>
</div> 
<div class="w3-mobile w3-row w3-center">
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\12.png" alt="dentsply"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\13.png" alt="kavo"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\14.png" alt="ultradent"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\15.png" alt="kulzer"></div>
</div> 
<div class="w3-mobile w3-row w3-center">
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\16.png" alt="fava"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\17.png" alt="cristofoli"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\18.png" alt="zermack"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image"src="imagens\marcas\3.png" alt="orthometric"></div>    
</div> 
<div class="w3-mobile w3-row w3-center">
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\19.png" alt="dabi"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\21.png" alt="coltene"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\22.png" alt="wilcos"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\23.png" alt="indusbello"></div>
</div> 
<div class="w3-mobile w3-row w3-center">
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\25.png" alt="classico"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\26.png" alt="johnson"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\27.png" alt="hu-friedy"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\28.png" alt="a&G"></div>
</div> 
<div class="w3-mobile w3-row w3-center">        
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\29.png" alt="sswhite"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\30.png" alt="tdv"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\31.png" alt="vdw"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\32.png" alt="prisma"></div>
</div> 
<div class="w3-mobile w3-row w3-center">        
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\33.png" alt="polidental"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\34.png" alt="dfl"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\35.png" alt="biodinamica"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\36.png" alt="quinelato"></div>
</div>
<div class="w3-mobile w3-row w3-center">        
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\37.png" alt="barash"></div>        
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\39.png" alt="baush"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\40.png" alt="bioart"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\41.png" alt="dentflex"></div>        
</div>
<div class="w3-mobile w3-row w3-center">        
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\42.png" alt="injex"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\43.png" alt="kondentech"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\44.png" alt="kota"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\45.png" alt="kondortck"></div>        
</div>
<div class="w3-mobile w3-row w3-center w3-border-bottom">        
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\46.png" alt="essecedental"></div>
    <div class="w3-quarter w3-center w3-hover-opacity"><img class="w3-image" src="imagens\marcas\47.jpg" alt="bioservice"></div>       
</div>

</div>

<div class="w3-mobile w3-row w3-center w3-padding w3-opacity-min w3-hover-opacity-off w3-cor-dental">
    <div class="w3-quarter w3-section" >
        <span class="w3-xxlarge" style="color: white;"><b>50+</b></span><br>
        <span class="w3-large" style="color: white;"><b>Parceiros</b></span><br>        
    </div>

    <div class="w3-quarter w3-section">
        <span class="w3-xxlarge" style="color: white;"><b>5+</b></span><br>
        <span class="w3-large" style="color: white;"><b>Orgãos Publicos</b></span><br>         
    </div>

    <div class="w3-quarter w3-section">
        <span class="w3-xxlarge" style="color: white;"><b>89+</b></span><br>
        <span class="w3-large" style="color: white;"><b>Clientes</b></span><br>

    </div>
    <div class="w3-quarter w3-section">
        <span class="w3-xxlarge" style="color: white;"><b>14+</b></span><br>
        <span class="w3-large" style="color: white;"><b>Universidades</b></span><br>

    </div>
</div>

<!-- Second Parallax Image with Portfolio Text -->
<div class="bgimg-2 w3-display-container  w3-opacity-min w3-hide-small">
    <div class="w3-display-middle">
        <span class="w3-xxlarge w3-text-white w3-wide"></span>
    </div>
</div>


<div class="w3-content w3-container w3-padding-64" id="clientes">
    <h2 class="w3-text-black">Nossos Clientes</h2>
    <div class="w3-container w3-padding-64 w3-border-bottom">
        <h3 class="w3-text-black">Orgãos Públicos</h3>
        <div class="w3-mobile w3-row w3-center">        
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\orgaos\logo_exercito.png" alt="exercito brasileiro"></div>
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\orgaos\marinha.png" alt="marinha do brasil"></div>
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\orgaos\ocex.jpg" alt="ocex"></div>
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\orgaos\santos.png" alt="prefeitura de santos"></div>        
        </div> 
        <div class="w3-mobile w3-row w3-center w3-padding-top">
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\orgaos\logo_prefeitura.jpg" alt="prefeitura-sp"></div>
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\orgaos\sesc.png" alt="sesc"></div>
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\orgaos\sest.png" alt="sest"></div>         
        </div>
        <div class="w3-padding-32">
            <h3 class="w3-text-black">Sindicatos</h3>  
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\orgaos\logo_prefeitura.jpg" alt="sindicatos"></div>
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\orgaos\logo_prefeitura.jpg" alt="sindicatos"></div>
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\orgaos\logo_prefeitura.jpg" alt="sindicatos"></div>                  
        </div>        
    </div>


    <div class="w3-container w3-padding-64">
        <h2 class="w3-text-black">Universidades</h2>
        <div class="w3-row-padding w3-padding-small">
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\universidades\usp.png" alt="usp"></div>
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\universidades\uspr.png" alt="uspr"></div>
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\universidades\unesp.png" alt="unesp"></div>
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\universidades\fmu.png" alt="universidade metodista"></div>
             
        </div>
        <div class="w3-row-padding w3-padding-small ">
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\universidades\meto.png" alt="universidade metodista"></div>
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\universidades\ung.png" alt="universidade guarulhos ung"></div>
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\universidades\unib.png" alt="universidade bandeirantes unib"></div>
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\universidades\unicid.png" alt="unicid"></div>   
        </div>
        <div class="w3-row-padding w3-padding-small">
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\universidades\unicsul.png" alt="unicsul"></div>
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\universidades\uninove.png" alt="universidade nove de julho uninove"></div>
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\universidades\unip.png" alt="unip"></div>
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\universidades\unisa.png" alt="unisa"></div>   
        </div>
        <div class="w3-row-padding w3-padding-small">
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\universidades\unitri.png" alt="unitri"></div>            
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\universidades\brasil.png" alt="brasil"></div> 
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\universidades\anha.png" alt="universidade anhanguera"></div>
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\universidades\umc.png" alt="UMC"></div> 
            
        </div>
        <div class="w3-row-padding w3-margin">
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\universidades\pita.png" alt="pitagoras"></div>
            <div class="w3-quarter w3-center"><img class="w3-image w3-hover-opacity" src="imagens\universidades\unigran.png" alt="unigran"></div>          
        </div>

    </div>


    <!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
    <div class="w3-row-padding w3-center"></div>

    <div class="w3-row-padding w3-center w3-section"></div>
</div>

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display = 'none'">
    <span class="w3-button w3-large w3-black w3-display-topright" title="Close Modal Image"><i class="fa fa-remove"></i></span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
        <img id="img01" class="w3-image">
        <p id="caption" class="w3-opacity w3-large"></p>
    </div>
</div>

<!-- Third Parallax Image with Portfolio Text -->
<div class="bgimg-3 w3-display-container w3-hide-small">
    <!--<div class="w3-display-middle">        
        <span class="w3-bar-item w3-xxxlarge w3-text-white w3-wide"><b>Dental Solident</b></span>
    </div>-->
</div>

<!-- Container (Contact Section) -->
<div class="w3-content w3-container w3-padding-64" id="contact">
    <h3 class="w3-center"><b>Fale Conosco</b></h3>
    <p class="w3-center">Dental Solident <br> Rua Turiassú,681 Perdizes,<br> São Paulo, CEP 05005-001</p>

    <div class="w3-row w3-padding-32 w3-section">
        <div class="w3-col m4 w3-container">
            <!-- Add Google Maps -->
            <div id="googleMap" class="w3-round-large w3-greyscale w3-border" style="width:100%;height:460px; margin-top: 40px;"></div>
        </div>
        <div class="w3-col m8 w3-panel">
            <div class="w3-large w3-margin-bottom">
                <i class="fa fa-map-marker fa-fw w3-hover-text-red w3-xlarge w3-margin-right"></i> São Paulo, SP <br>
                <i class="fa fa-phone fa-fw w3-hover-text-green w3-xlarge w3-margin-right"></i> Telefone: (11) 3673-4484 <br>
                <i class="fa fa-envelope fa-fw w3-hover-text-blue w3-xlarge w3-margin-right"></i> Email: <a href="mailto:contato@dentalsolident.com.br" class="w3-hover-text-blue">contato@dentalsolident.com.br</a><br>
            </div>
            <p>Entre em contato conosco.</p>
            <form action="email" method="post" target="_blank">
                <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                    <div class="w3-row-padding w3-padding">
                        <input class="w3-input w3-border w3-round" type="text" placeholder="Digite seu nome" required name="Name">
                    </div>
                     <div class="w3-row-padding w3-padding">
                        <input class="w3-input w3-border w3-round" type="text" placeholder="Digite seu CPF" required name="cpf" maxlength="14" onkeydown="javascript: fMasc( this, mCPF );">
                    </div>
                    <div class="w3-row-padding w3-padding w3-round">
                        <input class="w3-input w3-border w3-round" type="text" placeholder="Digite seu e-mail" required name="Email">
                    </div>
                    <div class="w3-row-padding w3-padding w3-round">                        
                        <input id="telefone" class="w3-input w3-border w3-round" type="text" placeholder="Digite seu telefone" required name="Telefone" maxlength="15" onkeydown="javascript: fMasc( this, mtel );">
                    </div>

                    <div class="w3-row-padding w3-padding">
                        <textarea style="resize: none;" name="message" class="w3-input w3-border w3-round" required placeholder="Mensagem"  rows="3"></textarea>
                    </div>
                </div>
                <button class="w3-btn w3-cor-dental w3-right w3-section w3-opacity w3-hover-opacity-off w3-border w3-border-white w3-round" type="submit">
                    <i class="fa fa-paper-plane w3-text-white"></i> <span class="w3-text-white">Enviar Mensagem</span>
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=&callback=myMap">//se remover nao funciona</script>

<script>
//slide principal 
   var slideIndex = 0;
   carousel();

   function carousel() {
       var i;
       var x = document.getElementsByClassName("mySlides");
       for (i = 0; i < x.length; i++) {
           x[i].style.display = "none";
       }
       slideIndex++;
       if (slideIndex > x.length) {
           slideIndex = 1
       }
       x[slideIndex - 1].style.display = "block";
       setTimeout(carousel, 6000);
   }//slide principal 

    
//slide pagamentos
var myIndex = 0;
carousel2();

function carousel2() {
    var i;
    var x = document.getElementsByClassName("mySlides2");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel2, 4000);    
}
//slide formas de pagamentos
</script> 
    
