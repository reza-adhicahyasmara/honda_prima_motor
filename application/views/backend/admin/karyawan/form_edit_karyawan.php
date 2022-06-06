<input type="hidden" name="jenis" id="jenis" value="Edit">
<div class="form-group">
    <div class="d-flex justify-content-center">
        <div class="form-group text-center">
            <div class="form-control" style="padding: 0px; width:180px; height: 180px;">
                <?php if($edit['foto_karyawan'] != "") { ?>
                    <img id="blah" src="<?php echo base_url('assets/img/karyawan/'.$edit['foto_karyawan']);?>" class="product-image" alt="Gambar Promo" style="border-radius: 3px; width:180px; height:180px; object-fit: cover; ">  
                <?php }else{ ?>
                    <img id="blah" src="<?php echo base_url('assets/img/banner/user_solid.png');?>" class="product-image" alt="Gambar Promo" style="border-radius: 3px; width:180px; height:180px; object-fit: cover; ">  
                <?php } ?> 
            </div>
            <input class="text" accept="image/*" type="file" id="foto_karyawan" name="file" style="display: none;" />
            <input class="text" type="text" id="foto_karyawan_lama" name="foto_karyawan_lama" value="<?php echo $edit['foto_karyawan']; ?>" style="display: none;" />
            <label class="btn btn-primary btn-sm" for="foto_karyawan">Pilih Gambar</label>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="level_karyawan">Level</label>
    <select type="text" class="form-control" name="level_karyawan" id="level_karyawan" >
        <option value="Admin" <?php if($edit['level_karyawan'] == "Admin"){echo "selected";} ?>>Admin</option>
        <option value="Sales" <?php if($edit['level_karyawan'] == "Sales"){echo "selected";} ?>>Sales</option>
        <option value="Pimpinan" <?php if($edit['level_karyawan'] == "Pimpinan"){echo "selected";} ?>>Pimpinan</option>
    </select>
</div>
<div class="form-group">
    <label for="nik_karyawan">Nomer Induk Karyawan</label>
    <input type="text" class="form-control" name="nik_karyawan" id="nik_karyawan" value="<?php echo $edit['nik_karyawan']; ?>" placeholder="Nomer Induk Karyawan" readonly>
</div>
<div class="form-group">
    <label for="nama_karyawan">Nama</label>
    <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" value="<?php echo $edit['nama_karyawan']; ?>" onkeypress="return /[a-z A-Z]/i.test(event.key)" placeholder="Nama">
</div>
<div class="form-group">
    <label for="alamat_karyawan">Alamat</label>
    <textarea type="text" class="form-control" name="alamat_karyawan" id="alamat_karyawan" placeholder="Alamat" style="height:100px;"><?php echo $edit['alamat_karyawan']; ?></textarea>
</div>
<div class="form-group">
    <label for="kontak_karyawan">Kontak</label>
    <input type="text" class="form-control" name="kontak_karyawan" id="kontak_karyawan" value="<?php echo $edit['kontak_karyawan']; ?>" onkeypress="return /[0-9]/i.test(event.key)" placeholder="No. Telepon / No. Handphone">
</div>
<div class="form-group">
    <label for="username_karyawan_baru">Username</label>
    <input type="text" class="form-control" name="username_karyawan_baru" id="username_karyawan_baru" value="<?php echo $edit['username_karyawan']; ?>" placeholder="Password">
    <input type="hidden" class="form-control" name="username_karyawan_lama" id="username_karyawan_lama" value="<?php echo $edit['username_karyawan']; ?>" placeholder="Password">
</div>
<div class="form-group">
    <label for="password_karyawan">Password</label>
    <input type="text" class="form-control" name="password_karyawan" id="password_karyawan" value="<?php echo $edit['password_karyawan']; ?>" placeholder="Password">
</div>


<!-----------------------FUNGSI----------------------->
<script type="text/javascript">
	foto_karyawan.onchange = evt => {
		const [file] = foto_karyawan.files
		if (file) {
			blah.src = URL.createObjectURL(file)
		}
	}
</script>