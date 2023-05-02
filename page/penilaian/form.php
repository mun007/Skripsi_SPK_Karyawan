<div class="col-sm-10">
    <div class="card">
        <div class="card-body">
           <h4 class="card-title">Penilaian</h4>
            <h6 class="card-subtitle">Penilaian calon berdasarkan kriteria masing-masing dengan tiap nilai yang sudah ditentukan</h6>                
        </div>
        <hr class="mt-0">
        <div class="card-body">                
         <?php
         switch ($_GET['form']){
            case 'baru':
                $id_alternatif = $_GET['id'];
                $nama_kandidat = $_GET['nama'];                
                $list_kriteria = mysqli_query($koneksi,"SELECT*FROM t_kriteria");
                $jml_kriteria  = mysqli_num_rows($list_kriteria);                
                ?>
                <h4 class="card-title"><?php echo $nama_kandidat;?></h4>     
                <form class="form-horizontal r-separator" method="POST" action="page/penilaian/proses.php?act=insert">
                    <div class="form-group row align-items-center mb-0">
                        <input type="text" class="form-control" name="id_alternatif" value="<?php echo $_GET['id'];?>" hidden>
                        <?php 
                        for ($i=1; $i <= $jml_kriteria; $i++) {
                            $row = mysqli_fetch_assoc($list_kriteria); ?>                                   
                            <label class="col-md-3 text-right control-label col-form-label"><?php echo $row['kriteria'];?></label>
                            <div class="col-md-9 border-left pb-2 pt-2">
                                <input name="id_kriteria[]" value="<?php echo $row['id_kriteria'];?>" type="text" class="form-control" hidden>
                                <select name="id_subkriteria[]" class="form-control custom-select">
                                    <option disabled selected> Nilai </option>
                                    <?php
                                        $sql = mysqli_query($koneksi,"SELECT*FROM t_subkriteria WHERE id_kriteria=$i");
                                        $jml_list_nilai = mysqli_num_rows($sql);
                                        for ($j=1; $j <= $jml_list_nilai; $j++){ 
                                            $d_nilai = mysqli_fetch_assoc($sql); ?>                                             
                                            <option value="<?php echo $d_nilai['id_subkriteria'];?>"><?php echo $d_nilai['subkriteria']." = ".$d_nilai['nilai'];?></option> 
                                <?php   } ?>
                                </select>                                        
                            </div><?php
                        }?>                                
                    </div>
                    <div class="card-body">
                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-check"></i> Simpan</button>
                        <button type="reset" class="btn btn-warning waves-effect waves-light"><i class="mdi mdi-reload"></i> Ulang</button>
                        <button type="button" onclick="window.location.href='?page=penilaian'" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-arrow-left"></i> Kembali</button>
                    </div>
                    </div>
                </form><?php                
            break;
            case 'edit' :
                $id_alternatif = $_GET['id_a'];
                $id_kriteria = $_GET['id_k'];  
                $sql_1 = mysqli_query($koneksi, "SELECT * FROM v_penilaian WHERE id_alternatif='$id_alternatif' and id_kriteria='$id_kriteria'");
                
                $row = mysqli_fetch_assoc($sql_1);
                ?> 
                    <h4 class="card-title"><?php echo $row['nama'];?></h4>     
                    <form class="form-horizontal r-separator" method="POST" action="page/penilaian/proses.php?act=update">                        
                        <div class="form-group row align-items-center mb-0">
                            <input type="text" hidden name="id_alternatif" value="<?php echo $id_alternatif;?>">
                            <input type="text" hidden name="id_kriteria" value="<?php echo $id_kriteria;?>">                                              
                                <label class="col-md-3 text-right control-label col-form-label"><?php echo $row['kriteria'];?>
                                </label>
                                <div class="col-md-9 border-left pb-2 pt-2">
                                <select name="id_subkriteria" class="form-control custom-select">
                                        <option disabled selected><?php echo $row['subkriteria']." = ". $row['nilai'];?> </option>
                                        <?php
                                            $sql_2 = mysqli_query($koneksi,"SELECT * FROM t_subkriteria WHERE id_kriteria='$id_kriteria'");
                                            $jml_list_nilai = mysqli_num_rows($sql_2);
                                            for ($j=1; $j <= $jml_list_nilai; $j++){ 
                                                $d_nilai = mysqli_fetch_assoc($sql_2); ?>                                             
                                                <option value="<?php echo $d_nilai['id_subkriteria'];?>"><?php echo $d_nilai['subkriteria']." = ".$d_nilai['nilai'];?></option> 
                                    <?php   } ?>
                                    </select> 
                                </div>
                                                            
                        </div>
                        <div class="card-body">
                        <div class="form-group mb-0 text-right">
                            <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-check"></i> Update</button>
                            
                            <button type="button" onclick="window.location.href='?page=penilaian'" class="btn btn-dark waves-effect waves-light"><i class="mdi mdi-close"></i> Cancel</button>
                        </div>
                        </div>
                    </form><?php       
        }?>
        </div>
    </div>
</div>
