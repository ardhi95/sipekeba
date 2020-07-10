<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

class Login extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view("login/login_admin");
  }

  public function Auth(){
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $data = $this->Login_model->Authentication($username, md5($password));
    if ($data->num_rows() > 0)
      {
        $this->session->fullname = $data->row()->first_name . " " . $data->row()->last_name;
        $this->session->level = $data->row()->role;
        $this->session->user_id = $data->row()->user_id;          
        
        redirect('Dashboard');
      } else{
        $this->session->set_flashdata('gagal', '<span class="label label-danger"><span class="glyphicon glyphicon-ban-circle"></span> Maaf Username & Password Tidak Sesuai</span>');
        
        redirect('Login');
      }
  }

  public function logout() {
    $this->session->unset_userdata('token');
    $this->session->unset_userdata('userData');
    $this->session->sess_destroy();
    redirect('Login','refresh');
}
}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */