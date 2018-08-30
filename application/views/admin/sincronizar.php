<?php
$this->template->menuAdmin('admin/sincronizar');
?>
<style>
    /* Center the loader */
    #loader {
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 1;
        width: 150px;
        height: 150px;
        margin: -75px 0 0 -75px;
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Add animation to "page content" */
    .animate-bottom {
        position: relative;
        -webkit-animation-name: animatebottom;
        -webkit-animation-duration: 1s;
        animation-name: animatebottom;
        animation-duration: 1s
    }

    @-webkit-keyframes animatebottom {
        from { bottom:-100px; opacity:0 } 
        to { bottom:0px; opacity:1 }
    }

    @keyframes animatebottom { 
        from{ bottom:-100px; opacity:0 } 
        to{ bottom:0; opacity:1 }
    }
</style>
<div class="w3-center">
    <div style="display: none;" id="loader"></div>
</div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" id="content-loader" style="margin-left:300px;margin-top:43px;">

    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><i class="fa fa-dashboard"></i>Sincronizar</h5>
    </header>

    <div class="w3-light-gray" >

        <div class="w3-container w3-content w3-margin">       
            <div class="w3-left">
                <a id="btn-sincronizar" href="<?php echo base_url() ?>base/sincronizar" class="w3-button w3-blue w3-padding-16 w3-large"><i class="fa fa-plus"> Sincronizar Produtos</i></a> 
            </div>   

        </div>

        <div class="w3-container">
            <?php
            if (isset($sucesso)) {
                ?>
                <h4><?php echo $sucesso ?> Produtos inseridos com sucesso!</h4>
                <br>
                <h4><?php echo $update ?> Produtos atualizados com sucesso!</h4>
                <?php
            }
            ?>

        </div>



    </div>


    <script type="text/javascript">
        $(document).ready(function () {


            $('#btn-sincronizar').click(function () {
                $(this).attr('disabled', 'disabled');
                $('#content-loader').css('opacity', '0.2');
                $('#loader').css('opacity', '1');
                $('#loader').css('z-index', '99999');
                $('#loader').css('display', 'block');
                console.log('ola');
            });
        })

    </script>










