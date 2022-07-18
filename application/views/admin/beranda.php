  <div class="container">

    <?php 
/*
<!-- .................................. -->
<!-- ...........COPYRIGHT ............. -->
<!-- Authors : Hasan .................. -->
<!-- Email : attoz.151@gmail.com....... -->
<!-- .................................. -->
*/
?>
<?php if ($this->session->userdata('pesan')<>''): ?>
  <?php $pesan = $this->session->userdata('pesan'); ?>
  <script>
    alert('<?php echo $pesan ?>');
  </script>   
<?php endif ?>
<div class="row pt-4">
  <div class="col-md-1 text-center mt-2">

  </div>
  <div class="col-md-3 text-center mt-2">
    <br>
    <br>
  </div>
  <div class="col-md-4 text-center">
    <h2 style="margin-top:0px">Data Peserta</h2>

  </div>
  <div class="col-md-4 text-right">

  </div>
</div>
<div class="table-responsive">
  <table class="table table-hover text-nowrap table-sm text-center" style="margin-bottom: 10px">
    <tr>
      <th class="th-sm">No</th>
      <th class="th-sm">Nama Lengkap Fam</th>
      <th class="th-sm">Status</th>
      <th class="th-sm">Dpc Dpw</th>

      </tr><?php
      foreach ($hrvc_data_peserta_data as $hrvc_data_peserta)
      {
        ?>
        <tr>
          <td width="80px"><?php echo ++$start ?></td>
          <td><?php echo $hrvc_data_peserta->nama_lengkap_fam ?></td>
          <td>
            <?php 
            if ($hrvc_data_peserta->status == 0 ) {
              echo "-";
            }elseif ($hrvc_data_peserta->status == 1 ) {
              $date=date_create($hrvc_data_peserta->insert_time);
              echo "IN-".date_format($date,"H:i:s");
            }elseif ($hrvc_data_peserta->status == 2 ) {
              $date=date_create($hrvc_data_peserta->insert_time);
              echo "OUT-".date_format($date,"H:i:s");
            }
            ?>
          </td>
          <td><?php echo $hrvc_data_peserta->dpc_dpw ?></td>

        </tr>
        <?php
      }
      if ($start==0) {
        ?>
        <script>
          alert('Data tidak ditemukan');
        </script>   
      <?php } ?>
    </table>
  </div>
  <div class="row mt-2">
    <div class="col-md-4">
      <a href="#" class="btn btn-elegant btn-sm disabled ">Jumlah Data Data_peserta : <?php echo $total_rows ?></a>
	  <a class="nav-link" href="<?php echo base_url()?>register/form">Registrasi <span class="sr-only">(current)</span></a>
	  <a class="nav-link" href="<?php echo base_url()?>Login/logout"> Logout <span class="sr-only">(current)</span></a>
    </div>
    <div class="col-md-8 text-right">
      <?php echo $pagination ?>
    </div>
  </div>
</div>
<link rel="stylesheet" id='compiled.css-css' media="all" href="<?php echo base_url('assets/node_modules/_core/css/core.min.css') ?>">


<script src="<?php echo base_url('assets/node_modules/sweetalert2/dist/sweetalert2.all.js') ?>"></script>
<script src="<?php echo base_url('assets/node_modules/_core/js/core.min.js') ?>"></script>



<div class="text-center">

  <div id="background" class="backgroundLoading">

    <div id="loading" class="loaderJpg">
      <a href="#" id="idReset">
        <img src="img/PRA.jpg" alt="loader">
      </a>
    </div>
  </div>

</div>

<script>
  $('#idReset').click(function() {

    Swal.fire({
      title: 'Reset Status Data?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Reset',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {

        $.ajax({
          url: '<?php echo base_url("ajax/reset_status")?>',
          type: 'post',

          success:function(data){
            Swal.fire(
              'RESET!',
              'STATUS BERHASIL DI RESET',
              'success'
              );
          },error: function() {
            console.log('error');
          }
        });


      }
    });






  });
</script>