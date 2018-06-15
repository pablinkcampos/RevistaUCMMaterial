<?php

 defined('BASEPATH') OR exit('No direct script access allowed');

 class Home_principal extends MY_Controller {

     function __construct() {
         parent::__construct();
         $this->load->model('Model_for_login');
         $this->load->model('Articulo_Model');
     }

     public function nosotros() {
         $this->load->view('include/head');
         $user_data = $this->session->userdata('userdata');
         if (($user_data['email_usuario'])) {
             if ($user_data["id_rol"] == 1) {
                 $this->load->view('include/header_editor');
             } elseif ($user_data["id_rol"] == 2) {
                 $this->load->view('include/header_revisor');
             } elseif ($user_data["id_rol"] == 3) {
                 $this->load->view('include/header_autor');
             }
         } else {
             $this->load->view('include/header_principal');
         }
         $this->load->model('Articulo_Model');
         $data["texto"] = $this->Articulo_Model->obtener_contenido("nosotros");
         $this->load->view('view_nosotros', $data);
         $this->load->view('include/footer');
     }

     public function registro() {
         $this->load->view('include/head');
         $user_data = $this->session->userdata('userdata');
         if (($user_data['email_usuario'])) {
             if ($user_data["id_rol"] == 1) {
                 $this->load->view('include/header_editor');
             } elseif ($user_data["id_rol"] == 2) {
                 $this->load->view('include/header_revisor');
             } elseif ($user_data["id_rol"] == 3) {
                 $this->load->view('include/header_autor');
             }
         } else {
             $this->load->view('include/header_principal');
         }
         $this->load->view('view_registro');
         $this->load->view('include/footer');
     }

     public function politica() {
         $this->load->view('include/head');
         $user_data = $this->session->userdata('userdata');
         if (($user_data['email_usuario'])) {
             if ($user_data["id_rol"] == 1) {
                 $this->load->view('include/header_editor');
             } elseif ($user_data["id_rol"] == 2) {
                 $this->load->view('include/header_revisor');
             } elseif ($user_data["id_rol"] == 3) {
                 $this->load->view('include/header_autor');
             }
         } else {
             $this->load->view('include/header_principal');
         }
         $this->load->model('Articulo_Model');
         $data["texto"] = $this->Articulo_Model->obtener_contenido("politicas");
         $this->load->view('view_politicas', $data);
         $this->load->view('include/footer');
     }

     public function numeros() {
         $this->load->view('include/head');
         $user_data = $this->session->userdata('userdata');
         if (($user_data['email_usuario'])) {
             if ($user_data["id_rol"] == 1) {
                 $this->load->view('include/header_editor');
             } elseif ($user_data["id_rol"] == 2) {
                 $this->load->view('include/header_revisor');
             } elseif ($user_data["id_rol"] == 3) {
                 $this->load->view('include/header_autor');
             }
         } else {
             $this->load->view('include/header_principal');
         }
         $this->load->model('Articulo_Model');
         $data["texto"] = $this->Articulo_Model->obtener_contenido("numeros");
         $this->load->view('view_numeros_en_sesion', $data);
         $this->load->view('include/footer');
     }

     public function publicacion() {
         $this->load->view('include/head');
         $user_data = $this->session->userdata('userdata');
         if (($user_data['email_usuario'])) {
             if ($user_data["id_rol"] == 1) {
                 $this->load->view('include/header_editor');
             } elseif ($user_data["id_rol"] == 2) {
                 $this->load->view('include/header_revisor');
             } elseif ($user_data["id_rol"] == 3) {
                 $this->load->view('include/header_autor');
             }
         } else {
             $this->load->view('include/header_principal');
         }
         $this->load->view('view_revista_en_sesion');
         $this->load->view('include/footer');
     }

     public function arbitraje() {
         $this->load->view('include/head');
         $user_data = $this->session->userdata('userdata');
         if (($user_data['email_usuario'])) {
             if ($user_data["id_rol"] == 1) {
                 $this->load->view('include/header_editor');
             } elseif ($user_data["id_rol"] == 2) {
                 $this->load->view('include/header_revisor');
             } elseif ($user_data["id_rol"] == 3) {
                 $this->load->view('include/header_autor');
             }
         } else {
             $this->load->view('include/header_principal');
         }
         $this->load->view('view_arbitraje');
         $this->load->view('include/footer');
     }

     public function contacto() {
         $this->load->view('include/head');
         $user_data = $this->session->userdata('userdata');
         if (($user_data['email_usuario'])) {
             if ($user_data["id_rol"] == 1) {
                 $this->load->view('include/header_editor');
             } elseif ($user_data["id_rol"] == 2) {
                 $this->load->view('include/header_revisor');
             } elseif ($user_data["id_rol"] == 3) {
                 $this->load->view('include/header_autor');
             }
         } else {
             $this->load->view('include/header_principal');
         }
         $this->load->view('view_contacto');
         $this->load->view('include/footer');
     }

     
    public function plantilla() {
         $this->load->view('include/head');
         $user_data = $this->session->userdata('userdata');
         if (($user_data['email_usuario'])) {
             if ($user_data["id_rol"] == 1) {
                 $this->load->view('include/header_editor');
             } elseif ($user_data["id_rol"] == 2) {
                 $this->load->view('include/header_revisor');
             } elseif ($user_data["id_rol"] == 3) {
                 $this->load->view('include/header_autor');
             }
         } else {
             $this->load->view('include/header_principal');
         }
         $this->load->view('view_plantilla');
         $this->load->view('include/footer');
     }

         
    public function cuerpo_editorial() {
        $this->load->view('include/head');
        $data["coeditor"] = $this->Articulo_Model->obtener_contenido("coeditor");
        $data["editor"] = $this->Articulo_Model->obtener_contenido("editor");
        $data["comite_editor"] = $this->Articulo_Model->obtener_contenido("comite editor");
        $data["comite_editor_asesor"] = $this->Articulo_Model->obtener_contenido("comite editor asesor");
        $data["produccion_editorial"] = $this->Articulo_Model->obtener_contenido("produccion editorial");
        $this->load->view('include/header_principal');
        $this->load->view('view_cuerpo', $data);
        $this->load->view('include/footer');
    }

    public function buscar() {
         $this->load->view('include/head');
         $user_data = $this->session->userdata('userdata');
         if (($user_data['email_usuario'])) {
             if ($user_data["id_rol"] == 1) {
                 $this->load->view('include/header_editor');
             } elseif ($user_data["id_rol"] == 2) {
                 $this->load->view('include/header_revisor');
             } elseif ($user_data["id_rol"] == 3) {
                 $this->load->view('include/header_autor');
             }
         } else {
             $this->load->view('include/header_principal');
         }
         $data['datos'] = $this->Articulo_Model->articulos_buscar_home_principal();
         $this->load->view('view_buscar', $data);
         $this->load->view('include/footer');
     }
 }
 