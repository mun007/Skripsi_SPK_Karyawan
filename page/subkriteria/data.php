<div class="col-md-10 table-responsive">
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th class="border-top-0">#</th>
                <th class="border-top-0">SubKriteria</th>
                <th class="border-top-0">Nilai</th>
                <th class="border-top-0"><i class="fas fas fa-link"></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no=1;
                include '../../config.php';
                $id = $_GET['id_kriteria'];
                $query = mysqli_query($koneksi, "SELECT * FROM t_subkriteria WHERE id_kriteria='$id'");
                if (mysqli_num_rows($query) > 0 ) {
                    while ($data = mysqli_fetch_array($query)) { ?>
                       <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data['subkriteria']; ?></td>
                            <td><?php echo $data['nilai']; ?></td>
                            <td>
                                <a type="button" class="btn btn-sm btn-info edit_data" data-id="<?php echo $data['id_subkriteria']?>" data-sub="<?php echo $data['subkriteria']?>" data-nilai="<?php echo $data['nilai']?>"><i class="mdi mdi-lead-pencil"></i> Edit</a>
                                <a type="button" data-id="<?php echo $data['id_subkriteria'];?>" class="btn btn-sm btn-danger hapus_data"><i class="mdi mdi-delete-empty"></i> Hapus</a>
                            </td>
                       </tr> <?php $no++;
                    }
                }else{ ?>
                    <td colspan="4" align="center">BELUM ADA DATA</td><?php
                }
            ?>
        </tbody>
    </table>
</div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.edit_data').on('click',function(){
                document.getElementById("form").reset();
                $id_sub = $(this).attr('data-id');
                $subkriteria = $(this).attr('data-sub');
                $nilai = $(this).attr('data-nilai');

                $('#id_sub').val($id_sub);
                $('#subkriteria').val($subkriteria);
                $('#nilai').val($nilai);
            });

            $('.hapus_data').on('click',function(){
                var id = $(this).attr('data-id');
                 swal({
                      title: "Yakin Mau Dihapus ?",
                      text: "Setelah dihapus, Anda tidak akan dapat memulihkan!",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,                   
                    }).then((willDelete) => {
                        if (willDelete) {
                            console.log(id);
                           $.ajax({
                                type: 'POST',
                                url: 'page/subkriteria/proses.php',
                                data: { id_hapus: id},
                                success:function(){
                                    loadData();
                                }
                            });
                           //window.location.href = url
                           swal('Dihapus','Data berhasil dihapus','success')
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