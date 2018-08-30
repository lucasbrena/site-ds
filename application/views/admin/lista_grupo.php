<?php
$this->template->menuAdmin('admin/grupo');
?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><i class="fa fa-dashboard"></i> Grupos</h5>
    </header>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class=" w3-light-gray">
        <div class="w3-container w3-content w3-margin">       
            <div class="w3-left">
                <a href="<?php echo base_url() ?>produto/inserir_grupo" class="w3-button w3-grey w3-padding-16 w3-large"><i class="fa fa-plus"> Inserir novo Grupo</i></a>
            </div>   
        </div>

        <div class="w3-container w3-margin-bottom w3-hoverable">        
            <div>
                <table id="tabela-produtos" class="w3-table-all w3-card-4">
                    <tr><!-- >header tabela< -->                     
                        <th>Nome</th>
                    </tr>
                                
                    <?php foreach ($grupos as $row): ?>  
                        <tr class="w3-left-align">                            
                            <td><?php echo $row->nome; ?></td> 
                         
                            <td><!-- ****** modal editar / deletar ******* < -->
                                <a class="w3-button w3-hover-blue" href="<?php echo base_url() ?>produto/editar_grupo/<?php echo $row->id; ?>">Editar</a><br>              

                                <!-- > DELETAR < -->
                                <!--
                                <a class="w3-button w3-hover-red" onclick="document.getElementById('id<?php echo $row->id; ?>').style.display = 'block'">Deletar</a><br>
                                -->
                                <div id="id<?php echo $row->id; ?>" class="w3-modal">
                                    <div class="w3-modal-content w3-animate-zoom w3-card-4">
                                        <header class="w3-container">                                         
                                            <p>Deseja realmente deletar curso?</p>
                                        </header>
                                        <div class="w3-container w3-padding-32 w3-margin-bottom">
                                            <button class="w3-button w3-blue" onclick="document.getElementById('id<?php echo $row->id; ?>').style.display = 'none'" 
                                                    class="w3-button w3-display-topright">Cancelar</button> 
                                            <a class="w3-button w3-red" href="<?php echo base_url() ?>produto/deletar_..../<?php echo $row->id; ?>">Deletar</a>
                                        </div>
                                    </div>
                                </div><!-- >DELETAR< -->
                            </td>              
                        </tr>
                    <?php endforeach; ?> 

                </table>
            </div>       
        </div>

    </div>


    






