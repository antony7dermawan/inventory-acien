<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">

        <div class="row">







          <!-- !-->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5>Tanggal Transaksi

                <form action='<?php echo base_url("c_dashboard/search_date_3"); ?>' class='no_voucer_area' method="post" id=''>
                  <table>
                    <tr>

                      <th>
                        <form action='/action_page.php'>
                          <input type='date' class='form-control' name='date_from_dashboard_3' value='<?php echo $this->session->userdata('date_from_dashboard_3'); ?>'>
                      </th>
                      <th>-</th>
                      <th>
                        <form action='/action_page.php'>
                          <input type='date' class='form-control' name='date_to_dashboard_3' value='<?php echo $this->session->userdata('date_to_dashboard_3'); ?>'>
                      </th>
                      <th>
                        <input type="submit" name="submit_date" class='btn btn-primary waves-effect waves-light' value="Search">
                      </th>
                    </tr>
                  </table>


                </form>

                </h5>

                
              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">

                  

                  <?php
                  $total_pembelian = 0;
                  foreach ($sum_pembelian as $key => $value) {
                    $total_pembelian = $total_pembelian + $value->SUM_SUB_TOTAL;

                  }
                  $total_retur_pemakaian = 0;
                  foreach ($sum_retur_pemakaian as $key => $value) {
                    $total_retur_pemakaian = $total_retur_pemakaian + $value->SUM_SUB_TOTAL;

                  }
                  $total_retur_pembelian = 0;
                  foreach ($sum_retur_pembelian as $key => $value) {
                    $total_retur_pembelian = $total_retur_pembelian + $value->SUM_SUB_TOTAL;

                  }

                  $total_penjualan = 0;
                  $total_modal= 0;
                  foreach ($sum_penjualan as $key => $value) {
                    $total_penjualan = $total_penjualan + $value->SUM_SUB_TOTAL;
                    $total_modal = $total_modal + $value->SUM_MODAL;
                  } 


                  $total_retur_penjualan = 0;
                  foreach ($sum_retur_penjualan as $key => $value) {
                    $total_retur_penjualan = $total_retur_penjualan + $value->SUM_SUB_TOTAL;

                  }


                  $total_pemakaian = 0;
                  foreach ($sum_pemakaian as $key => $value) {
                    $total_pemakaian = $total_pemakaian + $value->SUM_SUB_TOTAL;

                  }



                  $laba_bersih = (intval($total_penjualan))-(intval($total_modal)+intval($total_retur_penjualan));
                  echo "<div class='col-xl-5 col-md-6'>";
                  echo "<div class='card prod-p-card card-blue'>";
                  echo "<div class='card-body'>";
                  echo "<div class='row align-items-center m-b-30'>";
                  echo "<div class='col'>";

                  echo "<h4 class='m-b-0 f-w-700 text-white'>Laba Bersih</h3>";
                  echo "<br>";
                  echo "<h6 class='m-b-5 text-white'>Rp".number_format($laba_bersih)."</h6>";
                  echo "</div>";
                  echo "<div class='col-auto'>";
                  echo "<i class='fas fa-money-bill-alt text-c-blue f-18'></i>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";





                  ?>


                  <script src="https://code.highcharts.com/highcharts.js"></script>
                  <script src="https://code.highcharts.com/modules/exporting.js"></script>
                  <script src="https://code.highcharts.com/modules/export-data.js"></script>
                  <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                  <figure class="highcharts-figure">
                      <div id="container"></div>
                      
                  </figure>
                  
                </div>
              </div>
            </div>
          </div>



                  <?php
                  
                  /*

                  echo "<div class='col-xl-5 col-md-6'>";
                  echo "<div class='card prod-p-card card-green'>";
                  echo "<div class='card-body'>";
                  echo "<div class='row align-items-center m-b-30'>";
                  echo "<div class='col'>";

                  echo "<h4 class='m-b-0 f-w-700 text-white'>Total Pembelian</h3>";
                  echo "<br>";
                  echo "<h6 class='m-b-5 text-white'>Rp".number_format($total_pembelian)."</h6>";
                  echo "</div>";
                  echo "<div class='col-auto'>";
                  echo "<i class='fas fa-money-bill-alt text-c-green f-18'></i>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";



                  


                  echo "<div class='col-xl-5 col-md-6'>";
                  echo "<div class='card prod-p-card card-yellow'>";
                  echo "<div class='card-body'>";
                  echo "<div class='row align-items-center m-b-30'>";
                  echo "<div class='col'>";

                  echo "<h4 class='m-b-0 f-w-700 text-white'>Total Retur Pembelian</h3>";
                  echo "<br>";
                  echo "<h6 class='m-b-5 text-white'>Rp".number_format($total_retur_pembelian)."</h6>";
                  echo "</div>";
                  echo "<div class='col-auto'>";
                  echo "<i class='fas fa-money-bill-alt text-c-yellow f-18'></i>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";



                  


                  echo "<div class='col-xl-5 col-md-6'>";
                  echo "<div class='card prod-p-card card-yellow'>";
                  echo "<div class='card-body'>";
                  echo "<div class='row align-items-center m-b-30'>";
                  echo "<div class='col'>";

                  echo "<h4 class='m-b-0 f-w-700 text-white'>Total Penjualan</h3>";
                  echo "<br>";
                  echo "<h6 class='m-b-5 text-white'>Rp".number_format($total_penjualan)."</h6>";
                  echo "</div>";
                  echo "<div class='col-auto'>";
                  echo "<i class='fas fa-money-bill-alt text-c-yellow f-18'></i>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";



                  


                  echo "<div class='col-xl-5 col-md-6'>";
                  echo "<div class='card prod-p-card card-green'>";
                  echo "<div class='card-body'>";
                  echo "<div class='row align-items-center m-b-30'>";
                  echo "<div class='col'>";

                  echo "<h4 class='m-b-0 f-w-700 text-white'>Total Retur Penjualan</h3>";
                  echo "<br>";
                  echo "<h6 class='m-b-5 text-white'>Rp".number_format($total_retur_penjualan)."</h6>";
                  echo "</div>";
                  echo "<div class='col-auto'>";
                  echo "<i class='fas fa-money-bill-alt text-c-green f-18'></i>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";



                  


                  echo "<div class='col-xl-5 col-md-6'>";
                  echo "<div class='card prod-p-card card-green'>";
                  echo "<div class='card-body'>";
                  echo "<div class='row align-items-center m-b-30'>";
                  echo "<div class='col'>";

                  echo "<h4 class='m-b-0 f-w-700 text-white'>Total Pemakaian</h3>";
                  echo "<br>";
                  echo "<h6 class='m-b-5 text-white'>Rp".number_format($total_pemakaian)."</h6>";
                  echo "</div>";
                  echo "<div class='col-auto'>";
                  echo "<i class='fas fa-money-bill-alt text-c-green f-18'></i>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";









                  



                  



                  


                  echo "<div class='col-xl-5 col-md-6'>";
                  echo "<div class='card prod-p-card card-yellow'>";
                  echo "<div class='card-body'>";
                  echo "<div class='row align-items-center m-b-30'>";
                  echo "<div class='col'>";

                  echo "<h4 class='m-b-0 f-w-700 text-white'>Total Retur Pemakaian</h3>";
                  echo "<br>";
                  echo "<h6 class='m-b-5 text-white'>Rp".number_format($total_retur_pemakaian)."</h6>";
                  echo "</div>";
                  echo "<div class='col-auto'>";
                  echo "<i class='fas fa-money-bill-alt text-c-yellow f-18'></i>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                  

                  */

                  ?>




          <!-- !-->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5>Rekap Transaksi Pelanggan

                <form action='<?php echo base_url("c_dashboard/search_date_1"); ?>' class='no_voucer_area' method="post" id=''>
                  <table>
                    <tr>

                      <th>
                        <form action='/action_page.php'>
                          <input type='date' class='form-control' name='date_from_dashboard_1' value='<?php echo $this->session->userdata('date_from_dashboard_1'); ?>'>
                      </th>
                      <th>-</th>
                      <th>
                        <form action='/action_page.php'>
                          <input type='date' class='form-control' name='date_to_dashboard_1' value='<?php echo $this->session->userdata('date_to_dashboard_1'); ?>'>
                      </th>
                      <th>
                        <input type="submit" name="submit_date" class='btn btn-primary waves-effect waves-light' value="Search">
                      </th>
                    </tr>
                  </table>


                </form>

                </h5>

                
              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="order-table" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>QTY</th>
                        <th>Total Penjualan</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($select_rekap_pelanggan as $key => $value) {
                       
                        
                        echo "<tr>";
                        echo "<td>" . ($key + 1) . "</td>";
                        echo "<td>" . $value->PELANGGAN . "</td>";
                        echo "<td>" . (round($value->SUM_QTY)) . "</td>";
                        echo "<td>" . number_format(round($value->SUM_SUB_TOTAL)) . "</td>";


                        /*
            echo "<td>";
              

              echo "<a href='".site_url('c_t_ak_terima_pelanggan_no_faktur/delete/' . $value->ID)."' ";
              
              echo "onclick=\"return confirm('Apakah kamu yakin ingin menghapus data ini?')\"";


              echo "> <i class='feather icon-trash-2 f-w-600 f-16 text-c-red'></i></a>";
            echo "</td>";

            echo "</tr>";
            */
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>








          <!-- !-->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5>Rekap Kinerja Sales

                <form action='<?php echo base_url("c_dashboard/search_date_2"); ?>' class='no_voucer_area' method="post" id=''>
                  <table>
                    <tr>

                      <th>
                        <form action='/action_page.php'>
                          <input type='date' class='form-control' name='date_from_dashboard_2' value='<?php echo $this->session->userdata('date_from_dashboard_2'); ?>'>
                      </th>
                      <th>-</th>
                      <th>
                        <form action='/action_page.php'>
                          <input type='date' class='form-control' name='date_to_dashboard_2' value='<?php echo $this->session->userdata('date_to_dashboard_2'); ?>'>
                      </th>
                      <th>
                        <input type="submit" name="submit_date" class='btn btn-primary waves-effect waves-light' value="Search">
                      </th>
                    </tr>
                  </table>


                </form>

                </h5>

                
              </div>
              <div class="card-block">
                <div class="dt-responsive table-responsive">
                  <table id="order-table" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Sales</th>
                        <th>QTY</th>
                        <th>Total Penjualan</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($select_rekap_sales as $key => $value) {
                       
                        
                        echo "<tr>";
                        echo "<td>" . ($key + 1) . "</td>";
                        echo "<td>" . $value->SALES . "</td>";
                        echo "<td>" . (round($value->SUM_QTY)) . "</td>";
                        echo "<td>" . number_format(round($value->SUM_SUB_TOTAL)) . "</td>";


                        /*
            echo "<td>";
              

              echo "<a href='".site_url('c_t_ak_terima_pelanggan_no_faktur/delete/' . $value->ID)."' ";
              
              echo "onclick=\"return confirm('Apakah kamu yakin ingin menghapus data ini?')\"";


              echo "> <i class='feather icon-trash-2 f-w-600 f-16 text-c-red'></i></a>";
            echo "</td>";

            echo "</tr>";
            */
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>











          


        </div>







<style type="text/css">
    
.highcharts-figure, .highcharts-data-table table {
    min-width: 320px; 
    max-width: 800px;
    margin: 1em auto;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #EBEBEB;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}


input[type="number"] {
    min-width: 50px;
}
</style>





<script type="text/javascript">
    
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Rekap Seluruh Transaksi'
    },
    tooltip: {
        pointFormat: '{series.name}/ <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>/ {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Nilai',
        colorByPoint: true,
        data: [ {
            name: 'Pembelian <?='Rp '.number_format($total_pembelian)?>',
            y: <?=($total_pembelian)?>,
            color: 'LightCoral'
        }, {
            name: 'Retur Pembelian <?='Rp '.number_format($total_retur_pembelian)?>',
            y: <?=($total_retur_pembelian)?>,
            color: 'LightPink'
        }, {
            name: 'Penjualan <?='Rp '.number_format($total_penjualan)?>',
            y: <?=($total_penjualan)?>,
            color: 'LightSeaGreen'
        }, {
            name: 'Retur Penjualan <?='Rp '.number_format($total_retur_penjualan)?>',
            y: <?=($total_retur_penjualan)?>,
            color: 'LightGreen'
        }, {
            name: 'Pemakaian <?='Rp '.number_format($total_pemakaian)?>',
            y: <?=($total_pemakaian)?>,
            color:'gold'
        }, {
            name: 'Retur Pemakaian <?='Rp '.number_format($total_retur_pemakaian)?>',
            y: <?=($total_retur_pemakaian)?>,
            color: 'LemonChiffon'
        }, {
            name: 'Laba Bersih <?='Rp '.number_format($laba_bersih)?>',
            y: <?=($laba_bersih)?>,
            sliced: true,
            selected: true,
            color:'DodgerBlue'
        }]
    }]
});
</script>