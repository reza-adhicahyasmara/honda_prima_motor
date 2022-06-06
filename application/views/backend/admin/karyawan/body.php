<?php $this->load->view('backend/partials/head.php') ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-1 text-dark"><span class="nav-icon bx bx-fw bxs-group"></span>Karyawan</h1>
                </div>
                <div class="col-sm-6 float-sm-right">
                    <ol class="breadcrumb float-sm-right m-2">
                        <span class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a></span>
                        <span class="breadcrumb-item active">Karyawan</span>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Admin<a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-sales-tab" data-toggle="pill" href="#custom-tabs-four-sales" role="tab" aria-controls="custom-tabs-four-sales" aria-selected="false">Sales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-pimpinan-tab" data-toggle="pill" href="#custom-tabs-four-pimpinan" role="tab" aria-controls="custom-tabs-four-pimpinan" aria-selected="false">Pimpinan</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="float-right">
                        <a type="button" class="btn bg-primary"  id="btn_tambah_karyawan"><span class="bx bx-fw bx-plus"></span> Tambah Data</a>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                            <div id="content_admin">
                                <!--LOAD DATA-->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-sales" role="tabpanel" aria-labelledby="custom-tabs-four-sales-tab">
                            <div id="content_sales">
                                <!--LOAD DATA-->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-four-pimpinan" role="tabpanel" aria-labelledby="custom-tabs-four-pimpinan-tab">
                            <div id="content_pimpinan">
                                <!--LOAD DATA-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<form role="form" id="form_karyawan" method="post">
    <div id="modal_karyawan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><span class="modal-title text-lg" id="myModalLabel"></span></strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- FORM -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="bx bx-fw bx-x"></span> Batal</button>
                    <button type="submit" id="btn_simpan_karyawan" class="btn bg-primary"><span class="bx bx-fw bx-save"></span> Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php $this->load->view('backend/partials/footer.php') ?>
<?php $this->load->view('backend/partials/script.php') ?>

<!-----------------------FUNGSI----------------------->
<script type="text/javascript">
    var url_karyawan =  "<?php echo base_url('admin/karyawan'); ?>";
    var url = url_karyawan ;
    $('ul.nav-sidebar a').filter(function() {
        return this.href == url;
    }).addClass('active ');
    $('ul.nav-treeview a').filter(function() {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
</script>

<script type="text/javascript">
    load_data_admin();
	function load_data_admin(){
		$.ajax({
			method : "GET",
			url : "<?php echo base_url('admin/karyawan/load_data_admin'); ?>",
			beforeSend : function(){
				$('#content_admin').html('<div style="text-align:center"><i class="bx bx-loader-alt bx-md bx-spin" style="margin-top: 30px; margin-bottom: 30px;" aria-hidden="true"></i></div>');
			},
			success : function(response){
				$('#content_admin').html(response);
			}
		});
    };

    load_data_sales();
    function load_data_sales(){
        $.ajax({
            method : "GET",
            url : "<?php echo base_url('admin/karyawan/load_data_sales'); ?>",
            beforeSend : function(){
                $('#content_sales').html('<div style="text-align:center"><i class="bx bx-loader-alt bx-md bx-spin" style="margin-top: 30px; margin-bottom: 30px;" aria-hidden="true"></i></div>');
            },
            success : function(response){
                $('#content_sales').html(response);
            }
        });
    };

    load_data_pimpinan();
	function load_data_pimpinan(){
		$.ajax({
			method : "GET",
			url : "<?php echo base_url('admin/karyawan/load_data_pimpinan'); ?>",
			beforeSend : function(){
				$('#content_pimpinan').html('<div style="text-align:center"><i class="bx bx-loader-alt bx-md bx-spin" style="margin-top: 30px; margin-bottom: 30px;" aria-hidden="true"></i></div>');
			},
			success : function(response){
				$('#content_pimpinan').html(response);
			}
		});
    };

    $('#btn_tambah_karyawan').on("click",function(){
        var url = "<?php echo base_url('admin/karyawan/form_tambah_karyawan'); ?>";

        $('#modal_karyawan').modal('show');
        $('.modal-title').text('Tambah karyawan');
        $('.modal-body').load(url);
    });

    $(document).on('click', '.btn_edit_karyawan', function(e) {
        var nik_karyawan=$(this).attr("nik_karyawan");
        var url = "<?php echo base_url('admin/karyawan/form_edit_karyawan'); ?>";

        $('#modal_karyawan').modal('show');
        $('.modal-title').text('Edit v');
        $('.modal-body').load(url,{nik_karyawan : nik_karyawan});
    });  
    
    $(document).ready(function() {
        $('#btn_simpan_karyawan').on("click",function(){
            $('#form_karyawan').validate({
                rules: {
                    nik_karyawan: {
                        required: true,
                    },
                    level_karyawan: {
                        required: true,
                    },
                    nama_karyawan: {
                        required: true,
                    },
                    alamat_karyawan: {
                        required: true,
                    },
                    kontak_karyawan: {
                        required: true,
                        minlength: 11,
                        maxlength: 15,

                    },
                    password_karyawan: {
                        required: true,
                        minlength: 5,
                    },
                    username_karyawan_baru: {
                        required: true,
                        minlength: 5,
                    },
                },
                messages: {
                    nik_karyawan: {
                        required: "Harus diisi",
                    },
                    level_karyawan: {
                        required: "Harus diisi",
                    },
                    nama_karyawan: {
                        required: "Harus diisi",
                    },
                    alamat_karyawan: {
                        required: "Harus diisi",
                    },
                    kontak_karyawan: {
                        required: "Harus diisi",
                        minlength: "Minimal 11 karakter",
                        maxlength: "Maksimal 15 karakter",
                    },
                    password_karyawan: {
                        required: "Harus diisi",
                        minlength: "Minimal 5 karakter",
                    },
                    username_karyawan_baru: {
                        required: "Harus diisi",
                        minlength: "Minimal 5 karakter",
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
                    $("#form_karyawan").load('submit', function(e){
                        $.ajax({
                            url : '<?php echo base_url('admin/karyawan/tambah_edit_karyawan'); ?>',
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
                                        load_data_admin();
                                        load_data_sales();
                                        load_data_pimpinan();
                                        $('#modal_karyawan').modal('hide');
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
    
    $(document).on('click', '.btn_hapus_karyawan', function() {
        var nik_karyawan=$(this).attr("nik_karyawan");
        var nama_karyawan=$(this).attr("nama_karyawan");
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: 'Akan menghapus data"' + nama_karyawan + '"!',
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
                        url: "<?php echo base_url('admin/karyawan/hapus_karyawan');?>",
                        method: 'POST',
                        data: {
                            nik_karyawan:nik_karyawan
                        },                
                    })
                    .done(function(response) {
                        load_data_admin();
                        load_data_sales();
                        load_data_pimpinan();
                        $('#modal_karyawan').modal('hide');
                        Swal.fire({
                            title: 'Data Berhasil Dihapus',
                            icon: 'success',
                            showConfirmButton: true,
                            confirmButtonColor: '#007bff',
                        })
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