<?php $this->load->view('backend/partials/head.php') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark"><span class="nav-icon bx bx-fw bxs-grid-alt"></span>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <span class="breadcrumb-item active">Dashboard</span>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">       
                <div class="col-md-3 col-12">
                    <div class="small-box" style="border: 2px solid #17a2b8; border-radius: 10px">
                        <div class="inner">
                            <h3><?php echo number_format($jumlah_siswa, 0, ".", "."); ?></h3>
                            <p>Siswa</p>
                        </div>
                        <div class="icon">
                            <i class="bx bxs-graduation"></i>
                        </div>
                    </div>
                </div>  
                <div class="col-md-3 col-12">
                    <div class="small-box" style="border: 2px solid #17a2b8; border-radius: 10px">
                        <div class="inner">
                            <h3><?php echo number_format($kelayakan_rekap, 0, ".", "."); ?></h3>
                            <p>Penerimaan Bantuan</p>
                        </div>
                        <div class="icon">
                            <i class="bx bxs-donate-heart"></i>
                        </div>
                    </div>
                </div>  
                <div class="col-md-3 col-12">
                    <div class="small-box" style="border: 2px solid #17a2b8; border-radius: 10px">
                        <div class="inner">
                            <h3>Rp. <?php echo number_format($dana_rekap, 0, ".", "."); ?></h3>
                            <p>Total Dana Bantuan</p>
                        </div>
                        <div class="icon">
                            <i class="bx bxs-wallet"></i>
                        </div>
                    </div>
                </div>     
                <div class="col-md-3 col-12">
                    <div class="small-box" style="border: 2px solid #17a2b8; border-radius: 10px">
                        <div class="inner">
                            <h3><?php echo number_format($rekap_smt, 0, ".", "."); ?></h3>
                            <p>Rekap Data</p>
                        </div>
                        <div class="icon">
                            <i class="bx bxs-chart"></i>
                        </div>
                    </div>
                </div>                              
            </div> 
            <div class="row">     
                <div class="col-lg-6 col-12">
                    <div class="card" style="border: 2px solid #17a2b8; border-radius: 10px">
                        <div class="card-body">
                            <h4>Penerima Bantuan</h4>
                            <br>
                            <div class="chart" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;">
                                <canvas id="chart_penerima"></canvas>       
                            </div>                      
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="card" style="border: 2px solid #17a2b8; border-radius: 10px">
                        <div class="card-body">
                            <h4>Dana Bantuan</h4>
                            <br>
                            <div class="chart" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;">
                                <canvas id="chart_dana"></canvas>       
                            </div>                      
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card" style="border: 2px solid #17a2b8; border-radius: 10px">
                        <div class="card-body">
                            <h4>Profile Match </h4>
                            <br>         
                            <p class="text-md" style="text-align: justify">
                                Profile matching secara garis besar merupakan proses membandingkan antara nilai aktual dari suatu profile yang akan dinilai dengan nilai profile yang diharapkan (E. S. Sary Fatimah, Afriyudi, 2013). Dapat diketahui perbedaan kompetensinya (disebut juga gap), semakin kecil gap yang dihasilkan maka bobot nilainya semakin besar berarti memiliki peluang besar untuk siswa mendapatkan beasiswa tersebut. Profile Matching bisa digunakan untuk menentukan dua macam beasiswa yaitu beasiswa miskin dan berprestasi (D. K. Muhammad Taufik Irawan, 2016). Metode Profile Matching tepat dipakai untuk pencarian solusi atas suatu permasalahan (M. Apriyadi and S. Hansun, 2018). Sistem dapat mempermudah pihak sekolah dalam menyeleksi siswa yang akan mendapatkan beasiswa (F. Fasya, M. Z. Arifin, Z. Muttaqin, and R. Saleh, 2018). Profile Matching memberikan kemudahan dalam memberikan efisiensi bagian kesiswaan dalam menentukan penerima beasiswa (R. Roestam, 2017). Proses penyeleksian penerima beasiswa menjadi lebih objektif (F. Fasya, M. Z. Arifin, Z. Muttaqin, and R. Saleh, 2018). Metode Profile Matching membandingkan nilai profile dari kandidat penerima beasiswa dengan nilai target yang telah ditetapkan.
                            </p>


                            <br>  
                            <br>  
                            <h4>Kriteria Profile Ideal Calon Penerima Beasiswa </h4>
                            <br>   
                            <p class="text-md" style="text-align: justify">
                                Kriteria atau ukuran standar yang menjadi dasar penilaian atau penetapan sesuatu. Kriteria yang digunakan telah ditentukan oleh pihak sekolah dapat dilihat pada data berikut.
                            </p>
                            <table style="width:100%" id="datatable_1" class="table table-bordered">
                                <caption></caption>
                                <thead>
                                    <tr>
                                        <th id="" style="text-align: center; vertical-align: middle; width:3%">No.</th>
                                        <th id="" style="text-align: center; vertical-align: middle; ">Kode</th>
                                        <th id="" style="text-align: center; vertical-align: middle; ">Nama</th>
                                        <th id="" style="text-align: center; vertical-align: middle; ">Profil</th>
                                        <th id="" style="text-align: center; vertical-align: middle; ">Bobot (%)</th>
                                        <th id="" style="text-align: center; vertical-align: middle; ">Rank</th>
                                        <th id="" style="text-align: center; vertical-align: middle; ">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach($kriteria->result() as $row1) {
                                            if($row1->kode_kriteria == "K1"){
                                                $row = 2;
                                            }elseif($row1->kode_kriteria == "K2"){
                                                $row = 6;
                                            }elseif($row1->kode_kriteria == "K3"){
                                                $row = 6;
                                            }elseif($row1->kode_kriteria == "K4"){
                                                $row = 5;
                                            }elseif($row1->kode_kriteria == "K5"){
                                                $row = 5;
                                            }elseif($row1->kode_kriteria == "K6"){
                                                $row = 4;
                                            }

                                    ?>
                                        <td rowspan ="<?php echo $row; ?>" style="text-align: left; vertical-align: middle;"><?php echo $no;?></td>
                                        <td rowspan ="<?php echo $row; ?>" style="text-align: left; vertical-align: middle;"><?php echo $row1->kode_kriteria;?></td>
                                        <td rowspan ="<?php echo $row; ?>" style="text-align: left; vertical-align: middle;"><?php echo $row1->nama_kriteria;?></td>
                                        <td rowspan ="<?php echo $row; ?>" style="text-align: center; vertical-align: middle;"><?php echo $row1->profil_kriteria;?></td>
                                        <td rowspan ="<?php echo $row; ?>" style="text-align: center; vertical-align: middle;"><?php echo $row1->bobot_kriteria;?></td>
                                            <?php
                                            foreach($rank->result() as $row2) {
                                                if($row1->kode_kriteria == $row2->kode_kriteria){
                                                
                                    ?>
                                        <td style="text-align: left; vertical-align: middle;"><?php echo $row2->keterangan_rank_kriteria;?></td>
                                        <td style="text-align: center; vertical-align: middle;"><?php echo $row2->nilai_rank_kriteria;?></td>
                            
                                        </tr>

                                    <?php
                                            $no++;
                                            }
                                        } 
                                    } 
                                    ?>
                                </tbody>
                            </table>


                            <br>  
                            <br>  
                            <h4>Pemetaan Gap Profile</h4>
                            <br>   
                            <p class="text-md" style="text-align: justify">
                                Gap yang dimaksud adalah perbedaan antara profile siswa dengan profile ideal yang bisa ditunjukkan pada rumus berikut:<br>
                                <strong class="text-md">GAP = Profile Siswa − Profile Nilai</strong><br>
                            </p>


                            <br>  
                            <br>  
                            <h4>Mengelompokkan Core Factor dan Secondary Factor</h4>
                            <br>   
                            <p class="text-md" style="text-align: justify">
                                Setiap kriteria dikelompokkan menjadi 2 yaitu kelompok Core Factor dan Secondary Factor. Core Factor merupakan aspek (kompetensi) yang menonjol atau paling dibutuhkan. Perhitungan Core Factor dapat menggunakan rumus di bawah ini:<br>
                                <strong class="text-md">NCF = ∑NC/∑IC</strong><br>
                                Keterangan:<br>
                                NCF = nilai rata-rata core factor<br>
                                NC = jumlah total nilai core factor<br>
                                IC = jumlah item core factor<br><br>

                                Secondary Factor merupakan item – item selain aspek yang ada pada core factor. Perhitungan Secondary Factor dapat menggunakan rumus di bawah ini:<br>
                                <strong class="text-md">NCF = ∑NS/∑IS</strong><br>
                                Keterangan:<br>
                                NSF = nilai rata-rata secondary factor<br>
                                NS = jumlah total nilai secondary factor<br>
                                IS = jumlah item secondary factor<br><br>

                                Nilai core factor dan secondary factor yang telah ditentukan oleh pihak sekolah adalah: core factor sebesar 60% dan nilai secondary factor sebesar 40% dengan pembagian seperti yang tampak pada data berrikut:
                            </p>
                            <table style="width:100%" id="datatable_1" class="table table-bordered">
                                <caption></caption>
                                <thead>
                                    <tr>
                                        <th id="" style="text-align: center; vertical-align: middle; ">Status Siswa</th>
                                        <th id="" style="text-align: center; vertical-align: middle; ">Penentuan Core Factor & Secondary Factor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="text-align: left; vertical-align: middle;">Status Anak</td>
                                        <td style="text-align: left; vertical-align: middle;">Core Factor</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; vertical-align: middle;">Pekerjaan Ayah</td>
                                        <td style="text-align: left; vertical-align: middle;">Secondary Factor</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; vertical-align: middle;">Pekerjaan Ibu</td>
                                        <td style="text-align: left; vertical-align: middle;">Secondary Factor</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; vertical-align: middle;">Pengahsilan Orang Tua</td>
                                        <td style="text-align: left; vertical-align: middle;">Core Factor</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; vertical-align: middle;">Tanggungan Orang Tua</td>
                                        <td style="text-align: left; vertical-align: middle;">Core Factor</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: left; vertical-align: middle;">Keberadaan Orang Tua</td>
                                        <td style="text-align: left; vertical-align: middle;">Core Factor</td>
                                    </tr>
                                </tbody>
                            </table>


                            <br>  
                            <br>  
                            <h4>Menentukan Nilai Bobot</h4>
                            <br>   
                            <p class="text-md" style="text-align: justify">
                                Menentukan variabel–variabel pemetaan Gap kompetensi aspek-aspek yang akan digunakan dalam memproses nilai siswa. Penentuan nilai bobot ditunjukan pada data berikut:
                            </p>
                            <table style="width:100%" id="datatable_1" class="table table-bordered">
                                <caption></caption>
                                <thead>
                                    <tr>
                                        <th id="" style="text-align: center; vertical-align: middle; width:3%">No.</th>
                                        <th id="" style="text-align: center; vertical-align: middle; ">Selisih</th>
                                        <th id="" style="text-align: center; vertical-align: middle; ">Bobot</th>
                                        <th id="" style="text-align: center; vertical-align: middle; ">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach($bobot->result() as $row) {
                                    ?>
                                        <td style="text-align: left; vertical-align: middle;"><?php echo $no;?></td>
                                        <td style="text-align: center; vertical-align: middle;"><?php echo $row->selisih_penentuan_bobot;?></td>
                                        <td style="text-align: center; vertical-align: middle;"><?php echo $row->bobot_penentuan_bobot;?></td>
                                        <td style="text-align: left; vertical-align: middle;"><?php echo $row->keterangan_penentuan_bobot;?></td>
                                    </tr>

                                    <?php
                                        $no++;
                                    } 
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   
</div> 

