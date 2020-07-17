<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path


class Layanan extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    if (empty($_SESSION['user_id'])) {
      redirect('Login');
    }
    $this->load->model('Layanan_model','layanan');
  }

  public function index()
  {
    $this->load->view('Layanan/index.php');
  }

  public function ajax_list()
	{
		$list = $this->layanan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $layanan) {
			$no++;
      $row = array();
      $row["no"]            = $no;
      $row["id"]            = $layanan->id;
      $row["createdby"]     = $layanan->createdby;
			$row["jenis_barang"]  = $layanan->jenis_barang;
			$row["keterangan"]    = $layanan->keterangan;
      $row["created"]       = $layanan->created;
      $row["modified"]      = $layanan->modified;
      $row["status"]        = $layanan->status;
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->layanan->count_all(),
						"recordsFiltered" => $this->layanan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
  }
  
  public function ajax_edit($id)
	{
    $data['layanan']  = $this->layanan->get_by_id($id);
    $data['syarat']   = $this->layanan->get_syarat($id);

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
    $insert = $this->layanan->save($data);
    
    foreach ($data_syarat as $key) {
      $dt   = array(
        'id_layanan'  => $insert,
        'syarat'      => $key,
        'created'     => $date_now,
        'status'      => '1'
      );
      $this->db->insert("m_syarat_layanan", $dt);
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
      $getExisting = $this->layanan->get_syarat_by_id($key['id']);
      if ($getExisting->num_rows() == 0) {
        $dt   = array(
          'id_layanan'  => $id,
          'syarat'      => $key['syarat'],
          'created'     => $date_now,
          'status'      => '1'
        );
        $this->db->insert("m_syarat_layanan", $dt);
      }
    }

		// $this->layanan->update(array('id' => $id), $data);
		echo json_encode(array("status" => TRUE));
	}
  
  public function ajax_delete_syarat($id)
  {
    $this->layanan->delete_syarat_by_id($id);
    echo json_encode(array("status" => TRUE));
  }

}


/* End of file Layanan.php */
/* Location: ./application/controllers/Layanan.php */