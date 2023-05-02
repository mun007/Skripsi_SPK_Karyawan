<div class="row">

    <!-- column -->
    <div class="col-sm-12">        
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Alternatif (Calon)</h4>
                  <h6 class="card-subtitle">Kandidat yang akan dijadikan Karyawan</h6>
                     <?php include "page/notifikasi.php";?>
                <div class="row">
                    <div class="col-md-10"></div>
                    <div class="col-md-2 text-right">
                         <button type="button" class="btn btn-sm btn-primary" onclick="window.location.href='?page=alternatif&form=baru'"><i class="fas fa-plus-circle"></i> Tambah</button>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-hover table-sm ">
                        <thead class="">
                            <tr>
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Nama</th>
                                <th class="border-top-0">Tgl Lahir</th>
                                <th class="border-top-0">Jenis Kelamin</th>
                                <th class="border-top-0">Pendidikan</th>
                                <th class="border-top-0">Status</th>
                                <th class="border-top-0">Agama</th>
                                <th class="border-top-0">Alamat</th>
                                <th class="border-top-0"><i class="fas fas fa-link"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                           
                             //$no = 1;
                                $query = mysqli_query($koneksi, "SELECT * FROM t_alternatif")
                                or die('Ada kesalahan pada query : '.mysqli_error($koneksi));
                                while ($data = mysqli_fetch_assoc($query)) {                   
                            ?>
                            <tr>
                                <td><?php echo $data['id_alternatif']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td><?php echo $data['tempat_tgl_lahir']; ?></td>
                                <td><?php echo $data['jenis_kelamin']; ?></td>
                                <td><?php echo $data['pendidikan']; ?></td>
                                <td><?php echo $data['status']; ?></td>
                                <td><?php echo $data['agama']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td>
                                    <a type="button"  class="btn btn-sm btn-info "
                                    href="?page=alternatif&form=edit&id=<?php echo $data['id_alternatif']; ?>">
                                    <i class="mdi mdi-lead-pencil"></i> Ubah</a>
                                    <a type="button" href="page/alternatif/proses.php?aksi=delete&id=<?php echo $data["id_alternatif"];?>" class="btn btn-sm btn-danger konfirm">
                                    <i class="mdi mdi-delete-empty"></i> Hapus</a>
                                      
                                </td>
                               
                            </tr>
                              <?php } ?>   
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
