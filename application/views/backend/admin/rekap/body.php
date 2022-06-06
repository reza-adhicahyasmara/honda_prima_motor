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
                        <span class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a></span>
                        <span class="breadcrumb-item active">Data Rekap</span>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table style="width:100%" id="datatable_rekap" class="table table-bordered table-striped">
                        <caption></caption>
                        <thead>
                            <tr>
                                <th id="" style="text-align: center; vertical-align: middle; width:3%">No.</th>
                                <th id="" style="text-align: center; vertical-align: middle; ">Tanggal Rekap</th>
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
                                <td style="text-align: left; vertical-align: middle;"><?php echo $row->tanggal_rekap;?></td>
                                <td style="text-align: left; vertical-align: middle;"><?php echo $row->keterangan_rekap;?></td>
                                <td style="text-align: center; vertical-align: middle;" >
                                    <a class='btn btn-primary btn-sm btn-rounded' href="<?php echo base_url("admin/rekap/detail_rekap/").$row->kode_rekap;?>"><span class="bx bx-fw bx-spreadsheet"></span></a>
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
    var url_rekap =  "<?php echo base_url('admin/rekap'); ?>";
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