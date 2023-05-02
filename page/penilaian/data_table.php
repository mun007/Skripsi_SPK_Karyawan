<div class="row">
    <div class="col-md-10">                               
       <div class="card">
            <div class="card-body">
            	<div class="row">
            		<div class="col-md-7">     
                    <h4 class="card-title">Penilaian</h4>
                        <h6 class="card-subtitle">Penilaian calon berdasarkan kriteria masing-masing </h6>     		    
                	</div>
                    <?php include "page/notifikasi.php";?>
                	<div class="col-md-4 text-right">
    		            <form class="mt-4">
    		                <div class="input-group">
    		                    <select class="custom-select" id="id_alternatif">
                                <option selected disabled >-- Pilih --</option>
                                <?php 
                                    $query = "SELECT t_alternatif.id_alternatif,t_alternatif.nama FROM t_alternatif 
                                    WHERE t_alternatif.id_alternatif NOT IN ( SELECT t_penilaian.id_alternatif FROM t_penilaian)";

                                    $liat_nama = mysqli_query($koneksi,$query) 
                                    or die('Ada kesalahan pada query : '.mysqli_error($koneksi));
                                    while ($row = mysqli_fetch_assoc($liat_nama)){ ?>
    		                        <option value="<?php echo $row['id_alternatif'];?>" nama="<?php echo $row['nama'];?>"><?php echo $row['nama'];?></option>
                                <?php }?>
    		                    </select>
    		                    <div class="input-group-append">
    		                        <a class="btn btn-outline-primary" id="btn_cari" type="button">Nilai <i class=""></i></a>
    		                    </div>
    		                </div>
    		              </form>
    		        </div>
               </div> 
    		    
    		     <div class="col-md-11 table-responsive">
                        <table class="table table-hover table-sm mb-0 ">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Nama</th>
                                    <th class="border-top-0">Kriteria</th>
                                    <th class="border-top-0">Nilai</th> 
                                    <th class="border-top-0">Keterangan</th>                                   
                                    <th class="border-top-0"><i class="fas fas fa-link"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $query = mysqli_query($koneksi, "SELECT * FROM v_penilaian ")or die ('Ada kesalahan pada query : '.mysqli_error($koneksi));
                                if (mysqli_num_rows($query)) {
                                    while ($data = mysqli_fetch_assoc($query)) {  
                                ?>
                                    <tr>
                                        <td><?php echo $data['id_penilaian']; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?php echo $data['kriteria']; ?></td>
                                        <td><?php echo $data['nilai'];?></td>
                                        <td><?php echo $data['subkriteria'];?></td>                           
                                        <td>
                                            <a type="button"  class="btn btn-sm btn-info" href="?page=penilaian&form=edit&id_a=<?php echo $data['id_alternatif'].'&id_k='.$data['id_kriteria'];?>">
                                                <i class="mdi mdi-lead-pencil"></i> Edit</a>
                                            <a type="button" href="page/penilaian/proses.php?act=delete&id=<?php echo $data["id_alternatif"];?>" class="btn btn-sm btn-danger konfirm">
                                            <i class="mdi mdi-delete-empty"></i> Hapus</a>                                          
                                        </td>
                                    </tr><?php 
                                    } 
                                }else { ?>
                                    <td colspan="5" align="center">Belum Ada Data</td><?php
                                }
                                ?>                               
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#btn_cari").click(function(){
		var id=$("#id_alternatif").val();
        var nama = $("#id_alternatif option:selected").attr('nama');

		if(id == null){
			alert("Pilih nama dulu !");
		}
		else{
			window.location.href = "?page=penilaian&form=baru&id="+id+"&nama="+nama;
		}
		return false;
	});
});
</script>