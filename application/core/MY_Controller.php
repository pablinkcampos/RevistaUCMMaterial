<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {       
    public function __construct() {
        parent::__construct();
        $this->cargar_lenguaje();
       
        
    }
    private function cargar_lenguaje(){
         if($this->session->has_userdata('lang')){
            $lenguaje = $this->session->userdata('lang');
            $this->lang->load($lenguaje['lang'], $lenguaje['route']);
         }else{
            $this->lang->load(DEFAULT_LANG, DEFAULT_LANG_ROUTE);
         }

    }
    public function cambiar_lenguaje_core(){
        $datos = $this->input->post('lenguaje');
        $lenguaje = array();
        switch(strtolower($datos)){
            case 'español':
                 $lenguaje['lang'] = 'es';
                 $lenguaje['route'] = 'spanish';
            break;
            case 'ingles':
                 $lenguaje['lang'] = 'en';
                 $lenguaje['route'] = 'english';
            break;
            case 'portugues':
                 $lenguaje['lang'] = 'pt';
                 $lenguaje['route'] = 'portuguese';
            break;
            default:
                 $lenguaje['lang'] = DEFAULT_LANG;
                 $lenguaje['route'] = DEFAULT_LANG_ROUTE;
            break;
        }
        $this->session->set_userdata('lang', $lenguaje);
        return array('status' => 200);
    }

}