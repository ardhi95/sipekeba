<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

class Dashboard extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    if (empty($_SESSION['user_id'])) {
      redirect('Login');
    }
  }

  public function index()
  {
    
    $this->load->view("dashboard/index.php");
  }

}


/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */