<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->

  <link rel="stylesheet" href="assets/bootstrap-4.3.1/dist/css/bootstrap.min.css">

</head>

<body>
  <div class="row">
    <div class="col-md-8 offset-md-2">

      <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <a> Registrasi QR Code Event </a>
        <li class="nav-item active">
          <a href="<?php echo base_url('admin') ?>"><span>kembali</span></a>
        </li>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
          </ul>
        </div>
      </nav>

      <form class="text-center" action="<?php echo base_url() ?>register/form_action" method="post" style="color: #757575;">
        <div class="col-lg-12">
          <ul class="list-unstyled">
            <!-- <div class="form-group">
            <label for="exampleInputNIK">NIK</label>
            <input type="text" class="form-control" id="exampleInputNIK" placeholder="NIK" name="id_data_peserta">
          </div> -->
            <div class="form-group">
              <label for="exampleInputNomor">Nomor</label>
              <input required type="number" class="form-control" id="exampleInputNomor" placeholder="Nomor" name="nomor">
            </div>
            <div class="form-group">
              <label for="exampleInputNamadanmarga">Nama dan marga</label>
              <input required type="text" class="form-control" id="exampleInputNamadanmarga" placeholder="Nama dan marga" name="nama_lengkap_fam">
            </div>
            <div class="form-group">
              <label for="exampleInputTelepon">Telepon</label>
              <input required type="text" class="form-control" id="exampleInputTelepon" placeholder="Telepon" name="nomor_hp">
            </div>
            <div class="form-group">
              <label for="exampleInputAsalcabang">Asal cabang</label>
              <input required type="text" class="form-control" id="exampleInputAsalcabang"="emailHelp" placeholder="Asal cabang" name="dpc_dpw">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" name="daftar" value="Daftar">Submit</button>
            </div>
      </form>
    </div>
  </div>
  </ul>
  </div>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="assets/bootstrap-4.3.1/dist/js/bootstrap.min.js">

</body>

</html>