<?php
$this->template->menu('cursos');
$i = 0;
?>

<style>
    body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    .w3-third img{margin-bottom: -6px; opacity: 0.8; cursor: pointer}
    .w3-third img:hover{opacity: 1}           

    .panel, .flip {
        color: #ffffff;       
        text-align: center;
        background-color: #1f9baa;
        border: solid 1px #ffffff;
    }

    .panel {
        display: none;
        background-color: #ffffff;
    }

</style>

<body>

    <div class="w3-container w3-cor-dental w3-padding">
        <div class="w3-center w3-mobile w3-bar" style="color: #1f9baa; margin-top: 70px">
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



    <div class="w3-mobile w3-center w3-padding-64" style="margin-top: 50px;">

        <?php foreach ($curso as $row) { ?>

            <div class=w3-margin w3-card-4 style="width:auto; margin-top: 50px;">      

                <img class="w3-mobile w3-padding w3-border" src="<?php echo base_url() . $row->imagens[0]->url_image; ?>">

            </div>

            <?php
            $i++;
        }
        ?>   

        <div class="w3-content w3-container w3-padding-64"  >
            <button onclick="document.getElementById('id01').style.display = 'block'" class="w3-opacity-min w3-hover-opacity-off w3-cor-dental w3-wide w3-border w3-border-white w3-block w3-center-align" style="cursor: pointer;">
                <p class="w3-text-white w3-large">Realizar cadastro no curso &nbsp <i class="fa fa-caret-down"></i></p></button>

            <div id="id01" class="w3-modal w3-animate-opacity">
                <div class="w3-modal-content" >

                    <div class="w3-row w3-border-bottom w3-padding">
                        <span onclick="document.getElementById('id01').style.display = 'none'" class="w3-button w3-light-grey w3-xlarge w3-display-topright">&times;</span>
                        <p class="w3-xlarge">Preencha seus dados abaixo para realizar o cadastro.</p>

                        <form action="email" method="post">
                            <div class="w3-row-padding" style="margin:0 -16px 8px -16px">
                                <div class="w3-row-padding w3-padding">
                                    <input class="w3-input w3-border" type="text" placeholder="Nome" required name="Name" autofocus="">
                                </div>
                                <div class="w3-row-padding w3-padding">
                                    <input class="w3-input w3-border" type="text" placeholder="E-mail" required name="Email">
                                </div>
                                <div class="w3-row-padding w3-padding">
                                    <input id="telefone" class="w3-input w3-border" type="text" placeholder="Telefone" required name="Telefone">
                                </div>

                                <div class="w3-row-padding w3-padding">
                                    <textarea style="resize: none;" name="message" placeholder="Mensagem" class="w3-input w3-border" required></textarea>
                                </div>
                            </div>
                            <button onclick="document.getElementById('id01').style.display = 'none'" class="w3-btn w3-border w3-border-white w3-cor-dental w3-opacity-min w3-hover-opacity-off w3-right w3-section" type="submit">
                                <i class="fa fa-paper-plane w3-text-white"></i><span class="w3-text-white">Enviar Mensagem</span>
                            </button>
                        </form>
                    </div> 

                </div>
            </div>

        </div>


        <div class="w3-content w3-container w3-padding">
            <h2 class="w3-center">Verifique abaixo os cursos realizado na Dental Solident</h2>
            <p>You can use any HTML element to open the accordion content. We prefer a button
                with a w3-block class, because it spans the entire width of its parent element.</p>
           <!--
            <?php foreach ($curso_realizado as $row) {
                ?>
                                <div class="flip"><p class="w3-large w3-wide" style="cursor: pointer;"><?php echo $row->nome; ?>&nbsp <i class="fa fa-caret-down"></i></p><?php echo $row->data; ?></div>
                                <div class="panel">
                <?php 
                foreach ($row->imagens as $img) {
                    ?>
                    
                                            <img class="w3-third w3-opacity-min w3-hover-opacity-off" src="<?php echo base_url() . $img->url_image; ?>" style="cursor:zoom-in" onclick="document.getElementById('<?php echo $img->id; ?>').style.display = 'block'">
                    
                                            <div id="<?php echo $img->id; ?>" class="w3-modal" onclick="this.style.display = 'none'">
                    
                                                <div class="w3-modal-content w3-animate-zoom">
                                                    <img src="<?php echo base_url() . $img->url_image; ?>" style="width:100%">
                                                </div>
                    
                                            </div>  
                    
                    <?php
                }
                ?>
                                </div>
                
                
                
                <?php
                $i++;
            }
            ?>
            -->
            
            <?php foreach ($curso_realizado as $row) { ?>
                <button onclick="myFunction1('<?php echo $row->id; ?>')" class="w3-cor-dental w3-wide w3-border w3-border-white w3-block w3-center-align w3-opacity-min w3-hover-opacity-off" style="cursor: pointer;">
                    <p class="w3-text-white w3-large" ><?php echo $row->nome; ?></p><p class="w3-text-white"><?php echo $row->data; ?></p></button>
                <div class="w3-container w3-animate-zoom">  
                    <div id="<?php echo $row->id; ?>" class="w3-content w3-hide" onclick="w3_close()">
                        <div class="w3-row">                

                            <?php
                            foreach ($row->imagens as $img) {
                                ?>

                                <img class="w3-grayscale-min w3-third w3-opacity-min w3-hover-opacity-off" src="<?php echo base_url() . $img->url_image; ?>"  style="cursor:zoom-in"
                                     onclick="document.getElementById('<?php echo $img->id; ?>').style.display = 'block'">     

                                <div id="<?php echo $img->id; ?>" class="w3-modal" onclick="this.style.display = 'none'">

                                    <div class="w3-modal-content w3-animate-zoom">
                                        <img src="<?php echo base_url() . $img->url_image; ?>" style="width:100%">
                                    </div>

                                </div>

                                <?php
                            }
                            ?>                                      

                        </div> 
                    </div>
                </div>
                <?php
                $i++;
            }
            ?>
            
        </div>
        <div class="w3-container w3-padding-64"></div>


        <script>
            function myFunction1(id) {
                var x = document.getElementById(id);
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                }
            }

            // Change style of navbar on scroll
            window.onscroll = function () {
                myFunction()
            };
            function myFunction() {
                var navbar = document.getElementById("myNavbar");
                if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                    navbar.className = "w3-bar" + " w3-card-4" + " w3-animate-top" + " w3-white" + " w3-padding";
                } else {
                    navbar.className = navbar.className.replace(" w3-card-4 w3-animate-top w3-light-gray", "");
                }
            }

            // Used to toggle the menu on small screens when clicking on the menu button
            function toggleFunction() {
                var x = document.getElementById("navDemo");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                } else {
                    x.className = x.className.replace(" w3-show", "");
                }
            }
        </script>

        <script>
            $(document).ready(function () {
                $(".flip").click(function () {
                    $(".panel").slideToggle("slow");
                });
            });
        </script>


    </div>
</div>
</div>

