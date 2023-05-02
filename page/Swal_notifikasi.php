<?php
if (isset($_GET['alert'])) {
	$alert = $_GET['alert'];

		switch ($alert) {
		case '1':
			echo "<script language='javascript'>swal('Disimpan...', 'Data Berhasil di input!', 'success');</script>" ;
			break;
		case '2':
			echo "<script language='javascript'>swal('Diubah...', 'Data Berhasil di ubah!', 'success');</script>";
			break;
		case '3':
			echo "<script language='javascript'>swal('Dihapus...', 'Data Berhasil di hapus!', 'success');</script>";
			break;
		case '4':
			echo "<script language='javascript'>swal('Gagal...', 'Maaf ada yang salah!', 'error');</script>";
			break;	
		default:			
			break;
	}
}?>
<script type="text/javascript">
	jQuery(document).ready(function($){
            $('.konfirm').on("click", function(e){
					e.preventDefault();
			    	var getLink = $(this).attr('url');
			      	console.log(getLink);
			        swal({
					  title: "Yakin Mau Dihapus ?",
					  text: "Setelah dihapus, Anda tidak akan dapat memulihkan!",
					  icon: "warning",
					  buttons: true,
					  dangerMode: true,					  
					}).then((willDelete) => {
					 	if (willDelete) {
							window.location.href = getLink;
							//swal('Dihapus','Data berhasil dihapus','success');
						} 
					});
        });
    });
</script>

