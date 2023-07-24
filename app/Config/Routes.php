<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
* --------------------------------------------------------------------
* Route Definitions
* --------------------------------------------------------------------
*/

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'LoginSignin::index');



// ---------- PRINCIPAL / Inicios ---------------------------
$routes->get('/perfil', 'PrincipalPerfiles::index');
$routes->get('/AdminInicio', 'Inicio::Admin'); //Inicio de Adminitradores
$routes->get('/EstudianteInicio', 'Inicio::Estudiantes'); //Inicio de Estudiantes
$routes->get('/DocenteInicio', 'Inicio::Docentes'); //Inicio de Docentes
$routes->get('/Perfil', 'Perfiles::Perfil'); //Inicio de Docentes


// ---------- LOGIN ---------------------------
$routes->get('signin', 'LoginSignin::index');
$routes->post('auth', 'LoginSignin::auth');
$routes->get('cerrarSesion', 'LoginSignin::logout');
$routes->get('/registrarusuario', 'LoginRegistrarUsuario::index');
$routes->get('/recuperar', 'LoginRecuperarContraseña::index');
$routes->get('/sendRecoveryCode', 'LoginSignin::sendRecoveryCode');
$routes->post('registrar', 'LoginRegistrarUsuario::registrar');


// ---------- ESTUDIANTES ---------------------------
$routes->get('/solicitar', 'EstudiantesSolicitarCita::index');
$routes->post('/traer_disp_docente', 'EstudiantesSolicitarCita::traer_disp_docente');
$routes->post('insertar_Cita', 'EstudiantesSolicitarCita::crear_Cita');

$routes->get('/registro', 'EstudiantesRegistroCita::index');
$routes->get('/canceladoscitas', 'EstudiantesRegistroCita::eliminados');
// $routes->get('/obtenerid/(:num)', 'EstudiantesSolicitarCita::obtenerid/$1');
$routes->get('obtenerid/(:num)', 'EstudiantesSolicitarCita::obtenerid/$1');


// ---------- DOCENTES ---------------------------
$routes->get('/agendamientodisponibilidad', 'DocenteDisponibilidad::index');
$routes->get('eliminar_evento/(:num)', 'DocenteDisponibilidad::eliminar_evento/$1');

// Buzon
$routes->get('/buzonEntrada', 'DocenteBuzonEntrada::index');
$routes->post('insertar_Calendario', 'DocenteDisponibilidad::crear_disponiblidad'); //Ruta para Ingresar Registros
$routes->post('buscarinfo_Calendario/(:nueliminar_evento)', 'DocenteDisponibilidad::buscar_Calendario/$1'); //Ruta para Actualizar los Registros
$routes->get('/eliminados_Buzon', 'DocenteBuzonEntrada::Indexeliminados');
$routes->get('eliminar_cita/(:num)/(:any)', 'DocenteBuzonEntrada::eliminar/$1/$2'); //Ruta de Eliminar y Restaurar Registros

$routes->get('actualizar_estado_pruebaeventos/(:num)/(:any)', 'DocenteBuzonEntrada::actualizarEstadoPruebaeventos/$1/$2');



$routes->post('Dregistrar', 'DocenteDisponibilidad::registrar'); // NO BORRAR, PRUEBA DE CALENDARIO >:V

// ---------- ADMINISTRADORES ---------------------------
$routes->get('/usuarios', 'AdministrarUsuarios::index');
$routes->get('/eliminados_Usuarios', 'AdministrarUsuarios::eliminados');
$routes->get('eliminar_usuario/(:num)/(:any)', 'AdministrarUsuarios::eliminar/$1/$2'); //Ruta de Eliminar y Restaurar Registros
$routes->post('insertar_Usuarios', 'AdministrarUsuarios::insertar'); //Ruta para Ingresar Registros
$routes->post('buscarinfo_Usuarios/(:num)', 'AdministrarUsuarios::buscar_Usuarios/$1'); //Ruta para Actualizar los Registros


// ----------------Rol---------------------//
$routes->get('/roles', 'AdministrarRoles::index');
$routes->get('/eliminados_Roles', 'AdministrarRoles::Indexeliminados');
$routes->get('eliminar_rol/(:num)/(:any)', 'AdministrarRoles::eliminar/$1/$2'); //Ruta de Eliminar y Restaurar Registros
$routes->post('insertar_roles', 'AdministrarRoles::insertar'); //Ruta para Ingresar Registros
$routes->get('buscarinfo_rol/(:num)', 'AdministrarRoles::buscar_Roles/$1'); //Ruta para Actualizar los Registros


// ---------------- Asunto ---------------------//
$routes->get('/asuntos', 'AdministrarAsuntos::index');
$routes->get('/eliminados_Asuntos', 'AdministrarAsuntos::Indexeliminados');
$routes->get('eliminar_Asunto/(:num)/(:any)', 'AdministrarAsuntos::eliminar/$1/$2'); //Ruta de Eliminar y Restaurar Registros
$routes->post('insertar_asuntos', 'AdministrarAsuntos::insertar'); //Ruta para Ingresar Registros
$routes->get('buscarinfo_asunto/(:num)', 'AdministrarAsuntos::buscar_Asuntos/$1'); //Ruta para Actualizar los Registros


