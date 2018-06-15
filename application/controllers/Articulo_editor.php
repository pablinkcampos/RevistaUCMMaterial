<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Articulo_editor extends MY_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('Articulo_Model');
        $this->load->model('Info_revisor_model');
        $this->load->model('Configuracion_Model');
        $this->load->helper(array(
            'form',
            'url'
        ));
        $this->load->helper("file");
        $this->load->library("session");
    }
    
    public function index() {
        $aviso = array(
            'title' => lang("tswal_acceso denegado"),
            'text' => lang("cswal_acceso denegado"),
            'tipoaviso' => 'error',
            'windowlocation' => base_url() . "index.php/"
        );
        $this->load->view('include/aviso', $aviso);
    }
    
    public function aceptar_revisor($id_revisor) {
        $this->Articulo_Model->actualizar_login_revisor_a_valido($id_revisor);
        
        $correi  = $this->Articulo_Model->get_mail_hash($id_revisor);
        $subject = "Aceptado como revisor - Revista UCM";
        $mensaje = '<html>' . '<body><h4>Hola <br><br>El editor ha aprobado tu solicitud como revisor. ya puedes ingresar a RevistaUCM</h4><br>' . '</body>' . '</html>';
        $mensaje .= "<b>Saludos</br><br>";
        $mensaje .= "<b>Equipo Revista UCM</b><br>";
        $headers = "From: RevistaUCM@ucm.cl \r\n";
        $headers .= 'Bcc: pablo.acm.ti@gmail.com' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        
        mail($correi->correo, $subject, $mensaje, $headers);
        
        redirect('index.php/System/dar_alta_revisor');
    }
    
    public function rechazar_revisor($id_revisor) {
        $this->Articulo_Model->actualizar_login_revisor_a_borrado($id_revisor);
        
        $correi  = $this->Articulo_Model->get_mail_hash($id_revisor);
        $subject = "Rechazado como revisor - Revista UCM";
        $mensaje = '<html>' . '<body><h4>Hola <br><br>El editor ha rechazado tu solicitud como revisor. Lamentamos comunicarte esta noticia.</h4><br>' . '</body>' . '</html>';
        $mensaje .= "<b>Saludos</br><br>";
        $mensaje .= "<b>Equipo Revista UCM</b><br>";
        $headers = "From: RevistaUCM@ucm.cl \r\n";
        $headers .= 'Bcc: pablo.acm.ti@gmail.com' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        
        mail($correi->correo, $subject, $mensaje, $headers);
        
        redirect('index.php/System/dar_alta_revisor');
    }

    public function rechazar_articulo($id_revista) {
        $data['datos'] = $this->Articulo_Model->articulo_ver($id_revista);

        $id_estado = 4;
        foreach ($data['datos']->result() as $row) {
            $email_autor = $row->email_autor;
            $datos = array(
                        'ID' => $row->ID,
                        'id_estado' => $id_estado
                    );
        }
        $this->Articulo_Model->actualizar_articulo_estado($datos);
        
        $correo  = $email_autor;
        $subject = "Rechazado como revisor - Revista UCM";
        $mensaje = '<html>' . '<body><h4>Hola <br><br>El editor ha rechazado su artículo por estar fuera de plazo.</h4><br>' . '</body>' . '</html>';
        $mensaje .= "<b>Saludos</br><br>";
        $mensaje .= "<b>Equipo Revista UCM</b><br>";
        $headers = "From: RevistaUCM@ucm.cl \r\n";
        $headers .= 'Bcc: pablo.acm.ti@gmail.com' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        
        mail($correo->correo, $subject, $mensaje, $headers);
        
        redirect('index.php/Articulo_editor/all_articulos_espera_final');
    }

    public function aceptar_peticion_articulo($id_revista) {
        $data['datos'] = $this->Articulo_Model->articulo_ver($id_revista);
        $configuracion  = $this->Configuracion_Model->consulta_ultima_configuracion();
        $max_dia = $configuracion->max_dia_reev_art;  
        $hoy = date('d-m-Y');
        $fecha_reenvio = strtotime($hoy."+ $max_dia days");
                 
                    

        
        foreach ($data['datos']->result() as $row) {
            $email_autor = $row->email_autor;
            $id_post = $row->id_post;
            $datos = array(
                        'ID' => $row->ID,
                        'id_estado' => 6,
                        'fecha_timeout' => date('Y-m-d H:i:s',$fecha_reenvio),
                    );
            
        }
        $post = array(
            'id' => $id_post,
            'estado' => 0,
            'fechaUltimaRespuesta' => date('Y-m-d H:i:s'),
        );

        $this->Articulo_Model->actualizar_articulo_estado($datos);
        $this->Articulo_Model->actualizar_post($post);
        
        $correo  = $email_autor;
        $subject = "Rechazado como revisor - Revista UCM";
        $mensaje = '<html>' . '<body><h4>Hola <br><br>El editor ha rechazado su artículo por estar fuera de plazo.</h4><br>' . '</body>' . '</html>';
        $mensaje .= "<b>Saludos</br><br>";
        $mensaje .= "<b>Equipo Revista UCM</b><br>";
        $headers = "From: RevistaUCM@ucm.cl \r\n";
        $headers .= 'Bcc: pablo.acm.ti@gmail.com' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        
        mail($correo->correo, $subject, $mensaje, $headers);
        
        redirect('index.php/Articulo_editor/all_articulos_espera_final');
    }
    
    public function all_articulos() {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos'] = $this->Articulo_Model->articulos();
            
            $this->load->view('include/head');
            $this->load->view('include/header_editor');
            $this->load->view('articulo/view_all_articulos', $data);
            $this->load->view('include/footer');
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    public function all_articulos_asignados() {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos'] = $this->Articulo_Model->articulos_asignados();
            
            $this->load->view('include/head');
            $this->load->view('include/header_editor');
            $this->load->view('articulo/view_all_articulos_asignados', $data);
            $this->load->view('include/footer');
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    
    
    public function all_articulos_asignados_ver($id_revista) {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos']     = $this->Articulo_Model->articulo_ver($id_revista);
            $datos             = $data['datos']->result_object();
            $tema              = array_column($datos, 'id_tema');
            $data['revisores'] = $this->Info_revisor_model->lista_revisores_por_tema($tema);
            
            $this->load->view('include/head');
            $this->load->view('include/header_editor');
            $this->load->view('articulo/view_articulo_asignado_ver', $data);
            $this->load->view('include/footer');
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    public function all_articulos_noasignados() {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos'] = $this->Articulo_Model->articulos_no_asignados();
            
            $this->load->view('include/head');
            $this->load->view('include/header_editor');
            $this->load->view('articulo/view_all_articulos_noasignados', $data);
            $this->load->view('include/footer');
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    
    
    public function all_articulos_noasignados_ver($id_revista) {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos']     = $this->Articulo_Model->articulo_ver($id_revista);
            $datos             = $data['datos']->result_object();
            $tema              = array_column($datos, 'id_tema');
            $data['revisores'] = $this->Info_revisor_model->lista_revisores_por_tema($tema);
            
            $this->load->view('include/head');
            $this->load->view('include/header_editor');
            $this->load->view('articulo/view_articulo_noasignado_ver', $data);
            $this->load->view('include/footer');
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    public function all_articulos_recibidos() {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos'] = $this->Articulo_Model->articulos_recibidos();
            
            $this->load->view('include/head');
            $this->load->view('include/header_editor');
            $this->load->view('articulo/view_all_articulos_recibidos', $data);
            $this->load->view('include/footer');
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    public function all_articulos_recibidos_ver($id_revista) {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos'] = $this->Articulo_Model->articulo_ver($id_revista);
            
            $this->load->view('include/head');
            $this->load->view('include/header_editor');
            $this->load->view('articulo/view_articulo_recibido_ver', $data);
            $this->load->view('include/footer');
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    public function all_articulos_revisados() {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos'] = $this->Articulo_Model->articulos_revisados();
            
            $this->load->view('include/head');
            $this->load->view('include/header_editor');
            $this->load->view('articulo/view_all_articulos_revisados', $data);
            $this->load->view('include/footer');
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    public function all_articulos_revisados_ver($id_revista) {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos']          = $this->Articulo_Model->articulo_ver($id_revista);
            $data["calificaciones"] = $this->Articulo_Model->getCalificaciones();
            $data["estados"]        = $this->Articulo_Model->getEstados();
            $data["configuracion"]  = $this->Configuracion_Model->consulta_ultima_configuracion();
            $this->load->view('include/head');
            $this->load->view('include/header_editor');
            $this->load->view('articulo/view_articulo_revisado_ver', $data);
            $this->load->view('include/footer');
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    public function all_articulos_ver($id_revista) {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos'] = $this->Articulo_Model->articulo_ver($id_revista);
            
            $this->load->view('include/head');
            $this->load->view('include/header_editor');
            $this->load->view('articulo/view_articulo_ver', $data);
            $this->load->view('include/footer');
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    public function all_articulos_rechazado_editor() {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos'] = $this->Articulo_Model->articulos_rechazados();
            
            $this->load->view('include/head');
            $this->load->view('include/header_editor');
            $this->load->view('articulo/view_all_articulos_rechazados_e', $data);
            $this->load->view('include/footer');
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    public function all_articulos_espera_final() {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos'] = $this->Articulo_Model->articulos_espera_vf();
            
            $this->load->view('include/head');
            $this->load->view('include/header_editor');
            $this->load->view('articulo/view_all_articulos_espera_final', $data);
            $this->load->view('include/footer');
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    //Revisar version final
    public function revisar_version_final() {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos'] = $this->Articulo_Model->articulos_estado_10_11();
            
            
            $this->load->view('include/head');
            $this->load->view('include/header_editor');
            $this->load->view('articulo/view_revisar_version_final', $data);
            $this->load->view('include/footer');
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    public function revisar_version_final_ver($id_revista) {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos'] = $this->Articulo_Model->articulo($id_revista);
            
            $this->load->view('include/head');
            $this->load->view('include/header_editor');
            $this->load->view('articulo/view_revisar_version_final_ver', $data);
            $this->load->view('include/footer');
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    public function revisar_version_final_aceptar_rechazar($id_revista) {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos'] = $this->Articulo_Model->articulo($id_revista);
            
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $opcion = $this->input->post('opcion');
                
                switch ($opcion) {
                    case 'AceptadoCC':
                        $comentarios = $this->input->post('comentario');
                        
                        $fecha_timeout = $this->input->post('datetimepicker');
                        
                        $fecha_timeout = str_replace('/', '-', $fecha_timeout);
                        $fecha_timeout = $fecha_timeout . ":00";
                        
                        $formato = 'Y-m-d H:i:s';
                        $fecha   = DateTime::createFromFormat($formato, $fecha_timeout);
                        
                        
                        $id_estado = 6;
                        foreach ($data['datos']->result() as $row) {
                            $datos = array(
                                'ID' => $row->ID,
                                'id_estado' => $id_estado,
                                'comentarios_editor' => $comentarios,
                                'fecha_timeout' => $fecha->format('Y-m-d H:i:s')
                            );
                        }
                        $fecha_tim = $fecha->format('Y-m-d H:i:s');
                        $now       = date('Y-m-d H:i:s');
                        
                        if ($fecha_tim < $now) {
                            $aviso = array(
                                'title' => lang("tswal_fecha incorrecta"),
                                'text' => lang("cswal_la fecha limite es menor que la fecha actual"),
                                'tipoaviso' => 'error',
                                'windowlocation' => base_url() . "index.php/articulo_editor/revisar_version_final"
                            );
                            $this->load->view('include/aviso', $aviso);
                        } else {
                            if ($this->Articulo_Model->actualizar_articulo_estado($datos)) {
                                $aviso = array(
                                    'title' => lang("tswal_actualizacion realizada con exito"),
                                    'text' => lang("cswal_articulo estado aceptado con comentarios"),
                                    'tipoaviso' => 'success',
                                    'windowlocation' => base_url() . "index.php/articulo_editor/revisar_version_final"
                                );
                                //Enviar correo electrónico(aceptado con comentarios)
                                $this->load->view('include/aviso', $aviso);
                            } else {
                                $aviso = array(
                                    'title' => lang("tswal_error"),
                                    'text' => lang("cswal_actualizacion no realizada"),
                                    'tipoaviso' => 'error',
                                    'windowlocation' => base_url() . "index.php/articulo_editor/revisar_version_final"
                                );
                                $this->load->view('include/aviso', $aviso);
                            }
                        }
                        break;
                    case 'Edicion':
                        $id_estado = 7;
                        foreach ($data['datos']->result() as $row) {
                            $datos = array(
                                'ID' => $row->ID,
                                'id_estado' => $id_estado
                            );
                        }
                        if ($this->Articulo_Model->actualizar_articulo_estado($datos)) {
                            $aviso = array(
                                'title' => lang("tswal_actualizacion realizada con exito"),
                                'text' => lang("cswal_articulo estado en edicion"),
                                'tipoaviso' => 'success',
                                'windowlocation' => base_url() . "index.php/articulo_editor/revisar_version_final"
                            );
                            //Enviar correo electrónico(En edición)
                            $this->load->view('include/aviso', $aviso);
                        } else {
                            $aviso = array(
                                'title' => lang("tswal_error"),
                                'text' => lang("cswal_actualizacion no realizada"),
                                'tipoaviso' => 'error',
                                'windowlocation' => base_url() . "index.php/articulo_editor/revisar_version_final"
                            );
                            $this->load->view('include/aviso', $aviso);
                        }
                        break;
                    default:
                        $aviso = array(
                            'title' => lang("tswal_error"),
                            'text' => lang("cswal_articulo no actualizacion de estado"),
                            'tipoaviso' => 'error',
                            'windowlocation' => base_url() . "index.php/articulo_editor/revisar_version_final"
                        );
                        $this->load->view('include/aviso', $aviso);
                        break;
                }
            } else {
                $this->load->view('include/head');
                $this->load->view('include/header_editor');
                $this->load->view('articulo/view_revisar_version_final_aceptar_rechazar', $data);
                $this->load->view('include/footer');
            }
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    //Timeout
    
    public function timeout() {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos'] = $this->Articulo_Model->articulos_por_estado(9);
            
            $this->load->view('include/head');
            $this->load->view('include/header_editor');
            $this->load->view('articulo/view_timeout', $data);
            $this->load->view('include/footer');
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    public function timeout_ver($id_revista) {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            $data['datos'] = $this->Articulo_Model->articulo($id_revista);
            
            $this->load->view('include/head');
            $this->load->view('include/header_editor');
            $this->load->view('articulo/view_timeout_ver', $data);
            $this->load->view('include/footer');
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    public function ajax_get() {
        $email = $this->input->post('string');
        
        $datos = $this->Articulo_Model->revisores_campos($email);
        echo "#";
        if ($datos) {
            foreach ($datos->result() as $row) {
                echo $row->nombre_campo . "#";
            }
        }
    }
    
    public function timeout_aceptar_rechazar($id_revista) {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            $data['datos'] = $this->Articulo_Model->articulo($id_revista);
            
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $opcion = $this->input->post('opcion');
                
                switch ($opcion) {
                    
                    case 'AceptadoCC':
                        $comentarios = $this->input->post('comentario');
                        
                        $fecha_timeout = $this->input->post('datetimepicker');
                        
                        $fecha_timeout = str_replace('/', '-', $fecha_timeout);
                        $fecha_timeout = $fecha_timeout . ":00";
                        
                        $formato = 'Y-m-d H:i:s';
                        $fecha   = DateTime::createFromFormat($formato, $fecha_timeout);
                        
                        
                        
                        $id_estado = 6;
                        foreach ($data['datos']->result() as $row) {
                            $datos = array(
                                'ID' => $row->ID,
                                'id_estado' => $id_estado,
                                'comentarios_editor' => $comentarios,
                                'fecha_timeout' => $fecha->format('Y-m-d H:i:s')
                            );
                        }
                        
                        $fecha_tim = $fecha->format('Y-m-d H:i:s');
                        $now       = date('Y-m-d H:i:s');
                        
                        if ($fecha_tim < $now) {
                            $aviso = array(
                                'title' => lang("tswal_fecha incorrecta"),
                                'text' => lang("cswal_la fecha limite es menor que la fecha actual"),
                                'tipoaviso' => 'error',
                                'windowlocation' => base_url() . "index.php/articulo_editor/timeout"
                            );
                            $this->load->view('include/aviso', $aviso);
                        } else {
                            if ($this->Articulo_Model->actualizar_articulo_estado($datos)) {
                                $aviso = array(
                                    'title' => lang("tswal_actualizacion realizada con exito"),
                                    'text' => lang("cswal_articulo estado aceptado con comentarios"),
                                    'tipoaviso' => 'success',
                                    'windowlocation' => base_url() . "index.php/articulo_editor/timeout"
                                );
                                //Enviar correo electrónico(aceptado con comentarios)
                                $this->load->view('include/aviso', $aviso);
                            } else {
                                $aviso = array(
                                    'title' => lang("tswal_error"),
                                    'text' => lang("cswal_actualizacion no realizada"),
                                    'tipoaviso' => 'error',
                                    'windowlocation' => base_url() . "index.php/articulo_editor/timeout"
                                );
                                $this->load->view('include/aviso', $aviso);
                            }
                        }
                        break;
                    case 'Rechazado':
                        $id_estado = 4;
                        foreach ($data['datos']->result() as $row) {
                            $datos = array(
                                'ID' => $row->ID,
                                'id_estado' => $id_estado
                            );
                        }
                        if ($this->Articulo_Model->actualizar_articulo_estado($datos)) {
                            $aviso = array(
                                'title' => lang("tswal_actualizacion realizada con exito"),
                                'text' => lang("cswal_articulo estado rechazado"),
                                'tipoaviso' => 'success',
                                'windowlocation' => base_url() . "index.php/articulo_editor/timeout"
                            );
                            //Enviar correo electrónico(rechazado)
                            $this->load->view('include/aviso', $aviso);
                        } else {
                            $aviso = array(
                                'title' => lang("tswal_error"),
                                'text' => lang("cswal_actualizacion no realizada"),
                                'tipoaviso' => 'error',
                                'windowlocation' => base_url() . "index.php/articulo_editor/timeout"
                            );
                            $this->load->view('include/aviso', $aviso);
                        }
                        
                        break;
                    default:
                        $aviso = array(
                            'title' => lang("tswal_error"),
                            'text' => lang("cswal_articulo no actualizacion de estado"),
                            'tipoaviso' => 'error',
                            'windowlocation' => base_url() . "index.php/articulo_editor/timeout"
                        );
                        $this->load->view('include/aviso', $aviso);
                        break;
                }
            } else {
                $this->load->view('include/head');
                $this->load->view('include/header_editor');
                $this->load->view('articulo/view_timeout_aceptar_rechazar', $data);
                $this->load->view('include/footer');
            }
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    //Ver_comentarios_de_revisores
    
    public function comentarios_de_revisores() {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos'] = $this->Articulo_Model->articulos_por_estado(3);
            
            $this->load->view('include/head');
            $this->load->view('include/header_editor');
            $this->load->view('articulo/view_comentarios_de_revisores', $data);
            $this->load->view('include/footer');
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    public function comentarios_de_revisores_ver($id_revista) {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            $data['datos'] = $this->Articulo_Model->articulo($id_revista);
            
            $this->load->view('include/head');
            $this->load->view('include/header_editor');
            $this->load->view('articulo/view_comentarios_de_revisores_ver', $data);
            $this->load->view('include/footer');
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    public function comentarios_de_revisores_aceptar_rechazar($id_revista) {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos'] = $this->Articulo_Model->articulo($id_revista);
            
            
            
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $opcion = $this->input->post('opcion');
                
                switch ($opcion) {
                    case 'Aceptado':
                        
                        $fecha_timeout = $this->input->post('datetimepicker1');
                        
                        $fecha_timeout = str_replace('/', '-', $fecha_timeout);
                        $fecha_timeout = $fecha_timeout . ":00";
                        
                        $formato = 'Y-m-d H:i:s';
                        $fecha   = DateTime::createFromFormat($formato, $fecha_timeout);
                        
                        
                        $id_estado = 5;
                        foreach ($data['datos']->result() as $row) {
                            $datos = array(
                                'ID' => $row->ID,
                                'id_estado' => $id_estado,
                                'fecha_timeout' => $fecha->format('Y-m-d H:i:s')
                            );
                        }
                        $fecha_tim = $fecha->format('Y-m-d H:i:s');
                        $now       = date('Y-m-d H:i:s');
                        
                        if ($fecha_tim < $now) {
                            $aviso = array(
                                'title' => lang("tswal_fecha incorrecta"),
                                'text' => lang("cswal_la fecha limite es menor que la fecha actual"),
                                'tipoaviso' => 'error',
                                'windowlocation' => $id_revista
                            );
                            $this->load->view('include/aviso', $aviso);
                        } else {
                            if ($this->Articulo_Model->actualizar_articulo_estado($datos)) {
                                $aviso = array(
                                    'title' => lang("tswal_actualizacion realizada con exito"),
                                    'text' => lang("cswal_articulo estado aceptado"),
                                    'tipoaviso' => 'success',
                                    'windowlocation' => base_url() . "index.php/articulo_editor/comentarios_de_revisores"
                                );
                                
                                $correo  = $this->Articulo_Model->getmail($datos['ID']);
                                $subject = "Articulo aceptado - Revista UCM";
                                $mensaje = '<html>' . '<body><h4>Hola <br><br>Se ha aceptado un articulo para la revista UCM. Ingrese a la plataforma para ver más detalles.</h4><br>' . '</body>' . '</html>';
                                $mensaje .= "<b>Saludos</br><br>";
                                $mensaje .= "<b>Equipo Revista UCM</b><br>";
                                $headers = "From: RevistaUCM@ucm.cl \r\n";
                                $headers .= 'Bcc: pablo.acm.ti@gmail.com' . "\r\n";
                                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                                
                                mail($correo->email_autor, $subject, $mensaje, $headers);
                                
                                $this->load->view('include/aviso', $aviso);
                            } else {
                                $aviso = array(
                                    'title' => lang("tswal_error"),
                                    'text' => lang("cswal_actualizacion no realizada"),
                                    'tipoaviso' => 'error',
                                    'windowlocation' => base_url() . "index.php/articulo_editor/comentarios_de_revisores"
                                );
                                //Enviar correo electrónico(Aceptado)
                                $this->load->view('include/aviso', $aviso);
                            }
                        }
                        break;
                    case 'AceptadoCC':
                        $comentarios = $this->input->post('comentario');
                        
                        $fecha_timeout = $this->input->post('datetimepicker');
                        
                        $fecha_timeout = str_replace('/', '-', $fecha_timeout);
                        $fecha_timeout = $fecha_timeout . ":00";
                        
                        $formato = 'Y-m-d H:i:s';
                        $fecha   = DateTime::createFromFormat($formato, $fecha_timeout);
                        
                        
                        
                        $id_estado = 6;
                        foreach ($data['datos']->result() as $row) {
                            $datos = array(
                                'ID' => $row->ID,
                                'id_estado' => $id_estado,
                                'comentarios_editor' => $comentarios,
                                'fecha_timeout' => $fecha->format('Y-m-d H:i:s')
                            );
                        }
                        
                        $fecha_tim = $fecha->format('Y-m-d H:i:s');
                        $now       = date('Y-m-d H:i:s');
                        
                        if ($fecha_tim < $now) {
                            $aviso = array(
                                'title' => lang("tswal_fecha incorrecta"),
                                'text' => lang("cswal_la fecha limite es menor que la fecha actual"),
                                'tipoaviso' => 'error',
                                'windowlocation' => $id_revista
                            );
                            $this->load->view('include/aviso', $aviso);
                        } else {
                            if ($this->Articulo_Model->actualizar_articulo_estado($datos)) {
                                $aviso   = array(
                                    'title' => lang("tswal_actualizacion realizada con exito"),
                                    'text' => lang("cswal_articulo estado aceptado con comentarios"),
                                    'tipoaviso' => 'success',
                                    'windowlocation' => base_url() . "index.php/articulo_editor/comentarios_de_revisores"
                                );
                                $correo  = $this->Articulo_Model->getmail($datos['ID']);
                                $subject = "Articulo aceptado - Revista UCM";
                                $mensaje = '<html>' . '<body><h4>Hola <br><br>Se ha aceptado un articulo para la revista UCM. Ingrese a la plataforma para ver más detalles.</h4><br>' . '</body>' . '</html>';
                                $mensaje .= "<b>Saludos</br><br>";
                                $mensaje .= "<b>Equipo Revista UCM</b><br>";
                                $headers = "From: RevistaUCM@ucm.cl \r\n";
                                $headers .= 'Bcc: pablo.acm.ti@gmail.com' . "\r\n";
                                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                                
                                mail($correo->email_autor, $subject, $mensaje, $headers);
                                
                                $this->load->view('include/aviso', $aviso);
                            } else {
                                $aviso = array(
                                    'title' => lang("tswal_error"),
                                    'text' => lang("cswal_actualizacion no realizada"),
                                    'tipoaviso' => 'error',
                                    'windowlocation' => base_url() . "index.php/articulo_editor/comentarios_de_revisores"
                                );
                                //Enviar correo electrónico(Aceptado)
                                $this->load->view('include/aviso', $aviso);
                            }
                        }
                        break;
                    case 'Rechazado':
                        $id_estado = 4;
                        foreach ($data['datos']->result() as $row) {
                            $datos = array(
                                'ID' => $row->ID,
                                'id_estado' => $id_estado
                            );
                        }
                        
                        if ($this->Articulo_Model->actualizar_articulo_estado($datos)) {
                            $aviso   = array(
                                'title' => lang("tswal_actualizacion realizada con exito"),
                                'text' => lang("cswal_articulo estado rechazado"),
                                'tipoaviso' => 'success',
                                'windowlocation' => base_url() . "index.php/articulo_editor/comentarios_de_revisores"
                            );
                            $correo  = $this->Articulo_Model->getmail($datos['ID']);
                            $subject = "Articulo rechazado - Revista UCM";
                            $mensaje = '<html>' . '<body><h4>Hola <br><br>Se ha rechazado un articulo para la revista UCM. Ingrese a la plataforma para ver más detalles.</h4><br>' . '</body>' . '</html>';
                            $mensaje .= "<b>Saludos</br><br>";
                            $mensaje .= "<b>Equipo Revista UCM</b><br>";
                            $headers = "From: RevistaUCM@ucm.cl \r\n";
                            $headers .= 'Bcc: pablo.acm.ti@gmail.com' . "\r\n";
                            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                            
                            mail($correo->email_autor, $subject, $mensaje, $headers);
                            $this->load->view('include/aviso', $aviso);
                        } else {
                            $aviso = array(
                                'title' => lang("tswal_error"),
                                'text' => lang("cswal_actualizacion no realizada"),
                                'tipoaviso' => 'error',
                                'windowlocation' => base_url() . "index.php/articulo_editor/comentarios_de_revisores"
                            );
                            //Enviar correo electrónico(Aceptado)
                            $this->load->view('include/aviso', $aviso);
                        }
                        break;
                    default:
                        break;
                }
            } else {
                $this->load->view('include/head');
                $this->load->view('include/header_editor');
                $this->load->view('articulo/view_comentarios_de_revisores_aceptar_rechazar', $data);
                $this->load->view('include/footer');
            }
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    public function aceptar_rechazar_articulo_recibido($id_revista) {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos'] = $this->Articulo_Model->articulo_ver($id_revista);
            
            //Acceso permitido por estado
            foreach ($data['datos']->result() as $row) {
                $email_autor = $row->email_autor;
                
            }
            
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $opcion = $this->input->post('opcion');
                
                if ($opcion == 'Aceptado') {
                    
                    $now = date('Y-m-d H:i:s');
                    
                    $id_estado = 2;
                    $estado    = 1;
                    foreach ($data['datos']->result() as $row) {
                        $datos = array(
                            'ID' => $row->ID,
                            'id_estado' => 2,
                            'VerificacionTexto' => 1,
                            'VerificacionTextoFecha' => $now
                        );
                    }
                    
                    
                    if ($this->Articulo_Model->actualizar_articulo_estado($datos)) {
                        $aviso = array(
                            'title' => lang("tswal_actualizacion realizada con exito"),
                            'text' => lang("cswal_articulo estado aceptado"),
                            'tipoaviso' => 'success',
                            'windowlocation' => base_url() . "index.php/articulo_editor/all_articulos_recibidos"
                        );
                        
                        $correo  = $this->Articulo_Model->getmail($datos['ID']);
                        $subject = "El formato del art&iacuteculo ha sido aceptado - Revista UCM";
                        $mensaje = '<html>' . '<body><h4>Hola <br><br>Se ha aceptado el formato del un art&iacuteculo a&uacuten debe ser revisado por nuestros expertos de revista UCM. Ingrese a la plataforma para ver más detalles.</h4><br>' . '<h4>ID de su art&iacuteculo :' . $datos['ID'] . '<br> Contrase&ntildea:' . $correo->email_autor . ' </h4><br>' . '</body>' . '</html>';
                        $mensaje .= "<b>Saludos</br><br>";
                        $mensaje .= "<b>Equipo Revista UCM</b><br>";
                        $headers = "From: RevistaUCM@ucm.cl \r\n";
                        $headers .= 'Bcc: pablo.acm.ti@gmail.com' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                        
                        mail($correo->email_autor, $subject, $mensaje, $headers);
                        
                        $this->load->view('include/aviso', $aviso);
                    } else {
                        $aviso = array(
                            'title' => lang("tswal_error"),
                            'text' => lang("cswal_actualizacion no realizada"),
                            'tipoaviso' => 'error',
                            'windowlocation' => base_url() . "index.php/articulo_editor/all_articulos_recibidos"
                        );
                        //Enviar correo electrónico(Aceptado)
                        $this->load->view('include/aviso', $aviso);
                    }
                    
                } else {
                    $comentario = $this->input->post('comentarioRechazo');
                    $now        = date('Y-m-d H:i:s');
                    
                    $id_estado = 4;
                    $estado    = 0;
                    foreach ($data['datos']->result() as $row) {
                        $datos = array(
                            'ID' => $row->ID,
                            'id_estado' => $id_estado,
                            'VerificacionTexto' => $estado,
                            'VerificacionTextoFecha' => $now,
                            'comentarios_editor' => $comentario
                        );
                    }
                    
                    if ($this->Articulo_Model->actualizar_articulo_estado($datos)) {
                        $aviso   = array(
                            'title' => lang("tswal_actualizacion realizada con exito"),
                            'text' => lang("cswal_articulo estado rechazado"),
                            'tipoaviso' => 'success',
                            'windowlocation' => base_url() . "index.php/articulo_editor/all_articulos_recibidos"
                        );
                        $correo  = $this->Articulo_Model->getmail($datos['ID']);
                        $subject = "Articulo rechazado - Revista UCM";
                        $mensaje = '<html>' . '<body><h4>Hola <br><br>Se ha rechazado un articulo para la revista UCM. </h4><br>' . '<h4>Motivos:' . $comentario . ' </h4><br>' . '</body>' . '</html>';
                        $mensaje .= "<b>Saludos</br><br>";
                        $mensaje .= "<b>Equipo Revista UCM</b><br>";
                        $headers = "From: RevistaUCM@ucm.cl \r\n";
                        $headers .= 'Bcc: pablo.acm.ti@gmail.com' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                        
                        mail($correo->email_autor, $subject, $mensaje, $headers);
                        $this->load->view('include/aviso', $aviso);
                    } else {
                        $aviso = array(
                            'title' => lang("tswal_error"),
                            'text' => lang("cswal_actualizacion no realizada"),
                            'tipoaviso' => 'error',
                            'windowlocation' => base_url() . "index.php/articulo_editor/all_articulos_recibidos"
                        );
                        //Enviar correo electrónico(Aceptado)
                        $this->load->view('include/aviso', $aviso);
                    }
                }
                
            }
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
        
    }
    
    public function aceptar_rechazar_articulo_revisado($id_revista) {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos'] = $this->Articulo_Model->articulo_ver($id_revista);
            
            //Acceso permitido por estado
            foreach ($data['datos']->result() as $row) {
                $email_autor = $row->email_autor;
                $comentario1 = $row->com_rev1;
                $comentario2 = $row->com_rev2;
                $comentario3 = $row->com_rev3;
                
            }
            
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $opcion        = $this->input->post('opcion');
                $comentario    = $this->input->post('comentarioRechazo');
                $fecha_reenvio = $this->input->post('fecha_reenvio');
              
                $configuracion  = $this->Configuracion_Model->consulta_ultima_configuracion();

                $max_dia = $configuracion->max_dia_reev_art;  
                $hoy = date('d-m-Y');
                $fecha_reenvio = strtotime($hoy."+ $max_dia days");
               
                if ($opcion == 5) {
                    
                    $now = date('Y-m-d H:i:s');
                    foreach ($data['datos']->result() as $row) {
                        $datos = array(
                            'ID' => $row->ID,
                            'id_estado' => $opcion,
                            'fechaCalificaFInal' => $now,
                            'fecha_timeout' => date('Y-m-d H:i:s',$fecha_reenvio),
                            'comentarios_editor' => $comentario
                            
                        );
                    }
                    
                    
                    if ($this->Articulo_Model->actualizar_articulo_estado($datos)) {
                        $aviso = array(
                            'title' => lang("tswal_actualizacion realizada con exito"),
                            'text' => lang("cswal_articulo estado aceptado"),
                            'tipoaviso' => 'success',
                            'windowlocation' => base_url() . "index.php/articulo_editor/all_articulos_revisados"
                        );
                        
                        $correo  = $this->Articulo_Model->getmail($datos['ID']);
                        $subject = "art&iacuteculo ha sido aceptado - Revista UCM";
                        $mensaje = '<html>' . '<body><h4>Hola <br><br>Se ha aceptado el art&iacuteculo a&uacuten agradecemos su colaboración de revista UCM. Ingrese a la plataforma para ver más detalles.</h4><br>' . '<h4>ID de su art&iacuteculo :' . $datos['ID'] . '<br> Contrase&ntildea:' . $correo->email_autor . ' </h4><br>' . '</body>' . '</html>';
                        $mensaje .= "<b>Saludos</br><br>";
                        $mensaje .= "<b>Equipo Revista UCM</b><br>";
                        $headers = "From: RevistaUCM@ucm.cl \r\n";
                        $headers .= 'Bcc: pablo.acm.ti@gmail.com' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                        
                        mail($correo->email_autor, $subject, $mensaje, $headers);
                        
                        $this->load->view('include/aviso', $aviso);
                    } else {
                        $aviso = array(
                            'title' => lang("tswal_error"),
                            'text' => lang("cswal_actualizacion no realizada"),
                            'tipoaviso' => 'error',
                            'windowlocation' => base_url() . "index.php/articulo_editor/all_articulos_revisados"
                        );
                        //Enviar correo electrónico(Aceptado)
                        $this->load->view('include/aviso', $aviso);
                    }
                    
                }
                if ($opcion == 4) {
                    $comentario = $this->input->post('comentarioRechazo');
                    $now        = date('Y-m-d H:i:s');
                    
                    
                    foreach ($data['datos']->result() as $row) {
                        $datos = array(
                            'ID' => $row->ID,
                            'id_estado' => $opcion,
                            'fechaCalificaFInal' => $now,
                            'fecha_timeout' => date('Y-m-d H:i:s',$fecha_reenvio),
                            'comentarios_editor' => $comentario
                        );
                    }
                    
                    if ($this->Articulo_Model->actualizar_articulo_estado($datos)) {
                        $aviso   = array(
                            'title' => lang("tswal_actualizacion realizada con exito"),
                            'text' => lang("cswal_articulo estado rechazado"),
                            'tipoaviso' => 'success',
                            'windowlocation' => base_url() . "index.php/articulo_editor/all_articulos_revisados"
                        );
                        $correo  = $this->Articulo_Model->getmail($datos['ID']);
                        $subject = "Articulo rechazado - Revista UCM";
                        $mensaje = '<html>' . '<body><h4>Hola <br><br>Se ha rechazado un articulo para la revista UCM. </h4><br>' . '<h4 align="left">Motivos:</h4><br>' . '<p align="left">' . $comentario . '</p><br>' . '<p align="left">' . $comentario1 . '</p><br>' . '<p align="left">' . $comentario2 . '</p><br>' . '<p align="left">' . $comentario3 . '</p><br>' . '</body>' . '</html>';
                        $mensaje .= "<b>Saludos</br><br>";
                        $mensaje .= "<b>Equipo Revista UCM</b><br>";
                        $headers = "From: RevistaUCM@ucm.cl \r\n";
                        $headers .= 'Bcc: pablo.acm.ti@gmail.com' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                        
                        mail($correo->email_autor, $subject, $mensaje, $headers);
                        $this->load->view('include/aviso', $aviso);
                    } else {
                        $aviso = array(
                            'title' => lang("tswal_error"),
                            'text' => lang("cswal_actualizacion no realizada"),
                            'tipoaviso' => 'error',
                            'windowlocation' => base_url() . "index.php/articulo_editor/all_articulos_revisados"
                        );
                        //Enviar correo electrónico(Aceptado)
                        $this->load->view('include/aviso', $aviso);
                    }
                }
                
                
                if ($opcion == 6) {
                   
                    $comentario = $this->input->post('comentarioRechazo');
                    $now        = date('Y-m-d H:i:s');
                    
                    
                    foreach ($data['datos']->result() as $row) {
                        $datos = array(
                            'ID' => $row->ID,
                            'id_estado' => $opcion,
                            'fechaCalificaFInal' => $now,
                            'fecha_timeout' => date('Y-m-d H:i:s',$fecha_reenvio),
                            'comentarios_editor' => $comentario
                        );
                    }
                    
                    if ($this->Articulo_Model->actualizar_articulo_estado($datos)) {
                        $aviso   = array(
                            'title' => lang("tswal_actualizacion realizada con exito"),
                            'text' => lang("cswal_articulo estado aceptado"),
                            'tipoaviso' => 'success',
                            'windowlocation' => base_url() . "index.php/articulo_editor/all_articulos_revisados"
                        );
                        $correo  = $this->Articulo_Model->getmail($datos['ID']);
                        $subject = "Articulo Aceptado con Comentarios - Revista UCM";
                        $mensaje = '<html>' . '<body><h4>Hola <br><br>Se ha aceptado su articulo para la revista UCM, pero se debe hacer corregir las siguientes observaciones: </h4><br>' . '<h4 align="left">Observaciones:</h4><br>' . '<p align="left">' . $comentario . '</p><br>' . '<p align="left">' . $comentario1 . '</p><br>' . '<p align="left">' . $comentario2 . '</p><br>' . '<p align="left">' . $comentario3 . '</p><br>' . '</body>' . '</html>';
                        $mensaje .= "<b>Saludos</br><br>";
                        $mensaje .= "<b>Equipo Revista UCM</b><br>";
                        $headers = "From: RevistaUCM@ucm.cl \r\n";
                        $headers .= 'Bcc: pablo.acm.ti@gmail.com' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                        
                        mail($correo->email_autor, $subject, $mensaje, $headers);
                        $this->load->view('include/aviso', $aviso);
                    } else {
                        $aviso = array(
                            'title' => lang("tswal_error"),
                            'text' => lang("cswal_actualizacion no realizada"),
                            'tipoaviso' => 'error',
                            'windowlocation' => base_url() . "index.php/articulo_editor/all_articulos_revisados"
                        );
                        //Enviar correo electrónico(Aceptado)
                        $this->load->view('include/aviso', $aviso);
                    }
                }
            } else {
                $aviso = array(
                    'title' => lang("tswal_acceso denegado"),
                    'text' => lang("cswal_acceso denegado"),
                    'tipoaviso' => 'error',
                    'windowlocation' => base_url() . "index.php/"
                );
                $this->load->view('include/aviso', $aviso);
            }
            
        }
    }
    
    public function resetear_articulo_revisado($ids) {
        
        list($id_revista, $id_revisor) = explode('_', $ids, 2);
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos'] = $this->Articulo_Model->articulo_ver($id_revista);
            
            //Acceso permitido por estado
            foreach ($data['datos']->result() as $row) {
                $email_autor = $row->email_autor;
                $id_rev1     = $row->id_rev1;
                $id_rev2     = $row->id_rev2;
                $id_rev3     = $row->id_rev3;
            }
            
            if ($id_revisor == $id_rev1) {
                $now = date('Y-m-d H:i:s');
                
                foreach ($data['datos']->result() as $row) {
                    $datos = array(
                        'ID' => $row->ID,
                        'id_estado' => 3,
                        'calificaRev1' => 3,
                        'Fecha_asig_revision' => $now
                    );
                }
            } elseif ($id_revisor == $id_rev2) {
                $now = date('Y-m-d H:i:s');
                
                foreach ($data['datos']->result() as $row) {
                    $datos = array(
                        'ID' => $row->ID,
                        'id_estado' => 3,
                        'calificaRev2' => 3,
                        'Fecha_asig_revision' => $now
                    );
                }
            } elseif ($id_revisor == $id_rev3) {
                $now       = date('Y-m-d H:i:s');
                $id_estado = 2;
                $estado    = 1;
                foreach ($data['datos']->result() as $row) {
                    $datos = array(
                        'ID' => $row->ID,
                        'id_estado' => 3,
                        'calificaRev3' => 3,
                        'Fecha_asig_revision' => $now
                    );
                }
                
                
            }
            if ($this->Articulo_Model->actualizar_articulo_estado($datos)) {
                
                $subject = "Articulo asignado Revista UCM";
                $mensaje = '<html>' . '<body><h4>Hola <br><br>Se le ha asignado un artículo para ser evaluado. Puede encontrarlo en la plataforma Revista UCM.</h4><br>' . '</body>' . '</html>';
                $mensaje .= "<b>Saludos</br><br>";
                $mensaje .= "<b>Equipo Revista UCM</b><br>";
                $headers = "From: RevistaUCM@ucm.cl \r\n";
                $headers .= 'Bcc: pablo.acm.ti@gmail.com' . "\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                
                $correo        = "";
                $email_revisor = $this->Articulo_Model->getmailrevisor($id_revisor);
                $correo .= $email_revisor->email;
                
                
                mail($correo, $subject, $mensaje, $headers);
                
                $aviso = array(
                    'title' => lang("tswal_asignacion exitosa"),
                    'text' => lang("cswal_articulo actualizado con exito"),
                    'tipoaviso' => 'success',
                    'windowlocation' => base_url() . "index.php/articulo_editor/all_articulos_revisados"
                );
                
                
                $this->load->view('include/aviso', $aviso);
            } else {
                $aviso = array(
                    'title' => lang("tswal_error"),
                    'text' => lang("cswal_actualizacion no realizada"),
                    'tipoaviso' => 'error',
                    'windowlocation' => base_url() . "index.php/articulo_editor/all_articulos_revisados"
                );
                $this->load->view('include/aviso', $aviso);
            }
            
            
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
        
        
    }
    
    //Asignar_revisores
    
    public function asignar_revisores() {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos'] = $this->Articulo_Model->articulos_estado_1_3();
            
            $this->load->view('include/head');
            $this->load->view('include/header_editor');
            $this->load->view('articulo/view_asignar_revisores', $data);
            $this->load->view('include/footer');
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    public function asignar_revisores_ver($id_revista) {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            $data['datos'] = $this->Articulo_Model->articulo($id_revista);
            
            $this->load->view('include/head');
            $this->load->view('include/header_editor');
            $this->load->view('articulo/view_asignar_revisores_ver', $data);
            $this->load->view('include/footer');
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    public function asignar_revisores_editor($id_revista) {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            $data['datos'] = $this->Articulo_Model->articulo_ver($id_revista);
            
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                
                $i            = 0;
                $id_revisor_1 = 0;
                $id_revisor_2 = 0;
                $id_revisor_3 = 0;
                foreach ($this->input->post('revisor[]') as $row) {
                    if ($i == 0) {
                        $id_revisor_1 = $this->input->post('revisor[0]');
                        
                    }
                    if ($i == 1) {
                        $id_revisor_2 = $this->input->post('revisor[1]');
                        
                    }
                    if ($i == 2) {
                        $id_revisor_3 = $this->input->post('revisor[2]');
                    }
                    $i++;
                }
                $now   = date('Y-m-d H:i:s');
                $datos = array(
                    'ID' => $id_revista,
                    'id_revisor_1' => $id_revisor_1,
                    'id_revisor_2' => $id_revisor_2,
                    'id_revisor_3' => $id_revisor_3,
                    'id_estado' => 3,
                    'Fecha_asig_revision' => $now
                );
                
                
                if ($this->Articulo_Model->actualizar_articulo_estado($datos)) {
                    
                    $subject = "Articulo asignado Revista UCM";
                    $mensaje = '<html>' . '<body><h4>Hola <br><br>Se le ha asignado un artículo para ser evaluado. Puede encontrarlo en la plataforma Revista UCM.</h4><br>' . '</body>' . '</html>';
                    $mensaje .= "<b>Saludos</br><br>";
                    $mensaje .= "<b>Equipo Revista UCM</b><br>";
                    $headers = "From: RevistaUCM@ucm.cl \r\n";
                    $headers .= 'Bcc: pablo.acm.ti@gmail.com' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                    
                    $correo = "";
                    if ($id_revisor_1 != 0) {
                        $email_revisor_1 = $this->Articulo_Model->getmailrevisor($id_revisor_1);
                        
                        $correo .= $email_revisor_1->email;
                        if ($id_revisor_2 != 0) {
                            $correo .= ", ";
                            $email_revisor_2 = $this->Articulo_Model->getmailrevisor($id_revisor_2);
                            
                            $correo .= $email_revisor_2->email;
                            if ($id_revisor_3 != 0) {
                                $correo .= ", ";
                                
                                $email_revisor_3 = $this->Articulo_Model->getmailrevisor($id_revisor_3);
                                $correo .= $email_revisor_3->email;
                            }
                        }
                    }
                    
                    mail($correo, $subject, $mensaje, $headers);
                    
                    $aviso = array(
                        'title' => lang("tswal_asignacion exitosa"),
                        'text' => lang("cswal_articulo actualizado con exito"),
                        'tipoaviso' => 'success',
                        'windowlocation' => base_url() . "index.php/articulo_editor/all_articulos_noasignados"
                    );
                    
                    
                    $this->load->view('include/aviso', $aviso);
                } else {
                    $aviso = array(
                        'title' => lang("tswal_error"),
                        'text' => lang("cswal_actualizacion no realizada"),
                        'tipoaviso' => 'error',
                        'windowlocation' => base_url() . "index.php/articulo_editor/all_articulos_noasignados"
                    );
                    $this->load->view('include/aviso', $aviso);
                }
                
                
            }
            
            
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    // controlador para reasignar los revisores de un articulo
    public function reasignar_revisores_editor($id_revista) {
        $user_data = $this->session->userdata('userdata');
  
        //se asegura de que el usuario sea editor.
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            $data['datos'] = $this->Articulo_Model->articulo_ver($id_revista);
            //Acceso permitido por estado
            //obtiene datos del articulo
            foreach ($data['datos']->result() as $row) {
                $id_rev1  = $row->id_rev1;
                $id_rev2  = $row->id_rev2;
                $id_rev3  = $row->id_rev3;
                $cal_rev1 = $row->cal_rev1;
                $cal_rev2 = $row->cal_rev2;
                $cal_rev3 = $row->cal_rev3;
            }
            
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                
                $i            = 0;
                $id_rev1_new  = 0;
                $id_rev2_new  = 0;
                $id_rev3_new  = 0;
                $bloq1        = 0;
                $bloq2        = 0;
                $bloq3        = 0;
                $id_revisor_1 = 0;
                $id_revisor_2 = 0;
                $id_revisor_3 = 0;
                
                //Se bloquean los revisores que ya evaluaron
                if ($cal_rev1 != 3) {
                    $id_revisor_1 = $id_rev1;
                    $bloq1 = 1;
                }
                if ($cal_rev2 != 3) {
                    $id_revisor_2 =$id_rev2;
                    $bloq2 = 1;
                }
                if ($cal_rev3 != 3) {
                    $id_revisor_3 = $id_rev3;
                    $bloq3 = 1;
                }
                
          
                if (empty($this->input->post('revisor[]'))) {
                    
                }
                //se comprueba que los revisores elegidos no sean vacios
                else {
                    foreach ($this->input->post('revisor[]') as $row) {
                        //el primer revisor obtenido se comprueba se es que coincide con otro revisor del articulo y se reemplaza,
                        //sino se asigna a una posicion vacia y se bloquea esa posicion.
                        if ($i == 0) {
                            $id_rev1_new = $this->input->post('revisor[0]');
                            if ($id_rev1_new == $id_rev1) {
                                $id_revisor_1 = $id_rev1_new;
                                $bloq1        = 1;
                            } else {
                                if ($id_rev1_new == $id_rev2) {
                                    $id_revisor_2 = $id_rev1_new;
                                    $bloq2        = 1;
                                } else {
                                    if ($id_rev1_new == $id_rev3) {
                                        $id_revisor_3 = $id_rev1_new;
                                        $bloq3        = 1;
                                    } else {
                                        if ($id_rev1_new != $id_rev1 && $bloq1 == 0) {
                                            $id_revisor_1 = $id_rev1_new;
                                            $bloq1        = 2;
                                        } else {
                                            if ($id_rev1_new != $id_rev2 && $bloq2 == 0) {
                                                $id_revisor_2 = $id_rev1_new;
                                                $bloq2        = 2;
                                            } else {
                                                if ($id_rev1_new != $id_rev3 && $bloq3 == 0) {
                                                    $id_revisor_3 = $id_rev1_new;
                                                    $bloq2        = 2;
                                                }
                                                
                                            }
                                        }
                                        
                                    }
                                }
                            }
                            
                        }
                        
                        //segundo revisor se compara con los demas revisores si es distinto se agrega en algun lugar vacio.
                        if ($i == 1) {
                            $id_rev2_new = $this->input->post('revisor[1]');
                            
                            if ($id_rev2_new == $id_rev1) {
                                $id_revisor_1 = $id_rev2_new;
                                $bloq1        = 1;
                            } else {
                                if ($id_rev2_new == $id_rev2) {
                                    $id_revisor_2 = $id_rev2_new;
                                    $bloq2        = 1;
                                } else {
                                    if ($id_rev2_new == $id_rev3) {
                                        $id_revisor_3 = $id_rev2_new;
                                        $bloq3        = 1;
                                    } else {
                                        if ($id_rev2_new != $id_rev1 && $bloq1 == 0) {
                                            $id_revisor_1 = $id_rev2_new;
                                            $bloq1        = 2;
                                        } else {
                                            if ($id_rev2_new != $id_rev2 && $bloq2 == 0) {
                                                $id_revisor_2 = $id_rev2_new;
                                                $bloq2        = 2;
                                            } else {
                                                if ($id_rev2_new != $id_rev3 && $bloq3 == 0) {
                                                    $id_revisor_3 = $id_rev2_new;
                                                    $bloq2        = 2;
                                                }
                                                
                                            }
                                        }
                                        
                                    }
                                }
                            }
                        }
                        //tercerrevisor se compara con los demas revisores si es distinto se agrega en algun lugar vacio y se bloquea ese lugar.
                        if ($i == 2) {
                            
                            $id_rev3_new = $this->input->post('revisor[2]');
                            
                            if ($id_rev3_new == $id_rev1) {
                                $id_revisor_1 = $id_rev3_new;
                                $bloq1        = 1;
                            } else {
                                if ($id_rev3_new == $id_rev2) {
                                    $id_revisor_2 = $id_rev3_new;
                                    $bloq2        = 1;
                                } else {
                                    if ($id_rev3_new == $id_rev3) {
                                        $id_revisor_3 = $id_rev3_new;
                                        $bloq3        = 1;
                                    } else {
                                        if ($id_rev3_new != $id_rev1 && $bloq1 == 0) {
                                            $id_revisor_1 = $id_rev3_new;
                                            $bloq1        = 2;
                                        } else {
                                            if ($id_rev3_new != $id_rev2 && $bloq2 == 0) {
                                                $id_revisor_2 = $id_rev3_new;
                                                $bloq2        = 2;
                                            } else {
                                                if ($id_rev3_new != $id_rev3 && $bloq3 == 0) {
                                                    $id_revisor_3 = $id_rev3_new;
                                                    $bloq2        = 2;
                                                }
                                                
                                            }
                                        }
                                        
                                    }
                                }
                            }
                        }
                        $i++;
                    }
                }
                
                
                //si todos los revisores calificaron sus articulos pasa a estado revisado
                if (($id_revisor_1 != 0 && $id_revisor_2 == 0 && $id_revisor_3 == 0 && $cal_rev1 != 3) || ($id_revisor_2 != 0 && $id_revisor_1 == 0 && $id_revisor_3 == 0 && $cal_rev2 != 3) || ($id_revisor_3 != 0 && $id_revisor_2 == 0 && $id_revisor_1 == 0 && $cal_rev3 != 3) || ($id_revisor_1 != 0 && $id_revisor_2 == 0 && $id_revisor_3 != 0 && $cal_rev1 != 3 && $cal_rev3 != 3) || ($id_revisor_1 != 0 && $id_revisor_2 != 0 && $id_revisor_3 == 0 && $cal_rev1 != 3 && $cal_rev2 != 3) || ($id_revisor_3 != 0 && $id_revisor_2 != 0 && $id_revisor_1 == 0 && $cal_rev3 != 3 && $cal_rev2 != 3) || ($id_revisor_1 != 0 && $id_revisor_2 != 0 && $id_revisor_3 != 0 && $cal_rev1 != 3 && $cal_rev2 != 3 && $cal_rev3 != 3)) {
                    $estado = 14;
                //sino sigue en estado asignado
                } else {
                    $estado = 3;
                }
                
                //se añaden los nuevos revisores en sus respectivas posiciones
                $now   = date('Y-m-d H:i:s');
                $datos = array(
                    'ID' => $id_revista,
                    'id_revisor_1' => $id_revisor_1,
                    'id_revisor_2' => $id_revisor_2,
                    'id_revisor_3' => $id_revisor_3,
                    'id_estado' => $estado,
                    'Fecha_asig_revision' => $now
                );
                
                 //se actualiza los revisores
                if ($this->Articulo_Model->actualizar_articulo_estado($datos)) {
                    
                    $subject = "Articulo asignado Revista UCM";
                    $mensaje = '<html>' . '<body><h4>Hola <br><br>Se le ha asignado un artículo para ser evaluado. Puede encontrarlo en la plataforma Revista UCM.</h4><br>' . '</body>' . '</html>';
                    $mensaje .= "<b>Saludos</br><br>";
                    $mensaje .= "<b>Equipo Revista UCM</b><br>";
                    $headers = "From: RevistaUCM@ucm.cl \r\n";
                    $headers .= 'Bcc: pablo.acm.ti@gmail.com' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                    
                    $correo = "";
                    if ($id_revisor_1 != 0 && $bloq1 != 1) {
                        $email_revisor_1 = $this->Articulo_Model->getmailrevisor($id_revisor_1);
                        
                        $correo .= $email_revisor_1->email;
                    }
                    if ($id_revisor_2 != 0 && $bloq2 != 1) {
                        if ($bloq1 != 1) {
                            $correo .= ", ";
                        }
                        $email_revisor_2 = $this->Articulo_Model->getmailrevisor($id_revisor_2);
                        $correo .= $email_revisor_2->email;
                        
                    }
                    if ($id_revisor_3 != 0 && $bloq3 != 1) {
                        if ($bloq2 != 1) {
                            $correo .= ", ";
                        }
                        
                        $email_revisor_3 = $this->Articulo_Model->getmailrevisor($id_revisor_3);
                        
                        $correo .= $email_revisor_3->email;
                    }
                    
                    if ($correo != "") {
                        mail($correo, $subject, $mensaje, $headers);
                    }
                    //se envia un correo a todos los revisores nuevos
                    
                    
                    $aviso = array(
                        'title' => lang("tswal_asignacion exitosa"),
                        'text' => lang("cswal_articulo actualizado con exito"),
                        'tipoaviso' => 'success',
                        'windowlocation' => base_url() . "index.php/articulo_editor/all_articulos_asignados"
                    );
                    
                    
                    $this->load->view('include/aviso', $aviso);
                } else {
                    $aviso = array(
                        'title' => lang("tswal_error"),
                        'text' => lang("cswal_actualizacion no realizada"),
                        'tipoaviso' => 'error',
                        'windowlocation' => base_url() . "index.php/articulo_editor/all_articulos_asignados"
                    );
                    $this->load->view('include/aviso', $aviso);
                }
                
                
            }
            
            
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    public function asignar_revisores_editar($id_revista) {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            $data['datos']     = $this->Articulo_Model->articulo($id_revista);
            $data['revisores'] = $this->Articulo_Model->revisores_validos();
            
            //Acceso permitido por estado
            foreach ($data['datos']->result() as $row) {
                $estado_articulo = $row->id_estado;
                if ($estado_articulo != 1 && $estado_articulo != 3)
                    redirect('index.php/Articulo_editor/asignar_revisores');
            }
            
            
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $email_revisor_1 = $this->input->post('email_revisor_1');
                $email_revisor_2 = $this->input->post('email_revisor_2');
                $email_revisor_3 = $this->input->post('email_revisor_3');
                
                $value = false;
                if (($email_revisor_1 != $email_revisor_2) && ($email_revisor_2 != $email_revisor_3) && ($email_revisor_1 != $email_revisor_3)) {
                    $value = true;
                } else {
                    if ($email_revisor_1 == $email_revisor_2 && $email_revisor_1 == $email_revisor_3 && $email_revisor_2 == $email_revisor_3 && $email_revisor_1 == "No Asignado") {
                        $value = true;
                    } else {
                        if ($email_revisor_1 == $email_revisor_2 && $email_revisor_1 == "No Asignado") {
                            $value = true;
                        } else {
                            if ($email_revisor_1 == $email_revisor_3 && $email_revisor_1 == "No Asignado") {
                                $value = true;
                            } else {
                                if ($email_revisor_2 == $email_revisor_3 && $email_revisor_2 == "No Asignado") {
                                    $value = true;
                                } else {
                                    $value = false;
                                }
                            }
                        }
                    }
                }
                
                
                if (!$value) {
                    
                    $aviso = array(
                        'title' => "Error",
                        'text' => lang("cswal no se puede asignar a un revisor dos o mas veces"),
                        'tipoaviso' => 'error',
                        'windowlocation' => base_url() . "index.php/articulo_editor/asignar_revisores"
                    );
                    $this->load->view('include/aviso', $aviso);
                } else {
                    
                    $data_revisores = $this->Articulo_Model->revisores_de_articulo($id_revista);
                    foreach ($data_revisores->result() as $row) {
                        $revisor1 = $row->email_revisor_1;
                        $revisor2 = $row->email_revisor_2;
                        $revisor3 = $row->email_revisor_3;
                    }
                    
                    $datos = array(
                        'ID' => $id_revista,
                        'email_revisor_1' => $email_revisor_1,
                        'email_revisor_2' => $email_revisor_2,
                        'email_revisor_3' => $email_revisor_3
                    );
                    
                    //Update revista
                    if ($this->Articulo_Model->actualizar_articulo_revisores($datos)) {
                        
                        //Update Estado
                        if ($email_revisor_1 == "No Asignado" && $email_revisor_2 == "No Asignado" && $email_revisor_3 == "No Asignado") {
                            
                            $dato_estado = $this->Articulo_Model->articulo($id_revista);
                            foreach ($dato_estado->result() as $row) {
                                $estado_articulo = $row->id_estado;
                            }
                            
                            
                            $id_estado = 1; //en espera
                            
                            
                            if ($id_estado == $estado_articulo) {
                                $act_c1 = array(
                                    'comentario_revisor_1' => null,
                                    'comentario_revisor_2' => null,
                                    'comentario_revisor_3' => null,
                                    'ID' => $id_revista
                                );
                                $this->Articulo_Model->actualizar_comentario($act_c1);
                                $aviso = array(
                                    'title' => lang("tswal_asignacion exitosa"),
                                    'text' => lang("cswal_articulo actualizado con exito"),
                                    'tipoaviso' => 'success',
                                    'windowlocation' => base_url() . "index.php/articulo_editor/asignar_revisores"
                                );
                                
                                $this->load->view('include/aviso', $aviso);
                            } else {
                                $datos_estado1 = array(
                                    'ID' => $id_revista,
                                    'id_estado' => $id_estado
                                );
                                if ($this->Articulo_Model->actualizar_articulo_estado($datos_estado1)) {
                                    $act_c1 = array(
                                        'comentario_revisor_1' => null,
                                        'comentario_revisor_2' => null,
                                        'comentario_revisor_3' => null,
                                        'ID' => $id_revista
                                    );
                                    $this->Articulo_Model->actualizar_comentario($act_c1);
                                    $aviso = array(
                                        'title' => lang("tswal_asignacion exitosa"),
                                        'text' => lang("cswal_articulo actualizado con exito"),
                                        'tipoaviso' => 'success',
                                        'windowlocation' => base_url() . "index.php/articulo_editor/asignar_revisores"
                                    );
                                    
                                    $this->load->view('include/aviso', $aviso);
                                } else {
                                    $aviso = array(
                                        'title' => lang("tswal_error"),
                                        'text' => lang("cswal_actualizacion no realizada"),
                                        'tipoaviso' => 'error',
                                        'windowlocation' => base_url() . "index.php/articulo_editor/asignar_revisores"
                                    );
                                    $this->load->view('include/aviso', $aviso);
                                }
                            }
                        } else {
                            
                            
                            $dato_estado = $this->Articulo_Model->articulo($id_revista);
                            foreach ($dato_estado->result() as $row) {
                                $estado_articulo = $row->id_estado;
                            }
                            
                            
                            if ($revisor1 != $email_revisor_1) {
                                $act_c1 = array(
                                    'comentario_revisor_1' => null,
                                    'ID' => $id_revista
                                );
                                $this->Articulo_Model->actualizar_comentario($act_c1);
                            }
                            if ($revisor2 != $email_revisor_2) {
                                $act_c2 = array(
                                    'comentario_revisor_2' => null,
                                    'ID' => $id_revista
                                );
                                $this->Articulo_Model->actualizar_comentario($act_c2);
                            }
                            if ($revisor3 != $email_revisor_3) {
                                $act_c3 = array(
                                    'comentario_revisor_3' => null,
                                    'ID' => $id_revista
                                );
                                $this->Articulo_Model->actualizar_comentario($act_c3);
                            }
                            
                            $id_estado = 3; //asignado a revisor/revisores
                            
                            
                            if ($id_estado == $estado_articulo) {
                                $aviso = array(
                                    'title' => lang("tswal_asignacion exitosa"),
                                    'text' => lang("cswal_articulo actualizado con exito"),
                                    'tipoaviso' => 'success',
                                    'windowlocation' => base_url() . "index.php/articulo_editor/asignar_revisores"
                                );
                                
                                $this->load->view('include/aviso', $aviso);
                            } else {
                                $datos_estado3 = array(
                                    'ID' => $id_revista,
                                    'id_estado' => $id_estado
                                );
                                if ($this->Articulo_Model->actualizar_articulo_estado($datos_estado3)) {
                                    
                                    $subject = "Articulo asignado Revista UCM";
                                    $mensaje = '<html>' . '<body><h4>Hola <br><br>Se le ha asignado un artículo para ser evaluado. Puede encontrarlo en la plataforma Revista UCM.</h4><br>' . '</body>' . '</html>';
                                    $mensaje .= "<b>Saludos</br><br>";
                                    $mensaje .= "<b>Equipo Revista UCM</b><br>";
                                    $headers = "From: RevistaUCM@ucm.cl \r\n";
                                    $headers .= 'Bcc: pablo.acm.ti@gmail.com' . "\r\n";
                                    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                                    
                                    $correo = "";
                                    if ($email_revisor_1 != "No Asignado") {
                                        $correo .= $email_revisor_1;
                                        if ($email_revisor_2 != "No Asignado") {
                                            $correo .= ", ";
                                            $correo .= $email_revisor_2;
                                            if ($email_revisor_3 != "No Asignado") {
                                                $correo .= ", ";
                                                $correo .= $email_revisor_3;
                                            }
                                        }
                                    }
                                    
                                    mail($correo, $subject, $mensaje, $headers);
                                    
                                    $aviso = array(
                                        'title' => lang("tswal_asignacion exitosa"),
                                        'text' => lang("cswal_articulo actualizado con exito"),
                                        'tipoaviso' => 'success',
                                        'windowlocation' => base_url() . "index.php/articulo_editor/asignar_revisores"
                                    );
                                    
                                    
                                    $this->load->view('include/aviso', $aviso);
                                } else {
                                    $aviso = array(
                                        'title' => lang("tswal_error"),
                                        'text' => lang("cswal_actualizacion no realizada"),
                                        'tipoaviso' => 'error',
                                        'windowlocation' => base_url() . "index.php/articulo_editor/asignar_revisores"
                                    );
                                    $this->load->view('include/aviso', $aviso);
                                }
                            }
                        }
                    } else {
                        $aux = $this->Articulo_Model->articulo($id_revista);
                        
                        foreach ($aux->result() as $row) {
                            $e_1 = $row->email_revisor_1;
                            $e_2 = $row->email_revisor_2;
                            $e_3 = $row->email_revisor_3;
                        }
                        
                        if ($datos['email_revisor_1'] == $e_1 && $datos['email_revisor_2'] == $e_2 && $datos['email_revisor_3'] == $e_3) {
                            
                            $aviso = array(
                                'title' => lang("tswal_no actualizado"),
                                'text' => lang("cswal_no actualizado"),
                                'tipoaviso' => 'info',
                                'windowlocation' => base_url() . "index.php/articulo_editor/asignar_revisores"
                            );
                            $this->load->view('include/aviso', $aviso);
                        } else {
                            $aviso = array(
                                'title' => lang("tswal_error"),
                                'text' => lang("cswal_error no actualizado"),
                                'tipoaviso' => 'error',
                                'windowlocation' => base_url() . "index.php/articulo_editor/asignar_revisores"
                            );
                            $this->load->view('include/aviso', $aviso);
                        }
                    }
                }
            } else {
                $this->load->view('include/head');
                $this->load->view('include/header_editor');
                $this->load->view('articulo/view_asignar_revisores_editar', $data);
                $this->load->view('include/footer');
            }
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
    public function asignar_revisores_borrar($id_revista) {
        $user_data = $this->session->userdata('userdata');
        if ($user_data['id_rol'] == '1' || $user_data['id_rol2'] == '1' || $user_data['id_rol3'] == '1') {
            
            $data['datos']     = $this->Articulo_Model->articulo($id_revista);
            $data['revisores'] = $this->Articulo_Model->revisores();
            
            foreach ($data['datos']->result() as $row) {
                $archivo = $row->archivo;
            }
            
            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $opcion = $this->input->post('opcion');
                if ($opcion == "YES") {
                    $correo  = $this->Articulo_Model->getmail($id_revista);
                    $corr    = $correo->email_autor;
                    $subject = "Articulo eliminado - Revista UCM";
                    $mensaje = '<html>' . '<body><h4>Hola <br><br>Se ha eliminado su articulo para la revista UCM. Ingrese a la plataforma para ver más detalles.</h4><br>' . '</body>' . '</html>';
                    $mensaje .= "<b>Saludos</br><br>";
                    $mensaje .= "<b>Equipo Revista UCM</b><br>";
                    $headers = "From: RevistaUCM@ucm.cl \r\n";
                    $headers .= 'Bcc: pablo.acm.ti@gmail.com' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                    
                    mail($corr, $subject, $mensaje, $headers);
                    try {
                        unlink('uploads/' . $archivo);
                        if ($this->Articulo_Model->eliminar_articulo($id_revista)) {
                            $datos = array(
                                'title' => lang("tswal_articulo eliminado con exito"),
                                'text' => lang("cswal_articulo eliminado"),
                                'tipoaviso' => 'success',
                                'windowlocation' => base_url() . "index.php/articulo_editor/asignar_revisores"
                            );
                            $this->load->view('include/aviso', $datos);
                        } else {
                            $datos = array(
                                'title' => lang("tswal_error"),
                                'text' => lang("cswal_articulo no eliminado"),
                                'tipoaviso' => 'error',
                                'windowlocation' => base_url() . "index.php/articulo_editor/asignar_revisores"
                            );
                            //Enviar correo electrónico(Su artículo ha sido eliminado del sistema)
                            $this->load->view('include/aviso', $datos);
                        }
                    }
                    catch (Exception $e) {
                        $datos = array(
                            'title' => lang("tswal_error"),
                            'text' => lang("cswal_error archivo no eliminado"),
                            'tipoaviso' => 'error',
                            'windowlocation' => base_url() . "index.php/articulo_editor/asignar_revisores"
                        );
                        $this->load->view('include/aviso', $datos);
                    }
                } else {
                    $datos = array(
                        'title' => lang("tswal_accion cancelada por usuario"),
                        'text' => lang("alerta accion cancelada por usuario"),
                        'tipoaviso' => 'warning',
                        'windowlocation' => base_url() . "index.php/articulo_editor/asignar_revisores"
                    );
                    $this->load->view('include/aviso', $datos);
                }
            } else {
                $this->load->view('include/head');
                $this->load->view('include/header_editor');
                $this->load->view('articulo/view_asignar_revisores_borrar', $data);
                $this->load->view('include/footer');
            }
        } else {
            $aviso = array(
                'title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso' => 'error',
                'windowlocation' => base_url() . "index.php/"
            );
            $this->load->view('include/aviso', $aviso);
        }
    }
    
}

