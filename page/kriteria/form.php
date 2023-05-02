<div class="row">
    <!-- column -->
    <div class="col-sm-10">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Kriteria</h4>
                <h6 class="card-subtitle">Penentuan kriteria dan nilai bobot kepentingan (%) <p>beserta tipe kriteria apakah menguntungkan "Benefit" atau berharga "Cost"</h6>
                    <?php 
                    switch($_GET['form']){
                      case 'baru' :
                      ?>
                        <form class="form-material mt-4" method="POST" action="page/kriteria/proses.php?act=insert">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label>Kriteria </label>
                                    <input type="text" class="form-control form-control-line" name="kriteria" required> 
                                </div>
                                
                                <div class="form-group col-md-2">
                                    <label>Tipe</label>
                                    <select class="form-control custom-select" name="tipe" required>
                                        <option selected disabled>Pilih</option>
                                        <option value="Benefit">Benefit</option>
                                        <option value="Cost">Cost</option>    
                                         
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Bobot Kepentingan</label>
                                    <input type="number" class="form-control form-control-line" name="bobot" min="1" max="100" placeholder="Nilai 1-100"required> 
                                </div>
                                
                                <hr>
                                <div class="card-body">
                                <div class="form-group mb-0 text-right">
                                   <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-check"></i> Simpan</button>
                                    <button type="reset" class="btn btn-warning waves-effect waves-light"><i class="mdi mdi-reload"></i> Ulang</button>
                                    <button type="button" onclick="window.location.href='?page=kriteria'" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-arrow-left"></i> Kembali</button>
                                </div>
                                </div>
                            </div>
                        </form><?php
                      break;
                      case 'edit' :
                        if (isset($_GET['id'])) {
                          $query = mysqli_query($koneksi, "SELECT * FROM t_kriteria WHERE id_kriteria ='$_GET[id]'") 
                          or die('Ada kesalahan pada query :'.mysqli_error($koneksi));
                          $data =  mysqli_fetch_assoc($query);
                        }?>
                        <form class="form-material mt-4" method="POST" action="page/kriteria/proses.php?act=update">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Kriteria </label>
                                        <input type="text" hidden="hidden" name="id" value="<?php echo $data['id_kriteria']; ?>"> 
                                        <input type="text" class="form-control form-control-line" name="kriteria" 
                                        value="<?php echo $data['kriteria']; ?>" required> 
                                    </div>
                                   
                                    <div class="form-group col-md-2">
                                        <label>Tipe</label>
                                        <select class="form-control custom-select" name="tipe" required>
                                            <option selected value="<?php echo $data['tipe']; ?>" required="required"><?php echo $data['tipe']; ?></option>
                                            <option value="Benefit">Benefit</option>
                                            <option value="Cost">Cost</option>    
                                           
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Bobot Kepentingan</label>
                                        <input type="number" class="form-control" name="bobot" placeholder="Nilai 1-100" min="1" max="100" value="<?php echo $data['bobot']; ?>" required> 
                                    </div>
                                    
                                    <hr>
                                    <div class="card-body">
                                    <div class="form-group mb-0 text-right">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-check"></i> Perbarui</button>
                                        <button type="button" onclick="window.location.href='?page=kriteria'" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-close"></i> Batal</button>
                                    </div>
                                    </div>
                                </div>
                          </form><?php
                      break;
                    }?>
            </div>  
        </div>
    </div>
</div>