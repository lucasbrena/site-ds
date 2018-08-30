<?php
//$this->template->menu('catalogo');
$i = 0;
?>
<script src="<?php echo base_url() ?>js/searchCatalogo.js"></script>

<body id="home" class="w3-content" style="max-width:1500px">
    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
        <div class="w3-container w3-display-container w3-padding-16">
            <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
            <div class="w3-container w3-center">        
                <a class="w3-xxlarge" href="http://dentalsolident.com.br">
                    <i class="fa fa-home w3-text-dental"> <p class="w3-large">Inicio</p></i>
                </a>
                <img class="w3-image" src="<?php echo base_url() ?>imagens\logo.png" alt="Dental Solident"></a>
            </div> 
        </div>
        
        <div id="categorias" class="w3-padding-32 w3-large w3-text-grey w3-border-top" style="font-weight:bold">
            <a id="categoria-todos" class="w3-button w3-block w3-white w3-left-align">
                <span class="w3-text-dental">Todos</span>
            </a>
            <?php foreach ($categorias as $categoria) { ?> 
                <a idcategoria="<?php echo $categoria->id ?>" class="w3-button w3-block w3-white w3-left-align categoria">
                    <span><?php echo $categoria->nome ?></span> <i class="fa fa-caret-right arrow"></i>
                </a>
                <div class="w3-bar-block w3-hide w3-padding-large w3-medium grupos">
                    <?php foreach ($categoria->grupos as $grupo) { ?> 
                        <a idgrupo="<?php echo $grupo->id ?>" href="#" class="w3-bar-item w3-button grupo"><?php echo $grupo->nome ?></a>
                    <?php } ?>
                </div>
            <?php } ?>

        </div>
    </nav>

    <!-- Top menu on small screens -->
    <header class="w3-bar w3-top w3-hide-large w3-cor-dental w3-text-white w3-xlarge">
        <div class="w3-bar-item w3-padding-24 w3-wide">Solident</div>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
    </header>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

    <div class="w3-main" style="margin-left:250px">
        <!-- Push down content on small screens -->
        <div class="w3-hide-large" style="margin-top:83px"></div>
        <!-- Top header -->
        <header class="w3-container w3-xlarge">
            <p id="navigation" class="w3-left">Todos</p>
            <div class="w3-right">
                <div class="w3-row w3-section">
                    <div class="w3-col w3-center" style="width:50px"><i class="fa fa-search w3-text-dental"></i></div>
                    <div class="w3-rest">
                        <input id="input-buscar" type="text"  placeholder="  Buscar" list="select-teste" class="w3-animate-input w3-round-large w3-border" style="width:80%; outline: none"/>
                    </div>
                </div>
            </div>
        </header>

        <div class="w3-container w3-text-grey" id="qtd-produtos">
            <p></p>
        </div>

        <!-- Product grid -->
        <div class="w3-row w3-grayscale w3-border-top w3-padding-16 grid-produtos">
            <div id="empty-grid" style="display: none" class="w3-container w3-center">
                <h2>Produto não encontrado no catálogo de promoções.</h2>
                <h3>Entre em contato com nossos vendedores para mais informações.</h3>
                <h3><i class="fa fa-phone"></i> <b>(11) 3673-4484</b></h3>
            </div>
    </div>
            <?php foreach ($produtos as $produto) { ?> 

                <div idcategoria="<?php echo $produto->categoria[0]->id ?>" idgrupo="<?php echo $produto->grupo[0]->id ?>" class="w3-col l4 s8 produto w3-grayscale-min w3-white">
                    <div class="w3-container w3-center">
                        <div class="w3-display-container">
                            <img src="<?php echo base_url() . $produto->imagens[0]->url_image; ?>" style="width:100%; max-width: 200px;">
                            <div class="w3-display-middle w3-display-hover">
                                <button onclick="showModal('id<?php echo $produto->id; ?>')" class="w3-button w3-black">Gostei <i class="fa fa-search"></i></button>
                            </div>
                            <p><span class="nome-produto"><?php echo $produto->nome; ?></span><br><b class="preco-produto">R$ <?php echo $produto->preco; ?></b></p>
                        </div>
                    </div>
                </div> 
        
                <!--MODAL -->
                <div id="id<?php echo $produto->id; ?>" class="w3-modal">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom">
                        <div class="w3-container w3-grayscale-min">
                            <span onclick="hideModal('id<?php echo $produto->id; ?>')" class="w3-button w3-display-topright w3-hover-red">&times;</span>
                            <div class="w3-row">
                                <div class="w3-half w3-padding-32 w3-border-right">   

                                    <ul class="images-slider">
                                        <?php foreach ($produto->imagens as $img) {
                                            ?> 
                                            <li data-thumb="<?php echo base_url() . $img->url_image; ?>">
                                                <img  src="<?php echo base_url() . $img->url_image; ?>">
                                            </li>
                                            
                                        <?php }
                                        ?>
                                    </ul>

                                </div> 
                                <div class="w3-half w3-padding-64">  
                                    <div class="w3-container w3-margin-left">
                                        <h3 class="w3-center"><b><?php echo $produto->nome; ?></b></h3>
                                        <h4>Preço: R$ <?php echo str_replace(".", ",", $produto->preco) ?></h4> 
                                        <div class="w3-center w3-padding-32">
                                            <h5>Gostou? <p>Então não perca tempo e ligue já!</p> </h5>
                                            <h4><b>(11) 3673-4484</b></h4>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="w3-padding-32">
                                <h3 class="">Detalhes do Produto </h3>
                                <p><?php echo $produto->descricao; ?></p>
                            </div>
                        </div>
                    </div>
                </div><!--/MODAL -->
           


                <?php
                $i++;
            }
            ?>
        </div>
        

    </div> 

    <script>

        function showModal(id) {
            $('#' + id).css('display', 'block');
            $('#mySidebar').css('z-index', 0);
            $('header').css('z-index', 0);
        }
        function hideModal(id) {
            $('#' + id).css('display', 'none');
            $('#mySidebar').css('z-index', 3);
            $('header').css('z-index', 1);
        }
        $(document).ready(function () {



            $('.images-slider').lightSlider({
                gallery: true,
                item: 1,
                vertical: true,
                verticalHeight: 300,
                vThumbWidth: 50,
                thumbItem: 8,
                thumbMargin: 1,
                galleryMargin: 5,
                slideMargin: 0

            });

            // remove o footer padrao
            //$('#footer').remove();

            var categoria = $('.categoria');
            var grupo = $('.grupo');
            var arrow = $('.arrow');
            var gridProdutos = $('.grid-produtos');
            var navigation = $('#navigation');

            var produtos = makeGrid(gridProdutos);

            $('#input-buscar').on('keypress', function (e) {

                if (e.which === 13) {
                    var element = $(this).val();
                    if (element.trim().length > 0) {
                        navigation.empty();
                        navigation.append('Resultado da busca');
                        searchGrid(gridProdutos, produtos, element);
                    }

                }
            });


            $('#categoria-todos').click(function () {

                $(grupo).each(function () {
                    arrow.removeClass('fa-caret-down');
                    arrow.addClass(' fa-caret-right');

                    $(this).parent().removeClass('w3-show');
                });

                $('#empty-grid').css('display', 'none');
                navigation.empty();
                navigation.append('Todos');
                $(gridProdutos).find('.produto').each(function () {
                    $(this).css('display', 'block');
                });
            });


            $(categoria).click(function (e) {
                e.preventDefault();
                $('#empty-grid').css('display', 'none');
                var arrowCategoria = $(this).find('i');
                var grupoCategoria = $(this).next();

                var idCategoria = $(this).attr('idcategoria');
                var nomeCategoria = $(this).find('span').html();
                navigation.empty();
                navigation.append(nomeCategoria);

                $(gridProdutos).find('.produto').each(function () {
                    if (idCategoria == $(this).attr('idcategoria')) {
                        $(this).css('display', 'block');

                    } else {
                        $(this).css('display', 'none');
                    }
                });

                // mostra os grupos de cada categoria
                if (!grupoCategoria.hasClass('w3-show')) {
                    $(grupo).each(function () {

                        arrow.removeClass('fa-caret-down');
                        arrow.addClass(' fa-caret-right');
                        $(this).parent().removeClass('w3-show');

                    });
                    grupoCategoria.addClass(' w3-show');
                    arrowCategoria.removeClass('fa-caret-right');
                    arrowCategoria.addClass(' fa-caret-down');

                } else {
                    arrowCategoria.removeClass('fa-caret-down');
                    arrowCategoria.addClass(' fa-caret-right');

                    grupoCategoria.removeClass('w3-show');
                }
                // mostra os grupos de cada categoria
            });

            $(grupo).click(function (e) {
                e.preventDefault();

                $('#empty-grid').css('display', 'none');

                var idGrupo = $(this).attr('idgrupo');
                var nomeGrupo = " <span class='nome-grupo'><i class='fa fa-caret-right'> " + $(this).html() + "</span>";
                $('.nome-grupo').remove();
                navigation.append(nomeGrupo);

                $(gridProdutos).find('.produto').each(function () {
                    if (idGrupo == $(this).attr('idgrupo')) {
                        $(this).css('display', 'block');
                    } else {
                        $(this).css('display', 'none');
                    }
                });

            });

        });



// Script to open and close sidebar
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
    </script>
</body>





