<?php $this->load->view('backend/partials/head.php') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-1 text-dark"><span class="nav-icon bx bx-fw bxs-chart"></span>Data Detail Rekap</h1>
                </div>
                <div class="col-sm-6 float-sm-right">
                    <ol class="breadcrumb float-sm-right m-2">
                        <span class="breadcrumb-item"><a href="<?php echo base_url('kepala_sekolah/dashboard'); ?>">Dashboard</a></span>
                        <span class="breadcrumb-item"><a href="<?php echo base_url('kepala_sekolah/rekap'); ?>">Rekap</a></span>
                        <span class="breadcrumb-item active">Detail Data Rekap</span>
                    </ol>
                </div>
            </div>
        </div>
    </div>

<section class="content">
    <div class="container-fluid">
        <div class="card" style="border: 2px solid #17a2b8; border-radius: 10px">
            <div class="card-body"> 
                <div class="row">
                    <div class="col-6">
                        <table class="text-md">
                            <caption></caption>
                            <tr>
                                <th class="p-1" id="" style="vertical-align: top;">Tanggal Rekap</th>
                                <td class="p-1" style="vertical-align: top;">:</td>
                                <td class="p-1" style="vertical-align: top;"><?php echo $rekap_smt['tanggal_rekap_smt']; ?></td>
                            </tr>
                            <tr>
                                <th class="p-1">Tahun Ajaran</th>
                                <td class="p-1">:</td>
                                <td class="p-1"><?php echo $rekap_smt['tahun_ajaran_rekap_smt']. "(".$rekap_smt['semester_rekap_smt'].")"; ?></td>
                            </tr>
                            <tr>
                                <th class="p-1">Jumlah Penerima Bantuan</th>
                                <td class="p-1">:</td>
                                <td class="p-1"><?php echo number_format($rekap_smt['siswa_kls7_rekap_smt'] + $rekap_smt['siswa_kls8_rekap_smt'] + $rekap_smt['siswa_kls9_rekap_smt'], 0, ".", ".")." Siswa"; ?></td>
                            </tr>
                            <tr>
                                <th class="p-1">Total Dana Bantuan</th>
                                <td class="p-1">:</td>
                                <td class="p-1"><?php echo "Rp. ".number_format($rekap_smt['dana_bantuan_rekap_smt'], 0, ".", "."); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6">
                        <div class="form-group float-right">
                            <a href="<?php echo base_url('tata_usaha/rekap/print/').$rekap_smt['kode_rekap_smt'];?>" target="_blank" class="btn btn-warning"><span class="bx bx-fw bx-printer"></span> Print</a>
                        </div>
                    </div>
                </div>
                <h4>Kelas 7</h4>
                <table style="width:100%" id="datatable_rekap" class="table table-bordered table-striped">
                    <caption></caption>
                    <thead>
                        <tr>
                            <th id="" style="text-align: center; vertical-align: middle; width:3%">No.</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">NISN</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Kelas</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Nama</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Alamat</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Nama Orang Tua / Wali</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">No Kontak<br>Nama Orang Tua / Wali</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Profil Match</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Kelayakan</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Dana Diterima (Rp.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            //SETTING TANGGAL
                            $no = 1;
                            $total_dana_kls7 = 0;
                            foreach($rekap->result() as $row) {
                                if($row->semester_rekap == "Ganjil" && date("Y", strtotime($row->tanggal_rekap)) == date("Y" ) && preg_replace("/[^0-9]/","",$row->kelas_siswa) == 7){  
                        ?>

                        <tr>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $no;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->nisn_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->kelas_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->nama_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->alamat_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;">
                                <?php 
                                    if($row->keberadaan_ortu == "Lengkap"){
                                        echo $row->nama_ayah_ortu ." / ".$row->nama_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim"){
                                        echo $row->nama_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Piatu"){
                                        echo $row->nama_ayah_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim Piatu"){
                                        echo $row->nama_wali_ortu;
                                    }
                                ?>
                            </td>
                            <td style="text-align: left; vertical-align: middle;">
                                <?php 
                                    if($row->keberadaan_ortu == "Lengkap"){
                                        echo $row->kontak_ayah_ortu ." / ".$row->kontak_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim"){
                                        echo $row->kontak_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Piatu"){
                                        echo $row->kontak_ayah_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim Piatu"){
                                        echo $row->kontak_wali_ortu;
                                    }
                                ?>
                            </td>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $row->profil_match_rekap;?></td>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $row->kelayakan_rekap;?></td>
                            <td style="text-align: right; vertical-align: middle;"><?php echo number_format($total_dana_kls7 =+ $row->dana_rekap, 0 ,".",".");?></td>
                        </tr>

                        <?php 
                            }elseif($row->semester_rekap == "Genap" && date("Y", strtotime($row->tanggal_rekap)) == date("Y") && preg_replace("/[^0-9]/","",$row->kelas_siswa) == 7){   
                        ?>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $no;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->nisn_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->kelas_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->nama_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->alamat_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;">
                                <?php 
                                    if($row->keberadaan_ortu == "Lengkap"){
                                        echo $row->nama_ayah_ortu ." / ".$row->nama_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim"){
                                        echo $row->nama_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Piatu"){
                                        echo $row->nama_ayah_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim Piatu"){
                                        echo $row->nama_wali_ortu;
                                    }
                                ?>
                            </td>
                            <td style="text-align: left; vertical-align: middle;">
                                <?php 
                                    if($row->keberadaan_ortu == "Lengkap"){
                                        echo $row->kontak_ayah_ortu ." / ".$row->kontak_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim"){
                                        echo $row->kontak_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Piatu"){
                                        echo $row->kontak_ayah_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim Piatu"){
                                        echo $row->kontak_wali_ortu;
                                    }
                                ?>
                            </td>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $row->profil_match_rekap;?></td>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $row->kelayakan_rekap;?></td>
                            <td style="text-align: right; vertical-align: middle;"><?php echo number_format($total_dana_kls7 =+ $row->dana_rekap, 0 ,".",".");?></td>
                        </tr>
                        <?php
                                $no++;
                                }
                            } 
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9" style="text-align: right; vertical-align: middle;">Total</td>
                            <td style="text-align: right; vertical-align: middle;"><?php echo number_format($total_dana_kls7, 0 ,".",".");?></td>
                        </tr>
                    </tfoot>
                </table>


                
                <h4>Kelas 8</h4>
                <table style="width:100%" id="datatable_rekap" class="table table-bordered table-striped">
                    <caption></caption>
                    <thead>
                        <tr>
                            <th id="" style="text-align: center; vertical-align: middle; width:3%">No.</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">NISN</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Kelas</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Nama</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Alamat</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Nama Orang Tua / Wali</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">No Kontak<br>Nama Orang Tua / Wali</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Profil Match</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Kelayakan</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Dana Diterima (Rp.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            //SETTING TANGGAL
                            $no = 1;
                            $total_dana_kls8 = 0;
                            foreach($rekap->result() as $row) {
                                if($row->semester_rekap == "Ganjil" && date("Y", strtotime($row->tanggal_rekap)) == date("Y" ) && preg_replace("/[^0-9]/","",$row->kelas_siswa) == 8){  
                        ?>

                        <tr>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $no;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->nisn_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->kelas_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->nama_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->alamat_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;">
                                <?php 
                                    if($row->keberadaan_ortu == "Lengkap"){
                                        echo $row->nama_ayah_ortu ." / ".$row->nama_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim"){
                                        echo $row->nama_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Piatu"){
                                        echo $row->nama_ayah_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim Piatu"){
                                        echo $row->nama_wali_ortu;
                                    }
                                ?>
                            </td>
                            <td style="text-align: left; vertical-align: middle;">
                                <?php 
                                    if($row->keberadaan_ortu == "Lengkap"){
                                        echo $row->kontak_ayah_ortu ." / ".$row->kontak_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim"){
                                        echo $row->kontak_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Piatu"){
                                        echo $row->kontak_ayah_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim Piatu"){
                                        echo $row->kontak_wali_ortu;
                                    }
                                ?>
                            </td>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $row->profil_match_rekap;?></td>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $row->kelayakan_rekap;?></td>
                            <td style="text-align: right; vertical-align: middle;"><?php echo number_format($total_dana_kls8 =+ $row->dana_rekap, 0 ,".",".");?></td>
                        </tr>

                        <?php 
                            }elseif($row->semester_rekap == "Genap" && date("Y", strtotime($row->tanggal_rekap)) == date("Y") && preg_replace("/[^0-9]/","",$row->kelas_siswa) == 8){   
                        ?>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $no;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->nisn_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->kelas_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->nama_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->alamat_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;">
                                <?php 
                                    if($row->keberadaan_ortu == "Lengkap"){
                                        echo $row->nama_ayah_ortu ." / ".$row->nama_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim"){
                                        echo $row->nama_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Piatu"){
                                        echo $row->nama_ayah_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim Piatu"){
                                        echo $row->nama_wali_ortu;
                                    }
                                ?>
                            </td>
                            <td style="text-align: left; vertical-align: middle;">
                                <?php 
                                    if($row->keberadaan_ortu == "Lengkap"){
                                        echo $row->kontak_ayah_ortu ." / ".$row->kontak_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim"){
                                        echo $row->kontak_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Piatu"){
                                        echo $row->kontak_ayah_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim Piatu"){
                                        echo $row->kontak_wali_ortu;
                                    }
                                ?>
                            </td>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $row->profil_match_rekap;?></td>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $row->kelayakan_rekap;?></td>
                            <td style="text-align: right; vertical-align: middle;"><?php echo number_format($total_dana_kls8 =+ $row->dana_rekap, 0 ,".",".");?></td>
                        </tr>
                        <?php
                                $no++;
                                }
                            } 
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9" style="text-align: right; vertical-align: middle;">Total</td>
                            <td style="text-align: right; vertical-align: middle;"><?php echo number_format($total_dana_kls8, 0 ,".",".");?></td>
                        </tr>
                    </tfoot>
                </table>



                
                <h4>Kelas 9</h4>
                <table style="width:100%" id="datatable_rekap" class="table table-bordered table-striped">
                    <caption></caption>
                    <thead>
                        <tr>
                            <th id="" style="text-align: center; vertical-align: middle; width:3%">No.</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">NISN</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Kelas</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Nama</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Alamat</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Nama Orang Tua / Wali</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">No Kontak<br>Nama Orang Tua / Wali</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Profil Match</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Kelayakan</th>
                            <th id="" style="text-align: center; vertical-align: middle; ">Dana Diterima (Rp.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            //SETTING TANGGAL
                            $no = 1;
                            $total_dana_kls9 = 0;
                            foreach($rekap->result() as $row) {
                                if($row->semester_rekap == "Ganjil" && date("Y", strtotime($row->tanggal_rekap)) == date("Y" ) && preg_replace("/[^0-9]/","",$row->kelas_siswa) == 9){  
                        ?>

                        <tr>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $no;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->nisn_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->kelas_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->nama_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->alamat_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;">
                                <?php 
                                    if($row->keberadaan_ortu == "Lengkap"){
                                        echo $row->nama_ayah_ortu ." / ".$row->nama_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim"){
                                        echo $row->nama_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Piatu"){
                                        echo $row->nama_ayah_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim Piatu"){
                                        echo $row->nama_wali_ortu;
                                    }
                                ?>
                            </td>
                            <td style="text-align: left; vertical-align: middle;">
                                <?php 
                                    if($row->keberadaan_ortu == "Lengkap"){
                                        echo $row->kontak_ayah_ortu ." / ".$row->kontak_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim"){
                                        echo $row->kontak_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Piatu"){
                                        echo $row->kontak_ayah_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim Piatu"){
                                        echo $row->kontak_wali_ortu;
                                    }
                                ?>
                            </td>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $row->profil_match_rekap;?></td>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $row->kelayakan_rekap;?></td>
                            <td style="text-align: right; vertical-align: middle;"><?php echo number_format($total_dana_kls9 =+ $row->dana_rekap, 0 ,".",".");?></td>
                        </tr>

                        <?php 
                            }elseif($row->semester_rekap == "Genap" && date("Y", strtotime($row->tanggal_rekap)) == date("Y") && preg_replace("/[^0-9]/","",$row->kelas_siswa) == 9){   
                        ?>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $no;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->nisn_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->kelas_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->nama_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;"><?php echo $row->alamat_siswa;?></td>
                            <td style="text-align: left; vertical-align: middle;">
                                <?php 
                                    if($row->keberadaan_ortu == "Lengkap"){
                                        echo $row->nama_ayah_ortu ." / ".$row->nama_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim"){
                                        echo $row->nama_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Piatu"){
                                        echo $row->nama_ayah_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim Piatu"){
                                        echo $row->nama_wali_ortu;
                                    }
                                ?>
                            </td>
                            <td style="text-align: left; vertical-align: middle;">
                                <?php 
                                    if($row->keberadaan_ortu == "Lengkap"){
                                        echo $row->kontak_ayah_ortu ." / ".$row->kontak_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim"){
                                        echo $row->kontak_ibu_ortu;
                                    }elseif($row->keberadaan_ortu == "Piatu"){
                                        echo $row->kontak_ayah_ortu;
                                    }elseif($row->keberadaan_ortu == "Yatim Piatu"){
                                        echo $row->kontak_wali_ortu;
                                    }
                                ?>
                            </td>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $row->profil_match_rekap;?></td>
                            <td style="text-align: center; vertical-align: middle;"><?php echo $row->kelayakan_rekap;?></td>
                            <td style="text-align: right; vertical-align: middle;"><?php echo number_format($total_dana_kls9 =+ $row->dana_rekap, 0 ,".",".");?></td>
                        </tr>
                        <?php
                                $no++;
                                }
                            } 
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="9" style="text-align: right; vertical-align: middle;">Total</td>
                            <td style="text-align: right; vertical-align: middle;"><?php echo number_format($total_dana_kls9, 0 ,".",".");?></td>
                        </tr>
                    </tfoot>
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

</script>


</body>
</html>