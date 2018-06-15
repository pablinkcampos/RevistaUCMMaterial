<?php

class Model_for_login extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }



    function verificaUsuario($usuario, $contrasena) {

        $query = $this->db->query("SELECT correo, rol_fk, rol2_fk, rol3_fk FROM login WHERE correo = ? AND clave = ? AND rol_fk <= 3", array($usuario, $contrasena));

        $result = $query->row();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function verificaUsuario_legacy($usuario, $contrasena) {
        $this->db->select('correo, rol_fk, rol2_fk, rol3_fk');
        $this->db->from('login');
        $this->db->where('correo', $usuario);
        $this->db->where('clave', $contrasena);

        $query = $this->db->get();

        $result = $query->row();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    function get_existe_usuario($correo) {
        $query = $this->db->query("SELECT correo FROM login WHERE correo = ? AND ( (rol_fk = 3 || rol2_fk = 3) || (rol_fk = 2 || rol2_fk = 2))", array($correo));

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function get_paises() {
        $this->db->select('ID, nombre');
        $this->db->from('paises');
        $this->db->order_by("nombre", "asc");

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    function get_areas() {
        $this->db->select('*');
        $this->db->from('campo_investigacion');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    function get_temas() {
        $this->db->select('*');
        $this->db->from('temas');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

    function modify_pass($correo) {
        $query = $this->db->query("UPDATE login SET clave = ? WHERE correo = ?", array($correo['clave'], $correo['correo']));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function modify_password($correo, $clave) {
        $query = $this->db->query("UPDATE login SET clave = sha1(CONCAT(?, '4b8519cf8d0f836b4516f59c1826db9a')) WHERE correo = ?", array($clave, $correo));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}
