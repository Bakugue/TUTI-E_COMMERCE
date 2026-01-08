<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Mi Tienda - Ecommerce</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <?php include("layouts/_main-header.php"); ?>

    <div class="main-content">
        <div class="content-page">
            <div class="title-section">Productos destacados</div>
            <div class="products-list" id="space-list">
                </div>
        </div>
    </div>

    <?php include("layouts/_footer.php"); ?>

    <script type="text/javascript">
        $(document).ready(function(){
            // Cargar productos
            $.ajax({
                url: 'servicios/producto/get_all_products.php',
                type: 'POST',
                success: function(data){
                    let html = '';
                    // Verificamos si data es un string o ya es objeto
                    let res = (typeof data === 'string') ? JSON.parse(data) : data;
                    
                    if(res.datos && res.datos.length > 0){
                        for (var i = 0; i < res.datos.length; i++) {
                            html += 
                            '<div class="product-box">'+
                                '<div class="product">'+
                                    '<img src="assets/products/'+res.datos[i].rutimapro+'">'+
                                    '<div class="detail-title">'+res.datos[i].nompro+'</div>'+
                                    '<div class="detail-price">S/. '+res.datos[i].prepro+'</div>'+
                                    '<button onclick="agregar_producto('+res.datos[i].codpro+')">Agregar</button>'+
                                '</div>'+
                            '</div>';
                        }
                        $("#space-list").html(html);
                    }
                },
                error: function(){
                    console.error("Error al cargar productos.");
                }
            });
        });

        function agregar_producto(codpro){
         
            var ruta = 'servicios/compra/validar_inicio.php';
            $.ajax({
                url: ruta,
                type: 'POST',
                data: { codpro: codpro },
                success: function(data){
                    let res = (typeof data === 'string') ? JSON.parse(data) : data;
                    alert("Respuesta: " + res.detail);
                    if(!res.state && res.detail === "Inicia sesión primero"){
                        window.location.href = "login.php";
                    }
                },
                error: function(jqXHR){
                    if(jqXHR.status === 404){
                        alert("ERROR 404: El archivo '" + ruta + "' no existe en tu carpeta.");
                    } else {
                        alert("Error inesperado en el servidor.");
                    }
                }
            });
    }
function search_producto(){
    let texto = $("#idbusqueda").val();
    
    if(texto == ""){
        // Opcional: Si el buscador está vacío, puedes recargar todos o avisar
        alert("Escribe algo para buscar");
        return;
    }

    $.ajax({
        url: 'servicios/producto/get_all_results.php',
        type: 'POST',
        data: { text: texto },
        success: function(data){
            // PASO CRÍTICO: Convertir a JSON si es necesario
            let res = (typeof data === 'string') ? JSON.parse(data) : data;
            let html = '';

            if(res.datos && res.datos.length > 0){
                for (var i = 0; i < res.datos.length; i++) {
                    // Usamos backticks (``) para que el código sea más limpio
                    html += `
                        <div class="product-box">
                            <div class="product">
                                <img src="assets/products/${res.datos[i].rutimapro}">
                                <div class="detail-title">${res.datos[i].nompro}</div>
                                <div class="detail-price">S/. ${res.datos[i].prepro}</div>
                                <button onclick="agregar_producto(${res.datos[i].codpro})">Agregar</button>
                            </div>
                        </div>`;
                }
                $("#space-list").html(html);
            } else {
                $("#space-list").html('<div class="title-section">No se encontraron productos para: "' + texto + '"</div>');
            }
        },
        error: function(err){
            console.error("Error en la petición de búsqueda:", err);
        }
    });
}
    </script>
</body>
</html>