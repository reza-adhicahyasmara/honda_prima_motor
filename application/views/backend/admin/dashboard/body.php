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
                <div class="col-lg-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Sales Promethee Global</h4>
                            <br>
                            <div class="chart" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;">
                                <canvas id="chart_penerima"></canvas>       
                            </div>                      
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Sales Terbaik</h4>
                            <br>
                            <table style="width:100%" id="datatable_sales" class="table table-bordered table-striped">
                            <caption></caption>
                            <thead>
                                <tr>
                                    <th id="" style="text-align: center; vertical-align: middle; width:3%">Peringkat</th>
                                    <th id="" style="text-align: center; vertical-align: middle; ">Foto</th>
                                    <th id="" style="text-align: center; vertical-align: middle; ">NIK</th>
                                    <th id="" style="text-align: center; vertical-align: middle; ">Nama</th>
                                    <th id="" style="text-align: center; vertical-align: middle; ">Alamat</th>
                                    <th id="" style="text-align: center; vertical-align: middle; ">No. Telp / HP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no = 1;
                                    foreach($sales as $row) {
                                        if($row->level_karyawan == "Sales"){
                                ?>
                                <tr>
                                    <td style="text-align: center; vertical-align: middle;"><?php echo $no;?></td>
                                    <td style="text-align: center; vertical-align: middle;">
                                        <?php if($row->foto_karyawan != "") { ?>
                                            <div class="d-flex justify-content-center">
                                                <div class=" img-circle elevation-1" style="width: 80px; height: 80px; border:1px solid #ced4da;">
                                                    <img src="<?php echo base_url('assets/img/karyawan/'.$row->foto_karyawan);?>" alt="Image" class="img-circle elevation-1" style="width:80px; height:80px; object-fit:cover; background:white;">
                                                </div>
                                            </div>
                                        <?php }else{ ?>
                                            <div class="d-flex justify-content-center">
                                                <div class=" img-circle elevation-1" style="width: 80px; height: 80px; border:1px solid #ced4da;">
                                                    <img src="<?php echo base_url('assets/img/banner/user.svg');?>" alt="Image" alt="Image" style="width:60px; height:60px; margin-top: 9px; object-fit:cover;">
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td style="text-align: left; vertical-align: middle;"><?php echo $row->nik_karyawan;?></td>
                                    <td style="text-align: left; vertical-align: middle;"><?php echo $row->nama_karyawan;?></td>
                                    <td style="text-align: left; vertical-align: middle;"><?php echo $row->alamat_karyawan;?></td>
                                    <td style="text-align: left; vertical-align: middle;"><?php echo $row->kontak_karyawan;?></td>
                                </tr>
                                <?php
                                            $no++;
                                        }
                                    } 
                                ?>
                            </tbody>
                        </table>               
                        </div>
                    </div>
                </div>  
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Promethee </h4>
                            <br>         
                            <p class="text-md" style="text-align: justify">
                                Menurut Indriantoro & Utami, (2016) PROMETHEE (Preference Ranking Organization Method for Enrichment Evaluations) merupakan salah satu metode dari MCDM (Multi Criteria Decision Making) untuk penentuan urutan (prioritas) dalam analisis. Masalah pokoknya adalah kesederhanaan, kejelasan, dan kestabilan. Sangat tepat untuk digunakan karena dugaan dari dominasi kriteria yang digunakan dalam promethee adalah penggunaan nilai dalamhubungan outrangking. Sehingga diperoleh solusi atau hasil dari beberapa alternatif untuk diambil sebuah keputusan.
                            </p>
                            <br>         
                            <p class="text-md" style="text-align: justify">
                                Promethee mempunyai kemampuan untuk menangani bayak  perbandingan, pengambil keputusan hanya mendefinisikan skala ukurannya sendiri tanpa batasan, untuk mendefinisikan prioritasnya dan preferensi untuk setiap kriteria dengan memutuskan pada nilai (value), tanpa memikirkan tentang metode perhitungan.
                            </p>
                            <br>         
                            <p class="text-md" style="text-align: justify">
                                Metode promethee menggunakan kriteria dan bobot dari masing- masing kriterianya yang kemudian diolah untuk menentukan pemilihan alternatif lapangan, yang hasilnya berurutan berdasarkan prioritasnya. Penggunaan metode promethee dapat dijadikan metode untuk pengambilan keputusan di bidang pemasaran, sumber daya manusia, pemilihan lokasi, atau bidang lain yang berhubungan dengan pemilihan alternatif. Prinsip yang digunakan adalah penetapan prioritas alternatif yang telah ditetapkan berdasarkan pertimbangan (∀i | fi (.) ℜ[Real]) dengan kaidah dasar:
                            </p>
                            <div class="text-center">
                                <strong class="text-lg">Max {f1(x), f2(x), f3(x)…..fk(x) | x ∈ℜ}</strong>
                            </div>
                            <br>         
                            <p class="text-md" style="text-align: justify">
                                Di mana K adalah sejumlah kumpulan alternatif, fi = (i =1,2,3,4,5,….K ) merupakan nilai/ukuran relatif kriteria untuk masing-masing alternatif. Dalam aplikasinya sejumlah kriteria telah diteteapkan unruk menjelaskan K yang merupakan penilaian dari ℜ(Real).
                            </p>
                            <br>         
                            <p class="text-md" style="text-align: justify">
                                Promethee termasuk dalam keluarga dari metode outranking yang dikembangkan oleh B.Roy, dan meliputi dua fase:
                                <ol class="text-md">
                                    <li>Membangun hubungan outranking dari K</li>
                                    <li>Eksploitasi dari hubungan ini memberikan jawaban optimasi kriteria dalam paradigma permasalahan multikriteria.</li>
                                </ol>
                            </p>
                            <br>         
                            <p class="text-md" style="text-align: justify">
                                Dalam metode Promethee terdapat 6 bentuk fungsi prefensi kriteria, dalam studi kasus ini kami menggunakan metode kriteria biasa (usuak criterion). Pada referensi ini, tidak ada beda antara a dan b jika hanya jika f(a)=f(b), apabila nilai kriteria pada masing-masing alternatif memiliki nilai berbeda, pembuat keputusan membuat preferensi mutlak untuk alternatif memiliki nilai yang lebih baik.
                            </p>
                            <div class="text-center">
                                <strong class="text-lg">Dimana d = selisih nilai kriteria {d = f (a) – f (b)</strong>
                                <br>
                                <img src="<?php echo base_url('assets/img/banner/promethee.jpg');?>" alt="Image" alt="Image" style="width:200px; margin-top: 9px;">
                            </div>
                            <br>    
                            <p class="text-md" style="text-align: justify">
                                Keterangan:
                                <ol class="text-md">
                                    <li>H(d): fungsi selisih kriteria alternatif</li>
                                    <li>d: selisih nilai kriteria {d = f(a) – f(b)}</li>
                                </ol>
                            </p>
                        </div>
                    </div>
                </div>
                

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Penetapan Kriteria, Subkriteria, Range Nilai, dan Bobot Nilai </h4>
                            <br>   
                            <p class="text-md" style="text-align: justify">
                                Kriteria atau ukuran standar yang menjadi dasar penilaian sales terbaik. Penetapan nilai yang digunakan adalah sebagai berikut.
                            </p>
                            <table style="width:100%" id="datatable_1" class="table table-bordered">
                                <caption></caption>
                                <thead>
                                    <tr>
                                        <th rowspan="2" id="" style="text-align: center; vertical-align: middle; width:3%">No.</th>
                                        <th colspan="3" id="" style="text-align: center; vertical-align: middle; ">Kriteria</th>
                                        <th colspan="4" id="" style="text-align: center; vertical-align: middle; ">Subkriteria</th>
                                    </tr>
                                    <tr>
                                        <th id="" style="text-align: center; vertical-align: middle; ">Kode</th>
                                        <th id="" style="text-align: center; vertical-align: middle; ">Nama</th>
                                        <th id="" style="text-align: center; vertical-align: middle; ">Keterangan</th>
                                        <th id="" style="text-align: center; vertical-align: middle; ">Kode</th>
                                        <th id="" style="text-align: center; vertical-align: middle; ">Nama</th>
                                        <th id="" style="text-align: center; vertical-align: middle; ">Nilai Penentapan</th>
                                        <th id="" style="text-align: center; vertical-align: middle; ">Bobot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach($kriteria as $row1) {
                                    ?>
                                    <tr>
                                        <td rowspan="5" style="text-align: center; vertical-align: middle;"><?php echo $no;?></td>
                                        <td rowspan="5" style="text-align: left; vertical-align: middle;"><?php echo $row1->kode_kriteria;?></td>
                                        <td rowspan="5" style="text-align: left; vertical-align: middle;"><?php echo $row1->nama_kriteria;?></td>
                                        <td rowspan="5" style="text-align: left; vertical-align: middle;"><?php echo $row1->keterangan_kriteria;?></td>
                                        <?php 
                                            foreach($subkriteria as $row2) {
                                                if($row1->kode_kriteria == $row2->kode_kriteria){ 
                                        ?>
                                            <td style="text-align: left; vertical-align: middle;"><?php echo $row2->kode_subkriteria;?></td>
                                            <td style="text-align: left; vertical-align: middle;"><?php echo $row2->nama_subkriteria;?></td>
                                            <td style="text-align: left; vertical-align: middle;"><?php echo $row2->persentase_subkriteria;?></td>
                                            <td style="text-align: left; vertical-align: middle;"><?php echo $row2->bobot_subkriteria;?></td>
                                            
                                    </tr>
                                    <?php
                                                } 
                                            }
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
        type: 'bar',
        data: {
            labels: <?php echo $nama_karyawan; ?>, 
            datasets: [
                {
                    label               : 'Total Net Flow',
                    backgroundColor     : 'rgba(220,53,69, 0.8)',
                    borderColor         : 'rgba(220,53,69, 0.8)',
                    pointRadius         : true,
                    pointColor          : '#dc3545',
                    pointStrokeColor    : 'rgba(220,53,69, 0.8)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,53,69,1)',
                    data                : <?php echo $netflow; ?>
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
