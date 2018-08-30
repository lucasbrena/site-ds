<?php
$this->template->menuAdmin('admin/insere_categoria');
?>         

<div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <div class="w3-text"> 
        <?php
        if (isset($erro)) {
            echo $erro;
        }
        if (isset($sucesso)) {
            echo $sucesso;
        }
        ?>
    </div>
    
    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><i class="fa fa-dashboard"></i> Adicionar Categoria</h5>
    </header>
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
    <div class=" w3-light-gray  w3-margin">
        <div class="w3-card-4 w3-container w3-margin w3-padding">

            
            <form class="w3-text-blue" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>produto/insere_categoria"> 
                        
                
                <div class=" w3-section">                                    
                    <div class="w3-rest">
                        <input class="w3-border w3-input" placeholder="Insira o nome da Categoria" name="nome" />
                    </div>
                </div>
              
                <button type="submit" class="w3-button w3-hover-blue">Salvar</button>
           
            </form>   
        </div>
            
    </div>
  
</div>



