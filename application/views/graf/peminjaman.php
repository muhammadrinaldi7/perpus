<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
         
            <div class="row">           
                <div class="col-lg-12 col-12">
                    <div class="card bg-white">
                        <div class="card-header">
                          GRAFIK PEMINJAMAN <br>
                          <form method="POST" action="">
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label>Tahun</label>
                      <select name="tahun" class="form-control">
                        <option value="">- Pilih -</option>
                        <?php
                        $y = date('Y');
                        for ($i = 2020; $i <= $y + 1; $i++) {
                        ?>
                          <option value='<?= $i ?>' <?php isset($_POST['tahun']) && $_POST['tahun'] == $i ? print("selected") : "" ?>><?= $i ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary" name="filter">Submit</button>
                </form>
                        </div>
                        <div class="card-body">
                       
    <div class="row">
        <div class="col-12">
            <div id="chart"></div>
        </div>
    
</div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<?php
  if (isset($_POST['filter'])) {
    $tahun = $_POST['tahun'];
    $month = $this->db->query("SELECT total FROM ( 
        SELECT DATE_FORMAT(DATE_ADD('2023-01-01', INTERVAL m MONTH), '%Y-%m') AS bulan, IFNULL(SUM(p.qty), 0) AS total 
        FROM peminjaman p RIGHT JOIN ( SELECT 0 AS m UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 ) AS months 
        ON MONTH(p.tglpinjam) = (months.m + 1) AND YEAR(p.tglpinjam) = $tahun GROUP BY bulan ORDER BY bulan ASC ) peminjam")->result_array();
  }else{
    $month = $this->db->query("SELECT total FROM ( 
        SELECT DATE_FORMAT(DATE_ADD('2023-01-01', INTERVAL m MONTH), '%Y-%m') AS bulan, IFNULL(SUM(p.qty), 0) AS total 
        FROM peminjaman p RIGHT JOIN ( SELECT 0 AS m UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9 UNION ALL SELECT 10 UNION ALL SELECT 11 ) AS months 
        ON MONTH(p.tglpinjam) = (months.m + 1) AND YEAR(p.tglpinjam) = 2023 GROUP BY bulan ORDER BY bulan ASC ) peminjam")->result_array();
  }
?>
      <script>
        
        var options = {
          series: [{
          name: 'Peminjaman',
          data: [<?php foreach($month as $data):?>
                <?= $data['total'].','
                ?>
                <?php endforeach;?>
        ]
        }],
          chart: {
          height: 350,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            columnWidth: '45%',
            borderRadius: 3,
            distributed: true,
            dataLabels: {
              position: 'center', // top, center, bottom
            },
          }
        },
        dataLabels: {
          enabled: false,
          formatter: function (val) {
            return val;
          },
          offsetY: -20,
          style: {
            fontSize: '10px',
            colors: ["#304758"]
          }
        },
        legend: {
          show: false
        },
        
        xaxis: {
          categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          position: 'bot',
          axisBorder: {
            show: false
          },
          axisTicks: {
            show: false
          },
          crosshairs: {
            fill: {
              type: 'gradient',
              gradient: {
                colorFrom: '#D8E3F0',
                colorTo: '#BED1E6',
                stops: [0, 100],
                opacityFrom: 0.4,
                opacityTo: 0.5,
              }
            }
          },
          tooltip: {
            enabled: false,
          }
        },
        yaxis: {
          axisBorder: {
            show: true
          },
          axisTicks: {
            show: false,
          },
          labels: {
            show: false,
            formatter: function (val) {
              return val + " Buku";
            }
          }
        
        },
        title: {
          text: 'Grafik Peminjaman Buku Tahun <?= $tahun ?>',
          floating: true,
          offsetY: 5,
          align: 'center',
          style: {
            color: '#444'
          }
        }
        };
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
      </script>
<!-- /.content-wrapper -->