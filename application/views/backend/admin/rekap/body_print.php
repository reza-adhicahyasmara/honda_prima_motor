<?php $this->load->view('backend/partials/head.php') ?>
<div style="text-align: center">
    <div class="row justify-content-md-center">
        <img src="<?php echo base_url('assets/img/banner/logo.png');?>" alt="Image" style="width:30px; height:30px;">
        <h3> <strong> PRIMA MOTOR CIJOHO</strong></h3>
    </div>
    <span>Jl. RE. Martadinata No.74, Cijoho, Kec. Kuningan, Kabupaten Kuningan, Jawa Barat 45513</span>
    </br>
    <span>(0232) 8902666</span>
    <hr>
    <div class="row">
        <div class="col-4">
            <span class="float-left"><?php echo "Pembuat : ".$this->session->userdata('ses_nama_karyawan')." (".$this->session->userdata('ses_nik_karyawan').")";?></span>
        </div>
        <div class="col-4 text-center">
            <strong>Evaluasi Sales</strong> 
        </div>
        <div class="col-4">
            <span class="float-right"><?php echo "Tanggal Cetak : ".date('Y-m-d H:m:s');; ?></span>
        </div>
    </div>
</div>
</br>
                <div class="card-body"> 
                    <div class="row">
                        <div class="col-6">
                            <table class="text-md">
                                <caption></caption>
                                <tr>
                                    <th class="p-1" id="" style="vertical-align: top;">Penilaian</th>
                                    <td class="p-1" style="vertical-align: top;">:</td>
                                    <td class="p-1" style="vertical-align: top;"><?php echo date('F Y', strtotime($rekap['tanggal_rekap'])); ?></td>
                                </tr>
                                <tr>
                                    <th class="p-1" id="" style="vertical-align: top;">Tanggal Rekap</th>
                                    <td class="p-1" style="vertical-align: top;">:</td>
                                    <td class="p-1" style="vertical-align: top;"><?php echo $rekap['tanggal_rekap']; ?></td>
                                </tr>
                                <tr>
                                    <th class="p-1">Keterangan</th>
                                    <td class="p-1">:</td>
                                    <td class="p-1"><?php echo $rekap['keterangan_rekap']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <caption></caption>
                            <thead>
                                <tr>
                                    <th rowspan="2" id="" style="text-align: center; vertical-align: middle; width:3%">Peringkat</th>
                                    <th colspan="4" id="" style="text-align: center; vertical-align: middle;">Data Alternatif</th>
                                    <th colspan="4" id="" style="text-align: center; vertical-align: middle;">Kriteria</th>
                                    <th colspan="3" id="" style="text-align: center; vertical-align: middle;">Promethee</th>
                                    <th rowspan="2" id="" style="text-align: center; vertical-align: middle;">Aksi</th>
                                </tr>
                                <tr>
                                    <th id="" style="text-align: center; vertical-align: middle;">Foto</th>
                                    <th id="" style="text-align: center; vertical-align: middle;">Tanggal<br>Penilaian</th>
                                    <th id="" style="text-align: center; vertical-align: middle;">NIK</th>
                                    <th id="" style="text-align: center; vertical-align: middle;">Nama Sales</th>
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
                                    for ($i = 0; $i < count($data_nilai); $i++) {
                                        echo "<tr>"; 
                                        echo "<td style='text-align: center; vertical-align: middle;'>" . $data_nilai[$i]["ranking_penilaian"]."</td>";
                                        echo "<td style='text-align: center; vertical-align: middle;'>";
                                            if($data_nilai[$i]['foto_karyawan'] != '') { 
                                                echo 
                                                    "<div class='d-flex justify-content-center'>
                                                        <div class='img-circle elevation-1' style='width: 80px; height: 80px; border:1px solid #ced4da;'>
                                                            <img src='".base_url("assets/img/karywan/".$data_nilai[$i]['foto_karyawan'])."' alt='Image' class='img-circle elevation-1' style='width:80px; height:80px; object-fit:cover; background:white;'>
                                                        </div>
                                                    </div>";
                                            }else{ 
                                                echo 
                                                    "<div class='d-flex justify-content-center'>
                                                        <div class=' img-circle elevation-1' style='width: 80px; height: 80px; border:1px solid #ced4da;'>
                                                            <img src='".base_url("assets/img/banner/user.svg")."' alt='Image' alt='Image' style='width:60px; height:60px; margin-top: 9px; object-fit:cover;'>
                                                        </div>
                                                    </div>";
                                            } 
                                        echo "</td>";
                                        echo "<td style='text-align: left; vertical-align: middle;'>" . $data_nilai[$i]["tanggal_penilaian"]."</td>";
                                        echo "<td style='text-align: left; vertical-align: middle;'>" . $data_nilai[$i]["nik_karyawan"]."</td>";
                                        echo "<td style='text-align: left; vertical-align: middle;'>" . $data_nilai[$i]["nama_karyawan"]."</td>";
                                            for ($j = 0; $j < count($data_kriteria); $j++) {
                                                echo "<td style='text-align: center; vertical-align: middle;'>" . $data_nilai[$i][$data_kriteria[$j]['penilaian_kriteria']] . "</td>";
                                            }
                                        echo "<td style='text-align: center; vertical-align: middle;'>" . $data_nilai[$i]["lf_penilaian"]."</td>";
                                        echo "<td style='text-align: center; vertical-align: middle;'>" . $data_nilai[$i]["ef_penilaian"]."</td>";
                                        echo "<td style='text-align: center; vertical-align: middle;'>" . $data_nilai[$i]["nf_penilaian"]."</td>";
                                        echo "<td style='text-align: center; vertical-align: middle;'><a class='btn btn-info' href='".base_url('admin/karyawan/data_penialaian_sales/') . $data_nilai[$i]["nik_karyawan"] . "'><span class='bx bx-fw bx-line-chart'></span></a></td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>


                    <br>
                    <h5>Penentuan Nilai Deviasi berdasarkan Perbandingan Berpasangan (d)</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <caption></caption>
                            <thead>
                                <tr>
                                    <th id="" rowspan="3" style="text-align: center; vertical-align: middle;">Alternatif</th>
                                    <th id="" colspan="<?php echo count($data_kriteria) * 2; ?>" style="text-align: center; vertical-align: middle;">Nilai Kriteria</th>
                                </tr>
                                <tr>
                                    <?php foreach ($data_kriteria as $i => $d) { ?>
                                        <th id="" colspan="2" class="text-center"><?php echo $d['kode_kriteria']; ?></th>
                                    <?php } ?>
                                </tr>
                                <tr>
                                    <?php foreach ($data_kriteria as $i => $d) { ?>
                                        <th id="" style="text-align: center; vertical-align: middle;">P</th>
                                        <th id="" style="text-align: center; vertical-align: middle;">IP</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 0;
                                    $arr = array(count($data_nilai));
                                    foreach ($data_nilai as $da) {
                                        
                                        $j = 0;
                                        $arr[$i] = array(count($data_nilai));
                                        foreach ($data_nilai as $db) {
                                            if ($da['nama_karyawan'] !== $db['nama_karyawan']) {
                                                $sum_IP = 0.0;
                                ?>
                                                <tr>
                                                    <td><?php echo "(" . $da['nama_karyawan'] . "," . $db['nama_karyawan'] . ")"; ?></td>
                                                    <?php
                                                        $q = 2;
                                                        foreach ($data_kriteria as $dk) {
                                                            $IP = 0.0; //Index Preferensi
                                                            $P = 0.0; //Preferensi

                                                            $n1 = $da[$dk['penilaian_kriteria']];
                                                            $n2 = $db[$dk['penilaian_kriteria']];
                                                            $d = abs(floatval($n1) - floatval($n2));
                                                            $bobot = floatval($dk['bobot_kriteria']);
                                                            if($n1 < $n2) {
                                                                $P = 0;
                                                            } else {
                                                                if ($d == 0) {
                                                                    $P = 0;
                                                                }
                                                                if ($d > 0) {
                                                                    $P = 1/4;
                                                                }
                                                                if ($d < 0) {
                                                                    $P = 0;
                                                                }
                                                            }
                                                            
                                                            $IP += $P * $bobot;
                                                            $sum_IP += $IP;
                                                        ?>
                                                    <td>
                                                        <?php echo $n1 - $n2; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $IP; ?>
                                                    </td>
                                                    <?php
                                                        }
                                                        $arr[$i][$j] = $sum_IP;
                                                    ?>
                                                </tr>
                                <?php 
                                            } else {
                                                $arr[$i][$j] = 0;
                                            }
                                            $j++;
                                        }
                                        $i++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>


                    <br>
                    <h5>Mencari Nilai Leaving Flow dan Entering Flow</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <caption></caption>
                            <thead>
                                <tr>
                                    <th style="vertical-align : middle;"></th>
                                        <?php foreach ($data_nilai as $i => $d) { ?>
                                            <th style="text-align : left;"><?php echo $d['nama_karyawan']; ?></th>
                                        <?php } ?>
                                    <th style="vertical-align : middle;">Jumlah Baris</th>
                                    <th style="vertical-align : middle;">Leaving Flow</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $leaving_flow = array();
                                    $entering_flow = array();
                                    $sum_row = array();
                                    $sum_column = array();
                                    for ($n = 0; $n < count($arr); $n++) {
                                        $sum_a = 0;
                                        $sum_b = 0;
                                ?>
                                        <tr>
                                            <td style="font-weight: bold"><?php echo $data_nilai[$n]['nama_karyawan'] ?></td>
                                            <?php
                                                for ($m = 0; $m < count($arr[$n]); $m++) {
                                            ?>
                                                <td><?php echo $arr[$n][$m]; ?></td>
                                            <?php
                                                    $sum_a += $arr[$n][$m];
                                                    $sum_b += $arr[$m][$n];
                                                }

                                                $kriteria = round((1 / (count($data_kriteria) - 1)),2); //0.33

                                                $sum_row[$n] = $sum_a;
                                                $sum_column[$n] = $sum_b;										
                                                $leaving_flow[$n] = $kriteria * $sum_a;
                                                $entering_flow[$n] = $kriteria * $sum_b;
                                            
                                            ?>
                                            <td style="font-weight: bold"><?php echo $sum_row[$n]; ?></td>
                                            <td style="font-weight: bold"><?php echo $leaving_flow[$n]; ?></td>
                                        </tr>

                                <?php } ?>
                                        <tr>
                                            <td style="font-weight: bold">Jumlah Kolom</td>
                                            <?php
                                                for ($g = 0; $g < count($sum_column); $g++) {
                                            ?>
                                                    <td style="font-weight: bold"><?php echo $sum_column[$g]; ?></td>
                                            <?php } ?>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold">Entering Flow</td>
                                                <?php
                                                    for ($g = 0; $g < count($entering_flow); $g++) {
                                                ?>
                                                    <td style="font-weight: bold"><?php echo $entering_flow[$g]; ?></td>
                                            <?php } ?>
                                            <td></td>
                                            <td></td>
                                        </tr>
                            </tbody>
                        </table>
                    </div>


                    <br>
                    <h5>Mencari Netflow</h5>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <caption></caption>
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;">Alternatif</th>
                                    <th style="text-align: center; vertical-align: middle;">Net Flow</th>
                                    <th style="text-align: center; vertical-align: middle;">Peringkat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $net_flow = null;
                                    for ($h = 0; $h < count($leaving_flow); $h++) {
                                        $n = $leaving_flow[$h] - $entering_flow[$h];
                                        $net_flow[] = array("kode_rekap" => $data_nilai[$h]["kode_rekap"], "nama_karyawan" => $data_nilai[$h]["nama_karyawan"], "netflow" => $n, "leavingflow" => $leaving_flow[$h], "enteringflow" => $entering_flow[$h]);
                                    }
                                    array_multisort(array_map(function ($element) {
                                        return $element['netflow'];
                                    }, $net_flow), SORT_DESC, $net_flow);
                                    foreach ($net_flow as $i => $net) {
                                ?>
                                    <tr>
                                        <td><?php echo $net['nama_karyawan']; ?></td>
                                        <td><?php echo $net['netflow']; ?></td>
                                        <td><?php echo $i + 1; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

<?php $this->load->view('backend/partials/script.php') ?>

<!-----------------------FUNGSI----------------------->
<script type="text/javascript">
    $("nav").remove(".main-header");
    $("aside").remove(".main-sidebar");
    $("div").remove(".preloader");
    const myTimeout = setTimeout(myGreeting, 1000);

    function myGreeting() {
        window.print();
    }
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



</body>
</html>