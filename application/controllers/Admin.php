<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

class Admin extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    if (empty($_SESSION['user_id'])) {
      redirect('Login');
    }
    $this->load->model('Admin_model','admin');
  }

  public function index()
  {
    $this->load->view('Admin/index.php');
  }

  public function ajax_list()
	{
		$list = $this->admin->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $admin) {
			$no++;
      $row = array();
      $row["no"]          = $no;
      $row["id"]          = $admin->id;
      $row["role"]        = $admin->role;
			$row["first_name"]  = $admin->first_name;
			$row["last_name"]   = $admin->last_name;
			$row["email"]       = $admin->email;
			$row["username"]    = $admin->username;
      // $row[] = $admin->password;
      $row["created"]     = $admin->created;
      $row["modified"]    = $admin->modified;
      $row["status"]      = $admin->status;
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->admin->count_all(),
						"recordsFiltered" => $this->admin->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
  }
  
  
  public function ajax_edit($id)
	{
		$data = $this->admin->get_by_id($id);
		echo json_encode($data);
	}

  public function ajax_add()
	{
		$data = array(
        'id_role_admin' => "2",
        'first_name'    => $this->input->post('first_name'),
        'last_name'     => $this->input->post('last_name'),
        'email'         => $this->input->post('email'),
        'username'      => $this->input->post('username'),
        'password'      => md5($this->input->post('password')),
        'created'       => date("Y-m-d H:i:s"),
        'status'        => "1",
			);
		$insert = $this->admin->save($data);
		echo json_encode(array("status" => TRUE));
  }

  public function ajax_update()
	{
    $newPwd = $this->input->post('password');
    $oldPwd = $this->input->post('oldPassword');

		$data = array(
				'first_name'    => $this->input->post('first_name'),
        'last_name'     => $this->input->post('last_name'),
        'email'         => $this->input->post('email'),
        'username'      => $this->input->post('username'),
        'password'      => empty($newPwd) ? $oldPwd : md5($newPwd),
			);
		$this->admin->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}
  
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */