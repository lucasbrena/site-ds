<!DOCTYPE html>
<html>
    <link rel="icon" href="imagens/icone.ico" type="image/x-icon">
    <title>Dental Solident</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url() ?>css/w3.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>css/lightslider.css" />


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>js/lightslider.js"></script>



    <style>
        body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
        body, html {
            height: 100%;
            color: #777;
            line-height: 1.8;
        }

        /* Create a Parallax Effect */
        .bgimg-1, .bgimg-2, .bgimg-3 {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .bgimg-2{
            background-size: contain;
        }

        /* First image (Logo. Full height) */
        .bgimg-1 {
            background-image: url('<?php echo base_url(); ?>imagens/fundo_slide.jpg');

            min-height: 20%;

        }

        /* Second image (Portfolio) */
        .bgimg-2 {
            background-image: url('<?php echo base_url(); ?>imagens/cima.png');
            min-height: 400px;
        }

        /* Third image (Contact) */
        .bgimg-3 {
            background-image: url('<?php echo base_url(); ?>imagens/fundo.png');
            width: 100%;
            min-height: 400px;
        }

        .w3-wide {letter-spacing: 10px;}
        .w3-hover-opacity {cursor: pointer;}

        /* Turn off parallax scrolling for tablets and phones */
        @media only screen and (max-device-width: 1024px) {
            .bgimg-1, .bgimg-2, .bgimg-3 {
                background-attachment: scroll;
            }
        }
        .ui-autocomplete {
            max-height: 100px;
            overflow-y: auto;
            /* prevent horizontal scrollbar */
            overflow-x: hidden;
        }
        /* IE 6 doesn't support max-height
         * we use height instead, but this forces the menu to always be this tall
         */
        * html .ui-autocomplete {
            height: 100px;
        }

        /*
        *slide principal 
        */     
        #slide-principal .mySlides img{
            display: block;
            width: 100%;
            height: 300px;

        }

        /*
        *slide formas de pagamento
        */
        #slide-secundario .mySlides2 img{            
            display: block;
            margin-left: auto;
            margin-right: auto;            
            height: 40px;
        }  

        #rodape{          
            margin-left: auto;
            margin-right: auto;            

        } 

    </style>

    <script>
//funcao google maps 
        function myMap()
        {
            myCenter = new google.maps.LatLng(-23.5331105, -46.6696476);
            var mapOptions = {
                center: myCenter,
                zoom: 16, scrollwheel: false, draggable: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapOptions);

            var marker = new google.maps.Marker({
                position: myCenter,
            });
            marker.setMap(map);
        }//funcao google maps 



//muda style of navbar on scroll
        window.onscroll = function () {
            myFunction()
        };
        function myFunction() {
            var navbar = document.getElementById("myNavbar");
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                navbar.className = "w3-bar" + " w3-card-2 " + " w3-animate-top" + " w3-white" + " w3-large";
            } else {
                navbar.className = navbar.className.replace("w3-card-4 w3-animate-top w3-light-gray", "");
            }
        }//muda style of navbar on scroll


// Used to toggle the menu on small screens when clicking on the menu button
        function toggleFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }// Used to toggle the menu on small screens when clicking on the menu button

//muda texto dos botoes catalogo na barra secundaria
        function mOver(obj) {
            obj.innerHTML = " Confira nossos produtos"
        }

        function mOut(obj) {
            obj.innerHTML = " Catálogo"
        } //muda texto dos botoes catalogo na barra secundaria

//muda texto dos botoes curso na barra secundaria
        function mOver2(obj) {
            obj.innerHTML = " Confira nossos cursos"
        }

        function mOut2(obj) {
            obj.innerHTML = " Cursos"
        }//muda texto dos botoes curso na barra secundaria



        //mascara CPF
        function fMasc(objeto, mascara) {
            obj = objeto
            masc = mascara
            setTimeout("fMascEx()", 1)
        }

        function fMascEx() {
            obj.value = masc(obj.value)
        }

        function mCPF(cpf) {
            cpf = cpf.replace(/\D/g, "")
            cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
            cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2")
            cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2")
            return cpf
        }

        //mascara telefone
        function mascara(o, f) {
            v_obj = o
            v_fun = f
            setTimeout("execmascara()", 1)
        }
        function execmascara() {
            v_obj.value = v_fun(v_obj.value)
        }
        function mtel(v) {
            v = v.replace(/\D/g, "");             //Remove tudo o que não é dígito
            v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
            v = v.replace(/(\d)(\d{4})$/, "$1-$2");    //Coloca hífen entre o quarto e o quinto dígitos
            return v;
        }
        function id(el) {
            return document.getElementById(el);
        }
        window.onload = function () {
            id('telefone').onkeyup = function () {
                mascara(this, mtel);
            }
        }


    </script>