<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_dashboard extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_t_t_t_penjualan_rincian');

    $this->load->model('m_t_t_t_pemakaian');
    $this->load->model('m_t_t_t_pembelian');
    $this->load->model('m_t_t_t_penjualan');


    $this->load->model('m_t_t_t_retur_pemakaian');
    $this->load->model('m_t_t_t_retur_pembelian');
    $this->load->model('m_t_t_t_retur_penjualan');
  }

  public function index()
  {

    if($this->session->userdata('date_from_dashboard_1')=='')
    {
      $date_from_dashboard_1 = date('Y-m-d');
      $this->session->set_userdata('date_from_dashboard_1', $date_from_dashboard_1);
    }

    if($this->session->userdata('date_from_dashboard_2')=='')
    {
      $date_from_dashboard_2 = date('Y-m-d');
      $this->session->set_userdata('date_from_dashboard_2', $date_from_dashboard_2);
    }


    if($this->session->userdata('date_from_dashboard_3')=='')
    {
      $date_from_dashboard_3 = date('Y-m-d');
      $this->session->set_userdata('date_from_dashboard_3', $date_from_dashboard_3);
    }





    if($this->session->userdata('date_to_dashboard_1')=='')
    {
      $date_to_dashboard_1 = date('Y-m-d');
      $this->session->set_userdata('date_to_dashboard_1', $date_to_dashboard_1);
    }

    if($this->session->userdata('date_to_dashboard_2')=='')
    {
      $date_to_dashboard_2 = date('Y-m-d');
      $this->session->set_userdata('date_to_dashboard_2', $date_to_dashboard_2);
    }


    if($this->session->userdata('date_to_dashboard_3')=='')
    {
      $date_to_dashboard_3 = date('Y-m-d');
      $this->session->set_userdata('date_to_dashboard_3', $date_to_dashboard_3);
    }



    $data = [

      "sum_pembelian" => $this->m_t_t_t_pembelian->select_sum_by_date($this->session->userdata('date_from_dashboard_3'),$this->session->userdata('date_to_dashboard_3')),

      "sum_penjualan" => $this->m_t_t_t_penjualan->select_sum_by_date($this->session->userdata('date_from_dashboard_3'),$this->session->userdata('date_to_dashboard_3')),


      "sum_pemakaian" => $this->m_t_t_t_pemakaian->select_sum_by_date($this->session->userdata('date_from_dashboard_3'),$this->session->userdata('date_to_dashboard_3')),



      "sum_retur_pembelian" => $this->m_t_t_t_retur_pembelian->select_sum_by_date($this->session->userdata('date_from_dashboard_3'),$this->session->userdata('date_to_dashboard_3')),

      "sum_retur_penjualan" => $this->m_t_t_t_retur_penjualan->select_sum_by_date($this->session->userdata('date_from_dashboard_3'),$this->session->userdata('date_to_dashboard_3')),


      "sum_retur_pemakaian" => $this->m_t_t_t_retur_pemakaian->select_sum_by_date($this->session->userdata('date_from_dashboard_3'),$this->session->userdata('date_to_dashboard_3')),

      "select_rekap_pelanggan" => $this->m_t_t_t_penjualan_rincian->select_rekap_pelanggan($this->session->userdata('date_from_dashboard_1'),$this->session->userdata('date_to_dashboard_1')),

      "select_rekap_sales" => $this->m_t_t_t_penjualan_rincian->select_rekap_sales($this->session->userdata('date_from_dashboard_2'),$this->session->userdata('date_to_dashboard_2')),


      "title" => "Dashboard",
      "description" => "Integrated Inventory System"
    ];

    if($this->session->userdata('level_user_id')==1)
    {
      $this->render_backend('template/backend/pages/dashboard', $data);
    }
    if($this->session->userdata('level_user_id')>1)
    {
      $this->render_backend('template/backend/pages/blank', $data);
    }

  }

  public function search_date_1()
  {
    $date_from_dashboard_1 = ($this->input->post("date_from_dashboard_1"));
    $this->session->set_userdata('date_from_dashboard_1', $date_from_dashboard_1);

    $date_to_dashboard_1 = ($this->input->post("date_to_dashboard_1"));
    $this->session->set_userdata('date_to_dashboard_1', $date_to_dashboard_1);
    redirect('/c_dashboard');
  }



  public function search_date_2()
  {
    $date_from_dashboard_2 = ($this->input->post("date_from_dashboard_2"));
    $this->session->set_userdata('date_from_dashboard_2', $date_from_dashboard_2);

    $date_to_dashboard_2 = ($this->input->post("date_to_dashboard_2"));
    $this->session->set_userdata('date_to_dashboard_2', $date_to_dashboard_2);
    redirect('/c_dashboard');
  }



  public function search_date_3()
  {
    $date_from_dashboard_3 = ($this->input->post("date_from_dashboard_3"));
    $this->session->set_userdata('date_from_dashboard_3', $date_from_dashboard_3);

    $date_to_dashboard_3 = ($this->input->post("date_to_dashboard_3"));
    $this->session->set_userdata('date_to_dashboard_3', $date_to_dashboard_3);
    redirect('/c_dashboard');
  }



}
