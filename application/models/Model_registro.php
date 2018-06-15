<?php

class Model_registro extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    function ingresar_autor($data) {
      $this->db->insert('usuario', $data);

      if($this->db->affected_rows() > 0){
          return true;
      }else{
          return false;
      }
    }

    function ingresar_autor_login($data) {
      $this->db->insert('login', $data);

      if($this->db->affected_rows() > 0){
          return true;
      }else{
          return false;
      }
    }
    function ingresar_revisor_login($data) {
      $this->db->insert('login', $data);

      if($this->db->affected_rows() > 0){
          return true;
      }else{
          return false;
      }
    }
    function ingresar_lector_login($data) {
        $this->db->insert('login', $data);
  
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
      }

    function ingresar_revisor($data) {
      $this->db->insert('revisor', $data);

      if($this->db->affected_rows() > 0){
          return true;
      }else{
          return false;
      }
    }

    function ingresar_lector($data) {
        $this->db->insert('lector', $data);
  
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
      }
    function ingresar_nuevo_campo_usuario($data) {
      $this->db->insert('campo_usuario', $data);

      if($this->db->affected_rows() > 0){
          return true;
      }else{
          return false;
      }
    }

    function ingresar_nuevo_tema_usuario($data) {
        $this->db->insert('temas_usuario', $data);
  
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function ingresar_nuevo_tema_revisor($data) {
        $this->db->insert('revisor_tema', $data);
  
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function ingresar_nuevo_campo_revisor($data) {
      $this->db->insert('campo_revisor', $data);

      if($this->db->affected_rows() > 0){
          return true;
      }else{
          return false;
      }
    }

    function get_id_usuario($correo)
    {
      $query = $this->db->query("SELECT ID from usuario WHERE email = ?", array($correo));

      $result = $query->row();

      if ($result)
      {
          return $result;
      }
      else
      {
          return false;
      }
    }

    function get_id_revisor($correo)
    {
      $query = $this->db->query("SELECT ID from revisor WHERE email = ?", array($correo));

      $result = $query->row();

      if ($result)
      {
          return $result;
      }
      else
      {
          return false;
      }
    }

    function get_id_lector($correo)
    {
      $query = $this->db->query("SELECT ID from lector WHERE email = ?", array($correo));

      $result = $query->row();

      if ($result)
      {
          return $result;
      }
      else
      {
          return false;
      }
    }
    function get_existe_usuario($correo)
    {
      $query = $this->db->query("SELECT correo from login WHERE correo = ?", array($correo));

      if ($query->num_rows() > 0)
      {
          return true;
      }
      else
      {
          return false;
      }
    }

    function actualizar_autor_agregando_revisor($correo)
    {
      $query = $this->db->query("UPDATE login SET rol2_fk = 555 WHERE correo = ? AND rol_fk = 3", array($correo));

      if($this->db->affected_rows() > 0){
          return true;
      }else{
          return false;
      }
    }

    function actualizar_revisor_agregando_autor($correo)
    {
      $query = $this->db->query("UPDATE login SET rol2_fk = 3 WHERE correo = ? AND rol_fk = 2", array($correo));

      if($this->db->affected_rows() > 0){
          return true;
      }else{
          return false;
      }
    }
}
