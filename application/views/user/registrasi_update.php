<?php
if ($row['status'] == '0') {
  echo "<h3 class='text-center'>", $row['no_registrasi'], "</h3>";


  if (empty($row['nama_lengkap']) or empty($row['fam']) or empty($row['no_hp']) or empty($row['alamat'])) {
?>
    <div class="row">
      <div class="col-md-offset-2 col-md-8">
        <?php
        echo "<input required class='form-control' id='no_registrasi' type='hidden' name='code' value='" . $row['no_registrasi'] . "'>";
        if (empty($row['nama_lengkap'])) {
          echo "
                      <div class='form-group h4'>
                      Nama Lengkap : <input required class='form-control' id='nama_lengkap' type='text' name='nama_lengkap'>
                      <input class='form-control' type='hidden' name='id' value=" . $id . ">
                      </div>
                      ";
        } else {
          echo "
                      <div class='form-group h4 text-center'>
                      " . $row['nama_lengkap'] . " 
                      </div>
                      <input class='form-control' type='hidden' name='id' value=" . $id . ">
                      <input required class='form-control' id='nama_lengkap' type='hidden' name='nama_lengkap' value='" . $row['nama_lengkap'] . "'>

                      ";
        }

        if (empty($row['fam'])) {

          echo "
                      <div class='form-group h4'>
                      Fam : <input required class='form-control' type='text' id='fam' name='fam'>
                      </div>
                      ";
        } else {
          echo "
                      <div class='form-group h4 text-center'>
                      " . $row['fam'] . "
                      </div>
                      <input required class='form-control' id='fam' type='hidden' name='fam' value='" . $row['fam'] . "'>
                      ";
        }

        if (empty($row['no_hp'])) {

          echo "
                      <div class='form-group h4'>
                      No Handphone : <input class='form-control' type='number' id='no_hp' name='no_hp'>
                      </div>
                      ";
        } else {
          echo "                  
                      <div class='form-group h4'text-center>
                      " . $row['no_hp'] . "
                      </div>
                      <input required class='form-control' id='no_hp' type='hidden' name='no_hp' value='" . $row['no_hp'] . "'>
                      ";
        }
        if (empty($row['alamat'])) {
          echo "
                      <div class='form-group h4'>
                      Alamat : <input class='form-control' type='text' id='alamat' name='alamat'>
                      </div>
                      ";
        } else {
          echo "
                      <div class='form-group h4 text-center'>
                      " . $row['alamat'] . "
                      </div>
                      <input required class='form-control' id='alamat' type='hidden' name='alamat' value='" . $row['alamat'] . "'>
                      ";
        }
        if (empty($row['kota'])) {
          echo "
                      <div class='form-group h4'>
                      Kota : <input id='kota' class='form-control' id='kota' style='text-transform:uppercase' type='text' name='kota'>
                      </div>
                      ";
        } else {
          echo "
                      <div class='form-group h4 text-center'>
                      " . $row['kota'] . "
                      </div>
                      <input required class='form-control' id='kota' type='hidden' name='kota' value='" . $row['kota'] . "'>
                      ";
        }
        if (empty($row['buku_nasab'])) {
          echo "
                      <div class='form-group h4'>
                      Buku Nasab : 
                      <select class='form-control' name='buku_nasab' id='buku_nasab'>
                      <option value=''>PILIH</option>
                      <option value='1'>Ada</option>
                      <option value='0'>tidak ada</option>
                      </select>
                      </div>

                      ";
        } else {
        }
        ?>
        <div class="row">
          <div class="col-xs-12">
            <button type="button" id="inputCek" class='inputData updateScan btn btn-warning text-center btn-block'>UPDATE</button>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-xs-12">
            <button type='button' id='data_tidak_sesuai' class='updateScan updateScan checkin btn btn-danger text-center btn-block'>DATA TIDAK SESUAI</button>
          </div>
        </div>
      </div>
    </div>

  <?php

  } else {
  ?>
    <div class="row">
      <div class="col-md-offset-2 col-md-8">


        <?php

        echo "<h2 class='text-center'> ", $row['nama_lengkap'], "</h2>";
        echo "<input required class='form-control' id='nama_lengkap' type='hidden' name='nama_lengkap' value='" . $row['nama_lengkap'] . "'>";

        echo "<h3 class='text-center'>", $row['fam'], "</h3>";
        echo "<input required class='form-control' id='fam' type='hidden' name='fam' value='" . $row['fam'] . "'>";

        echo "<h3 class='text-center'>", $row['no_hp'], "</h3>";
        echo "<input required class='form-control' id='no_hp' type='hidden' name='no_hp' value='" . $row['no_hp'] . "'>";

        echo "<h3 class='text-center'>", $row['kota'], "</h3>";
        echo "<input required class='form-control' id='kota' type='hidden' name='kota' value='" . $row['kota'] . "'>";
        echo "<button type='button' id='data_tidak_sesuai' class='updateScan checkin btn btn-danger text-center btn-block'>DATA TIDAK SESUAI</button>";
        ?>


      </div>
    </div>
    </form>
<?php
  }
}
?>