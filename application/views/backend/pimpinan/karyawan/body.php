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
                        <span class="breadcrumb-item"><a href="<?php echo base_url('pimpinan/dashboard'); ?>">Dashboard</a></span>
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

<?php $this->load->view('backend/partials/footer.php') ?>
<?php $this->load->view('backend/partials/script.php') ?>

<!-----------------------FUNGSI----------------------->
<script type="text/javascript">
    var url_karyawan =  "<?php echo base_url('pimpinan/karyawan'); ?>";
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
			url : "<?php echo base_url('pimpinan/karyawan/load_data_admin'); ?>",
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
            url : "<?php echo base_url('pimpinan/karyawan/load_data_sales'); ?>",
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
			url : "<?php echo base_url('pimpinan/karyawan/load_data_pimpinan'); ?>",
			beforeSend : function(){
				$('#content_pimpinan').html('<div style="text-align:center"><i class="bx bx-loader-alt bx-md bx-spin" style="margin-top: 30px; margin-bottom: 30px;" aria-hidden="true"></i></div>');
			},
			success : function(response){
				$('#content_pimpinan').html(response);
			}
		});
    };

</script>

</body>
</html>