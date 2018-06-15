<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Articulo_revisor extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Articulo_Model');
        $this->load->helper(array('form', 'url'));
        $this->load->helper("file");
    }

    public function index() {
        $aviso =array ('title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso'=>'error',
                'windowlocation'=> base_url()."index.php/" 
                );
            $this->load->view('include/aviso',$aviso);
    }

    //muestra todos los articulos asignados al revisor

    public function articulos_asignados() {
        $user_data = $this->session->userdata('userdata');
        if($user_data['id_rol']=='2'||$user_data['id_rol2']=='2'||$user_data['id_rol3']=='2'){

               // se obtiene el email de la informacion de usuario logueado
            $email_autor=$user_data['email_usuario'];
            //se obtiene el id 
            $datos = $this->Articulo_Model->id_revisor_email($email_autor);
            if($datos){
                
                $id_revisor = $datos->ID;
            }
            else{
                $id_revisor = -1;
            }
        
               // se cargan los articulos correspondientes a ese id
            $data['datos'] = $this->Articulo_Model->articulos_asignados_por_id($id_revisor);
           
            $this->load->view('include/head');
            $this->load->view('include/header_revisor');
            $this->load->view('articulo/view_articulos_asignados',$data); 
            $this->load->view('include/footer');

        }else{
            $aviso =array ('title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso'=>'error',
                'windowlocation'=> base_url()."index.php/" 
                );
            $this->load->view('include/aviso',$aviso);
        }
        
    }
     // muestra todos los articulos revisados del revisor
    public function articulos_revisados() {
        $user_data = $this->session->userdata('userdata');
        if($user_data['id_rol']=='2'||$user_data['id_rol2']=='2'||$user_data['id_rol3']=='2'){


            $email_autor=$user_data['email_usuario'];
            $datos = $this->Articulo_Model->id_revisor_email($email_autor);
            if($datos){
                
                $id_revisor = $datos->ID;
            }
            else{
                $id_revisor = -1;
            }
        

            $data['datos'] = $this->Articulo_Model->articulos_revisados_por_id($id_revisor);
           
            $this->load->view('include/head');
            $this->load->view('include/header_revisor');
            $this->load->view('articulo/view_articulos_revisados',$data); 
            $this->load->view('include/footer');

        }else{
            $aviso =array ('title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso'=>'error',
                'windowlocation'=> base_url()."index.php/" 
                );
            $this->load->view('include/aviso',$aviso);
        }
        
    }

     // carga la vista de un articulo asignado a el revisor de acuerdo al id.
    public function articulos_asignados_ver($id_revista) {
        $user_data = $this->session->userdata('userdata');
        if($user_data['id_rol']=='2'||$user_data['id_rol2']=='2'||$user_data['id_rol3']=='2'){

            $data['datos'] = $this->Articulo_Model->articulo_ver($id_revista);

            $this->load->view('include/head');
            $this->load->view('include/header_revisor');
            $this->load->view('articulo/view_articulos_asignados_ver',$data); 
            $this->load->view('include/footer');

        }else{
            $aviso =array ('title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso'=>'error',
                'windowlocation'=> base_url()."index.php/" 
                );
            $this->load->view('include/aviso',$aviso);
        }
        
    }
    // carga la vista de un articulo revisado por el revisor de acuerdo al id.
    public function articulos_revisados_ver($id_revista) {
        $user_data = $this->session->userdata('userdata');
        if($user_data['id_rol']=='2'||$user_data['id_rol2']=='2'||$user_data['id_rol3']=='2'){

            $data['datos'] = $this->Articulo_Model->articulo_ver($id_revista);

            $this->load->view('include/head');
            $this->load->view('include/header_revisor');
            $this->load->view('articulo/view_articulos_revisados_ver',$data); 
            $this->load->view('include/footer');

        }else{
            $aviso =array ('title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso'=>'error',
                'windowlocation'=> base_url()."index.php/" 
                );
            $this->load->view('include/aviso',$aviso);
        }
        
    }

    public function articulos_asignados_comentar($id_revista) {
        $user_data = $this->session->userdata('userdata');

        if($user_data['id_rol']=='2'||$user_data['id_rol2']=='2'||$user_data['id_rol3']=='2'){

            $data['datos'] = $this->Articulo_Model->articulo_ver($id_revista);
            foreach ($data['datos']->result() as $row) {
                $email_autor = $row->email_autor;
                $rev1 = $row->id_rev1;
                $rev2 = $row->id_rev2;
                $rev3 = $row->id_rev3;
                $cal_rev1 = $row->cal_rev1; 
			    $cal_rev2 = $row->cal_rev2; 
				$cal_rev3 = $row->cal_rev3;
                

            }
            $now   = date('Y-m-d H:i:s');
            $email_revisor=$user_data['email_usuario'];
            $datos = $this->Articulo_Model->id_revisor_email($email_revisor);
            if($datos){
                
                $id_revisor = $datos->ID;
            }
            else{
                $id_revisor = -1;
            }

            if ($this->input->server('REQUEST_METHOD') == 'POST') {
                $user_data = $this->session->userdata('userdata');
                $email_autor=$user_data['email_usuario'];
                $comentario   = $this->input->post('comentario');
                $calificacion   = $this->input->post('calificacion');
                


                $datos          = array(
                    'id_revista'        => $id_revista,
                    'id_revisor'     => $id_revisor,
                    'comentario'        => $comentario

                    );
                
                $estado = 3;


                if($rev1==$id_revisor){
                    $cal_rev1 = $calificacion;
                    if(($rev1 != 0 && $rev2 == 0 && $rev3 == 0 && $cal_rev1 !=3) || ($rev1 != 0 && $rev2 == 0 && $rev3 != 0 && $cal_rev1 !=3 && $cal_rev3 !=3) || ($rev1 != 0 && $rev2 != 0 && $rev3 == 0 && $cal_rev1 !=3 && $cal_rev2 !=3) ||  ($rev1 != 0 && $rev2 != 0 && $rev3 != 0 && $cal_rev1!=3 && $cal_rev2!=3 && $cal_rev3!=3) ){
                        $estado=14;
                    }
                    $datos          = array(
                        'ID'        => $id_revista,
                        'calificaRev1'     => $calificacion,
                        'comentario_revisor_1'        => $comentario,
                        'id_estado' => $estado,
                        'fechaCalificaRev' => $now

                    );
                    if($this->Articulo_Model->actualizar_articulo_estado($datos)){
                 
                        $aviso =array ('title' => lang("tswal_comentario subido con exito"),
                            'text' => lang("cswal_comentario actualizado"),
                            'tipoaviso'=>'success',
                            'windowlocation'=> base_url()."index.php/articulo_revisor/articulos_asignados"    
                            );
                        $this->load->view('include/aviso',$aviso);
                    }else{
                        $aviso =array ('title' => lang("tswal_error"),
                            'text'=>'Error: Comentario no actualizado',
                            'tipoaviso'=>'error',
                            'windowlocation'=> base_url()."index.php/articulo_revisor/articulos_asignados"    
                            );
                        $this->load->view('include/aviso',$aviso);
                    }
                }
                elseif($rev2==$id_revisor){
                    $cal_rev2 = $calificacion;
                    if(($rev1 == 0 && $rev2 != 0 && $rev3 == 0 && $cal_rev2 !=3)  || ($rev1 != 0 && $rev2 != 0 && $rev3 == 0 && $cal_rev1 !=3 && $cal_rev2 !=3) || ($rev1 == 0 && $rev2 != 0 && $rev3 != 0 && $cal_rev2 !=3 &&  $cal_rev3 !=3)  || ($rev1 != 0 && $rev2 != 0 && $rev3 != 0 && $cal_rev1!=3 && $cal_rev2!=3 && $cal_rev3!=3) ){
                        $estado=14;
                    }
                    $datos          = array(
                        'ID'        => $id_revista,
                        'calificaRev2'     => $calificacion,
                        'comentario_revisor_2'        => $comentario,
                        'id_estado' => $estado,
                        'fechaCalificaRev' => $now
                    );
                    if($this->Articulo_Model->actualizar_articulo_estado($datos)){
                        $aviso =array ('title' => lang("tswal_comentario subido con exito"),
                            'text' => lang("cswal_comentario actualizado"),
                            'tipoaviso'=>'success',
                            'windowlocation'=> base_url()."index.php/articulo_revisor/articulos_asignados"    
                            );
                        $this->load->view('include/aviso',$aviso);
                    }else{
                        $aviso =array ('title' => lang("tswal_error"),
                            'text'=>'Error: Comentario no actualizado',
                            'tipoaviso'=>'error',
                            'windowlocation'=> base_url()."index.php/articulo_revisor/articulos_asignados"    
                            );
                        $this->load->view('include/aviso',$aviso);
                    }
                }
                elseif($rev3==$id_revisor){
                    $cal_rev3 = $calificacion;
                    if(($rev1 == 0 && $rev2 == 0 && $rev3 != 0 && $cal_rev3 !=3) || ($rev1 != 0 && $rev2 = 0 && $rev3 != 0  && $cal_rev1!=3 && $cal_rev3!=3) || ($rev1 == 0 && $rev2 != 0 && $rev3 != 0  && $cal_rev2!=3 && $cal_rev3!=3) || ($rev1 != 0 && $rev2 != 0 && $rev3 != 0 && $cal_rev1!=3 && $cal_rev2!=3 && $cal_rev3!=3) ){
                        $estado=14;
                    }
                    $datos          = array(
                        'ID'        => $id_revista,
                        'calificaRev3'     => $calificacion,
                        'comentario_revisor_3'        => $comentario,
                        'id_estado' => $estado,
                        'fechaCalificaRev' => $now
                    );
                    if($this->Articulo_Model->actualizar_articulo_estado($datos)){
                        $aviso =array ('title' => lang("tswal_comentario subido con exito"),
                            'text' => lang("cswal_comentario actualizado"),
                            'tipoaviso'=>'success',
                            'windowlocation'=> base_url()."index.php/articulo_revisor/articulos_asignados"    
                            );
                        $this->load->view('include/aviso',$aviso);
                    }else{
                        $aviso =array ('title' => lang("tswal_error"),
                            'text'=>'Error: Comentario no actualizado',
                            'tipoaviso'=>'error',
                            'windowlocation'=> base_url()."index.php/articulo_revisor/articulos_asignados"    
                            );
                        $this->load->view('include/aviso',$aviso);
                    }
                }
                else{
                    $aviso =array ('title' => lang("tswal_acceso denegado"),
                    'text' => lang("cswal_acceso denegado"),
                    'tipoaviso'=>'error',
                    'windowlocation'=> base_url()."index.php/" 
                    );
                    $this->load->view('include/aviso',$aviso);

                }

            }else{
                $user_data = $this->session->userdata('userdata');
                $email_revisor=$user_data['email_usuario'];

                $datos          = array(
                    'id_revista'        => $id_revista,
                    'id_revisor'     => $id_revisor,
                    );

                $data['datos'] = $this->Articulo_Model->articulo_ver($id_revista);
                foreach ($data['datos']->result() as $row) {
                    $email_autor = $row->email_autor;
                    $rev1 = $row->id_rev1;
                    $rev2 = $row->id_rev2;
                    $rev3 = $row->id_rev3;
                    $cal_rev1 = $row->cal_rev1; 
                    $cal_rev2 = $row->cal_rev2; 
                    $cal_rev3 = $row->cal_rev3;
                    $comentario1=$row->com_rev1;
                    $comentario2=$row->com_rev2;
                    $comentario3=$row->com_rev3; 
        
                }
                $comentario="";
                $calificacion=3;
                
                if($rev1==$id_revisor){
                    $comentario=$comentario1;
                    $calificacion=$cal_rev1;
                }
                if($rev2==$id_revisor){
                    $comentario=$comentario2;
                    $calificacion=$cal_rev2;
                }
                if($rev3==$id_revisor){
                    $comentario=$comentario3;
                    $calificacion=$cal_rev3;
                }
                
                
                $data['comentario']=$comentario;
                $data['calificacion']=$calificacion;
                $data["calificaciones"] = $this->Articulo_Model->getCalificaciones();

                $this->load->view('include/head');
                $this->load->view('include/header_revisor');
                $this->load->view('articulo/view_articulos_asignados_comentar',$data); 
                $this->load->view('include/footer');
            }
        }else{
            $aviso =array ('title' => lang("tswal_acceso denegado"),
                'text' => lang("cswal_acceso denegado"),
                'tipoaviso'=>'error',
                'windowlocation'=> base_url()."index.php/" 
                );
            $this->load->view('include/aviso',$aviso);
        }
    }
    
}

