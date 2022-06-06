<?php
	if (!$data_nilai){
		echo "<br><br><div class='text-center'><h5>-Tidak Ada Penilaian Bulan Ini-</h5></div><br><br>";
	}else{
?>
<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover">
		<caption></caption>
		<thead>
			<tr>
            	<th rowspan="2" id="" style="text-align: center; vertical-align: middle; width:3%">No.</th>
				<th colspan="4" id="" style="text-align: center; vertical-align: middle;">Data Alternatif</th>
				<th colspan="4" id="" style="text-align: center; vertical-align: middle;">Kriteria</th>
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
			</tr>
		</thead>
		<tbody>
			<?php
				for ($i = 0; $i < count($data_nilai); $i++) {
					echo "<tr>"; 
					echo "<td style='text-align: center; vertical-align: middle;'>".($i+1)."</td>";
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
					echo 
						"<td style='text-align: center; vertical-align: middle;'>
							<a class='btn btn-danger btn-sm btn-rounded btn_hapus_penilaian' kode_penilaian='".$data_nilai[$i]["kode_penilaian"]."' nama_karyawan='".$data_nilai[$i]["nama_karyawan"]."'><span class='bx bx-fw bxs-trash'></span></a>
						</td>";
					echo "</tr>";
				}
			?>
		</tbody>
	</table>
</div>


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
	<?php
	$terbesar = array_reduce($net_flow, function ($a, $b) {
		return @$a['netflow'] > $b['netflow'] ? $a : $b;
	});

	echo "Berdasarkan nilai terbesar maka <b> Alternatif " . $terbesar['nama_karyawan'] . "</b> merupakan alternatif terpilih"; ?>

<div class="row">
	<div class="col-6">
		
	</div>
	<div class="col-6">
		<a type="button" class="btn bg-success float-right" id="btn_rekap"><span class="bx bx-fw bx-save"></span> Simpan Rekap</a>
	</div>
</div>
<?php 
		}
?>

<form role="form" id="form_rekap" method="post" aria-label="">
    <div id="modal_rekap" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <strong><span class="modal-title text-lg" id="myModalLabel"></span></strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
					<strong>Ketrangan</strong>
					<caption>
						<ul>
							<li>Periksa sebelum melakukan perekapan bulan ini.</li>
							<li>Data yang telah direkap tidak dapat diubah.</li>
						</ul>
					</caption>
					<div class="form-group">
						<label for="keterangan_rekap">Keterangan</label>
						<textarea type="text" class="form-control" name="keterangan_rekap" id="keterangan_rekap" placeholder="Informasi tambahan untuk rekap bulan ini" style="height:100px;"></textarea>
					</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="bx bx-fw bx-x"></span> Batal</button>
                    <button type="submit" id="btn_simpan_rekap" class="btn bg-primary"><span class="bx bx-fw bx-save"></span> Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-----------------------PENILAIAN----------------------->
<script>
	$('#btn_rekap').on("click",function(){
        $('#modal_rekap').modal('show');
        $('.modal-title').text('Rekap Penilaian Sales');
    });

	$(document).ready(function() {
        $('#btn_simpan_rekap').on("click",function(){
            $('#form_rekap').validate({
                rules: {
                    keterangan_rekap: {
                        required: true,
                    },
                },
                messages: {
                    keterangan_rekap: {
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
                    $("#form_rekap").load('submit', function(e){
                        $.ajax({
                            url : '<?php echo base_url('admin/penilaian/simpan_rekap'); ?>',
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


