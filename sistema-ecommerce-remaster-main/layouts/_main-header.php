<style type="text/css">
    /* 1. Header centrado y con altura para logo grande */
    header {
        background-color: #2c3e50 !important;
        border-bottom: 5px solid #ffeb3b !important;
        height: 85px !important; /* Altura ideal para el logo escalado */
        display: flex !important;
        align-items: center !important; /* Centra todo verticalmente */
        justify-content: space-between !important;
        padding: 0 30px !important;
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        width: 100% !important;
        z-index: 1000 !important;
        box-sizing: border-box !important;
    }

    /* 2. Contenedor y Logo Gigante */
    .logo-place {
        width: 200px !important;
        height: 100% !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        overflow: hidden !important;
    }

    .logo-place img {
        max-height: 75px !important; 
        width: auto !important;
        transform: scale(1.6) !important; /* Zoom para compensar bordes blancos */
        filter: none !important;
        object-fit: contain !important;
    }

    /* 3. Buscador centrado */
    .search-place {
        display: flex !important;
        align-items: center !important;
        width: calc(100% - 600px) !important;
        height: 100% !important;
    }

    .search-place input {
        width: 100% !important;
        height: 45px !important;
        padding: 0 15px !important;
        border: 2px solid #ffeb3b !important;
        border-radius: 4px 0 0 4px !important;
        outline: none !important;
    }

    .btn-search {
        background-color: #ffeb3b !important;
        color: #2c3e50 !important;
        height: 45px !important;
        padding: 0 20px !important;
        border: none !important;
        border-radius: 0 4px 4px 0 !important;
        display: flex !important;
        align-items: center !important;
        cursor: pointer !important;
    }

    /* 4. Iconos de usuario y carrito alineados */
    .options-place {
        display: flex !important;
        align-items: center !important;
        height: 100% !important;
        gap: 25px !important;
    }

    .options-place i {
        font-size: 30px !important;
        color: white !important;
    }

    /* 5. EL MENÚ: Corregido para que siempre aparezca abajo */
    .menu-opciones {
        display: none; 
        background-color: #2c3e50 !important;
        border: 2px solid #ffeb3b !important;
        position: fixed !important;
        top: 85px !important; /* IGUAL A LA ALTURA DEL HEADER */
        right: 30px !important;
        z-index: 2000 !important;
        width: 200px !important;
        border-radius: 0 0 8px 8px !important;
        box-shadow: 0 10px 20px rgba(0,0,0,0.5) !important;
    }

    .menu-opcion {
        padding: 12px 20px !important;
        color: white !important;
        font-size: 15px !important;
        border-bottom: 1px solid rgba(255,255,255,0.1) !important;
        transition: 0.3s !important;
    }

    .menu-opcion:hover {
        background-color: #34495e !important;
        color: #ffeb3b !important;
    }
</style>

<header>
    <div class="logo-place">
        <a href="index.php" style="display: flex; align-items: center; width: 100%; height: 100%;">
            <img src="assets/logo_tuti.png">
        </a>
    </div>

    <div class="search-place">
        <input type="text" id="idbusqueda" placeholder="Encuentra lo que necesitas..." value="<?php echo isset($_GET['text']) ? $_GET['text'] : ''; ?>">
        <button class="btn-main btn-search" onclick="search_producto()">
            <i class="fa fa-search"></i>
        </button>
    </div>

    <div class="options-place">
        <?php if (isset($_SESSION['codusu'])): ?>
            <div class="item-option" onclick="mostrar_opciones()" style="cursor:pointer; display:flex; align-items:center;">
                <i class="fa fa-user-circle-o"></i>
                <p style="margin-left: 10px; font-weight: bold; color: white;"><?php echo $_SESSION['nomusu']; ?></p>
            </div>
        <?php else: ?>
            <a href="login.php" style="color:white;"><i class="fa fa-sign-in"></i></a>
        <?php endif; ?>
        <a href="carrito.php" style="color:white;"><i class="fa fa-shopping-cart"></i></a>
    </div>
</header>

<div class="menu-opciones" id="ctrl-menu">
    <ul>
        <?php if (isset($_SESSION['codusu'])): ?>
            <li><a href="carrito.php" style="text-decoration:none;"><div class="menu-opcion">Carrito</div></a></li>
            <li><a href="historial.php" style="text-decoration:none;"><div class="menu-opcion">Historial de compras</div></a></li>
            <li><a href="pedido.php" style="text-decoration:none;"><div class="menu-opcion">Pedidos por pagar</div></a></li>
            <li><a href="_logout.php" style="text-decoration:none;"><div class="menu-opcion">Salir</div></a></li>
        <?php else: ?>
            <li><a href="login.php" style="text-decoration:none;"><div class="menu-opcion">Iniciar sesión</div></a></li>
            <li><a href="carrito.php" style="text-decoration:none;"><div class="menu-opcion">Carrito</div></a></li>
        <?php endif; ?>
    </ul>
</div>

<script type="text/javascript">
    function mostrar_opciones() {
        var menu = document.getElementById("ctrl-menu");
        // Forzamos el cambio de display
        if (menu.style.display === "none" || menu.style.display === "") {
            menu.style.display = "block";
        } else {
            menu.style.display = "none";
        }
    }
</script>