<?php $this->load->view('backend/partials/head.php') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-1 text-dark"><span class="nav-icon bx bx-fw bx-line-chart"></span>Data Penilaian</h1>
                </div>
                <div class="col-sm-6 float-sm-right">
                    <ol class="breadcrumb float-sm-right m-2">
                        <span class="breadcrumb-item active">Data Penilaian</span>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-2">
                            <div class="card-body box-profile bg-secondary">
                                <div class="form-group text-center mb-3">
                                    <div class="form-control" style="padding: 0px; width:100%; height: 210px;">
                                        <?php if($data_karyawan['foto_karyawan'] != "") { ?>
                                            <img id="blah" src="<?php echo base_url('assets/img/karyawan/'.$data_karyawan['foto_karyawan']);?>" class="product-image" alt="Gambar Promo" style="border-radius: 3px; width:100%; height:210px; object-fit: cover; ">  
                                        <?php }else{ ?>
                                            <img id="blah" src="<?php echo base_url('assets/img/banner/user_solid.png');?>" class="product-image" alt="Gambar Promo" style="border-radius: 3px; width:100%; height:210px; object-fit: cover; ">  
                                        <?php } ?> 
                                    </div>
                                    <input class="text" accept="image/*" type="file" id="foto_karyawan" name="file" style="display: none;" />
                                </div>
                                <label><span class="bx bx-fw bxs-id-card mr-1"></span>No. Induk Karyawan</label>
                                <p class="text-muted text-white"><?php echo $data_karyawan['nik_karyawan']; ?></p>
                                <label><span class="bx bx-fw bxs-user mr-1"></span>Nama Lengkap</label>
                                <br>
                                <p class="text-muted text-white"><?php echo $data_karyawan['nama_karyawan']; ?></p>
                                <label><span class="bx bx-fw bxs-phone mr-1"></span>No. Kontak</label>
                                <br>
                                <p class="text-muted text-white"><?php echo $data_karyawan['kontak_karyawan']; ?></p>
                                <label><span class="bx bx-fw bxs-home mr-1"></span>Alamat</label>
                                <br>
                                <p class="text-muted text-white"><?php echo $data_karyawan['alamat_karyawan']; ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-10">
                            <div class="card">
                                <div class="card-body">
                                    <div class="chart p-1" style="min-height: 400px; height: 490px; max-height: 490px; max-width: 100%;">
                                        <canvas id="chart_promethee"></canvas>       
                                    </div>   
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <caption></caption>
                                    <thead>
                                        <tr>
                                            <th rowspan="2" id="" style="text-align: center; vertical-align: middle; width:3%">No.</th>
                                            <th rowspan="2" id="" style="text-align: center; vertical-align: middle;">Tanggal<br>Penilaian</th>
                                            <th colspan="4" id="" style="text-align: center; vertical-align: middle;">Kriteria</th>
                                            <th colspan="3" id="" style="text-align: center; vertical-align: middle;">Promethee</th>
                                            <th rowspan="2" id="" style="text-align: center; vertical-align: middle; width:3%">Peringkat</th>
                                        </tr>
                                        <tr>
                                            <?php
                                                for ($i = 0; $i < count($data_kriteria); $i++) {
                                                    echo "<th id='' style='text-align: center; vertical-align: middle; '>".$data_kriteria[$i]['kode_kriteria']."</th>";
                                                }
                                            ?>
                                            <th id="" style="text-align: center; vertical-align: middle;">Leaving Flow</th>
                                            <th id="" style="text-align: center; vertical-align: middle;">Entering Flow</th>
                                            <th id="" style="text-align: center; vertical-align: middle;">Net Flow</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            for ($i = 0; $i < count($data_nilai); $i++) {
                                                if($data_nilai[$i]["nik_karyawan"] == $data_karyawan['nik_karyawan']){
                                                    echo "<tr>"; 
                                                    echo "<td style='text-align: center; vertical-align: middle;'>" . $no . "</td>";
                                                    echo "<td style='text-align: left; vertical-align: middle;'>" . $data_nilai[$i]["tanggal_penilaian"]."</td>";
                                                        for ($j = 0; $j < count($data_kriteria); $j++) {
                                                            echo "<td style='text-align: center; vertical-align: middle;'>" . $data_nilai[$i][$data_kriteria[$j]['penilaian_kriteria']] . "</td>";
                                                        }
                                                    echo "<td style='text-align: center; vertical-align: middle;'>" . $data_nilai[$i]["lf_penilaian"]."</td>";
                                                    echo "<td style='text-align: center; vertical-align: middle;'>" . $data_nilai[$i]["ef_penilaian"]."</td>";
                                                    echo "<td style='text-align: center; vertical-align: middle;'>" . $data_nilai[$i]["nf_penilaian"]."</td>";
                                                    echo "<td style='text-align: center; vertical-align: middle;'>" . $data_nilai[$i]["ranking_penilaian"]."</td>";
                                                    echo "</tr>";
                                                    $no++;
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('backend/partials/footer.php') ?>
<?php $this->load->view('backend/partials/script.php') ?>

<!-----------------------FUNGSI----------------------->
<script type="text/javascript">
    var url_karyawan =  "<?php echo base_url('sales/data_penilaian_sales'); ?>";
    var url = url_karyawan ;
    $('ul.nav-sidebar a').filter(function() {
        return this.href == url;
    }).addClass('active ');
    $('ul.nav-treeview a').filter(function() {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
</script>

<script>
    $(document).ready(function() {
        var table = $('#datatable_2').DataTable( {
            responsive: true
        });
    });
</script>

<script>
    var ctx = document.getElementById("chart_promethee").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo $tanggal_penilaian; ?>, 
            datasets: [
                {
                    label               : 'Net Flow',
                    backgroundColor     : 'rgba(220,53,69, 0.8)',
                    borderColor         : 'rgba(220,53,69, 0.8)',
                    pointRadius         : true,
                    pointColor          : '#dc3545',
                    pointStrokeColor    : 'rgba(220,53,69, 0.8)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,53,69,1)',
                    data                : <?php echo $nf_penilaian; ?>
                },
            ],
        },
        options: {
            maintainAspectRatio : false,
            responsive : true,
            legend: {
                position: "bottom"
            },
            scales: {
                xAxes: [{
                    gridLines : {
                        display : false,
                    }
                }],
                yAxes: [{
                    gridLines : {
                        display : false,
                    }
                }]
            }                                    
        }
    });
</script>