// ---------------- Encabezado ---------------------//
$routes->get('/encabezado', 'AdministrarEncabezado::index');
$routes->get('/eliminados_Encabezado', 'AdministrarEncabezado::Indexeliminados');
$routes->get('eliminar_Encabezado/(:num)/(:any)', 'AdministrarEncabezado::eliminar/$1/$2'); //Ruta de Eliminar y Restaurar Registros
$routes->post('insertar_encabezado', 'AdministrarEncabezado::insertar'); //Ruta para Ingresar Registros
$routes->get('buscarinfo_encabezado/(:num)', 'AdministrarEncabezado::buscar_Encabezado/$1'); //Ruta para Actualizar los Registros


// ---------------- Detalles ---------------------//
$routes->get('/detalles', 'AdministrarDetalles::index');
$routes->get('/eliminados_Detalles', 'AdministrarDetalles::Indexeliminados');
$routes->get('eliminar_Detalle/(:num)/(:any)', 'AdministrarDetalles::eliminar/$1/$2'); //Ruta de Eliminar y Restaurar Registros
$routes->post('insertar_detalles', 'AdministrarDetalles::insertar'); //Ruta para Ingresar Registros
$routes->get('buscarinfo_detalle/(:num)', 'AdministrarDetalles::buscar_Detalle/$1'); //Ruta para Actualizar los Registros


// ---------------- Acciones ---------------------//
$routes->get('/acciones', 'AdministrarAcciones::index');
$routes->get('/eliminados_Acciones', 'AdministrarAcciones::Indexeliminados');
$routes->get('eliminar_Acciones/(:num)/(:any)', 'AdministrarAcciones::eliminar/$1/$2'); //Ruta de Eliminar y Restaurar Registros
$routes->post('insertar_acciones', 'AdministrarAcciones::insertar'); //Ruta para Ingresar Registros
$routes->get('buscarinfo_accion/(:num)', 'AdministrarAcciones::buscar_Acciones/$1'); //Ruta para Actualizar los Registros


// ---------------- Permisos ---------------------//
$routes->get('/permisos', 'AdministrarPermisos::index');
$routes->get('/eliminados_Permisos', 'AdministrarPermisos::Indexeliminados');
$routes->get('eliminar_Permisos/(:num)/(:any)', 'AdministrarPermisos::eliminar/$1/$2'); //Ruta de Eliminar y Restaurar Registros
$routes->post('insertar_permisos', 'AdministrarPermisos::insertar'); //Ruta para Ingresar Registros
$routes->get('buscarinfo_Permisos/(:num)', 'AdministrarPermisos::buscar_Permisos/$1'); //Ruta para Actualizar los Registros


//    -----------------telefonos---------------------//
$routes->get('/telefonos', 'AdministrarTelefonos::index');
$routes->get('/eliminados_Telefonos', 'AdministrarTelefonos::Indexeliminados');
$routes->get('eliminar_Telefonos/(:num)/(:any)', 'AdministrarTelefonos::eliminar/$1/$2'); //Ruta de Eliminar y Restaurar Registros
$routes->post('insertar_telefonos', 'AdministrarTelefonos::insertar'); //Ruta para Ingresar Registros
$routes->get('buscarinfo_telefono/(:num)', 'AdministrarTelefonos::buscar_Telefonos/$1'); //Ruta para Actualizar los Registros
//-----------------telefonos PERFIL---------------------//
$routes->post('AgregarTelefonos', 'Perfiles::AgregarTelefono'); //Ruta para Actualizar los Registros



//-------------------correos------------------------//
$routes->get('/correos', 'AdministrarCorreos::index'); 
$routes->get('/eliminados_Correos', 'AdministrarCorreos::Indexeliminados');
$routes->get('eliminar_Correos/(:num)/(:any)', 'AdministrarCorreos::eliminar/$1/$2'); //Ruta de Eliminar y Restaurar Registros
$routes->post('insertar_correos', 'AdministrarCorreos::insertar'); //Ruta para Ingresar Registros
$routes->get('buscarinfo_correos/(:num)', 'AdministrarCorreos::buscar_Correo/$1'); //Ruta para Actualizar los Registros
//-----------------Correos PERFIL---------------------//
$routes->post('AgregarCorreos', 'Perfiles::AgregarCorreo'); //Ruta para Actualizar los Registros


// ---------------- Perfiles ---------------------//
$routes->get('/AdminPerfil', 'Perfiles::Perfil'); //Perfil de ADMINISTRADORES
$routes->get('buscarinfo_user', 'Perfiles::buscar_user'); //Ruta para Actualizar los Registros
$routes->post('actualizar_perfil', 'Perfiles::actualizar'); //Ruta para Ingresar Registros
$routes->post('cambiar_Contraseña', 'Perfiles::changePassword'); //Ruta para Actualizar los Registros


$routes->get('/prueba', 'Prueba::index'); 
$routes->get('/pruebaCorreo', 'PruebaCorreo::index'); 
$routes->post('enviar', 'PruebaCorreo::enviar'); 


// $routes->post('buscar_CargosxUsuarios/(:num)', 'departamentos::buscar_CargosUsuarios/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
