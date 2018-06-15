<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* en el view:
abriendo etiqueta php:
<?php echo lang('');?>
<?php echo lang("");?>

dentro de una etiqueta php ya abierta:
".lang("")."
'.lang("").'

echo lang("");
echo lang('');

en controladores llamando al view aviso:
'' => lang("")


en js llamando a swal:
var title = <?php echo json_encode(lang(""), JSON_HEX_TAG);?>;
var text = <?php echo json_encode(lang(""), JSON_HEX_TAG);?>;

usar en js como variable y llamar esas variables en el swal
ejemplo:
swal(title,text,"warning");';


en echo script se cambia la forma a :

$title2 = json_encode(lang('tswal_'), JSON_HEX_TAG);
        $text2 = json_encode(lang('cswal_'), JSON_HEX_TAG);
        echo    
            "<script type='text/javascript'>
            setTimeout(function () {
              var title = {$title2};
              var text = {$text2};
              swal(title,text, 'warning');
            }, 350);
            </script>";



en diccionario:
$lang['']							='';
*/

// diccionarios generales
include 'common/d_date.php'; //dias y meses
include 'common/swal.php'; //alertas del sistema
include 'common/form_validation.php'; //validaciones de formulario

// views include
include 'include/d_footer.php';  //nada que traducir
include 'include/d_footer_esencial.php'; //nada que traducir
include 'include/d_footer_gc.php'; //nada que traducir
include 'include/d_head.php';
include 'include/d_head_gc.php';
include 'include/d_header_autor.php';
include 'include/d_header_editor.php';
include 'include/d_header_principal.php';
include 'include/d_header_revisor.php';
include 'include/d_menu_autor.php';
include 'include/d_menu_editor.php';
include 'include/d_menu_revisor.php';
include 'include/d_selector_idioma.php';

//Views
include 'views/d_Upload_form.php';
include 'views/d_Upload_success.php';
include 'views/d_view_a_publicar.php';
include 'views/d_view_arbitraje.php';
include 'views/d_view_buscar.php';
include 'views/d_view_cambiar_imagenes.php';
include 'views/d_view_cambiar_plantilla.php';
include 'views/d_view_color.php';
include 'views/d_view_contacto.php';
include 'views/d_view_home_autor.php';
include 'views/d_view_home_editor.php';
include 'views/d_view_home_principal.php';
include 'views/d_view_home_revisor.php';
include 'views/d_view_listos_add.php';
include 'views/d_view_login.php';
include 'views/d_view_modificar_contenido.php';
include 'views/d_view_modificar_numeros_publicaciones.php';
include 'views/d_view_modificar_politica_editorial.php';
include 'views/d_view_modificar_sobre_nosotros.php';
include 'views/d_view_newm.php';
include 'views/d_view_nosotros.php';
include 'views/d_view_nueva_revista.php';
include 'views/d_view_numeros.php';
include 'views/d_view_numeros_en_sesion.php';
include 'views/d_view_plantilla.php';
include 'views/d_view_politicas.php';
include 'views/d_view_por_paginar.php';
include 'views/d_view_registro.php';
include 'views/d_view_registro_autor.php';
include 'views/d_view_registro_autor_a_revisor.php';
include 'views/d_view_registro_revisor.php';
include 'views/d_view_registro_lector.php';
include 'views/d_view_registro_revisor_a_autor.php';
include 'views/d_view_revista_en_sesion.php';
include 'views/d_view_revistas.php';
include 'views/d_view_configuracion.php';
include 'views/d_view_modificar_mensaje_aceptacion.php';
include 'views/d_view_modificar_mensaje_publicacion.php';
include 'views/d_view_modificar_mensaje_recepcion.php';
include 'views/d_view_modificar_datos_revista.php';


//views articulo

include 'articulo/d_view_administrar_articulos.php'; //nada que traducir
include 'articulo/d_view_all_articulos.php';
include 'articulo/d_view_all_articulos_ver.php';
include 'articulo/d_view_all_articulos_asignados.php';
include 'articulo/d_view_all_articulos_asignados_ver.php';
include 'articulo/d_view_all_articulos_revisados.php';
include 'articulo/d_view_all_articulos_revisados_ver.php';
include 'articulo/d_view_all_articulos_noasignados.php';
include 'articulo/d_view_all_articulos_noasignados_ver.php';
include 'articulo/d_view_articulo.php';
include 'articulo/d_view_articulo_recibido.php';
include 'articulo/d_view_articulos_asignados.php';
include 'articulo/d_view_articulos_asignados_comentar.php';
include 'articulo/d_view_articulos_asignados_ver.php';
include 'articulo/d_view_asignar_revisores.php';
include 'articulo/d_view_asignar_revisores_borrar.php';
include 'articulo/d_view_asignar_revisores_editar.php';
include 'articulo/d_view_asignar_revisores_ver.php';
include 'articulo/d_view_comentarios_de_revisores.php';
include 'articulo/d_view_comentarios_de_revisores_aceptar_rechazar.php';
include 'articulo/d_view_comentarios_de_revisores_ver.php';
include 'articulo/d_view_mis_articulos.php';
include 'articulo/d_view_mis_articulos_mod_ob.php';
include 'articulo/d_view_mis_articulos_mod_op.php'; // PENDIENTE
include 'articulo/d_view_mis_articulos_ver.php';
include 'articulo/d_view_revisar_version_final.php';
include 'articulo/d_view_revisar_version_final_aceptar_rechazar.php';
include 'articulo/d_view_timeout.php';
include 'articulo/d_view_timeout_aceptar_rechazar.php';
include 'articulo/d_view_timeout_ver.php';