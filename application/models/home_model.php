<?php 
 class Home_model extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }

    public function perfil_user($id){
        $this->db->where('id_registrar',$id);
        $resultado = $this->db->get('registrar');
        return $resultado->row();

    }

    public function add_registro($nombre, $apellido, $telefono, $corre, $nombre_usuario, $clave){
        $sql = "INSERT INTO `registrar`(`nombre`, `apellido`, `telefono`, `correo`, `nombre_usuario`, `clave`) VALUES ('$nombre','$apellido','$telefono','$corre','$nombre_usuario','$clave')";

        $this->db->query($sql);
    }

    public function add_publicacion($fecha, $hora, $txtTexto, $id){
        $sql = "INSERT INTO `publicaciones`( `fecha`, `hora`, `texto`, `id_registrar`) VALUES ('$fecha','$hora','$txtTexto','$id')";
        $this->db->query($sql);
    }


    public function moostrar_home_publicacion(){
        $sql = "SELECT * FROM publicaciones INNER JOIN registrar ON publicaciones.id_registrar = registrar.id_registrar ORDER by id_publicacion DESC"; 
        $resultado = $this->db->query($sql);

        // $this->db->order_by('id_publicacion','DESC');
        // $resultado = $this->db->get('publicaciones');
        return $resultado->result();
    }
    public function mostrar_publicacion($id_registro){
        $this->db->where('id_registrar',$id_registro);
        $this->db->order_by('id_publicacion','DESC');
        $resultado = $this->db->get('publicaciones');
        return $resultado->result();
    }


    public function monstrar_mas_user($nombre,$id){
        $sql = "SELECT * FROM publicaciones INNER JOIN registrar ON publicaciones.id_registrar = registrar.id_registrar WHERE registrar.nombre = '$nombre' AND publicaciones.id_publicacion = '$id' ORDER by id_publicacion DESC";
        $resultado = $this->db->query($sql);
        return $resultado->row();
    }

    public function mostrar_mas_amigos($nombre, $id){
        $sql = "SELECT * FROM publicaciones INNER JOIN registrar ON publicaciones.id_registrar = registrar.id_registrar WHERE registrar.nombre = '$nombre' AND publicaciones.id_publicacion = '$id' ORDER by id_publicacion DESC";
        $resultado = $this->db->query($sql);
        return $resultado->result();
    }

    public function mostrar_mas_perfil($nombre){
        $sql = "SELECT * FROM publicaciones INNER JOIN registrar ON publicaciones.id_registrar = registrar.id_registrar WHERE registrar.nombre = '$nombre' ORDER by id_publicacion DESC";
        $consulta = $this->db->query($sql);
        return $consulta->result();
    }
 }