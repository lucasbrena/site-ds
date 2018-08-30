           <!-- ><h2><?php
            /*if (isset($erro)) {
                echo $erro;
            }
            if (isset($sucesso)) {
                echo $sucesso;
            }*/
       ?></h2>< -->
       
<?php
$this->template->menuAdmin('admin/deletar_produto');
?>   
            
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><i class="fa fa-dashboard"></i> Deletar Produto</h5>
    </header>


    
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


 <div class=" w3-light-gray  w3-margin">
  <div class="w3-card-4 w3-container w3-margin w3-padding">
 
            <h2 class="w3-center ">Deletar Produto</h2>
            <form  class="w3-text-blue" method="post" action="<?php echo base_url(); ?>produto/deletar_produto">
                              
                <div class=" w3-section">                                    
                    <div class="w3-rest">
                        <input class="w3-border w3-input" placeholder="Insira codigo do produto" name="codigo" autofocus="" />
                    </div>
                </div>
                  
                              
                <button type="submit" class="w3-button w3-hover-red">Deletar</button>
            </form>     
   </div>  
    </div>  
  




