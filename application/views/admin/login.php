<html>
    <title>Login Adm</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <body>


        <div class="w3-margin w3-padding w3-card-4 w3-light-grey">
            <h2 class="w3-center w3-text-blue">Login Admin</h2>
            <form  class="w3-text-blue" method="post" action="<?php echo base_url(); ?>login/autenticar">
                
                <div class="w3-margin w3-padding w3-row w3-section">                     
                    <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user-o"></i></div>
                    <div class="w3-rest">
                        <input class="w3-input w3-border w3-padding-16" placeholder="Usuario" name="usuario" autofocus />
                    </div>
                </div>
               
                <div class="w3-margin w3-padding w3-row w3-section">
                    <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-key"></i></div>
                    <div class="w3-rest">
                        <input type="password"class="w3-input w3-border w3-padding-16" placeholder="Senha" name="senha" />
                    </div>
                </div>                
                
                <button type="submit" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding-16" >Entrar</button>
            </form>     
        </div>   

        <div class="w3-margin-left w3-padding">
            <h4>Copyright © DentalSolident. Todos Direitos Reservados.</h4>
        </div>   


        <h2><?php
            if (isset($erro)) {
                echo $erro;
            }
            ?></h2>

    </body>
</html>