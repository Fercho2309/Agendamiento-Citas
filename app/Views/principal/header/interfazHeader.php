<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url("css/principal/headers.css")?>">
    <link rel="stylesheet" href="<?= base_url('bootstrap/bootstrap.min.css'); ?>">
    <script src="<?= base_url('bootstrap/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url("css/jquery-3.6.0.js"); ?>"></script>

    <!-- <script src="<= base_url("sweetAlert/dist/sweetalert2.min.js")?>"></script>
    <link rel="stylesheet" href="<= base_url("sweetAlert/dist/sweetalert2.min.css")?>">
    
    <script src="<= base_url("js/sweetAlert.js")?>"></script> -->

    <script src="https://kit.fontawesome.com/9bccd79f52.js" crossorigin="anonymous"></script>
    <title></title>

</head>

<body>
<!-- style=" margin: 0;
  padding: 0;
  background-image: url('img/institucionVillaEstadio.jpeg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat; -->

    <nav class="navbar navbar-light bg-light">

        <div class="container-fluid">

            <a class="navTitle">EduCitas</a>
        
            <div class="d-flex" id="navbarNavDropdown">

                <ul class="navbar-nav" id="listadoPrincipal">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url("/signin")?>"><i class="fa-solid fa-right-to-bracket"></i> Iniciar Sesion</a>
                    </li>
                </ul>

                <ul class="navbar-nav" id="listadoPrincipal">

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url("/registrarusuario")?>">Registrar</a>
                    </li>

                </ul>

            </div>

        </div>
    </nav>

</body>
</html>