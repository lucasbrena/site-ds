<?php
$this->template->menuAdmin('admin/produto');
?>


<div class="w3-main" style="margin-left:300px;margin-top:43px;">

   
    <header class="w3-container" style="padding-top:22px">
        <h5><i class="fa fa-dashboard"></i> Produtos</h5>
    </header>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class=" w3-light-gray">
        <div class="w3-container w3-content w3-margin">       
            <div class="w3-left">
                <a href="<?php echo base_url() ?>produto/inserir_produto" class="w3-button w3-red w3-padding-16 w3-large"><i class="fa fa-plus"> Inserir novo Produto</i></a>  
            </div>   
        </div>

        <div class="w3-container w3-margin-bottom w3-hoverable">        
            
                <table id="tabela-produtos" class="w3-table-all w3-card-4">
                    <tr>
                        <th>Codigo</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Descrição</th>  
                        <th>Status</th> 
                        <th>Grupo</th>                        
                        <th>Categoria</th>
                        <th>Imagem</th>
                    </tr>

                                 
                    <?php foreach ($produtos as $row): ?>  
                        <tr class="w3-left-align">
                            <td><?php echo $row->codigo; ?></td>
                            <td><?php echo $row->nome; ?></td> 
                            <td><?php echo $row->preco; ?></td>
                            <td><?php echo $row->descricao; ?></td>
                            <td><?php echo $row->status; ?></td>                                                        
                          <?php
                          foreach ($row->grupo as $group) {
                          ?>
                            <td><?php echo $group->nome; ?></td>
                                                
                          <?php 
                          }
                          ?> 
                      
                            <?php
                          foreach ($row->categoria as $cat) {
                          ?>
                            <td><?php echo $cat->nome; ?></td>
                                                
                          <?php 
                          }
                          ?>
                            
                            
                            <td>
                                <div class="w3-container">
                                    <button onclick="document.getElementById('<?php echo $row->codigo; ?>').style.display = 'block'" class="w3-button fa fa-image w3-xlarge w3-hover-blue"></button>

                                    <div id="<?php echo $row->codigo; ?>" class="w3-modal ">
                                        <div class="w3-modal-content">
                                            <div class="w3-container">  

                                                <span onclick="document.getElementById('<?php echo $row->codigo; ?>').style.display = 'none'" class="w3-button w3-display-topright">&times;</span>

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
                                <a class="w3-button w3-hover-blue" href="<?php echo base_url() ?>produto/editar_produto/<?php echo $row->id; ?>">Editar</a><br>             

                                <!-- > modal DELETAR  < -->
                                <!--
                                <a class="w3-button w3-hover-red" onclick="document.getElementById('id<?php echo $row->codigo; ?>').style.display = 'block'">Deletar</a><br>
                                -->
                                <div id="id<?php echo $row->codigo; ?>" class="w3-modal">
                                    <div class="w3-modal-content w3-animate-zoom w3-card-4">
                                        <header class="w3-container">                                         
                                            <p>Deseja realmente deletar curso?</p>
                                        </header>
                                        <div class="w3-container w3-padding-32 w3-margin-bottom">
                                            <button class="w3-button w3-blue" onclick="document.getElementById('id<?php echo $row->codigo; ?>').style.display = 'none'" 
                                                    class="w3-button w3-display-topright">Cancelar</button>
                                                    
                                            <a class="w3-button w3-red" href="<?php echo base_url() ?>curso/deletar_/<?php echo $row->codigo; ?>">Deletar</a>
                                        </div>
                                    </div>
                                </div>
                            </td>              
                        </tr>
                    <?php endforeach; ?> 

                </table>
                   
        </div>

    </div>


    






