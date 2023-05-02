<hr class="mt-0">
    <div class="card">
        <div class="card-header bg-primary">
            <h5 class="mb-0 text-white">Kandidat Terpilih Jadi Karyawan</h5>
        </div>
        <form class="form-horizontal">
            <div class="form-body">
                <div class="card-body">
                    <h4 class="card-title">Data Diri</h4>
                </div>
                <hr class="mt-0 ">
                <div class="card-body">
                    <?php
                        include "config.php";
                        $cari_max_poin = mysqli_query($koneksi,"SELECT max(nilai_akhir)AS nilai_akhir FROM t_perangkingan");
                        $fetch = mysqli_fetch_assoc($cari_max_poin);
                        $poin_tertinggi = $fetch['nilai_akhir'];
                        $pilih_kandidat = mysqli_query($koneksi,"SELECT t_perangkingan.id_alternatif,t_alternatif.nama,t_alternatif.tempat_tgl_lahir,t_alternatif.jenis_kelamin,t_alternatif.pendidikan,t_alternatif.status,t_alternatif.alamat FROM `t_perangkingan` JOIN t_alternatif ON t_perangkingan.id_alternatif=t_alternatif.id_alternatif WHERE t_perangkingan.nilai_akhir='$poin_tertinggi'");
                        $row = mysqli_fetch_assoc($pilih_kandidat);
                        $id = $row['id_alternatif'];                
                    ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Nama :</label>
                                <div class="">
                                    <p class="form-control-static"><?php echo $row['nama'];?> </p>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Pendidikan :</label>
                                <div class="">
                                    <p class="form-control-static"><?php echo $row['pendidikan'];?> </p>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Kelamin :</label>
                                <p class="form-control-static"> <?php echo $row['jenis_kelamin'];?>  </p>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Status :</label>
                                <p class="form-control-static"><?php echo $row['status'];?> </p>
                            </div>
                        </div>
                        <!--/span-->
                    </div>

                    <!--/row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Tgl Lahir :</label>
                                <p class="form-control-static"><?php echo $row['tempat_tgl_lahir'];?></p>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="control-label text-right col-md-3">Alamat:</label>
                                <p class="form-control-static"><?php echo $row['alamat'];?>  </p>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->
                    <h4 class="card-title">Penilaian</h4>
                </div>
                <hr class="mt-0">
                <div class="card-body">
                    <div class="row">
                    <?php 
                        $cari_nilai = mysqli_query($koneksi,"SELECT v_penilaian.id_alternatif,t_kriteria.kriteria,v_penilaian.nilai FROM `v_penilaian` JOIN t_kriteria ON v_penilaian.id_kriteria=t_kriteria.id_kriteria WHERE v_penilaian.id_alternatif='$id'");
                        while ($row = mysqli_fetch_assoc($cari_nilai)) {?>                        
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3"><?php echo $row['kriteria'];?> :</label>
                                    <div class="col-md-3">
                                        <p class="form-control-static"> <?php echo $row['nilai'];?> </p>
                                    </div>
                                </div>
                            </div>
                     <?php } ?>
                    </div>
                </div>
                <hr>
                <div class="form-actions">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-danger"> <i class="fa fa-pencil"></i> Print</button>
                                        <button type="button" class="btn btn-dark">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
