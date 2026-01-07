<!DOCTYPE html>
<html>
<head>
    <title>Mi sistema E-Commerce - TuTi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    
    <style type="text/css">
        /* 1. Estilos Generales */
        body {
            background-color: #1a252f !important; 
            font-family: 'Sen', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* 2. Header Corregido (Sin deformación) */
        header {
            background-color: #2c3e50 !important;
            border-bottom: 5px solid #ffeb3b !important;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px 0; /* Espaciado para que el logo respire */
            margin-bottom: 40px;
            min-height: 80px; /* Altura mínima de seguridad */
        }

        header img {
            width: 180px;      /* Ancho deseado */
            height: auto !important; /* CORRECCIÓN: Mantiene la proporción original */
            display: block;
            filter: none !important; /* Colores originales de TuTi */
        }

        /* 3. Estilos de los Formularios */
        form {
            max-width: 460px;
            width: calc(100% - 40px);
            padding: 30px;
            background: #2c3e50 !important;
            border-radius: 8px;
            margin: 20px auto;
            color: #fff;
            border-bottom: 6px solid #ffeb3b !important;
            box-shadow: 0 10px 30px rgba(0,0,0,0.5);
        }

        form h3 {
            margin: 0 0 20px 0;
            color: #ffeb3b; 
            text-align: center;
            font-size: 24px;
        }

        form input {
            padding: 12px 10px;
            width: calc(100% - 22px);
            margin-bottom: 15px;
            border: 1px solid #1a252f;
            border-radius: 4px;
            background: #fdfdfd;
            font-size: 16px;
            color: #333;
        }

        /* 4. Botones Estilo TuTi */
        form button {
            padding: 15px;
            width: 100%;
            background: #ffeb3b !important;
            border: none;
            color: #2c3e50 !important;
            font-weight: bold;
            font-size: 16px;
            text-transform: uppercase;
            cursor: pointer;
            border-radius: 4px;
            transition: background 0.3s;
        }

        form button:hover {
            background: #f1c40f !important;
        }

        form p {
            margin: 0 0 10px 0;
            color: #ffeb3b; 
            font-size: 14px;
            text-align: center;
            font-weight: bold;
        }

        .content-page {
            display: flex;
            flex-direction: column;
            gap: 20px;
            padding-bottom: 50px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-place">
            <img src="assets/logo_tuti.png" alt="Logo TuTi">
        </div>
    </header>

    <div class="main-content">
        <div class="content-page">
            <div>
                <form action="servicios/login.php" method="POST">
                    <h3>Iniciar sesión</h3>
                    <input type="text" name="emausu" placeholder="Correo electrónico" required>
                    <input type="password" name="pasusu" placeholder="Contraseña" required>
                    <?php
                        if (isset($_GET['e'])) {
                            switch ($_GET['e']) {
                                case '1': echo '<p>Error de conexión</p>'; break;
                                case '2': echo '<p>Email inválido</p>'; break;
                                case '3': echo '<p>Contraseña incorrecta</p>'; break;
                            }
                        }
                    ?>
                    <button type="submit">Ingresar</button>
                </form> 
            </div>

            <div>
                <form action="servicios/register.php" method="POST">
                    <h3>Regístrate</h3>
                    <input type="text" name="emausur" placeholder="Correo electrónico" required>
                    <input type="password" name="pasusur" placeholder="Crea tu contraseña" required>
                    <input type="password" name="pasusu2r" placeholder="Confirma tu contraseña" required>
                    <?php
                        if (isset($_GET['er'])) {
                            switch ($_GET['er']) {
                                case '1': echo '<p>Error de conexión</p>'; break;
                                case '2': echo '<p>Email ya está siendo usado</p>'; break;
                                case '3': echo '<p>Las contraseñas no coinciden</p>'; break;
                            }
                        }
                    ?>
                    <button type="submit">Crear cuenta</button>
                </form>
            </div>  
        </div>
    </div>
</body>
</html>