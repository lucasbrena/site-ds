<?php
$this->template->menuAdmin('admin/lista_slideshow');
?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


<div class="w3-main" style="margin-left:300px;margin-top:43px;">

    
    <header class="w3-container" style="padding-top:22px">
        <h5><i class="fa fa-dashboard"></i> Slides</h5>
    </header>

    <div class="w3-light-gray">
        <div class="w3-container w3-content w3-margin">       
            <div class="w3-left">
                <a href="<?php echo base_url() ?>slide/inserir_slide" class="w3-button w3-green w3-padding-16 w3-large"><i class="fa fa-plus"> Inserir novo slide</i></a>
            </div>           
        </div>  
         
        <div class="w3-container w3-margin-bottom w3-hoverable">
               
                <table class="w3-table-all w3-card-4">
                    <tr>
                        <th>Nome</th>                        
                        <th>status</th>
                        <th>Imagem</th> 
                    </tr> 
                    
                    
                    <?php foreach ($slide as $row): ?>  
                        <tr class="w3-left-align">                            
                            <td><?php echo $row->nome; ?></td>                             
                            <td><?php echo $row->status; ?></td>

                            <td>
                                <div class="w3-container">
                                    <button onclick="document.getElementById('<?php echo $row->id; ?>').style.display = 'block'" class="w3-button fa fa-image w3-xlarge w3-hover-blue"></button>

                                    <div id="<?php echo $row->id; ?>" class="w3-modal ">
                                        <div class="w3-modal-content">
                                            <div class="w3-container">  

                                                <span onclick="document.getElementById('<?php echo $row->id; ?>').style.display = 'none'" class="w3-button w3-display-topright">&times;</span>

                                                <?php
                                                foreach ($row->imagens as $img) {
                                                    ?>

                                                    <img class="w3-margin w3-opacity-min w3-hover-opacity-off" src="<?php echo base_url() . $img->url_image; ?>" style="width:40%">                                           

                                                    <?php
                                                }
                                                ?>  
                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>


                            <td>
                                <a class="w3-button w3-hover-blue" href="<?php echo base_url() ?>slide/editar_slide/<?php echo $row->id; ?>">Editar</a><br>              

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
                                            <a class="w3-button w3-red" href="<?php echo base_url() ?>slide/deletar_slide/<?php echo $row->id; ?>">Deletar</a>
                                        </div>
                                    </div>
                                </div>
                            </td>              
                        </tr>
                    <?php endforeach; ?> 

                </table>
            </div>       
       

    </div>










