<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Login_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Login_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  // ------------------------------------------------------------------------

  function Authentication($username,$password){
			
    $condition = "m_admin.username = '" . $username . "' and m_admin.password ='" . $password ."' and m_admin.status ='1' ";
    $this->db->select('m_admin.id AS user_id, m_admin.first_name AS first_name, m_admin.last_name AS last_name, m_role_admin.name AS role');
    $this->db->from('m_admin');
    $this->db->join('m_role_admin', 'm_role_admin.id = m_admin.id_role_admin', 'left');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    return $query;
  }
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */