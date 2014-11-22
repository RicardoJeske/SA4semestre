<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('login_model','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
   $this->form_validation->set_rules('senha', 'Senha', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
   $this->load->helper(array('form'));
        $this->load->view('home_header');
        $this->load->view('home_sidebar');
        $this->load->view('login_view');
   }
   else
   {
     //Go to private area
     redirect('artigo', 'refresh');
   }

 }

 function check_database($senha)
 {
   //Field validation succeeded.  Validate against database
   $email = $this->input->post('email');

   //query the database
   $result = $this->login_model->login($email, $senha);
   
   

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'idusuario' => $row->idusuario,
         'email' => $row->email
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Email ou senha inválido!');
     return false;
   }
 }
}
?>