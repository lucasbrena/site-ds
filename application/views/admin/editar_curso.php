<?php
$this->template->menuAdmin('admin/editar_curso');
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<script>
    $(function () {
        $("#datepicker").datepicker({
            dateFormat: "dd-mm-yy"
        });
    });
</script>


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
        <h5><i class="fa fa-dashboard"></i> Editar Curso</h5>
    </header>


    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class=" w3-light-gray  w3-margin">
        <div class="w3-card-4 w3-container w3-margin w3-padding">
            <form enctype="multipart/form-data"  class="w3-text-blue" method="post" action="<?php echo base_url(); ?>curso/edita_curso">

               
                <div class=" w3-section">  
                    <label>Nome Curso</label>
                    <div class="w3-rest">
                        <input class="w3-border w3-input" value="<?php echo $curso['nome'] ?>" placeholder="Editar nome" name="nome" />
                    </div>
                </div>

                <div class=" w3-section"> 
                    <label>Valor curso</label>
                    <div class="w3-rest">
                        <input class="w3-border w3-input" value="<?php echo $curso['preco'] ?>" placeholder="Editar preco" name="preco" />
                    </div>
                </div>

                 <div class=" w3-section"> 
                     <label>Data Curso</label>
                    <div class="w3-rest">
                        <input id="datepicker" name="data" value="<?php echo $curso['data'] ?>">                       
                    </div>
                </div>
                
                 <div class=" w3-section">
                     <label>Professor curso</label>
                    <div class="w3-rest">
                        <input class="w3-border w3-input" value="<?php echo $curso['professor'] ?>" placeholder="Editar descricao" name="professor" />
                    </div>
                </div>
                
                <div class=" w3-section"> 
                    <label>Descrição curso</label>
                    <div class="w3-rest">
                        <textarea  rows="4" cols="182" name="descricao" value="<?php echo $curso['descricao'] ?>"><?php echo $curso['descricao'] ?></textarea>                        
                    </div>
                </div>
                
                <label>Status</label>               
                <select value="<?php echo $curso['status'] ?>" name="status" class="w3-select w3-border w3-margin-bottom" required>
                    <option value="" disabled selected hidden><?php echo $curso['status'] ?></option>
                    <option value="0">A realizar</option>
                    <option value="1">Realizado</option>
                </select>
                
                
                 <?php     
              
                foreach ($imagens as $img) {
                ?>                
                    <img class="w3-padding" src="<?php echo base_url() . $img->url_image; ?>" style="width: 100px"> 
                    
                <?php
                }
                ?>
                
                <div class=" w3-section">                                    
                    <div class="w3-rest">
                        <input class="w3-border w3-input" type="file" multiple name="upl_files[]" size="20" />
                    </div>
                </div>
                
                <input type="hidden" name='id' value='<?php echo $curso['id'] ?>' />
                <button type="submit" class="w3-button w3-hover-blue" >Salvar Edição</button>

            </form> 
        </div>
    </div>







