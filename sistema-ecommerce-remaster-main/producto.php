<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mi sistema E-Commerce</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">

    <style type="text/css">
        /* Fondo oscuro para que combine con TuTi */
        body {
            background-color: #1a252f !important;
            font-family: 'Sen', sans-serif;
            color: white;
        }

        /* Contenedor del producto principal */
        section {
            display: flex;
            background: #2c3e50; /* Azul oscuro */
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            border-bottom: 5px solid #ffeb3b; /* Línea amarilla */
        }

        .part1 img {
            width: 100%;
            max-width: 300px;
            height: 300px;
            object-fit: contain;
            background: white; /* Fondo blanco para la imagen del producto */
            border-radius: 5px;
        }

        .part2 {
            padding-left: 30px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        #idtitle { color: #ffeb3b; font-size: 28px; }

        #idprice { color: #ffffff; font-size: 35px; }
        #idprice span { color: #ffeb3b; }

        /* Botón comprar estilo TuTi */
        .part2 button {
            background-color: #ffeb3b !important;
            color: #2c3e50 !important;
            border: none;
            padding: 15px 30px;
            font-weight: bold;
            cursor: pointer;
            text-transform: uppercase;
            border-radius: 4px;
        }

        /* Estilo para las cajitas de abajo */
        .product-box {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            margin: 10px;
        }

        .detail-title {
            background: #2c3e50;
            color: #ffeb3b !important;
            padding: 8px;
            text-align: center;
        }
        
        /* Forzar tamaño de imágenes de la lista */
        .product-box img {
            height: 180px !important;
            width: 100% !important;
            object-fit: contain !important;
        }
    </style>
</head>
<body>
    <?php include("layouts/_main-header.php"); ?>
    <div class="main-content">
        <div class="content-page">
            <section>
                <div class="part1">
                    <img id="idimg" src="">
                </div>
                <div class="part2">
                    <h2 id="idtitle">Cargando...</h2>
                    <h1 id="idprice">S/. 00.<span>00</span></h1>
                    <h3 id="iddescription">Descripción del producto</h3>
                    <button onclick="iniciar_compra()">Comprar ahora</button>
                </div>
            </section>
            
            <div class="title-section" style="color: #ffeb3b; margin-top: 30px;">Productos destacados</div>
            <div class="products-list" id="space-list"></div>
        </div>
    </div>
    <?php include("layouts/_footer.php"); ?>

    <script type="text/javascript" src="js/main-scripts.js"></script>
    <script type="text/javascript">
        var p='<?php echo $_GET["p"]; ?>';
        $(document).ready(function(){
            $.ajax({
                url:'servicios/producto/get_all_products.php',
                type:'POST',
                success:function(data){
                    let html='';
                    for (var i = 0; i < data.datos.length; i++) {
                        if (data.datos[i].codpro == p) {
                            document.getElementById("idimg").src="assets/products/"+data.datos[i].rutimapro;
                            document.getElementById("idtitle").innerHTML=data.datos[i].nompro;
                            document.getElementById("idprice").innerHTML=formato_precio(data.datos[i].prepro);
                            document.getElementById("iddescription").innerHTML=data.datos[i].despro;
                        }
                        html+=
                        '<div class="product-box">'+
                            '<a href="producto.php?p='+data.datos[i].codpro+'">'+
                                '<div class="product">'+
                                    '<img src="assets/products/'+data.datos[i].rutimapro+'">'+
                                    '<div class="detail-title">'+data.datos[i].nompro+'</div>'+
                                    '<div class="detail-description" style="color:#666; padding:5px;">'+data.datos[i].despro+'</div>'+
                                    '<div class="detail-price" style="color:#e74c3c; font-weight:bold; padding:5px;">'+formato_precio(data.datos[i].prepro)+'</div>'+
                                '</div>'+
                            '</a>'+
                        '</div>';
                    }
                    document.getElementById("space-list").innerHTML=html;
                }
            });
        });

        function formato_precio(valor){
            let svalor=valor.toString();
            let array=svalor.split(".");
            let dec = array[1] ? array[1] : "00";
            return "S/. "+array[0]+".<span>"+dec+"</span>";
        }
        
        function iniciar_compra(){ /* tu función de compra */ }
        function open_login(){ window.location.href="login.php"; }
    </script>
</body>
</html>