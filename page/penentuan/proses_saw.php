 <hr class="mt-0">
                <i class="mr-1 font-18 mdi mdi-numeric-1-box-multiple-outline"></i> Cari Nilai Min Dan Max Per ID Kriteria dari Seluruh Kandidat
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead class="bg-info text-white">
                            <tr>
                                <th width="70px">ID KRITERIA </th>
                                <?php 
                                     include "../../config.php";
                                    $i=0; //var kriteria
                                    $id_kriteria = array();
                                    $sql_kriteria = mysqli_query($koneksi,"SELECT DISTINCT(id_kriteria)FROM v_penilaian");
                                    while ($row = mysqli_fetch_assoc($sql_kriteria)) {
                                        $i+=1;
                                        $id_kriteria[$i] = $row['id_kriteria'];
                                        echo "<th style='text-align:center' width='50px'>C".$id_kriteria[$i]."</th>";
                                    }
                                ?>
                            </tr> 
                        </thead>
                        <tbody>
                            <tr>
                                <td >Nilai Min</td>
                                <?php
                               
                                    $nilai_min = array(); 
                                    
                                    for ($j=1;$j<=$i;$j++) { 
                                        $sql_min = "SELECT MIN(nilai) AS nilai FROM v_penilaian WHERE id_kriteria=".$id_kriteria[$j];
                                        $sql_min_rslt = mysqli_query($koneksi,$sql_min);
                                        $row = mysqli_fetch_assoc($sql_min_rslt);
                                        $nilai_min[$j] = $row['nilai'];
                                        echo "<td style='text-align:center'>".$nilai_min[$j]."</td>";
                                    }
                                ?>
                            </tr>
                            <tr>
                                <td>Nilai Max</td>
                                <?php
                                    $nilai_max = array();
                                    
                                    for ($j=1;$j<=$i;$j++) { 
                                        $sql_max = "SELECT MAX(nilai) AS nilai FROM v_penilaian WHERE id_kriteria=".$id_kriteria[$j];
                                        $sql_max_rslt = mysqli_query($koneksi,$sql_max);
                                        $row = mysqli_fetch_assoc($sql_max_rslt);
                                        $nilai_max[$j] = $row['nilai'];
                                        echo "<td style='text-align:center'>".$nilai_max[$j]."</td>";
                                    }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <i class="mr-1 font-18 mdi mdi-numeric-2-box-multiple-outline"></i> Tampilkan Nilai Seluruh Kandidat Per Kriteria
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead class="bg-info text-white">
                            <tr>
                                <th width="1" rowspan="2">ID </th>
                                <th rowspan="2">NAMA</th>
                                <th style="text-align:center" colspan="<?php echo $i;?>">KRITERIA</th>                              
                            </tr>
                            <tr>
                                <?php 
                                    for ($j=1;$j<=$i;$j++) { 
                                        echo "<th style='text-align:center'>C".$id_kriteria[$j]."</th>";
                                    }
                                ?>
                            </tr>
                        </thead>
                        <?php
                            $id_alternatif = array();
                            $calon = array();
                            $sql_calon = mysqli_query($koneksi,"SELECT DISTINCT (vp.id_alternatif) AS id_alternatif,ta.nama FROM v_penilaian vp JOIN t_alternatif ta ON vp.id_alternatif=ta.id_alternatif");
                            $k=0; //var nama kandidat
                            while ($result = mysqli_fetch_assoc($sql_calon)) {
                                $k++;
                                $id_alternatif[$k] = $result['id_alternatif'];
                                $calon[$k] = $result['nama'];
                            }
                        ?>
                        <tbody>
                            <?php
                                for ($m=1;$m<=$k; $m++) { 
                                    echo "<tr><td>".$id_alternatif[$m]."</td><td>".$calon[$m]."</td>";
                                    for ($n=1;$n<=$i;$n++) { 
                                        $sql_cari_nilai = "SELECT nilai FROM v_penilaian WHERE id_alternatif='$id_alternatif[$m]' AND id_kriteria='$id_kriteria[$n]'";
                                        $run_query = mysqli_query($koneksi,$sql_cari_nilai);
                                        $row = mysqli_fetch_assoc($run_query);
                                        $nilai_calon_per_kriteria[$m][$n] = $row['nilai'];
                                        echo "<td style='text-align:center'>".$nilai_calon_per_kriteria[$m][$n]."</td>"; 
                                    }
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div><!--table responsive-->
                <i class="mr-1 font-18 mdi mdi-numeric-3-box-multiple-outline"></i> Hitung Normalisasi Nilai Kandidat
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead class="bg-info text-white">
                            <tr>
                                <th width="1" rowspan="2">ID</th>
                                <th rowspan="2">NAMA</th>
                                <th width="1" style="text-align: center;" colspan="<?php echo $i;?>">NILAI NORMALISASI</th>
                            </tr>
                            <tr>
                                <?php 
                                    for ($x=1;$x<=$i;$x++) { 
                                        echo "<th style='text-align:center'>C".$id_kriteria[$x]."</th>";
                                    }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                    for ($m=1;$m<=$k;$m++) { 
                                        echo "<tr><td>".$id_alternatif[$m]."<td>".$calon[$m]."</td>";
                                        for ($n=1;$n<=$i;$n++) { 
                                            $tipe_kriteria = "SELECT tipe FROM t_kriteria WHERE id_kriteria='$id_kriteria[$n]'";
                                            $run_query = mysqli_query($koneksi,$tipe_kriteria);
                                            $row = mysqli_fetch_assoc($run_query);
                                            
                                            if ( $row['tipe'] =='Benefit') {
                                                $nilai_normalisasi[$m][$n] = $nilai_calon_per_kriteria[$m][$n]/$nilai_max[$n];
                                                $nilai_normalisasi[$m][$n] = round($nilai_normalisasi[$m][$n],3);// Fungsi pembualatan ,misal 3 angka dibelakang koma
                                                echo "<td style='text-align:center'>".$nilai_normalisasi[$m][$n]."</td>";
                                            }else {
                                                $nilai_normalisasi[$m][$n] = $nilai_min[$n]/$nilai_calon_per_kriteria[$m][$n];
                                                $nilai_normalisasi[$m][$n] = round($nilai_normalisasi[$m][$n],3);
                                                echo "<td style='text-align:center'>".$nilai_normalisasi[$m][$n]."</td>";
                                            }
                                        }
                                        echo "</tr>";
                                    }
                                ?>
                        </tbody>
                    </table>
                </div>
                <i class="mr-1 font-18 mdi mdi-numeric-4-box-multiple-outline"></i> Tampilkan Nilai Bobot Per Kriteria
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead class="bg-info text-white">
                            <tr>
                                <th width="70px">ID KRITERIA</th>
                                <?php 
                                    for ($x=1;$x<=$i;$x++) { 
                                        echo "<th style='text-align:center' width='50px'>C".$id_kriteria[$x]."</th>";
                                    }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                 <td>BOBOT</td>
                                 <?php
                                    $cari_bobot = "SELECT DISTINCT(v_penilaian.id_kriteria)AS id_kriteria,t_kriteria.bobot FROM v_penilaian JOIN t_kriteria ON v_penilaian.id_kriteria=t_kriteria.id_kriteria";
                                    $run_query = mysqli_query($koneksi,$cari_bobot);
                                    $b=0; // Var bobot
                                    while ($row = mysqli_fetch_assoc($run_query)) {
                                        $b++;
                                        $bobot_per_kriteria[$b] = $row['bobot'];
                                        echo "<td style='text-align:center'>".$bobot_per_kriteria[$b]."</td>"; 
                                    }
                                 ?>
                            </tr>
                                
                        </tbody>
                    </table>
                </div>
                <i class="mr-1 font-18 mdi mdi-numeric-5-box-multiple-outline"></i> Hitung Total Penjumlahan Antara Bobot x Nilai (Proses Perangkingan)
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead class="bg-info text-white">
                            <tr>
                                <th width="1" rowspan="2">ID</th>
                                <th rowspan="2" width="">NAMA</th>
                                <th colspan="<?php echo $i;?>" style="text-align:center">KRITERIA</th>
                                <th rowspan="2" >Total</th>
                            </tr>
                            <tr>
                                <?php 
                                    for ($x=1;$x<=$i;$x++) { 
                                        echo "<th style='text-align:center'>C".$id_kriteria[$x]."</th>";
                                    }
                                ?>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php
                                // Refresh data di table perangkingan
                                $Query = "DELETE FROM t_perangkingan";
                                
                                $sqlHapus = mysqli_multi_query($koneksi,$Query); 
                                for ($m=1;$m<=$k;$m++) { 
                                    echo "<tr><td>".$id_alternatif[$m]."</td><td>".$calon[$m]."</td>";
                                    $total[$m]=0;
                                    for ($n=1;$n<=$i;$n++) { 
                                        $cari_tipe = "SELECT tipe FROM t_kriteria WHERE id_kriteria=".$id_kriteria[$n];
                                        $run_query = mysqli_query($koneksi,$cari_tipe);
                                        $row = mysqli_fetch_assoc($run_query);
                                        if ($row['tipe'] == 'Cost') {
                                            $nilai_normalisasi[$m][$n] = $nilai_min[$n]/$nilai_calon_per_kriteria[$m][$n];
                                            $nilai_normalisasi[$m][$n] = round($nilai_normalisasi[$m][$n],3);
                                            echo "<td style='text-align:center'>(".$nilai_normalisasi[$m][$n].")*(".$bobot_per_kriteria[$n].")</td>";
                                            $total[$m] = $total[$m]+($nilai_normalisasi[$m][$n]*$bobot_per_kriteria[$n]);
                                        }elseif($row['tipe']=='Benefit'){
                                            $nilai_normalisasi[$m][$n] = $nilai_calon_per_kriteria[$m][$n]/$nilai_max[$n];
                                            $nilai_normalisasi[$m][$n] = round($nilai_normalisasi[$m][$n],3);
                                            echo "<td style='text-align:center'>(".$nilai_normalisasi[$m][$n].")*(".$bobot_per_kriteria[$n].")</td>";
                                            $total[$m] = ($nilai_normalisasi[$m][$n]*$bobot_per_kriteria[$n])+$total[$m];
                                        }
                                    }
                                    echo "<td>".round($total[$m],3)."</td></tr>";
                                    $sqlSimpan = "INSERT INTO t_perangkingan (id_rangking,id_alternatif,nilai_akhir) VALUES ('$m','$id_alternatif[$m]','$total[$m]')";
                                    mysqli_query($koneksi,$sqlSimpan)or die('Ada kesalahan pada query insert : '.mysqli_error($koneksi));
                                }
                            ?>                               
                        </tbody>
                    </table>
                </div>
                <i class="mr-1 font-18 mdi mdi-numeric-6-box-multiple-outline"></i> Perangkingan Total Nilai Tertinggi Dari Kandidat
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead class="bg-info text-white">
                            <tr>
                                <th width="50px">ID</th>
                                <th width="50px">RANGKING</th>
                                <th width="200px">KANDIDAT</th>
                                <th>TOTAL NILAI</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php
                                $sql_sort = "SELECT t_alternatif.id_alternatif,t_alternatif.nama,t_perangkingan.nilai_akhir FROM t_perangkingan JOIN t_alternatif ON t_perangkingan.id_alternatif=t_alternatif.id_alternatif ORDER BY t_perangkingan.nilai_akhir DESC";
                                $run_query = mysqli_query($koneksi,$sql_sort);
                                $no=1;
                               while ($row = mysqli_fetch_assoc($run_query)) {
                                   echo "<tr><td>".$row['id_alternatif']."</td><td style='text-align:center'>".$no."</td><td>".$row['nama']."</td><td>".$row['nilai_akhir']."</td></tr>  ";
                                   $no++;
                               }

                            ?>

                        </tbody>
                    </table>
                </div>