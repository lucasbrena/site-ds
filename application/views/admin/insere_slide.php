<?php
$this->template->menuAdmin('admin/insere_curso');
?>    

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

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


    <header class="w3-container" style="padding-top:22px">
        <h5><i class="fa fa-dashboard"></i> Adicionar Slide</h5>
    </header>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <div class=" w3-light-gray  w3-margin">
        <div class="w3-card-4 w3-container w3-margin w3-padding">


            <form  class="w3-text-blue" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>slide/insere_slide">

                <div class=" w3-section"> 
                    <label>Nome Slide</label>
                    <div class="w3-rest">
                        <input class="w3-border w3-input" placeholder="Insira o nome do slide" name="nome" autofocus="" />
                    </div>
                </div>

                <div class=" w3-section">                                    
                    <div class="w3-rest">
                        <input type="file" name="upl_files[]" multiple size="20" />
                    </div>        
                </div>    

                <button type="submit" class="w3-button w3-hover-blue">Salvar</button>
            </form>  


        </div>

    </div>

