<div class="row">

    <!-- column -->
    <div class="col-md-10">
        
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Kriteria</h4>
                <h6 class="card-subtitle">Penentuan kriteria dan nilai bobot kepentingan (%) <p>beserta tipe kriteria apakah menguntungkan "Benefit" atau berharga "Cost"</h6>
                <?php include "page/notifikasi.php";?>
               <div class="row">
                    <div class="col-md-8"> </div>
                    <div class="col-md-2 text-right">
                         <button type="button" class="btn btn-sm btn-primary waves-effect waves-light" onclick="window.location.href='?page=kriteria&form=baru'"><i class="fas fa-plus-circle"></i> Tambah</button>
                    </div>
                </div>
                
                <div class="col-md-10 table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>                               
                                <th class="border-top-0">#</th>
                                <th class="border-top-0">Kriteria</th>
                                <th class="border-top-0">Tipe</th>
                                <th class="border-top-0">Bobot</th>
                                <th class="border-top-0"><i class="fas fas fa-link"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                           
                             //$no = 1;
                                $query_1 = mysqli_query($koneksi, "SELECT * FROM t_kriteria")
                                or die('Ada kesalahan pada query : '.mysqli_error($koneksi));
                                if (mysqli_num_rows($query_1) > 0) {
                                    while ($data = mysqli_fetch_assoc($query_1)) { ?>
                            <tr>
                                <td><?php echo $data['id_kriteria']; ?></td>
                                <td><?php echo $data['kriteria']; ?></td>
                                <td><?php echo $data['tipe']; ?></td>
                                <td><?php echo $data['bobot']; ?> %</td>
                                <td>
                                    <a type="button"  class="btn btn-sm btn-info waves-effect waves-light"
                                    href="?page=kriteria&form=edit&id=<?php echo $data['id_kriteria']; ?>">
                                    <i class="mdi mdi-lead-pencil"></i> Ubah</a>
                                    <a type="button" url="page/kriteria/proses.php?act=delete&id=<?php echo $data["id_kriteria"];?>" class="btn btn-sm btn-danger waves-effect waves-light "><i class="mdi mdi-delete-empty"></i> Hapus</a>
                                    <a type="button"  class="btn btn-sm btn-secondary" href="?page=subkriteria&id=<?php echo $data['id_kriteria'];?>">
                                    <i class="mdi mdi-arrow-right"></i> Subkriteria</a>
                                </td>
                            </tr><?php } 
                                }else { ?>
                                <td colspan="4" align="center">Belum Ada Data </td>
                            <?php  }   ?>                           
                        </tbody>
                        <tfoot>
                            <tr>
                            <th colspan="3" style="text-align:right">Total Bobot :</th>
                            <td>
                                <?php 
                                    $query_2 = mysqli_query($koneksi, "SELECT SUM(bobot) as total_bobot FROM t_kriteria");
                                    $result = mysqli_fetch_assoc($query_2);
                                    echo $result['total_bobot'].' %';
                                ?>
                            </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>