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
			
    $condition = "m_user.username = '" . $username . "' and m_user.password ='" . $password ."' and m_user.status ='1' ";
    $this->db->select('m_user.id AS user_id, m_user.first_name AS first_name, m_user.last_name AS last_name, m_role_admin.name AS role');
    $this->db->from('m_user');
    $this->db->join('m_role_admin', 'm_role_admin.id = m_user.id_role_admin', 'left');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    return $query;
  }
}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */