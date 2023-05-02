<div class="row">
    <!-- column -->
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Subkriteria </h4>
                <div class="row">
                    <div class="col-md-8">
                        <h6 class="card-subtitle">Subkriteria adalah level nilai yang digunakan dalam penilaian</h6>
                        <table>
                        <?php 
                            $id_kriteria = $_GET['id'];
                            $query = mysqli_query($koneksi,"SELECT*FROM t_kriteria WHERE id_kriteria=$id_kriteria"); 
                            $row = mysqli_fetch_assoc($query) ?>
                            <tr style="font-weight: bold;"><td width="75">Kriteria </td><td>: <?php echo $row['kriteria'];?></td></tr>
                            <tr><td width="75">Bobot </td><td>: <?php echo $row['bobot'].'%';?></td></tr>
                            <tr><td width="75">Tipe </td><td>: <?php echo $row['tipe'];?></td></tr>
                        </table>
                        <form class="form-material mt-2" id="form" method="POST" action="page/subkriteria/proses.php">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <input type="text" name="id" id="id_sub" hidden>
                                    <input type="text" class="form-control" name="subkriteria" id="subkriteria" placeholder="Nama Sub" required>
                                    <input type="text" name="id_kriteria" id="id_kriteria" value="<?php echo $id_kriteria;?>" hidden>
                                </div>
                                <div class="form-group col-md-3">
                                     <input type="number" class="form-control" id="nilai" name="nilai" placeholder="Nilai 1-100" min="1" max="100" required> 
                                </div>
                                <div class="form-group">
                                    <button type="button" id="simpan" class="btn btn-sm btn-primary" value="baru"><i class="mdi mdi-check"></i> Simpan</button>
                                    <button type="reset" class="btn btn-sm btn-warning"><i class="mdi mdi-close"></i> Batal</button>
                                    <a type="button" href="?page=kriteria" class="btn btn-sm btn-danger"><i class="mdi mdi-arrow-left"></i> Kembali</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
               <div id="data"></div>
                
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        loadData();

        $('#simpan').click(function(){
            $data = $('#form').serialize();
            $url = $('#form').attr('action');

            $.ajax({
                type : 'POST',
                url : $url,
                data : $data,
                
                success: function() {
                    loadData();
                    document.getElementById("form").reset();
                    swal(
                        'Disimpan',
                        'Data berhasil disimpan',
                        'success'
                        )
                }, error: function(response){
                        console.log(response.responseText);
                }
            });
        });
        
        function loadData(){
            var id = document.getElementById('id_kriteria').value;
            $.ajax({
                url : 'page/subkriteria/data.php',
                type : 'get',
                data : {
                    id_kriteria: id
                },
                success : function(data){
                    $('#data').html(data);
                }
            });
        }
       
    });
    
</script>