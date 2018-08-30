<?php
$this->template->menuAdmin('admin/editar_produto');
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
    <header class="w3-container" style="padding-top:22px">
        <h5><i class="fa fa-dashboard"></i> Editar Produto</h5>
    </header>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <div class=" w3-light-gray  w3-margin">
        <div class="w3-card-4 w3-container w3-margin w3-padding">
            <form enctype="multipart/form-data"  class="w3-text-blue" method="post" action="<?php echo base_url(); ?>produto/edita_produto">
                <input type="hidden" value="<?php echo $categoria['id'] ?>" id="hidden-categoria" />
                <input type="hidden" value="<?php echo $grupo['id'] ?>" id="hidden-grupo" />
                <label for="categoria">Categoria</label>
                <select id="categoria" name="categoria" class="w3-select w3-border w3-margin-bottom">                   
                </select>

                <label for="grupo">Grupo</label>
                <select id="grupo" name="grupo" class="w3-select w3-border">
                </select>

                <div class=" w3-section">
                    <label>Codigo</label>
                    <div class="w3-rest">
                        <input class="w3-border w3-input" value="<?php echo $produto['codigo'] ?>" placeholder="Editar codigo" name="codigo" disabled/>                   
                    </div>
                </div>

                <div class=" w3-section"> 
                    <label>Nome Produto</label>
                    <div class="w3-rest">                         
                        <input class="w3-border w3-input" value="<?php echo $produto['nome'] ?>" placeholder="Editar nome" name="nome" />
                    </div>
                </div>                 

                <div class=" w3-section">
                    <label>Preço Produto</label>
                    <div class="w3-rest">
                        <input class="w3-border w3-input" value="<?php echo $produto['preco'] ?>" placeholder="Editar preco" name="preco" />
                    </div>
                </div> 

                <div class=" w3-section"> 
                    <label>Descrição do Produto</label>
                    <div class="w3-rest"> 
                        <textarea  rows="4" cols="182" name="descricao" value="<?php echo $produto['descricao'] ?>"><?php echo $produto['descricao'] ?></textarea>                        
                    </div>
                </div> 

                <label>Status</label>               
                <select value="<?php echo $produto['status'] ?>" name="status" class="w3-select w3-border w3-margin-bottom" required>
                    <option value="" disabled selected hidden><?php echo $produto['status'] ?></option>
                    <option value="0">Inativo</option>
                    <option value="1">Ativo</option>
                    <option value="2">Site</option>
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
                        <input class="w3-input" type="file" multiple  name="upl_files[]" size="20" />
                    </div>
                </div>
                <input type="hidden" name='id' value='<?php echo $produto['id'] ?>' />
                <button type="submit" class="w3-button w3-hover-blue" >Salvar Edição</button>

            </form> 
        </div>
    </div>



    <script type="text/javascript">
        $(document).ready(function () {
            var categoriaInicial = $('#hidden-categoria').val();
            var grupoInicial = $('#hidden-grupo').val();

            buscaCategoria(categoriaInicial);

            buscaGrupo(categoriaInicial, grupoInicial);

            $('#categoria').change(function () {
                var id_categoria = $(this).val();

                buscaGrupo(id_categoria);
            });

        });

        function buscaCategoria(categoriaInicial) {
            $.ajax({
                url: "../buscar_categoria",
                method: "POST",
                success: function (data) {
                    console.log(data);
                    if (data.length == 0) {
                        $('#categoria').empty();
                        $('#categoria').append("<option disabled selected value='0'>Nenhuma categoria encontrada</option>");
                    } else {
                        $('#categoria').empty();
                        $('#categoria').append("<option disabled selected value='0'>Selecione...</option>");
                        $.each(data, function (key, val) {
                            if (categoriaInicial == val.id) {
                                $('#categoria').append("<option selected value='" + val.id + "'>" + val.nome.toString().toUpperCase() + "</option>");
                            } else {
                                $('#categoria').append("<option value='" + val.id + "'>" + val.nome.toString().toUpperCase() + "</option>");
                            }

                        });
                    }
                }
            });
        }

        function buscaGrupo(id_categoria, inicial) {
            $.ajax({
                url: "../buscar_grupo",
                method: "POST",
                data: {
                    id_categoria: id_categoria
                },
                success: function (data) {
                    console.log(data);
                    if (data.length == 0) {
                        $('#grupo').empty();
                        $('#grupo').append("<option disabled selected value='0'>Nenhum grupo encontrado</option>");
                    } else {
                        $('#grupo').empty();
                        $('#grupo').append("<option disabled selected value='0'>Selecione...</option>");
                        if (inicial == null) {
                            $.each(data, function (key, val) {
                                $('#grupo').append("<option value='" + val.id + "'>" + val.nome.toString().toUpperCase() + "</option>");

                            });
                        } else {
                            $.each(data, function (key, val) {
                                if (inicial == val.id) {
                                    $('#grupo').append("<option selected value='" + val.id + "'>" + val.nome.toString().toUpperCase() + "</option>");
                                } else {
                                    $('#grupo').append("<option value='" + val.id + "'>" + val.nome.toString().toUpperCase() + "</option>");
                                }
                            });
                        }

                    }


                }
            });
        }
    </script>




