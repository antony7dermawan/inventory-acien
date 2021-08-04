<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_t_t_t_penjualan3_print extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('m_t_t_t_penjualan');

    $this->load->model('m_t_t_t_penjualan_rincian'); 

    $this->load->model('m_t_m_d_pelanggan');
    
  }

  public function index($penjualan_id)
  {
    $this->session->set_userdata('t_t_t_penjualan_delete_logic', '0');

    
        // Add Header
    
    #.............................paper head


    



    $read_select = $this->m_t_t_t_penjualan->select_by_id($penjualan_id);
    foreach ($read_select as $key => $value) 
    {
      $date = $value->DATE;
      $time = $value->TIME;
      $inv = $value->INV;
      $inv_head = $value->INV_HEAD;
      $sales = $value->SALES;
      $pelanggan_id = $value->PELANGGAN_ID;
      $created_by = $value->CREATED_BY;
      $updated_by = $value->UPDATED_BY;
      $ket = $value->KET;
      $company = $value->COMPANY;
      $lokasi = $value->LOKASI;
    }


    $read_select = $this->m_t_m_d_pelanggan->select_by_id($pelanggan_id);
    foreach ($read_select as $key => $value) 
    {
      $pelanggan = $value->PELANGGAN;
      $no_telp = $value->NO_TELP;
      $alamat = $value->ALAMAT;
      $email = $value->EMAIL;
      $nik = $value->NIK;
      $npwp = $value->NPWP;
    }







    $read_select = $this->m_t_t_t_penjualan_rincian->select($penjualan_id);
    foreach ($read_select as $key => $value) 
    {
      $kode_barang[$key]=$value->KODE_BARANG;
      $barang[$key]=$value->BARANG;
      $qty[$key]=$value->QTY;
      $satuan[$key]=$value->SATUAN;
      $diskon_p_1[$key]=$value->DISKON_P_1;
      $diskon_p_2[$key]=$value->DISKON_P_2;
      $diskon_harga[$key]=$value->DISKON_HARGA;
      $harga[$key]=$value->HARGA;
      $sub_total[$key]=$value->SUB_TOTAL;

    }
    $total_baris_transaksi = $key;

    $baris_height = 4;

    $pdf = new \TCPDF();
    $pdf->SetPrintHeader(false);
    $pdf->SetPrintFooter(false);
    $pdf->AddPage('P',  array(58,(58+($total_baris_transaksi * $baris_height))));
    $pdf->SetAutoPageBreak(true, 0);
    $pdf->SetMargins(4,4, 4);



    $pdf->SetFont('','',12);


    $colom_width[0] = 10;
    $colom_width[1] = 25;
    $colom_width[2] = 40;
    $colom_width[3] = 20;
    $colom_width[4] = 25;
    $colom_width[5] = 15;
    $colom_width[6] = 15;
    $colom_width[7] = 15;
    $colom_width[8] = 25;


    $no_hal = 1;
    $total_all=0;
    $total_baris_1_bon = 10000;
    

    $jumlah_hal = intval($total_baris_transaksi/$total_baris_1_bon)+1;
    for($i=0;$i<=$total_baris_transaksi;$i++)
    {
      $rmd=(float)($i/$total_baris_1_bon);
      $rmd=($rmd-(int)$rmd)*$total_baris_1_bon;
      if(($i>=$total_baris_1_bon and $rmd==0) or $i==0)
      {
        
        


        
        

        $x_value = $pdf->GetX();
        $y_value =5;
        $pdf->SetXY($x_value, $y_value);

        $pdf->SetFont('','B',9);
        $pdf->Cell(40, 6, "BON PENJUALAN", 0, 1, 'C');

        $pdf->SetFont('','',8);
        $pdf->Cell(50, 4, $company, 0, 1, 'C');

        $pdf->Cell(50, 4, date('d-m-y', strtotime($date)), 'B', 1, 'C');

        $pdf->SetFont('','',8);
        $pdf->Cell(15, 4, "No. Faktur", 0, 0, 'L');
        $pdf->Cell(35, 4, ': '.$inv_head.$inv, 0, 1, 'L');
        
        $pdf->SetFont('','',8);
        $pdf->Cell(15, 4, "Yth", 0, 0, 'L');
        $pdf->Cell(35, 4, ': '.$pelanggan, 0, 1, 'L');

        $pdf->Cell(15, 4, "Alamat", 0, 0, 'L');
        $pdf->MultiCell(35, 4, ': '.substr($alamat, 0, 50), '0', 'L',0,1);
        $pdf->Cell(15, 4, "No Telp", 'B', 0, 'L');
        $pdf->MultiCell(35, 4, ': '.substr($no_telp, 0, 50), 'B', 'L',0,1);


        

       

      }



      $pdf->SetFont('','',8);

      $pdf->MultiCell(58, $baris_height, substr($kode_barang[$i], 0, 12).' / '.substr($barang[$i], 0, 20), '0', 'L',0,1);

      if($qty[$i]==0)
      {

      }
      $harga = $sub_total[$i]/$qty[$i];

      $pdf->SetFont('','',7);
      $pdf->MultiCell(35, $baris_height, number_format(round($qty[$i])).' '.$satuan[$i].' x @'.number_format($harga), '0', 'L',0,0);
      
      $pdf->MultiCell(17, $baris_height, number_format(round($sub_total[$i])), '0', 'R',0,1);

      


      $total_all=$total_all+floatval($sub_total[$i]);


      
    }
    $pdf->SetFont('','',10);

    $pdf->MultiCell(15, $baris_height, 'Total', 'TB', 'L',0,0);
      
    $pdf->MultiCell(37, $baris_height, number_format(round($total_all)), 'TB', 'R',0,1);


    $pdf->MultiCell(50, $baris_height, 'Terima Kasih', '0', 'C',0,1);

    $pdf->Output("penjualan".$inv.".pdf");
  }



  
function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
      $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
      $temp = $this->penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
      $temp = $this->penyebut($nilai/10)." puluh". $this->penyebut($nilai % 10);
    } else if ($nilai < 200) {
      $temp = " seratus" . $this->penyebut($nilai - 100);
    } else if ($nilai < 1000) {
      $temp = $this->penyebut($nilai/100) . " ratus" . $this->penyebut($nilai % 100);
    } else if ($nilai < 2000) {
      $temp = " seribu" . $this->penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
      $temp = $this->penyebut($nilai/1000) . " ribu" . $this->penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
      $temp = $this->penyebut($nilai/1000000) . " juta" . $this->penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
      $temp = $this->penyebut($nilai/1000000000) . " milyar" . $this->penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
      $temp = $this->penyebut($nilai/1000000000000) . " trilyun" . $this->penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
  }

  function terbilang($nilai) {
    if($nilai<0) {
      $hasil = "minus ". trim($this->penyebut($nilai));
    } else {
      $hasil = trim($this->penyebut($nilai));
    }         
    return $hasil;
  }
  



}
