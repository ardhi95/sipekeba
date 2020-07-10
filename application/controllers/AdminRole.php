<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

class AdminRole extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data["adminRole"] = $this->db->get('m_role_admin');
    
    $this->load->view('AdminRole/index.php', $data, FALSE);
  }

}


/* End of file AdminRole.php */
/* Location: ./application/controllers/AdminRole.php */