<table style="width:100%" id="datatable_sales" class="table table-bordered table-striped">
    <caption></caption>
    <thead>
        <tr>
            <th id="" style="text-align: center; vertical-align: middle; width:3%">No.</th>
            <th id="" style="text-align: center; vertical-align: middle; ">Foto</th>
            <th id="" style="text-align: center; vertical-align: middle; ">NIK</th>
            <th id="" style="text-align: center; vertical-align: middle; ">Nama</th>
            <th id="" style="text-align: center; vertical-align: middle; ">Alamat</th>
            <th id="" style="text-align: center; vertical-align: middle; ">No. Telp / HP</th>
            <th id="" style="text-align: center; vertical-align: middle; ">Password</th>
            <th id="" style="text-align: center; vertical-align: middle; ">Username</th>
            <th id="" style="text-align: center; vertical-align: middle; ">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $no = 1;
            foreach($sales->result() as $row) {
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
            <td style="text-align: left; vertical-align: middle;"><?php echo $row->password_karyawan;?></td>
            <td style="text-align: left; vertical-align: middle;"><?php echo $row->username_karyawan;?></td>
            <td style="text-align: center; vertical-align: middle;" >
                <a class='btn btn-info' href="<?php echo base_url("admin/karyawan/data_penialaian_sales/").$row->nik_karyawan;?>"><span class="bx bx-fw bx-line-chart"></span></a>
                <a class='btn btn-primary btn_edit_karyawan' nik_karyawan="<?php echo $row->nik_karyawan; ?>"><span class="bx bx-fw bxs-pencil"></span></a>
                <a class='btn btn-danger btn_hapus_karyawan' nama_karyawan="<?php echo $row->nama_karyawan; ?>" nik_karyawan="<?php echo $row->nik_karyawan; ?>"><span class="bx bx-fw bxs-trash"></span></a>
            </td>
        </tr>
        <?php
                    $no++;
                }
            } 
        ?>
    </tbody>
</table>
 
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datetimepicker/build/jquery.datetimepicker.full.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#datatable_sales').DataTable( {
            responsive: true
        });
    });
</script>