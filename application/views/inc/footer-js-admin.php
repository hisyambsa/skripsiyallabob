<script>
 

  var timeout = setInterval(sApi, 5000); 


  $('#button_masuk').click(function() {

    $('#background').addClass('backgroundLoading full-height');
    $('#loading').addClass('loader');


    let id_data_peserta = $('#id_data_peserta').val();

    var code = "<?php echo $_GET['code'] ?>"
    $.ajax({
      url: '<?php echo base_url("ajax/update_status")?>',
      type: 'post',
      dataType: "json",

      data: {
        'code' : code,
        'id_data_peserta': id_data_peserta

      },
      success:function(loader){
        setTimeout(function () {
          $('#id_status').html('Peserta sudah masuk <br>N.B : klik tombol untuk mengubah <br><button id="button_keluar" class="btn btn-danger disabled">KELUAR</button>')

          $('#loading').removeClass('loader');
          $('#background').removeClass('backgroundLoading');
        }, 500);
      },error: function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR.status);
      }
    });
  });

  $('#button_keluar').click(function() {

    $('#background').addClass('backgroundLoading full-height');
    $('#loading').addClass('loader');


    let id_data_peserta = $('#id_data_peserta').val();

    var code = "<?php echo $_GET['code'] ?>"
    $.ajax({
      url: '<?php echo base_url("ajax/update_status")?>',
      type: 'post',
      dataType: "json",

      data: {
        'code' : code,
        'id_data_peserta': id_data_peserta

      },
      success:function(loader){
        setTimeout(function () {
          $('#id_status').html('Peserta sudah masuk <br>N.B : klik tombol untuk mengubah <br><button id="button_masuk" class="btn btn-warning disabled">MASUK</button>')

          $('#loading').removeClass('loader');
          $('#background').removeClass('backgroundLoading');
        }, 500);
      },error: function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR.status);
      }
    });
  });





  $('#update_data').click(function() {
    let id_data_peserta = $('#id_data_peserta').val();
    let id_nomor_hp = $('#id_nomor_hp').val();


    if ($('#id_nomor_hp').val()=='') {
      var myForm = false;
    }else{
      var myForm = true;
    }
    if(myForm) {

    // Adding loading GIF
    $('#background').addClass('backgroundLoading full-height');
    $('#loading').addClass('loader');

    // myForm.submit();
    var code = "<?php echo $_GET['code'] ?>";
    // var cekin = urlweb.concat(code);

    // Ajax Request
    $.ajax({
      cache:false,
      type: "post",
      data : 
      {
        'code' : code, // the variable you're posting.
        'id_data_peserta' : id_data_peserta,
        'id_nomor_hp' : id_nomor_hp,
      },        
      dataType: "json",
      url: '<?php echo base_url("ajax/update_data")?>',
      success: function (loader) {

            // This replace the retrieved data to the div after the setTimeOut function
            setTimeout(function () {
              $('#div_nomor_hp').text('HP : '+loader.id_nomor_hp)

              $('#loading').removeClass('loader');
              $('#background').removeClass('backgroundLoading');
            }, 500);
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.status);
          }
        });
  }    
});
  function sApi() {
    $('.text-me').addClass('blue-gradient');

    $.ajax({
      url: '<?php echo base_url("ajax/total")?>',
      type: 'post',
  // data: {id: ''},

  success:function(data){
    $('#totalPeserta').text(data);
  },error: function() {
    // alert('Gagal Melakukan Ajax total peserta');
  }
});

    $.ajax({
      url: '<?php echo base_url("ajax/checkin")?>',
      type: 'post',
  // data: {id: ''},

  success:function(data){
    $('#pesertaCheckin').text(data);
  },error: function() {
    // alert('Gagal Melakukan Ajax checkin');
  }
});


    $.ajax({
      url: '<?php echo base_url("ajax/data_masuk")?>',
      type: 'post',
  // data: {id: ''},

  success:function(data){
    $('#pesertaDiDalam').text(data);
  },error: function() {
    // alert('Gagal Melakukan Ajax peserta didalam');
  }
});
    $.ajax({
      url: '<?php echo base_url("ajax/data_keluar")?>',
      type: 'post',
  // data: {id: ''},

  success:function(data){
    $('#pesertaDiLuar').text(data);
  },error: function() {
    // alert('Gagal Melakukan Ajax peserta diluar');
  }
});

  }


</script>
</div>
<div id="insight">
  <h6 class="text-center">
    TOTAL Peserta : <span id="totalPeserta"></span><br>
    Check IN : <span id="pesertaCheckin"></span> | di Dalam : <span id="pesertaDiDalam"></span> | di Luar : <span id="pesertaDiLuar"></span>  
  </h6>
</div>

<div class=" pt-3">

  <a href=https://itunes.apple.com/id/app/qr-reader-for-iphone/id368494609?mt=8>  <img class="img-responsive" height="40" src="<?php echo base_url() ?>img/iphone.jpg"/> </a>
  
  <a href=https://play.google.com/store/apps/details?id=tw.mobileapp.qrcode.banner&hl=in&gl=US>   <img height="40" class="img-responsive" src="<?php echo base_url() ?>img/android.png" /> </a>

  <p class="text-white text-me mt-2"><?php echo 'Dev By @yallabob' ?></p>
</div>



</div>
<!-- ./ container -->
</div> 
<style>

  .backgroundLoading{
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-color: red;
    position: absolute;
    z-index: 88;
    opacity: 0.7;
  }

  .loader { 
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 7rem;
    height: 7rem;
    animation: spin 2s linear infinite;
    z-index: 9999;

    position: absolute;
    color: White;
    left: 45%;
    top: 45%;
  }

</style>
<div id="background" class="">

  <div id="loading" class="text-center"></div>
</div>



</body>
</html>