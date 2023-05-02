<div class="row">
    <!-- column -->
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Alternatif (Calon)</h4>
                  <h6 class="card-subtitle">Kandidat yang akan dijadikan Karyawan</h6>                  
                    <?php 
                    switch($_GET['form']){
                      case 'baru':
                        ?>
                        <form class="form-material  mt-4" method="POST" action="page/alternatif/proses.php?aksi=insert">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>Nama </label>
                                        <input type="text" class="form-control form-control-line " name="nama" required> 
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Tempat,tgl lahir</label>
                                        <input type="text" name="ttl" class="form-control " required> 
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Agama</label>
                                        <select class="form-control custom-select" name="agama" required="required">
                                            <option selected="selected"></option>
                                            <option>Islam</option>
                                            <option>Kristen</option>    
                                            <option>Katolik</option>
                                            <option>Budha</option>  
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Pendidikan</label>
                                        <select class="form-control custom-select" name="pendidikan" required="required">
                                            <option selected="selected"></option>
                                            <option>Smk</option>
                                            <option>Diploma</option>    
                                            <option>Sastra 1</option>
                                            <option>Sastra 2</option>  
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>jenis Kelamin</label>
                                        <select class="form-control custom-select" name="jenkel" required="required">
                                            <option selected="selected"></option>
                                            <option>Pria</option>
                                            <option>Wanita</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Status</label>
                                        <select class="form-control custom-select" name="status" required="required">
                                            <option selected="selected"></option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Belum Kawin">Belum Kawin</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-8" >
                                        <label>Alamat</label>
                                        <textarea class="form-control " rows="1" name="alamat" required></textarea>
                                    </div>
                                    
                                    <div class="card-body">
                                        <div class="form-group mb-0 text-right">
                                            <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-check" value="simpan"></i> Simpan</button>
                                            <button type="reset" class="btn btn-warning waves-effect waves-light"><i class="mdi mdi-reload"></i> Ulang</button>
                                            <button type="button" onclick="window.location.href='?page=alternatif'" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-arrow-left"></i> Kembali</button>
                                        </div>
                                    </div>
                                </div>
                        </form><?php                      
                        break;
                      case 'edit':
                        if (isset($_GET['id'])) {
                          $query = mysqli_query($koneksi, "SELECT * FROM t_alternatif WHERE id_alternatif ='$_GET[id]'") 
                          or die('Ada kesalahan pada query :'.mysqli_error($koneksi));
                          $data =  mysqli_fetch_assoc($query);
                        }?>
                        <form class="form-material mt-4" method="POST" action="page/alternatif/proses.php?aksi=update">
                          <div class="row">
                              <div class="form-group col-md-4">
                                  <label>Nama </label>
                                  <input type="text" hidden="hidden" name="id" value="<?php echo $data['id_alternatif']; ?>" > 
                                  <input type="text" class="form-control form-control-line" name="nama" value="<?php echo $data['nama']; ?>" required> 
                              </div>
                              <div class="form-group col-md-3">
                                  <label>Tempat,tgl lahir</label>
                                  <input type="text" name="ttl" class="form-control" value="<?php echo $data['tempat_tgl_lahir']; ?>" required> 
                              </div>
                              <div class="form-group col-md-2">
                                  <label>Agama</label>
                                  <select class="form-control custom-select" name="agama">
                                      <option selected="selected" value="<?php echo $data['agama']; ?>" required><?php echo $data['agama'];?></option>
                                      <option value="Islam">Islam</option>
                                      <option value="Kristen">Kristen</option>    
                                      <option value="Katolik">Katolik</option>
                                      <option value="Budha">Budha</option>  
                                  </select>
                              </div>
                              <div class="form-group col-md-2">
                                  <label>Pendidikan</label>
                                  <select class="form-control custom-select" name="pendidikan">
                                      <option selected="selected" value="<?php echo $data['pendidikan']; ?>" required><?php echo $data['pendidikan']; ?></option>
                                      <option value="Smk">Smk</option>
                                      <option value="Diploma">Diploma</option>    
                                      <option value="Sastra 1">Sastra 1</option>
                                      <option value="Sastra 2">Sastra 2</option>  
                                  </select>
                              </div>
                              <div class="form-group col-md-2">
                                  <label>jenis Kelamin</label>
                                  <select class="form-control custom-select" name="jenkel">
                                  <option selected="selected" value="<?php echo $data['jenis_kelamin']; ?>" required><?php echo $data['jenis_kelamin']; ?></option>
                                      <option value="Pria">Pria</option>
                                      <option value="Wanita">Wanita</option>
                                  </select>
                              </div>
                              <div class="form-group col-md-2">
                                  <label>Status</label>
                                  <select class="form-control custom-select" name="status">
                                      <option selected="selected" value="<?php echo $data['status']; ?>" required><?php echo $data['status']; ?></option>
                                      <option value="Kawin">Kawin</option>
                                      <option value="Belum Kawin">Belum Kawin</option>
                                  </select>
                              </div>
                              <div class="form-group col-md-8" >
                                  <label>Alamat</label>
                                  <textarea class="form-control " rows="1" name="alamat" required><?php echo $data['alamat']; ?></textarea>
                              </div>
                              
                              <div class="card-body">
                                  <div class="form-group mb-0 text-right">
                                      <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="mdi mdi-check"></i> Perbarui</button>
                                          
                                          <button type="button" onclick="window.location.href='?page=alternatif'" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-close"></i> Batal</button>
                                  </div>
                              </div>
                          </div>
                        </form>
                      <?php
                      break;
                    }?>                    
            </div>
        </div>
    </div>
</div>