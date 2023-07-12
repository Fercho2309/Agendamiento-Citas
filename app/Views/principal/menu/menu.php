<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= base_url("css/principal/headercopy.css")?>">
    <script src="<?= base_url("bootstrap/bootstrap.bundle.min.js")?>"></script>
    
    <!-- DATATABLE -->
    <script src="<?= base_url('css/jquery-3.6.0.js'); ?>"></script>
    
    <script defer src="<?= base_url("bootstrap/dataTables.bootstrap5.min.js")?>"></script>
    <script defer src="<?= base_url("bootstrap/jquery.dataTables.min.js")?>"></script>
    <link rel="stylesheet" href="<?= base_url("bootstrap/bootstrap.min.css")?>">
    <link rel="stylesheet" href="<?= base_url("bootstrap/dataTables.bootstrap5.min.css")?>">

    <script src="https://kit.fontawesome.com/9bccd79f52.js" crossorigin="anonymous"></script>
    <title></title>

</head>
<body>

<div id="contenedor1">

    <div id="limite1">

        <a class="btnMenu" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            <i class="fa-solid fa-bars"></i>
        </a>

        <div class="offcanvas offcanvas-start" tabindex="-1" data-bs-backdrop="static" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Side Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close" style="background-color:#fffffe;"></button>

            </div>

            <div class="offcanvas-body" id="canvabody">
            <ul class="list-items">

            <ul class="list-items">
            <li class="nav-item">
                    <a class="nav-link active" aria-current="page" style="cursor: pointer;" href="<?= base_url("/AdminInicio") ?>"><i class="fa-solid fa-house"></i> Inicio</a>
                </li>


                <?php if($User_session->id_rol !== '5' || $User_session->id_rol !== '4'):?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= base_url("/buzonEntrada") ?>"><i class="fa-solid fa-envelope"></i> Buzon Entrada</a>
                        </li>
                    <?php endif; ?>
                

                    <?php if ($User_session->id_rol !== '5'): ?>
                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?php echo base_url("/solicitar"); ?>"><i class="fa-regular fa-square-plus"></i> Solicitar Cita</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<= base_url("/registro") ?>"><i class="fa-solid fa-phone"></i> Registro</a>
                    </li> -->
                <?php endif; ?>

                   
                    
                    <?php if ($User_session->id_rol !== '4'): ?>
                        <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="<?php echo base_url("/agendamientodisponibilidad"); ?>"><i class="fa-solid fa-calendar-days"></i> Disponibilidad</a>
                            </li>
                            <?php endif; ?>
                            
                            <?php if ($User_session->id_rol !== '3' && $User_session->id_rol !== '5' && $User_session->id_rol !== '4'  && $User_session->id_rol !== '2'): ?>
                                <!-- <li class="nav-item">
                                    <h4>Administrador</h4>
                                </li> -->
                                
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="<?= base_url("/usuarios") ?>"><i class="fa-solid fa-users"></i> Usuarios</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="<?= base_url("/roles") ?>"><i class="fa-solid fa-person-walking-luggage"></i> Roles</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="<?= base_url("/encabezado")?>"><i class="fa-solid fa-book-open-reader"></i> Encabezado</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="<?= base_url("/detalles")?>"><i class="fa-solid fa-circle-info"></i> Detalles</a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="<?= base_url("/asuntos")?>"><i class="fa-solid fa-file-circle-check"></i> Asuntos</a>
                                </li>
                <?php endif; ?>
            </ul>


                
            </div>
        </div>
        
        <div class="btn-group" id="contenedordrop">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="btnimg">
                <i class="fa-solid fa-circle-user"></i>
            </button>
            
            <ul class="dropdown-menu dropdown-menu-end">
                <li class="subtitle"><span>Usuario:</span></li>
                <li class="Ptitle"><span><?= $DatosPerfil['nombre_corto'];?></span></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="<?php echo base_url("/AdminPerfil")?>"><i class="fa-solid fa-user"></i> Perfil</a></li>
                <!-- <li><a class="dropdown-item" href="#">Ajustes</a></li>
                <li><a class="dropdown-item" href="#">Contactos</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Modo Oscuro </a></li> -->
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="<?php echo base_url('cerrarSesion');?>"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar Sesion</a></li></li>
            </ul>
        </div>
        
    </div>
    
</div>



<!-- 
    



<li class="nav-item">
    <a class="nav-link" aria-current="page" href="<= base_url("/acciones")?>"><i class="fa-solid fa-person-circle-exclamation"></i> Acciones</a>
</li>

<li class="nav-item">
    <a class="nav-link" aria-current="page" href="<= base_url("/permisos")?>"><i class="fa-solid fa-puzzle-piece"></i> Permisos</a>
</li> -->
</body>
</html>