<style>
  body, html {
    height: 100%;
  }
  .bg {
    /* The image used */
    /*  background-image: url("<?php echo base_url('img/pra.jpg') ?>");*/
    background-color: rgba(76, 175, 80, 0.7) ;
    /* Full height */
    height: 100%;
  }
</style>


<body class="bg light-blue-skin text-white text-center pt-4" onload="sApi()">
<?php if ($data_no_registrasi): ?>
  <input class='form-control' type='hidden' name='id_data_peserta' id="id_data_peserta" value="<?php echo $id_data_peserta ?>">
  <div class="container">
    <div class="row">
      <div class="col-sm-4">

      </div>
      <div class="col-sm-4">
          <h5><?php echo $no_registrasi ?></h5>
        <h5><?php echo $nama_lengkap_fam ?></h5>
        <h5><?php echo $dpc_dpw ?></h5>
        <h6>CEK IN :
         <?php $insert_time = date_create($insert_time  ) ?>
         <?php echo date_format($insert_time, 'j F Y H:i:s'); ?>
       </h6>
       <?php if (!empty($nomor_hp)): ?>
         <p>HP : <?php echo $nomor_hp ?></p>
         <?php else: ?>
          <div class="" id="div_nomor_hp">
            <!-- <form id="myForm"> -->
              <div class='form-group h6'>
                <input class='form-control' id='id_nomor_hp' maxlength="16" placeholder="Masukan Nomor HP" type='number' name='nomor_hp'> <button id="update_data" class="btn btn-sm btn-default btn-rounded"> Update</button>
              </div>
              <!-- </form> -->
            </div>
          <?php endif ?>


          <h6>UPDATE SCAN :
            <?php 
            if(strtotime($update_time) > 0){
              $update_time = date_create($update_time); 
              ?>
              <?php echo date_format($update_time, 'j F Y H:i:s'); ?>
              <?php
            }else{
              ?>
              <?php echo "- "?>
              <?php
            }
            ?>
          </h6>
          <p class='alert alert-danger'>
            <?php if ($status !=0): ?>
              <span id="id_status">
                <?php if ($status == 1): ?>
                  Peserta sudah masuk <br>
                  N.B : klik tombol untuk mengubah <br>
                  <button id="button_keluar" class="button_status btn btn-danger">KELUAR</button>
                <?php endif ?>
                <?php if ($status == 2): ?>
                  Peserta keluar <br>
                  N.B : klik tombol untuk mengubah <br>
                  <button id="button_masuk" class="button_status btn btn-warning">MASUK</button>
                <?php endif ?>

              </span>
              <?php else: ?>
                PESERTA BERHASIL CHECK IN
              <?php endif ?>
            </p>
            <?php else: ?>
              <h1>ANDA TIDAK TERDAFTAR</h1>
<?php endif ?>


          </div>
          <div class="col-sm-4">

          </div>