<?php $this->load->view('backend/partials/footer.php') ?>
<?php $this->load->view('backend/partials/script.php') ?>

<script language="JavaScript">

    var url = window.location;
    $('ul.nav-sidebar a').filter(function() {
        return this.href == url;
    }).addClass('active ');
    $('ul.nav-treeview a').filter(function() {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
</script>

<script>
    var ctx = document.getElementById("chart_penerima").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo $tanggal_rekap_smt; ?>, 
            datasets: [
                {
                    label               : 'Kelas 7',
                    backgroundColor     : 'rgba(23, 162, 184, 0.8)',
                    borderColor         : 'rgba(23, 162, 184, 0.8)',
                    pointRadius         : true,
                    pointColor          : '#17a2b8',
                    pointStrokeColor    : 'rgba(23, 162, 184, 0.8)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(23, 162, 184,1)',
                    data                : <?php echo $siswa_kls7_rekap_smt; ?>
                },
                {
                    label               : 'Kelas 8',
                    backgroundColor     : 'rgba(0, 123, 255, 0.8)',
                    borderColor         : 'rgba(0, 123, 255, 0.8)',
                    pointRadius         : true,
                    pointColor          : '#007bff',
                    pointStrokeColor    : 'rgba(0, 123, 255, 0.8)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(0, 123, 255,1)',
                    data                : <?php echo $siswa_kls8_rekap_smt; ?>
                },
                {
                    label               : 'Kelas 9',
                    backgroundColor     : 'rgba(127, 17,244, 0.8)',
                    borderColor         : 'rgba(127, 17,244, 0.8)',
                    pointRadius         : true,
                    pointColor          : '#6f42c1',
                    pointStrokeColor    : 'rgba(127, 17,244, 0.8)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(127, 17,244,1)',
                    data                : <?php echo $siswa_kls9_rekap_smt; ?>
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

<script>
    var ctx = document.getElementById("chart_dana").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo $tanggal_rekap_smt; ?>, 
            datasets: [
                {
                    label               : 'Dana Bantuan (Rp.)',
                    backgroundColor     : 'rgba(40, 167, 69, 0.8)',
                    borderColor         : 'rgba(40, 167, 69, 0.8)',
                    pointRadius         : true,
                    pointColor          : '#28a745',
                    pointStrokeColor    : 'rgba(40, 167, 69, 0.8)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(40, 167, 69, 1)',
                    data                : <?php echo $dana_bantuan_rekap_smt; ?>
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
