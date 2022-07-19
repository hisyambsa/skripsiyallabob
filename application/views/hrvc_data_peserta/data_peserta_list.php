<?php
/*
<!-- ................................... -->
<!-- ........... COPYRIGHT ............. -->
<!-- Authors : Hasan.................... -->
<!-- Email : attoz.151@gmail.com ....... -->
<!-- ................................... -->
*/
?>
<?php if ($this->session->userdata('pesan') <> '') : ?>
    <?php $pesan = $this->session->userdata('pesan'); ?>
    <script>
        alert('<?php echo $pesan ?>');
    </script>
<?php endif ?>
<div class="row">
    <div class="col-md-1 text-center mt-2">
        <button class="btn btn-flat btn-rounded hoverable btn-kembali">
            <h4><i class="fas fa-chevron-circle-left"></i></h4>
        </button>
    </div>
    <div class="col-md-3 text-center mt-2">
        <br>
        <br>
    </div>
    <div class="col-md-4 text-center">
        <h2 style="margin-top:0px">Daftar Data_peserta</h2>

    </div>
    <div class="col-md-4 text-right">
        <form action="<?php echo site_url('hrvc_data_peserta/index'); ?>" class="form-group" method="get">
            <div class="input-group">
                <input type="text" class="form-control mt-2" name="q" value="<?php echo $q; ?>">
                <span class="input-group-btn">
                    <?php
                    if ($q <> '') {
                    ?>
                        <a href="<?php echo site_url('hrvc_data_peserta'); ?>" class="btn btn-amber">Ulangi</a>
                    <?php
                    }
                    ?>
                    <button class="btn btn-dark-green" type="submit">Cari</button>
                </span>
            </div>
        </form>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-hover text-nowrap table-sm text-center" style="margin-bottom: 10px">
        <tr>
            <th class="th-sm">No</th>
            <th class="th-sm">Nomor</th>
            <th class="th-sm">Nama Lengkap Fam</th>
            <th class="th-sm">Status</th>
            <th class="th-sm">Dpc Dpw</th>

        </tr><?php
                foreach ($hrvc_data_peserta_data as $hrvc_data_peserta) {
                ?>
            <tr>
                <td width="80px"><?php echo ++$start ?></td>
                <td><?php echo $hrvc_data_peserta->nomor ?></td>
                <td><?php echo $hrvc_data_peserta->nama_lengkap_fam ?></td>
                <td><?php echo $hrvc_data_peserta->status ?></td>
                <td><?php echo $hrvc_data_peserta->dpc_dpw ?></td>

            </tr>
        <?php
                }
                if ($start == 0) {
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
    </div>
    <div class="col-md-8 text-right">
        <?php echo $pagination ?>
    </div>
</div>