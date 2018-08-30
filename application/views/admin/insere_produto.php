<?php
$this->template->menuAdmin('admin/insere_produto');
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
        <h5><i class="fa fa-dashboard"></i> Adicionar produto</h5>
    </header>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <div class=" w3-light-gray  w3-margin">
        <div class="w3-card-4 w3-container w3-margin w3-padding">


            <form  class="w3-text-blue" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>produto/insere_produto">
                <label for="categoria">Categoria</label>
                <select id="categoria" name="categoria" class="w3-select w3-border w3-margin-bottom">
                    <option disabled selected value="0">Selecione...</option>
                    <?php foreach ($categorias as $row){ ?>                                                   
                        <option value="<?php echo $row->id; ?>"><?php echo $row->nome; ?></option>                    
                    <?php } ?>
                </select>
                <label for="grupo">Grupo</label>
                <select id="grupo" name="grupo" class="w3-select w3-border">
                    <option disabled selected value="0">Selecione...</option>
                </select>              

                <div class=" w3-section">
                    <label>Codigo Produto</label>
                    <div class="w3-rest">
                        <input class="w3-border w3-input" placeholder="Insira o codigo do Produto" name="codigo" autofocus=""/>
                    </div>
                </div> 
                <div class=" w3-section"> 
                     <label>Nome Produto</label>
                    <div class="w3-rest">
                        <input class="w3-border w3-input" placeholder="Insira o nome do Produto" name="nome" />
                    </div>
                </div>

                <div class=" w3-section">
                     <label>Preço Produto</label>
                    <div class="w3-rest">
                        <input class="w3-border w3-input" placeholder="Insira o preco do Produto" name="preco" />
                    </div>        
                </div>   

                <div class=" w3-section">
                     <label>Descrição Produto</label>
                    <div class="w3-rest">
                        <textarea  rows="4" cols="182" name="descricao" placeholder="Insira a descricao do Produto"></textarea>                       
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

    <script type="text/javascript">
        $(document).ready(function () {

            $('#categoria').change(function () {
                var id_categoria = $(this).val();

                $.ajax({
                    url: "buscar_grupo",
                    method: "POST",
                    data: {
                        id_categoria: id_categoria
                    },
                    success: function (data) {
                        if (data.length == 0) {
                            $('#grupo').empty();
                            $('#grupo').append("<option disabled selected value='0'>Nenhum grupo encontrado</option>");
                        } else {
                            $('#grupo').empty();
                            $('#grupo').append("<option disabled selected value='0'>Selecione...</option>");
                            $.each(data, function (key, val) {
                                $('#grupo').append("<option value='" + val.id + "'>" + val.nome.toString().toUpperCase() + "</option>")

                            }); 
                        }


                    }
                });
            });

        });
    </script>



