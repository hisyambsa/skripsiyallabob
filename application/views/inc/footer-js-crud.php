<div class="text-center">
    <script>
        sApi();
        var timeout = setInterval(sApi, 5000);

        function sApi() {
            $('.text-me').addClass('blue-gradient');

            $.ajax({
                url: '<?php echo base_url("ajax/total") ?>',
                type: 'post',
                // data: {id: ''},

                success: function(data) {
                    $('#totalPeserta').text(data);
                },
                error: function() {
                    // alert('Gagal Melakukan Ajax total peserta');
                }
            });

            $.ajax({
                url: '<?php echo base_url("ajax/checkin") ?>',
                type: 'post',
                // data: {id: ''},

                success: function(data) {
                    $('#pesertaCheckin').text(data);
                },
                error: function() {
                    // alert('Gagal Melakukan Ajax checkin');
                }
            });


            $.ajax({
                url: '<?php echo base_url("ajax/data_masuk") ?>',
                type: 'post',
                // data: {id: ''},

                success: function(data) {
                    $('#pesertaDiDalam').text(data);
                },
                error: function() {
                    // alert('Gagal Melakukan Ajax peserta didalam');
                }
            });
            $.ajax({
                url: '<?php echo base_url("ajax/data_keluar") ?>',
                type: 'post',
                // data: {id: ''},

                success: function(data) {
                    $('#pesertaDiLuar').text(data);
                },
                error: function() {
                    // alert('Gagal Melakukan Ajax peserta diluar');
                }
            });

        }
    </script>
    <div id="insight">
        <h6 class="text-center">
            TOTAL Peserta : <span id="totalPeserta"></span><br>
            Check IN : <span id="pesertaCheckin"></span> | di Dalam : <span id="pesertaDiDalam"></span> | di Luar : <span id="pesertaDiLuar"></span>
        </h6>
    </div>

    <div class=" pt-3">
        <div class="">
            <a href=https://itunes.apple.com/id/app/qr-reader-for-iphone/id368494609?mt=8> <img class="img-responsive" height="40" src="<?php echo base_url() ?>img/iphone.jpg" /> </a>
            <a href=https://play.google.com/store/apps/details?id=tw.mobileapp.qrcode.banner&hl=in&gl=US> <img height="40" class="img-responsive" src="<?php echo base_url() ?>img/android.png" /> </a>
        </div>
    </div>
    <div class="py-2">
        <button class="btn btn-success" id="idReset">RESET STATUS</button>
    </div>

    <p class="text-black text-me mt-2"><?php echo 'Dev By @yallabob' ?></p>
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
                    url: '<?php echo base_url("ajax/reset_status") ?>',
                    type: 'post',

                    success: function(data) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'STATUS BERHASIL DI RESET<br>Please Wait!',
                            showConfirmButton: false,
                            timer: 2800
                        })

                        setTimeout(() => {
                            window.location.reload();
                        }, 3000);
                    },
                    error: function() {
                        console.log('error');
                    }
                });


            }
        });
    });
</script>