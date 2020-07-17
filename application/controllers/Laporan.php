<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    if (empty($_SESSION['user_id'])) {
      redirect('Login');
    }
    $this->load->model('Laporan_model','laporan');
  }

  public function index()
  {
    $this->load->view('Laporan/index.php');
  }

  public function ajax_list()
	{
		$list = $this->laporan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $laporan) {
			$no++;
      $row = array();
      $row["no"]            = $no;
      $row["id"]            = $laporan->id;
      $row["createdby"]     = $laporan->createdby;
      $row["jenis_barang"]  = $laporan->jenis_barang;
			$row["keterangan"]    = $laporan->keterangan;
      $row["created"]       = $laporan->created;
      $row["modified"]      = $laporan->modified;
      $row["status"]        = $laporan->status;
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->laporan->count_all(),
						"recordsFiltered" => $this->laporan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
  }
  
  public function ajax_edit($id)
	{
    $data  = $this->laporan->get_by_id($id);
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
    $insert = $this->laporan->save($data);
    
    foreach ($data_syarat as $key) {
      $dt   = array(
        'id_laporan'  => $insert,
        'syarat'      => $key,
        'created'     => $date_now,
        'status'      => '1'
      );
      $this->db->insert("m_syarat_laporan", $dt);
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
      $getExisting = $this->laporan->get_syarat_by_id($key['id']);
      if ($getExisting->num_rows() == 0) {
        $dt   = array(
          'id_laporan'  => $id,
          'syarat'      => $key['syarat'],
          'created'     => $date_now,
          'status'      => '1'
        );
        $this->db->insert("m_syarat_laporan", $dt);
      }
    }

		// $this->laporan->update(array('id' => $id), $data);
		echo json_encode(array("status" => TRUE));
	}

}


/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */