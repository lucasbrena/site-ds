<h2><?php
    if (isset($erro)) {
        echo $erro;
    }
    if (isset($sucesso)) {
        echo $sucesso;
    }
    ?></h2>


<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


<div class="w3-container w3-quarter">

    <div class= "w3-light-grey">
        <h2 class="w3-center ">Deletar Curso</h2>
        <form  class="w3-text-blue" method="post" action="<?php echo base_url(); ?>curso/deletar_curso">

            <div class=" w3-section">                                    
                <div class="w3-rest">
                    <input class="w3-border " placeholder="Insira codigo do curso" name="codigo" autofocus="" />
                </div>
            </div>
            <button type="submit" >Deletar</button>
        </form>     
    </div>  
   

</div>



