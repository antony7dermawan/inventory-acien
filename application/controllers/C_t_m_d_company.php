<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_t_m_d_company extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('m_t_m_d_company');

    $this->load->model('m_t_m_d_postfix');
  }

  public function index()
  {
    $this->session->set_userdata('t_m_d_company_delete_logic', '1');
    $data = [
      "c_t_m_d_company" => $this->m_t_m_d_company->select(),
      "total_company_id" => $this->m_t_m_d_company->select_count(),

      "c_t_m_d_postfix" => $this->m_t_m_d_postfix->select_by_id(),
      "title" => "Master Company",
      "description" => "Company ID untuk Login"
    ];
    $this->render_backend('template/backend/pages/t_m_d_company', $data);
  }



  public function delete($id)
  {
    $data = array(
        'UPDATED_BY' => $this->session->userdata('username'),
        'MARK_FOR_DELETE' => TRUE
    );
    $this->m_t_m_d_company->update($data, $id);
    $this->session->set_flashdata('notif', '<div class="alert alert-danger icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="icofont icofont-close-line-circled"></i></button><p><strong>Success!</strong> Data Berhasil DIhapus!</p></div>');
    redirect('/c_t_m_d_company');
  }


  public function undo_delete($id)
  {
    $data = array(
        'UPDATED_BY' => $this->session->userdata('username'),
        'MARK_FOR_DELETE' => FALSE
    );
    $this->m_t_m_d_company->update($data, $id);
    
    $this->session->set_flashdata('notif', '<div class="alert alert-info icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="icofont icofont-close-line-circled"></i></button><p><strong>Data Berhasil Dikembalikan!</strong></p></div>');
    redirect('/c_t_m_d_company');
  }


  function tambah()
  {
    $company = substr($this->input->post("company"), 0, 50);
    $inv_beli = substr($this->input->post("inv_beli"), 0, 50);
    $inv_rb = substr($this->input->post("inv_rb"), 0, 50);
    $inv_jual = substr($this->input->post("inv_jual"), 0, 50);
    $inv_rj = substr($this->input->post("inv_rj"), 0, 50);
    $inv_po = substr($this->input->post("inv_po"), 0, 50);
    $inv_pemakaian = substr($this->input->post("inv_pemakaian"), 0, 50);


    //Dikiri nama kolom pada database, dikanan hasil yang kita tangkap nama formnya.
    $data = array(
      'COMPANY' => $company,
      'INV_PEMBELIAN' => $inv_beli,
      'INV_RETUR_PEMBELIAN' =>$inv_rb,
      'INV_PENJUALAN' => $inv_jual,
      'INV_RETUR_PENJUALAN' => $inv_rj,
      'INV_PO' => $inv_po,
      'INV_PEMAKAIAN' => $inv_pemakaian,
      'CREATED_BY' => $this->session->userdata('username'),
      'UPDATED_BY' => '',
      'MARK_FOR_DELETE' => FALSE,
      'POSTFIX_ID' => $this->session->userdata('postfix_id')
    );

    $this->m_t_m_d_company->tambah($data);

    $this->session->set_flashdata('notif', '<div class="alert alert-info icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="icofont icofont-close-line-circled"></i></button><p><strong>Data Berhasil Ditambahkan!</strong></p></div>');
    redirect('c_t_m_d_company');
  }






  public function edit_action()
  {
    $id = $this->input->post("id");
    
    $company = substr($this->input->post("company"), 0, 50);
    $inv_beli = substr($this->input->post("inv_beli"), 0, 50);
    $inv_rb = substr($this->input->post("inv_rb"), 0, 50);
    $inv_jual = substr($this->input->post("inv_jual"), 0, 50);
    $inv_rj = substr($this->input->post("inv_rj"), 0, 50);
    $inv_po = substr($this->input->post("inv_po"), 0, 50);
    $inv_pemakaian = substr($this->input->post("inv_pemakaian"), 0, 50);


    //Dikiri nama kolom pada database, dikanan hasil yang kita tangkap nama formnya.
    $data = array(
      'COMPANY' => $company,
      'INV_PEMBELIAN' => $inv_beli,
      'INV_RETUR_PEMBELIAN' =>$inv_rb,
      'INV_PENJUALAN' => $inv_jual,
      'INV_RETUR_PENJUALAN' => $inv_rj,
      'INV_PO' => $inv_po,
      'INV_PEMAKAIAN' => $inv_pemakaian,
      'UPDATED_BY' => $this->session->userdata('username')
    );

    $this->m_t_m_d_company->update($data, $id);
    $this->session->set_flashdata('notif', '<div class="alert alert-info icons-alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <i class="icofont icofont-close-line-circled"></i></button><p><strong>Data Berhasil Diupdate!</strong></p></div>');
    redirect('/c_t_m_d_company');
  }
}
