<div class="row">

    <!-- column -->
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-body">
               <h4 class="card-title">Penentuan</h4>
                <h6 class="card-subtitle">Proses pemilihan kandidat dengan perhitungan <code>.SAW</code></h6>
                <button id="btnProcess"type="button" class="btn btn-sm btn-danger waves-effect waves-light"><i class="mdi mdi-loop"></i> Proses</button>
                <button id="btnShow"type="button" class="btn btn-sm btn-primary waves-effect waves-light"><i class="fas fa-history"></i> Show</button>
            </div>
           
            <div class="card-body" >
                <div id="loading" style="display: none;">Mohon tunggu sedang memproses data..</div>
                <div id="lokasi-tampil"></div>
            </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#btnProcess").click(function(){
             $("#loading").fadeIn();
             setTimeout(function() {
                 $.ajax({
                    url:'page/penentuan/proses_saw.php',
                    type:'get',
                    success: function(data){
                        $('#lokasi-tampil').html(data);
                        $("#loading").fadeOut();
                    }
               });
             }, 400);      
        });
        $('#btnShow').click(function(){
             $("#loading").fadeIn();
            setTimeout(function() {
               $.ajax({
                    url:'page/penentuan/show_result.php',
                    type:'get',                    
                    success:function(data){
                        $('#lokasi-tampil').html(data);
                        $("#loading").fadeOut();
                    }                
                }); 
            }, 300);            
        });
    
    });
</script>