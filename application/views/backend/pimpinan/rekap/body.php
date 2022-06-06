<?php $this->load->view('backend/partials/head.php') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-1 text-dark"><span class="nav-icon bx bx-fw bxs-chart"></span>Data Rekap</h1>
                </div>
                <div class="col-sm-6 float-sm-right">
                    <ol class="breadcrumb float-sm-right m-2">
                        <span class="breadcrumb-item"><a href="<?php echo base_url('kepala_sekolah/dashboard'); ?>">Dashboard</a></span>
                        <span class="breadcrumb-item active">Data Rekap</span>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card" style="border: 2px solid #17a2b8; border-radius: 10px">
                <div class="card-body">
                    <table style="width:100%" id="datatable_rekap" class="table table-bordered table-striped">
                        <caption></caption>
                        <thead>
                            <tr>
                                <th id="" style="text-align: center; vertical-align: middle; width:3%">No.</th>
                                <th id="" style="text-align: center; vertical-align: middle; ">Tanggal Rekap</th>
                                <th id="" style="text-align: center; vertical-align: middle; ">Tahun Ajaran</th>
                                <th id="" style="text-align: center; vertical-align: middle; ">Semester</th>
                                <th id="" style="text-align: center; vertical-align: middle; ">Siswa<br>Kelas 7</th>
                                <th id="" style="text-align: center; vertical-align: middle; ">Siswa<br>Kelas 8</th>
                                <th id="" style="text-align: center; vertical-align: middle; ">Siswa<br>Kelas 9</th>
                                <th id="" style="text-align: center; vertical-align: middle; ">Total Siswa<br>Penerima Bantuan</th>
                                <th id="" style="text-align: center; vertical-align: middle; ">Total Dana<br>Bantuan (Rp.)</th>
                                <th id="" style="text-align: center; vertical-align: middle; ">Keterangan</th>
                                <th id="" style="text-align: center; vertical-align: middle; ">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $no = 1;
                                foreach($rekap->result() as $row) {
                            ?>
                            <tr>
                                <td style="text-align: center; vertical-align: middle;"><?php echo $no;?></td>
                                <td style="text-align: left; vertical-align: middle;"><?php echo $row->tanggal_rekap_smt;?></td>
                                <td style="text-align: left; vertical-align: middle;"><?php echo $row->tahun_ajaran_rekap_smt;?></td>
                                <td style="text-align: left; vertical-align: middle;"><?php echo $row->semester_rekap_smt;?></td>
                                <td style="text-align: right; vertical-align: middle;"><?php echo number_format($row->siswa_kls7_rekap_smt, 0, ".",".");?></td>
                                <td style="text-align: right; vertical-align: middle;"><?php echo number_format($row->siswa_kls8_rekap_smt, 0, ".",".");?></td>
                                <td style="text-align: right; vertical-align: middle;"><?php echo number_format($row->siswa_kls9_rekap_smt, 0, ".",".");?></td>
                                <td style="text-align: right; vertical-align: middle;"><?php echo number_format($row->siswa_kls7_rekap_smt+$row->siswa_kls8_rekap_smt+$row->siswa_kls9_rekap_smt, 0, ".",".");?></td>
                                <td style="text-align: right; vertical-align: middle;"><?php echo number_format($row->dana_bantuan_rekap_smt, 0, ".",".");?></td>
                                <td style="text-align: left; vertical-align: middle;"><?php echo $row->keterangan_rekap_smt;?></td>
                                <td style="text-align: center; vertical-align: middle;" >
                                    <a class='btn btn-info btn-sm btn-rounded' href="<?php echo base_url("kepala_sekolah/rekap/detail_rekap/").$row->kode_rekap_smt;?>"><span class="bx bx-fw bx-spreadsheet"></span></a>
                                </td>
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
    </section>
</div>

<?php $this->load->view('backend/partials/footer.php') ?>
<?php $this->load->view('backend/partials/script.php') ?>

<!-----------------------FUNGSI----------------------->
<script type="text/javascript">
    var url_rekap =  "<?php echo base_url('kepala_sekolah/rekap'); ?>";
    var url = url_rekap ;
    $('ul.nav-sidebar a').filter(function() {
        return this.href == url;
    }).addClass('active ');
    $('ul.nav-treeview a').filter(function() {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
    
    $(document).ready(function() {
        var table = $('#datatable_rekap').DataTable( {
            responsive: true
        });
    });
</script>

</body>
</html>