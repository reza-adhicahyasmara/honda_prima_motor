<?php $this->load->view('backend/partials/head.php') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-1 text-dark"><span class="nav-icon bx bx-fw bxs-calendar-edit"></span>Penilaian</h1>
                </div>
                <div class="col-sm-6 float-sm-right">
                    <ol class="breadcrumb float-sm-right m-2">
                        <span class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a></span>
                        <span class="breadcrumb-item active">Penilaian</span>
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
                        <div class="col-6">
                            <h4>Data Bulan <?php echo date("M Y");?></h4>
                        </div>
                        <?php 
                            if (!$data_rekap){
                        ?>
                        <div class="col-6">
                            <a type="button" class="btn bg-warning float-right" id="btn_penilaian"><span class="bx bx-fw bxs-calendar-edit"></span> Tambah Penilaian</a>
                        </div>
                    </div>
                    <br>
                    <div id="content_hasil_penilaian">
                        <!--LOAD DATA-->
                    </div>
                    <?php
                        }else{	
                            echo "</div><br><br><br><div class='text-center'><h5>-Telah Dilakukan Rekapitulasi Bulan Ini-</h5>"."<a class='btn btn-primary btn-sm btn-rounded' href='".base_url('admin/rekap/detail_rekap/').$data_rekap['kode_rekap']."'>Lihat Data Rekap</a>"."</div><br><br>";

                        }
                    ?>  
                </div>
            </div>
        </div>
    </section>
</div>

<form role="form" id="form_penilaian" method="post" aria-label="">
    <div id="modal_penilaian" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><span class="modal-title text-lg" id="myModalLabel"></span></strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body-load">
                        <!--LOAD DATA-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="bx bx-fw bx-x"></span> Batal</button>
                    <button type="submit" id="btn_simpan_penilaian" class="btn bg-primary"><span class="bx bx-fw bx-save"></span> Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php $this->load->view('backend/partials/footer.php') ?>
<?php $this->load->view('backend/partials/script.php') ?>

<!-----------------------FUNGSI----------------------->
<script type="text/javascript">
    var url_siswa =  "<?php echo base_url('admin/penilaian'); ?>";
    var url = url_siswa ;
    $('ul.nav-sidebar a').filter(function() {
        return this.href == url;
    }).addClass('active ');
    $('ul.nav-treeview a').filter(function() {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
</script>

<!-----------------------PENILAIAN----------------------->
<script type="text/javascript">

    $(document).on('click', '#btn_penilaian', function(e) {
        var url = "<?php echo base_url('admin/penilaian/form_penilaian'); ?>";

        $('#modal_penilaian').modal('show');
        $('.modal-title').text('Tambah Data Penilaian Sales');
        $('.modal-body-load').load(url);
    });

    $(document).ready(function() {
        $('#btn_simpan_penilaian').on("click",function(){
            $('#form_penilaian').validate({
                rules: {
                    nik_karyawan: {
                        required: true,
                    },
                    k1_penilaian: {
                        required: true,
                    },
                    k2_penilaian: {
                        required: true,
                    },
                    k3_penilaian: {
                        required: true,
                    },
                    k4_penilaian: {
                        required: true,
                    },
                    k5_penilaian: {
                        required: true,
                    },
                },
                messages: {
                    nik_karyawan: {
                        required: "Harus diisi",
                    },
                    k1_penilaian: {
                        required: "Harus diisi",
                    },
                    k2_penilaian: {
                        required: "Harus diisi",
                    },
                    k3_penilaian: {
                        required: "Harus diisi",
                    },
                    k4_penilaian: {
                        required: "Harus diisi",
                    },
                    k5_penilaian: {
                        required: "Harus diisi",
                    },
                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function() {
                    $("#form_penilaian").load('submit', function(e){
                        $.ajax({
                            url : '<?php echo base_url('admin/penilaian/simpan_penilaian'); ?>',
                            method: 'POST',
                            data: new FormData(this),
                            contentType: false,
                            cache: false,
                            processData:false, 
                            success: function(response){
                                if(response==1){
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil Disimpan!',
                                        showConfirmButton: true,
                                        confirmButtonColor: '#007bff',
                                        timer: 3000
                                    }).then(function(){
                                        window.location.reload();
                                    });
                                } else {
                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Gagal!',
                                        text: response,
                                        showConfirmButton: true,
                                        confirmButtonColor: '#007bff',
                                        timer: 3000
                                    })
                                }
                            }
                        }); 
                    });
                }  
            });  
        });
    });
    
</script>

<!-----------------------HASIL HITUNG & REKAP----------------------->
<script type="text/javascript">
    load_data_penilaian();
	function load_data_penilaian(){
		$.ajax({
			method : "GET",
			url : "<?php echo base_url('admin/penilaian/load_data_penilaian'); ?>",
			beforeSend : function(){
				$('#content_hasil_penilaian').html('<div style="text-align:center"><i class="bx bx-loader-alt bx-md bx-spin" style="margin-top: 30px; margin-bottom: 30px;" aria-hidden="true"></i></div>');
			},
			success : function(response){
				$('#content_hasil_penilaian').html(response);
			}
		});
    };
    
    $(document).on('click', '.btn_hapus_penilaian', function() {
        var kode_penilaian=$(this).attr("kode_penilaian");
        var nama_karyawan=$(this).attr("nama_karyawan");
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: 'Akan menghapus data penilaian "' + nama_karyawan + '"!',
            type: 'warning',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#007bff',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: "Tidak, batalkan",
            showLoaderOnConfirm: true,
            customClass: 'animated tada',
            preConfirm: function() {
                return new Promise(function(resolve) {
                    $.ajax({
                        url: "<?php echo base_url('admin/penilaian/hapus_penilaian');?>",
                        method: 'POST',
                        data: {
                            kode_penilaian:kode_penilaian
                        },                
                    })
                    .done(function(response) {
                        Swal.fire({
                            title: 'Data Berhasil Dihapus',
                            icon: 'success',
                            showConfirmButton: true,
                            confirmButtonColor: '#007bff',
                        })
                    }).then(function(){
                        window.location.reload();
                    })
                    .fail(function() {
                        Swal.fire({
                            title: 'Terjadi Kesalahan',
                            icon: 'error',
                            showConfirmButton: true,
                            confirmButtonColor: '#007bff',
                        })
                    });
                });
            },
        });
    });  
    
</script>

</body>
</html>