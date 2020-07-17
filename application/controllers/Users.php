<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path


class Users extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    if (empty($_SESSION['user_id'])) {
      redirect('Login');
    }
    $this->load->model('Users_model','users');
  }

  public function index()
  {
    $this->load->view('Users/index.php');
  }

  public function ajax_list()
	{
		$list = $this->users->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $users) {
			$no++;
      $row = array();
      $row["no"]            = $no;
      $row["id"]            = $users->id;
      $row["email"]         = $users->email;
			$row["username"]      = $users->username;
			$row["nama"]          = $users->nama;
      $row["jenis_kelamin"] = $users->jenis_kelamin;
      $row["alamat"]        = $users->alamat;
      $row["tempat_lahir"]  = $users->tempat_lahir;
      $row["tanggal_lahir"] = $users->tanggal_lahir;
      $row["agama"]         = $users->agama;
      $row["pekerjaan"]     = $users->pekerjaan;
      $row["kewarganegaraan"] = $users->kewarganegaraan;
      $row["created"]       = $users->created;
      $row["modified"]      = $users->modified;
      $row["status"]        = $users->status;
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->users->count_all(),
						"recordsFiltered" => $this->users->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
  }
  
  public function ajax_edit($id)
	{
    $data  = $this->users->get_by_id($id);
		echo json_encode($data);
	}

  public function ajax_add()
	{
    $user_id      = $this->session->userdata('user_id');
    $data_syarat  = $this->input->post('syarat');
    $date_now     = date("Y-m-d H:i:s");

		$data = array(
        'id_admin'      => $user_id,
        'jenis_barang'  => $this->input->post('jenis_barang'),
        'keterangan'    => $this->input->post('keterangan'),
        'created'       => $date_now,
        'status'        => "1",
			);
    $insert = $this->users->save($data);
    
    foreach ($data_syarat as $key) {
      $dt   = array(
        'id_users'  => $insert,
        'syarat'      => $key,
        'created'     => $date_now,
        'status'      => '1'
      );
      $this->db->insert("m_syarat_users", $dt);
    }

		echo json_encode(array("status" => TRUE));
  }

  public function ajax_update()
	{
    $id           = $this->input->post('id');
    $date_now     = date("Y-m-d H:i:s");
		$data = array(
      'jenis_barang'  => $this->input->post('jenis_barang'),
      'keterangan'    => $this->input->post('keterangan'),
      'modified'      => date("Y-m-d H:i:s"),
      'status'        => "1",
    );
    
    $data_syarat    = $this->input->post('syarat');
    foreach ($data_syarat as $key) {
      $getExisting = $this->users->get_syarat_by_id($key['id']);
      if ($getExisting->num_rows() == 0) {
        $dt   = array(
          'id_users'  => $id,
          'syarat'      => $key['syarat'],
          'created'     => $date_now,
          'status'      => '1'
        );
        $this->db->insert("m_syarat_users", $dt);
      }
    }

		// $this->users->update(array('id' => $id), $data);
		echo json_encode(array("status" => TRUE));
	}

}


/* End of file Users.php */
/* Location: ./application/controllers/Users.php */