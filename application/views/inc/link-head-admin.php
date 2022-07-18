<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="description" content="QR Code Scanner Invitation for Event - Develop by Hasan">
  <meta name="author" content="@yallabob">

  <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome/css/all.css') ?>">
  <!--<script src="<?php echo base_url('assets/fontawesome/js/all.js') ?>"></script>-->

  <!-- Required meta tags always come first -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?php echo $judul ?></title>
  <link rel="stylesheet" id='compiled.css-css' media="all" href="<?php echo base_url('assets/node_modules/_core/css/bootstrap.min.css') ?>">

<!-- 
  mystyle
  <link rel="stylesheet" href="<?php echo base_url('assets/admin/myStyle.css') ?>">
  <link rel='stylesheet' href='<?php echo base_url('assets/node_modules/fullcalendar/dist/fullcalendar.css'); ?>' />
  <link rel='stylesheet' href='<?php echo base_url('assets/jquery-ui/jquery-ui.css'); ?>' />

<link rel="stylesheet" href="<?php echo base_url('assets/pickadate/lib/themes/classic.date.css') ?>">

<link rel="stylesheet" href="<?php echo base_url('assets/node_modules/lightbox2/dist/css/lightbox.css') ?>"> -->

<?php 
		if (empty($_GET['code'])) {
		
		?>
		  <script src="<?php echo base_url('assets/node_modules/sweetalert2/dist/sweetalert2.all.js') ?>"></script>
		
		<?php
		}

 ?>







<!--  <div id="mdb-preloader" class="flex-center">-->
<!--    <div id="preloader-markup">-->
<!--Big blue-->
<!--<div class="preloader-wrapper active">-->
<!--  <div class="spinner-layer spinner-blue-only">-->
<!--    <div class="circle-clipper left">-->
<!--      <div class="circle"></div>-->
<!--    </div>-->
<!--    <div class="gap-patch">-->
<!--      <div class="circle"></div>-->
<!--    </div>-->
<!--    <div class="circle-clipper right">-->
<!--      <div class="circle"></div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<!--    </div>-->
<!--    <p class="text-white"> &nbsp &nbsp Loading...</p>-->
<!--<p class="text-white"> build with love : @hisyambsa</p>-->
<!--  </div>-->

  


  
  <script>

    let base_url = '<?php echo base_url();?>'

  </script>
</head>


<script>
  function redirectPesan(type='error',pesan) {
    Swal.fire({
      type: type,
      title: pesan,
      showConfirmButton: false,
      timer: 2000
    })
  }

  function confirmHapus(judul='tidak ada judul',pesan='tidak ada pesan',pindah='<?php echo base_url();?>') {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false,
    })
    swalWithBootstrapButtons.fire({
      title: judul,
      text: pesan,
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Iya',
      cancelButtonText: 'Tidak',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        window.location=pindah;
      }else if (
    // Read more about handling dismissals
    result.dismiss === Swal.DismissReason.cancel
    ) {

      }
    })
  }
</script>


<script src="<?php echo base_url('assets/node_modules/_core/js/jquery-3.3.1.min.js') ?>"></script>
<!-- Javascript -->

<!-- <script src="<?php echo base_url('assets/node_modules/_core/js/file-upload.js') ?>"></script>  
<script src="<?php echo base_url('assets/node_modules/jquery-validation/dist/jquery.validate.min.js') ?>"></script>
<script src="<?php echo base_url('assets/node_modules/jquery-validation/dist/localization/messages_id.js') ?>"></script>
<script src="<?php echo base_url('assets/node_modules/chart.js/dist/Chart.bundle.js') ?>"></script>

<script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js') ?>"></script>
<script src='<?php echo base_url('assets/node_modules/fullcalendar/dist/moment.min.js'); ?>'></script>
<script src='<?php echo base_url('assets/node_modules/fullcalendar/dist/fullcalendar.js'); ?>'></script>

<script src="<?php echo base_url('assets/pickadate/lib/picker.js') ?>"></script>
<script src="<?php echo base_url('assets/pickadate/lib/picker.date.js') ?>"></script>


<script src="<?php echo base_url('assets/node_modules/lightbox2/dist/js/lightbox.js') ?>" ></script> -->




<!--   <script>

    $(".ambilTanggal").datepicker({
          // showAnim: "fold",
          dateFormat: "yy-mm-dd", 
          monthNames: [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ],

        });
      </script>

      <script>

// Indonesian datepicker

jQuery.extend( jQuery.fn.pickadate.defaults, {
  monthsFull: [ 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember' ],
  monthsShort: [ 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des' ],
  weekdaysFull: [ 'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu' ],
  weekdaysShort: [ 'Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab' ],
  firstDay: 1,
  format: 'd mmmm yyyy',
  formatSubmit: 'yyyy-mm-dd',
  hiddenName: true
});


$('.datepicker').pickadate({
  selectMonths: 12,
  selectYears: 100,
  formatSubmit: 'yyyy-mm-dd',  max: true
});
$('.datepickerNow').pickadate({
  selectMonths: true,
  selectYears: true,
  formatSubmit: 'yyyy-mm-dd',
  max: true,

});
$('.datepickerNow').pickadate('set').set('select', new Date());
$('.datepickerBooking').pickadate({
  selectMonths: true,
  selectYears: true,
  formatSubmit: 'yyyy-mm-dd',
  min:true,
});

</script> -->


 




