<?php
$this->template->menuAdmin('admin/editar_categoria');
?>

<!-- !PAGE CONTENT! -->
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
        <h5><i class="fa fa-dashboard"></i> Editar Categoria</h5>
    </header>


    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class=" w3-light-gray  w3-margin">
        <div class="w3-card-4 w3-container w3-margin w3-padding">
            <form enctype="multipart/form-data"  class="w3-text-blue" method="post" action="<?php echo base_url(); ?>produto/edita_categoria">

                <div class=" w3-section">  
                    <label>Nome da Categoria</label>
                    <div class="w3-rest">
                        <input class="w3-border w3-input" value="<?php echo $categoria['nome'] ?>" placeholder="Editar nome" name="nome" />
                    </div>
                </div>

                <input type="hidden" name='id' value='<?php echo $categoria['id'] ?>' />
                <button type="submit" class="w3-button w3-hover-blue" >Salvar Edição</button>

            </form> 
        </div>
    </div>







