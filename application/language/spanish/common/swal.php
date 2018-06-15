<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//prefijo titulos: tswal_
//prefijo contenido: cswal_



/*
var title = <?php echo json_encode(lang(""), JSON_HEX_TAG);?>;
var text = <?php echo json_encode(lang(""), JSON_HEX_TAG);?>;
*/

//controladores


//articulo_autor
$lang['tswal_datos incorrectos']							='Datos incorrectos';
$lang['cswal_ingrese todos los campos en el formato requerido']							='Ingrese todos los campos en el formato requerido';
$lang['tswal_archivo recibido']							='Archivo recibido';
$lang['cswal_ahora puede añadirlo a una nueva revista']							='Ahora puede añadirlo a una nueva revista';
$lang['tswal_ocurrio un error 1']							='Opsss... 1 ocurrio un error';
$lang['tswal_ocurrio un error 2']							='Opsss... 2 ocurrio un error';
$lang['tswal_ocurrio un error con tu archivo']							='Opsss... ocurrio un error con tu archivo';
$lang['cswal_intenta mas tarde']							='Intenta más tarde.';
$lang['tswal_formato no admitido']							='Formato no Admitido';
$lang['cswal_formato aceptado pdf']							='Formato aceptado: PDF';


//registro revisor
$lang['tswal_datos incorrectos']							='Datos incorrectos';
$lang['cswal_ingrese todos los campos en el formato requerido']							='Ingrese todos los campos en el formato requerido';

$lang['tswal_ya tienes cuenta']							='Ya tienes cuenta';
$lang['cswal_tu correo ya esta registrado en nuestra plataforma']							='Tu correo ya esta registrado en nuestra plataforma';

$lang['tswal_registrado']							='¡Registrado!';
$lang['cswal_ahora ya puedes acceder a nuestra plataforma']							='Ahora ya puedes acceder a nuestra plataforma.';


/*

'title': lang("tswal_registrado")
'text': lang("cswal_ahora ya puedes acceder a nuestra plataforma")

var title = <?php echo json_encode(lang("tswal_"), JSON_HEX_TAG);?>;
var text = <?php echo json_encode(lang("cswal_"), JSON_HEX_TAG);?>;
*/



//swals cargados por controladores a vista aviso
$lang['tswal_acceso denegado']							='Acceso denegado';
$lang['cswal_acceso denegado']							='Acceso denegado';
$lang['tswal_fecha limite']							='Fecha límite';
$lang['cswal_ha caducado la fecha']							='Ha caducado la fecha';
$lang['tswal_archivo no subido']							='Archivo no subido';
$lang['cswal_archivo no subido']							='Archivo no subido';
$lang['cswal_error']							='error';
$lang['tswal_subido']							='Subido';
$lang['cswal_archivo subido con exito']							='Archivo subido con éxito';
$lang['tswal_error']							='Error';
$lang['cswal_bd error']							='Error: DB error';
$lang['cswal_articulo no subido']							='Artículo no subido';
$lang['cswal_no data']							='Error: No Data';
$lang['tswal_eliminado']							='Eliminado';
$lang['cswal_articulo borrado correctamente de la plataforma']							='Artículo borrado correctamente de la plataforma';
$lang['cswal_error upload file data']							='Error: Upload File Data';
$lang['cswal_error ']							='Error: ';
$lang['cswal_archivo no eliminado']							='Archivo no eliminado';
$lang['tswal_fecha incorrecta']							='Fecha Incorrecta';
$lang['cswal_la fecha limite es menor que la fecha actual']							='La fecha límite es menor que la fecha actual';
$lang['cswal_actualizacion no realizada']							='Actualización no realizada';
$lang['cswal_articulo estado en edicion']							='Artículo. Estado: En edición';
$lang['cswal_articulo no actualizacion de estado']							='Artículo. No actualización de Estado';
$lang['tswal_actualizacion realizada con exito']							='Actualización realizada con éxito';
$lang['cswal_articulo estado aceptado con comentarios']							='Artículo. Estado: Aceptado con Comentarios';
$lang['cswal_articulo estado rechazado']							='Artículo. Estado: Rechazado';
$lang['cswal_articulo estado aceptado']							='Artículo. Estado: Aceptado';
$lang['cswal no se puede asignar a un revisor dos o mas veces']							='No puede asignar a un revisor dos o más veces';
$lang['tswal_asignacion exitosa']							='Asignación exitosa';
$lang['cswal_articulo actualizado con exito']							='Artículo actualizado con éxito';
$lang['tswal_no actualizado']							='No actualizado';
$lang['cswal_no actualizado']							='No actualizado';
$lang['cswal_articulo no eliminado']							='Articulo no eliminado';
$lang['cswal_error archivo no eliminado']							='Error: Archivo no eliminado';
$lang['tswal_accion cancelada por usuario']							='Acción cancelada por usuario';
$lang['alerta accion cancelada por usuario']							='Alerta: Acción cancelada por usuario';
$lang['cswal_error no actualizado']							='Error: No actualizado';
$lang['cswal_articulo eliminado']							='Articulo eliminado';
$lang['tswal:accion invalida']							='Acción Inválida';
$lang['tswal_articulo eliminado con exito']							='Articulo eliminado con éxito';
$lang['tswal_comentario subido con exito']							='Comentario subido con éxito';
$lang['cswal_comentario actualizado']							='Comentario actualizado';


//vistas

//view_cambiar_plantilla y view cambiar_imagenes
$lang['tswal_debe seleccionar un archivo antes de enviar']							='Debe seleccionar un archivo antes de enviar.';
