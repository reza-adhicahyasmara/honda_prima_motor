<div class="form-group">
    <label for="nik_karyawan">Sales</label>
    <select class="form-control" name="nik_karyawan" id="nik_karyawan">
        <option value="">Pilih</option>
        <?php 
            foreach($karyawan->result() as $row){
                if($row->level_karyawan == "Sales"){
                    echo "<option value='".$row->nik_karyawan."'>".$row->nama_karyawan."</option>";
                }
            }
        ?>
    </select>
</div>
    <?php 
        foreach($kriteria->result() as $row){ 
            if($row->kode_kriteria == "K1"){
    ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="k1_penilaian"><?php echo $row->nama_kriteria; ?> (K1)</label>
                            <p><?php echo $row->keterangan_kriteria; ?></p>
                        </div>
                        <div class="col-6 pt-4">
                            <select class="form-control" name="k1_penilaian" id="k1_penilaian">
                                <option value="">Pilih</option>
                                <?php 
                                    foreach($subkriteria->result() as $row){
                                        if($row->kode_kriteria == "K1"){
                                            echo "<option value='".$row->bobot_subkriteria."'>".$row->persentase_subkriteria." (".$row->nama_subkriteria.")</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
    <?php }elseif($row->kode_kriteria == "K2"){ ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="k2_penilaian"><?php echo $row->nama_kriteria; ?> (K2)</label>
                            <p><?php echo $row->keterangan_kriteria; ?></p>
                        </div>
                        <div class="col-6 pt-4">
                            <select class="form-control" name="k2_penilaian" id="k2_penilaian">
                                <option value="">Pilih</option>
                                <?php 
                                    foreach($subkriteria->result() as $row){
                                        if($row->kode_kriteria == "K2"){
                                            echo "<option value='".$row->bobot_subkriteria."'>".$row->persentase_subkriteria." (".$row->nama_subkriteria.")</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
    <?php }elseif($row->kode_kriteria == "K3"){ ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="k3_penilaian"><?php echo $row->nama_kriteria; ?> (K3)</label>
                            <p><?php echo $row->keterangan_kriteria; ?></p>
                        </div>
                        <div class="col-6 pt-4">
                            <select class="form-control" name="k3_penilaian" id="k3_penilaian">
                                <option value="">Pilih</option>
                                <?php 
                                    foreach($subkriteria->result() as $row){
                                        if($row->kode_kriteria == "K3"){
                                            echo "<option value='".$row->bobot_subkriteria."'>".$row->persentase_subkriteria." (".$row->nama_subkriteria.")</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
    <?php }elseif($row->kode_kriteria == "K4"){ ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col-6">
                            <label for="k4_penilaian"><?php echo $row->nama_kriteria; ?> (K4)</label>
                            <p><?php echo $row->keterangan_kriteria; ?></p>
                        </div>
                        <div class="col-6 pt-4">
                            <select class="form-control" name="k4_penilaian" id="k4_penilaian">
                                <option value="">Pilih</option>
                                <?php 
                                    foreach($subkriteria->result() as $row){
                                        if($row->kode_kriteria == "K4"){
                                            echo "<option value='".$row->bobot_subkriteria."'>".$row->persentase_subkriteria." (".$row->nama_subkriteria.")</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
    <?php
            }
        }
    ?>