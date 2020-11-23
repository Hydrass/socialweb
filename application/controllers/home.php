<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

        public function __construct()
        {
          parent::__construct();
          $metodo = $this->router->fetch_method();
          if(!isset($_SESSION['user_user']) && $metodo != 'lg_sistema'){
            redirect('login');
          }
      
          $this->load->model('Home_model');
          //Codeigniter : Write Less Do More
        }
        

        public function home_inicio(){
                // $this->output->enable_profiler(TRUE);
                $id = $_SESSION['user_user']->id_registrar;

                if(isset($_POST['publicar'])){
                        // $id = $_SESSION['user_user']->id_registrar;
                        $txtTexto = $this->security->xss_clean($this->input->post('txtTexto'));
        
                        $this->load->helper('date');
        
                        $fecha = date('d-m-Y');
                        $hora = date('h:i:s');
                        $this->Home_model->add_publicacion($fecha,$hora,$txtTexto,$id);
                }

                
                $datos['mostrar_h'] = $this->Home_model->moostrar_home_publicacion($id);
                


                $datos['user_perfil'] = $this->Home_model->perfil_user($id);
                $datos['title'] = 'Social Web | '.$datos['user_perfil']->nombre;
                
                $this->load->view('Plantilla/Head',$datos);
                $this->load->view('Home/home');
                $this->load->view('Plantilla/Footer');
        }
	public function lg_sistema()
	{
                // $this->output->enable_profiler(TRUE);

                if(isset($_POST['bt_registrar'])){
                        $txtNombre = $this->security->xss_clean($this->input->post('txtNombre'));
                        $txtApellido = $this->security->xss_clean($this->input->post('txtApellido'));
                        $txtTelefono = $this->security->xss_clean($this->input->post('txtTelefono'));
                        $txtEmail = $this->security->xss_clean($this->input->post('txtEmail'));
                        $txtUsuario = $this->security->xss_clean($this->input->post('txtUsuario'));
                        $txtClave1 = $this->security->xss_clean($this->input->post('txtClave1'));
                        
                        $this->Home_model->add_registro($txtNombre, $txtApellido, $txtTelefono, $txtEmail, $txtUsuario, $txtClave1);
                }
                

                $datos['title'] = "Login";

                $this->load->view('Login/login',$datos);

        }
        
        public function perfil($id){
                $datos['user_perfil'] = $this->Home_model->perfil_user($id);

                $datos['mostrar_p'] = $this->Home_model->mostrar_publicacion($id);
                $datos['mostrar_h'] = $this->Home_model->moostrar_home_publicacion($id);

                $datos['title'] = 'Soial Web | '.$datos['user_perfil']->nombre;

                $this->load->view('Plantilla/Head', $datos);
                $this->load->view('home/perfil');
                $this->load->view('Plantilla/Footer');  
        }


        public function cerrar_sesion(){
                session_destroy();
                redirect('login');
        }

        public function perfil_mas_publicacion($nombre, $id){
                // $this->output->enable_profiler(TRUE);
                $datos['mostrar_mas'] = $this->Home_model->monstrar_mas_user($nombre, $id);
                // $datos['mostrar_mas_amigos'] = $this->Home_model->mostrar_mas_perfil($nombre);
                $datos['mostrar_mas_contenido'] = $this->Home_model->mostrar_mas_perfil($nombre);



                $datos['title'] = 'Social Web | '.$datos['mostrar_mas']->nombre;

                $this->load->view('Plantilla/Head', $datos);
                $this->load->view('home/perfil_mostras_mas');
                $this->load->view('Plantilla/Footer');  
        }
        public function mostras_mas_publicacion($nombre, $id){
                // $this->output->enable_profiler(TRUE);
                $datos['mostrar_mas'] = $this->Home_model->monstrar_mas_user($nombre, $id);
                $datos['mostrar_mas_amigos'] = $this->Home_model->mostrar_mas_amigos($nombre, $id);

                $datos['title'] = 'Social Web | '.$datos['mostrar_mas']->nombre;

                $this->load->view('Plantilla/Head', $datos);
                $this->load->view('home/mas_mostras_mas');
                $this->load->view('Plantilla/Footer'); 

        }
}