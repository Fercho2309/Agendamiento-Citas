<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("css/principal/perfiles.css")?>">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url("sweetAlert/dist/sweetalert2.min.css")?>">
    <script src="<?= base_url("sweetAlert/dist/sweetalert2.all.min.js")?>"></script>
</head>
<body>

    <div id="contenedor">
        <div id="limite">

            <div id="contTitle">
               <h1 id="title">Perfil</h1>
            </div>

            <form id="contePerfil" action="" method="post">

                <div id="primeraColumn">
                    
                <img id="perfilImg" src="<?php echo base_url("img/perfil.png")?>" alt="avatar">
                    
                    
                    <!-- <div id="imageContainer"></div> -->

                    <div class="col">
                        <div class="p-3">
                            <div class="col">
                                <div class="input-group mb-3">     
                                     <!-- <input type="file" name="foto" id="foto" class='input' accept="image/*"/>
                                     <label for="foto" class='label'>Cambiar foto</label> -->
                                    <!-- <input type="file" id="imageUpload" multiple> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col" style="margin:0; padding:0px 20px;">

                        <div class="form-floating mb-3">
                            <input type="text" value="<?php echo $DatosPerfil['nombre_corto']; ?>" class="form-control vp" name="nomCorto" id="nomCorto" placeholder="Nombre Usuario" disabled>
                            <label for="floatingInput">Nombre de Usuario:</label>
                        </div>
                    </div>

                </div>
                
    
                <div id="segundaColumn">

                    <div class="container">
                        <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-1">


                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" value="<?php echo $DatosPerfil['nombre_p']; ?>" class="form-control vp inputVal" name="nomPrimero" id="nomPrimero" onkeyup="capitalizarPrimeraLetra()"  placeholder="" disabled>
                                            <label for="floatingInput">Primer Nombre:</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" value="<?php echo $DatosPerfil['nombre_s']; ?>" class="form-control vp inputVal" name="nomSegundo" id="nomSegundo" onkeyup="capitalizarPrimeraLetra()" placeholder="" disabled>
                                            <label for="floatingInput">Segundo Nombre:</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" value="<?php echo $DatosPerfil['apellido_p']; ?>" class="form-control vp inputVal" name="apePrimero" id="apePrimero" onkeyup="capitalizarPrimeraLetra()" placeholder="" disabled>
                                            <label for="floatingInput">Primer Apellido:</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" value="<?php echo $DatosPerfil['apellido_s']; ?>" class="form-control vp inputVal" name="apeSegundo" id="apeSegundo" onkeyup="capitalizarPrimeraLetra()" placeholder="" disabled>
                                            <label for="floatingInput">Segundo Apellido:</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" value="<?php echo $DatosPerfil['tipo_telefono']; ?>" class="form-control vp" name="tptelefono" id="tptelefono" placeholder="Tipo de Telefono" disabled>
                                            <label for="floatingInput">Tipo de Telefono:</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        
                                        <div class="input-group form-floating">
                                            <input type="text" value="<?php echo $DatosPerfil['telefono_usuario']; ?>" class="form-control vp" name="numTelefono" id="numTelefono" placeholder="Telefono" disabled>
                                            <label for="telefono">Telefono</label>

                                            <button type="button" class="btn btn-ModalLeer" data-bs-toggle="modal" data-bs-target="#modalTelefonoMostrar" onclick="ocultarElemento()"><i class="fa-solid fa-eye"></i></button>
                                            <!-- <button type="button" class="btn btn-ModalAgregar" data-bs-toggle="modal" data-bs-target="#modalTelefono">+</button> -->
                                            
                                        </div>  
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" value="<?php echo $DatosPerfil['tp_nombre']; ?>" class="form-control vp" name="id_documento" id="id_documento" placeholder="Tipo de Documento" disabled>
                                            <label for="floatingInput">tipo de documento</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                              

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" value="<?php echo $DatosPerfil['numero_de_documento']; ?>" class="form-control vp" name="Ndocumento" id="Ndocumento" placeholder="Número de Identificación" disabled>
                                            <label for="floatingInput">Número de identificacion:</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                    <div class="input-group form-floating">
                                            <input type="text" value="<?php echo $DatosPerfil['correo_usuario']; ?>" class="form-control vp" name="gmail" id="gmail" placeholder="Correo Electronico" disabled>
                                            <label for="telefono">Correo Electronico:</label>
                                            
                                            <button type="button" class="btn btn-ModalLeer" data-bs-toggle="modal" data-bs-target="#modalCorreoMostrar" onclick="ocultarElemento()"><i class="fa-solid fa-eye"></i></button>
                                            <!-- <button type="button" class="btn btn-ModalAgregar" data-bs-toggle="modal" data-bs-target="#modalCorreos">+</button> -->
                                        </div>  
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" value="<?php echo $DatosPerfil['sexo_nombre']; ?>" class="form-control vp" name="Dsexo" id="Dsexo" placeholder="" disabled>
                                            <label for="floatingInput">Sexo:</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" value="<?php echo $DatosPerfil['direccion']; ?>" class="form-control vp" name="direccion" id="direccion" placeholder="" disabled>
                                            <label for="floatingInput">Direccion:</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" value="<?php echo $DatosPerfil['rol_nombre']; ?>" class="form-control vp" name="rol_nombre" id="rol_nombre" placeholder="" disabled>
                                            <label for="floatingInput">Rol:</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="password" value="<?php echo $DatosPerfil['contrasena']; ?>" class="form-control vp" name="passowrd" id="passowrd" placeholder="" disabled>
                                            <label for="floatingInput">Contraseña:</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col"style="margin:0; text-align:start;">
                                        <div id="contenedorBoton" style="position: static;">     
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#perfilModal_Actualizar" id="btnRegistrar" onclick="seleccionaPerfil()" title="Actualizar Perfil">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <!-- Modal Mostrar Telefonos -->
    <div class="modal fade" id="modalTelefonoMostrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header" id="contenedorTitleModal">
                <h5 class="modal-title" id="exampleModalLabel">Telefonos</h5>
                <button type="button" id="btnCerrarV1" class="btn-close" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#perfilModal_Actualizar" aria-label="Close"></button>
                <button type="button" id="btnCerrarV2" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="table-responsive" id="contenidoTable">
                        <table id="example" class="table" style="width:100%">
                            <thead id="th">
                                <tr>
                                    <th scope="col">Tipo de Telefono</th>
                                    <th scope="col">Número</th>
                                    <th scope="col">Prioridad</th>
                                    <th hidden scope="col" id="columna">Acciones</th>
                                </tr>
                            </thead>
                            <tbody style="font-family:Arial;font-size:17px;">
                                <?php 
                                foreach ($telefono as $dato) { ?>
                                    <tr>
                                        <td><?php echo $dato['numTelefono']; ?></td>
                                        <td><?php echo $dato['numero']; ?></td>
                                        <td><?php echo $dato['prioridad']?></td>
                                        <td hidden id="fila">
                                            <a id="iconoEditar" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalTelefonoLeer" onclick="seleccionaTelefonos(<?php echo $dato['id_telefono'] . ',' . 2?>)">
                                                <img id="ImgEditar" src="<?php echo base_url('img/edit.svg');?>" alt="Editar" title="Editar Registro">
                                            </a>
                                        </td>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCerrarV1" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#perfilModal_Actualizar">Cerrar</button>
                <button type="button" id="btnCerrarV2" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnAgregar" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTelefonoLeer" onclick="seleccionaTelefonos(<?php echo 1 . ',' . 1?>)">Agregar</button>
            </div>
            </div>
        </div>
    </div>
    
    
    
    
    <!-- Modal Telefonos -->
    <form action="<?php  echo base_url('AgregarTelefonos'); ?>" method="POST" class="needs-validation" novalidate >
        <div class="modal fade" id="modalTelefonoLeer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <!-- <div class="modal-dialog modal-dialog-centered modal-lg"> -->
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div id="contenedorTitleModal" class="modal-header">
                        <h5 class="modal-title" id="titleModalTel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-toggle="modal"
                        data-bs-target="#modalTelefonoMostrar" aria-label="Close" id="btnModal"></button>
                    </div>
                    
                    <div class="modal-body">
                        <input hidden id="tp" name="tp">
                        <input hidden id="id_telefono" name="id_telefono">

                        <div class="container">
                            <div class="row row-cols-1 row-cols-lg-1 g-2 g-lg-3">

                                    <div class="p-3">
                                        <div class="input-group input-group-lg">
                                            <label class="input-group-text" id="inputGroup-sizing-lg"
                                                for="modaltipotelefono">Tipo de Telefono:</label>
                                            <select class="form-select" id="modaltipotelefono" name="modaltipotelefono" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                                                <option disabled selected>Seleccione Tipo de Telefono</option>
                                                <?php foreach( $TipoTelefono as $ttele ) { ?>
                                                    <option value="<?php echo $ttele['id_detalles'];?>">
                                                    <?php echo $ttele["nombre"];?> </option>
                                                <?php } ?>
                                            </select>
                                                        
                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese el Tipo de Telefono.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-3">
                                        <div class="input-group input-group-lg">
                                            <label class="input-group-text" id="inputGroup-sizing-lg" for="NumTelefonoModal">Telefono:</label>
                                            <input type="text" class="form-control" name="NumTelefonoModal" id="NumTelefonoModal" placeholder="Telefono" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" required>
                                                
                                                
                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Numero de Telefono.
                                            </div>
                                        </div>
                                    </div>

                            </div>     
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal"
                        data-bs-target="#modalTelefonoMostrar">Cerrar</button>
                        
                        <button type="submit" class="btn btn-success" id="btn_Guardar">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
    <!-- Modal Mostrar Correos -->
    <div class="modal fade" id="modalCorreoMostrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header" id="contenedorTitleModal">
                <h5 class="modal-title">Correos</h5>
                <button type="button" id="btnCerrarV1" class="btn-close" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#perfilModal_Actualizar" aria-label="Close"></button>
                <button type="button" id="btnCerrarV2" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                    <div class="table-responsive" id="contenidoTable">
                        <table id="example" class="table" style="width:100%">
                            <thead id="th">
                                <tr>
                                    <th scope="col">Correo Electronico</th>
                                    <th scope="col">Prioridad</th>
                                    <th hidden scope="col" id="columna">Acciones</th>
                                </tr>
                            </thead>
                            <tbody style="font-family:Arial;font-size:17px;">
                                <?php foreach ($correo as $dato) { ?>
                                    <tr>
                                        <td><?php echo $dato['correo_electronico'];?></td>
                                        <td><?php echo $dato['prioridad'];?></td>
                                        <td hidden id="fila">
                                            <a id="iconoEditar" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalCorreoLeer" onclick="seleccionaCorreo(<?php echo $dato['id_correo'] . ',' . 2?>)">
                                                <img src="<?php echo base_url('img/edit.svg');?>" alt="Editar" title="Editar Registro">
                                            </a>
                                        </td>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
            </div>

            <div class="modal-footer">
                <button type="button" id="btnCerrarV1" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#perfilModal_Actualizar">Cerrar</button>
                <button type="button" id="btnCerrarV2" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" id="btnAgregar" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCorreoLeer" onclick="seleccionaCorreo(<?php echo 1 . ',' . 1?>)">Agregar</button>
            </div>
        </div>
    </div>
</div>
    
    <!-- Modal Correos -->
    <form action="<?php  echo base_url('AgregarCorreos'); ?>" method="POST" class="needs-validation" novalidate >
        <div class="modal fade" id="modalCorreoLeer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <!-- <div class="modal-dialog modal-dialog-centered modal-lg"> -->
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    
                    <div id="contenedorTitleModal" class="modal-header">
                        <h5 class="modal-title" id="titleModalCor">Correos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#modalCorreoMostrar" aria-label="Close" id="btnModal"></button>
                        </div>
                        
                        <div class="modal-body">

                            <input hidden id="tp_correo" name="tp_correo">
                            <input hidden id="id_correo" name="id_correo">

                            <div class="container">
                                <div class="row row-cols-2 row-cols-lg-1 g-2 g-lg-3">
                                        <div class="p-3">
                                            <div class="input-group input-group-lg">
                                                <label class="input-group-text" id="inputGroup-sizing-lg" for="CoElectronicoModal">Correo Electronico:</label>
                                                <input type="text" class="form-control" name="CoElectronicoModal" id="CoElectronicoModal" placeholder="Correo Electronico" required>
        

                                                <div class="invalid-feedback" id="invalido">
                                                    Por favor, Ingrese su Correo Electronico.
                                                </div>
                                            </div>
                                        </div>
                                </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal"
                        data-bs-target="#modalCorreoMostrar">Cerrar</button>

                        <button type="submit" class="btn btn-success" id="btn_GuardarCor">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



    <!-- Modal de Actualizar-->
        <form method="POST" action="<?php echo base_url("actualizar_perfil")?>" autocomplete="off" class="needs-validation" novalidate>
            <div class="modal fade" id="perfilModal_Actualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div id="contenedorTitleModal" class="modal-header">
                    <h5 id="titleModal" class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btnModal"></button>
                </div>

                <div class="modal-body">
                    <!-- Id dele usuario a actualizar -->
                    <input type="text" id="id_usuario" name="id_usuario" hidden>
                    <!--  -->

                    <div class="container">
                        <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">

                            <div class="col">
                                <div class="p-2">
                                <div class="col">
                                        <div class="form-floating mb-3" >
                                            <input type="text" class="form-control mp" id="Nusuario" name="Nusuario" onkeyup="capitalizarPrimeraLetra()" placeholder="Nombre de Usuario" required>
                                            <label for="Nusuario">Nombre de Usuario:</label>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Nombre de Usuario.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control mp  inputVal" id="Pnombre"  name="Pnombre" onkeyup="capitalizarPrimeraLetra()" placeholder="Primer Nombre" required>
                                            <label for="Pnombre">Primer Nombre:</label>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Primer Nombre.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control mp  inputVal" id="Snombre" name="Snombre" onkeyup="capitalizarPrimeraLetra()" placeholder="Segundo Nombre" required>
                                            <label for="Snombre">Segundo Nombre:</label>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Segundo Nombre
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control mp  inputVal" id="Papellido" name="Papellido" onkeyup="capitalizarPrimeraLetra()" placeholder="Primer Apellido" required>
                                            <label for="Papellido" >Primer Apellido:</label>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Primer Apellido.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control mp  inputVal" id="Sapellido" name="Sapellido" onkeyup="capitalizarPrimeraLetra()" placeholder="Segundo Apellido" required>
                                            <label for="Sapellido">Segundo Apellido:</label>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Segundo Apellido.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control mp" id="Ndireccion" name="Ndireccion" placeholder="Dirección" required>
                                            <label for="Ndireccion">Dirección:</label>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Dirección.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col" hidden>
                                <div class="p-2">
                                    <div class="col">
                                        <div class="input-group input-group-lg">
                                            <label class="input-group-text" id="inputGroup-sizing-lg" for="tipoTelefono">Tipo Telefono:</label>
                                            <select class="form-select mp" id="tpTelefono" name="tpTelefono" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                                                <?php foreach( $TipoTelefono as $Tel ) { ?>
                                                    <option value="<?php echo $Tel['id_detalles'];?>"><?php echo $Tel["nombre"];?> </option>
                                                <?php } ?>
                                            </select>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese Tipo de Telefono.
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="input-group form-floating"> 
                                            <input type="text" class="form-control vp" id="Ntelefono" name="Ntelefono" placeholder="Telefono" disabled>
                                            <label for="Ntelefono" id="informacion">Telefono:</label>
                                            <button type="button" class="btn btn-ModalLeer" data-bs-toggle="modal" data-bs-target="#modalTelefonoMostrar" onclick="mostrarElemento()"><i style="font-size:20px;"class="fa-solid fa-pen-to-square"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="input-group input-group-lg">
                                            <label class="input-group-text" id="inputGroup-sizing-lg" for="tipoDocumento">Tipo Documento:</label>
                                            <select class="form-select mp" id="tpdocumento" name="tpdocumento" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" required>
                                                <?php foreach( $TipoDocumento as $Doc ) { ?>
                                                    <option value="<?php echo $Doc['id_detalles'];?>"> <?php echo $Doc["nombre"];?> </option>
                                                <?php } ?>
                                            </select>

                                            <div class="invalid-feedback" id="invalido">
                                                Por favor, Ingrese su Tipo de Documento.
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control vp" id="numeroDocumento" name="numeroDocumento" placeholder="Número Documento" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" disabled required>
                                            <label for="numeroDocumento" id="informacion">Número Documento:</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="input-group form-floating">
                                            <input type="email" class="form-control vp" id="email" name="email" placeholder="name@example.com" disabled>
                                            <label for="email" id="informacion">Correo Electronico:</label>
                                            <button type="button" class="btn btn-ModalLeer" data-bs-toggle="modal" data-bs-target="#modalCorreoMostrar" onclick="mostrarElemento()"><i style="font-size:20px;"class="fa-solid fa-pen-to-square"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="input-group input-group-lg">
                                            <label class="input-group-text" id="inputGroup-sizing-lg" for="Detsexo">Sexo:</label>
                                            <select class="form-select vp" id="Detsexo" name="Detsexo" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" disabled required>
                                                <?php foreach( $Dsexo as $sex ) { ?>
                                                    <option value="<?php echo $sex['id_detalles'];?>"> <?php echo $sex["nombre"];?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>  
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="form-floating mb-3">
                                            <input type="text" name ="Ruser" class="form-control vp" id="Ruser" placeholder="Rol" disabled>
                                            <label for="Ruser" id="informacion">Rol:</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="p-2">
                                    <div class="col">
                                        <div class="input-group form-floating">
                                            <input type="password" value="<?php echo $DatosPerfil['contrasena'];?>" class="form-control vp" id="Passwords" placeholder="Nueva" disabled>
                                            <label for="Passwords">Contraseña:</label>
                                            <button type="button" class="btn btn-ModalLeer" data-bs-toggle="modal" data-bs-target="#editarcontraseña" title="Cambio de Contraseña"><i style="font-size:20px;"class="fa-solid fa-pen-to-square"></i></button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success" id="btn_Guardar">Actualizar</button>
                </div>
            </div>
            </div>
        </div>
    </form>



    <?php if (isset($error)) : ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <!-- Modal Actualización de Contraseña -->
    <form method="post" action="cambiar_Contraseña" autocomplete="off" class="needs-validation" novalidate>
        <div class="modal fade" id="editarcontraseña" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div id="contenedorTitleModal" class="modal-header">
                        <h5 id="titleModal" class="modal-title" id="staticBackdropLabel">Cambio Contraseña</h5>
                        <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#perfilModal_Actualizar" aria-label="Close" id="btnModal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="col">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="contraseña_actual" id="contraseña_actual" placeholder="Nueva" required>
                                <label for="contraseña_actual">Actual Contraseña</label>

                                <div class="invalid-feedback" id="invalido">
                                    Por favor, Ingrese su Contraseña Actual.
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="col">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="nueva_contraseña" id="nueva_contraseña" placeholder="Nueva Contraseña" required>
                                <label for="nueva_contraseña">Nueva Contraseña</label>

                                <div class="invalid-feedback" id="invalido">
                                    Por favor, Ingrese su Nueva Contraseña.
                                </div>
                            </div>
                        </div>

                        <div id="alert-container">
                            <?php if (isset($_GET['alert'])): ?>
                            <script>
                                var alertMessage = "<?php echo $_GET['alert']; ?>";
                                var alertContainer = document.getElementById("alert-container");
                                alertContainer.innerHTML = "<div class='alert'>" + alertMessage + "</div>";
                            </script>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#perfilModal_Actualizar" aria-label="Close">Cerrar</button>
                        <button type="submit" class="btn btn-success" id="btn_Guardar">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    

</body>

<script>
        $('#deleteModal').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });

// -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        // Funcion para Ocultar los Elementos con el "Hidden"
        // Funcion para Mostrar Aquellos Elementos que tengan un "Hidden"
        let columna = document.querySelectorAll("#columna");
        let fila = document.querySelectorAll("#fila");
        let Agregar = document.querySelectorAll("#btnAgregar");
        let CerrarV1 = document.querySelectorAll("#btnCerrarV1");
        let CerrarV2 = document.querySelectorAll("#btnCerrarV2");

        function ocultarElemento() {

            columna.forEach(( element, i ) => {
                element.setAttribute("hidden", "true");
            })
            
            fila.forEach(( element, i ) => {
                element.setAttribute("hidden", "true");
            })
            
            CerrarV1.forEach(( element, i ) => {
                element.setAttribute("hidden", "true");
            })

            Agregar.forEach(( element, i ) => {
                element.removeAttribute("hidden");
            })

            CerrarV2.forEach(( element, i ) => {
                element.removeAttribute("hidden");
            })

            // function alert(){
            //     Swall.fire([
            //         type: 'error',
            //         title: 'text',
            //         text: 'Pruebas',
            //     ])
            // }

        }
        
        function mostrarElemento() {

            columna.forEach(( element, i ) => {
                element.removeAttribute("hidden");
            })
            
            fila.forEach(( element, i ) => {
                element.removeAttribute("hidden");
            })
            
            CerrarV1.forEach(( element, i ) => {
                element.removeAttribute("hidden");
            })

            Agregar.forEach(( element, i ) => {
                element.setAttribute("hidden", "true"); 
            })
            
            CerrarV2.forEach(( element, i ) => {
                element.setAttribute("hidden", "true");
            })


        } 

        // Funcion para los Formularios en Blanco, estas saldra unas Advertencia sobre rellenar el Campo.
        (function () {
            'use strict'

            // Obtener todos los formularios a los que queremos aplicar estilos de validación de Bootstrap personalizados
            let forms = document.querySelectorAll('.needs-validation')

            // Bucle sobre ellos y evitar el envío
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
                })
        })()


        function seleccionaPerfil(){
        
                $.ajax({
                    url: "<?php echo base_url('buscarinfo_user'); ?>",
                    type:"get",
                    datatype:"json",
                    success: function(rs) {  
                        const data = JSON.parse(rs);
                        console.log(data);     
                    
                        document.getElementById('titleModal').innerText = "Actualizar Registro"  
                        
                        $("#id_usuario").val(data[0]['id_usuario']);
                        $("#Nusuario").val(data[0]['nombre_corto']);
                        $("#Pnombre").val(data[0]['nombre_p']);
                        $("#Snombre").val(data[0]['nombre_s']);
                        $("#Papellido").val(data[0]['apellido_p']);
                        $("#Sapellido").val(data[0]['apellido_s']);
                        $("#Detsexo").val(data[0]['sexo']);
                        $("#Ndireccion").val(data[0]['direccion']);
                        $("#email").val(data[0]['correo_usuario']);
                        $("#Ruser").val(data[0]['rol_nombre']);
                        $("#tpTelefono").val(data[0]['id_detalle']);
                        $("#numeroDocumento").val(data[0]['numero_de_documento']);
                        $("#Ntelefono").val(data[0]['telefono_usuario']);
                        $("#tpdocumento").val(data[0]['id_documento']);
                        $("#Passwords").val(data[0]['contrasena']);
                        $("#btn_Guardar").text("Actualizar");
                        $("#perfilModal_Actualizar").modal("show");
                    },
                    error: function() {
                        alert('Error en Datos de Usuarios. Informe', '');                
                    }
            });
        };

        // Funcion de Modales en Telefonos.
        function seleccionaTelefonos(id, tp){
            if (tp==2){
                
                dataURL = "<?php echo base_url('buscarinfo_telefono'); ?>" + "/" + id;
                $.ajax({
                    type:"get",
                    url: dataURL,
                    datatype:"json",
                    success: function(rs) {  
                        console.log(rs);      
                        let data = JSON.parse(rs);
                        // console.log(data)          
                        document.getElementById('titleModalTel').innerText = "Actualizar Registro"  
                        $("#tp").val(2);
                        $("#id_telefono").val(id);
                        $("#NumTelefonoModal").val(data[0]['numero']);
                        $("#modaltipotelefono").val(data[0]['tipo_telefono']);
                        $("#btn_Guardar").text("Actualizar");
                        $("#modalTelefonoLeer").modal("show");
                    },
                    error: function() {
                        alert('Error en Datos de Usuarios. Informe', '');                
                    }
            });

            } else {
                document.getElementById('titleModalTel').innerText = "Nuevo telefono"   
                $("#tp").val(1);
                $("#NumTelefonoModal").val('');
                $("#modaltipotelefono").val('');
                $("#btn_Guardar").text('Guardar');
            }
        };

        //Funcion de Modales en Correos.
        function seleccionaCorreo(id, tp){
            if (tp==2){
                
                dataURL = "<?php echo base_url('buscarinfo_correos'); ?>" + "/" + id;
                console.log(dataURL)
                $.ajax({
                    type:"get",
                    url: dataURL,
                    datatype:"json",
                    success: function(rs) {  
                        console.log(rs);          
                        let data = JSON.parse(rs);          
                        document.getElementById('titleModalCor').innerText = "Actualizar Registro"  
                        $("#tp_correo").val(2);
                        $("#id_correo").val(id);
                        $("#CoElectronicoModal").val(data[0]['correo_electronico']);
                        $("#btn_GuardarCor").text("Actualizar");
                        $("#modalCorreoLeer").modal("show");
                    },
                    error: function() {
                        alert('Error en Datos de Usuarios. Informe', '');                
                    }
            });

            } else {
                document.getElementById('titleModalCor').innerText = "Nuevo Correo";
                $("#tp_correo").val(1);
                $("#CoElectronicoModal").val('');
                $("#btn_GuardarCor").text('Guardar');
            }

        };

        // Funcion para que la Primeras letra al Rellenar un Campo se conviertan en Mayusculas

        let input = document.querySelectorAll('.inputVal');
        //función que capitaliza la primera letra
        function capitalizarPrimeraLetra() {
        //almacenamos el valor del input
        input.forEach(( input ) => {
        
        let palabra = input.value;
        
        //Si el valor es nulo o undefined salimos
        if(!input.value) return;
        // almacenamos la mayuscula
        let mayuscula = palabra.substring(0,1).toUpperCase();
        //si la palabra tiene más de una letra almacenamos las minúsculas
        if (palabra.length > 0) {
        let minuscula = palabra.substring(1).toLowerCase();
        }
        //escribimos la palabra con la primera letra mayuscula
        input.value = mayuscula.concat(minuscula);
        
        })
        }


</script>

</html>