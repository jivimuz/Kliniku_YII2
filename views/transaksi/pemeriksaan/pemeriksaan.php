<?php
    $this->title = 'Data Pemeriksaan';
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;
?>

<div class="master-index">

    <div class="bg-transparent">
        <h3>Tabel Data Pemeriksaan</h3>
        <p><a class="btn btn-success" href="<?= Url::toRoute('transaksi/tambah-pemeriksaan')?>">Tambah Data Pemeriksaan</a></p>
    </div>

    <div class="body-content">

    <table class="table">
        <thead class="thead-light">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nama Pasien</th>
              <!-- <th scope="col">Nama Pegawai</th> -->
              <th scope="col">Tindakan yang diambil</th>
              <!-- <th scope="col">Obat yang digunakan</th> -->
              <!-- <th scope="col">Keterangan</th> -->
              <th scope="col">Pilihan</th>
            </tr>
        </thead>
        <tbody>
          <?php
          foreach($data as $d){
          ?>
          <tr>
            <th><?= $d->id_pemeriksaan ?></th>
            <th><?= $d->pasien->nama_pasien ?></th>
            <!-- <th><?= $d->pegawai->users->nama_user ?></th> -->
            <th><?= $d->tindakan->nama_tindakan ?></th>
            <!-- <th><?= $d->obat->nama_obat ?></th> -->
            <!-- <th><?= $d->keterangan ?></th> -->
              <td>
                <a class="btn btn-info" href="<?= Url::toRoute(['transaksi/detail-pemeriksaan', 'id' => $d->id_pemeriksaan])?>">Invoice</a>
                <a class="btn btn-success" href="<?= Url::toRoute(['transaksi/edit-pemeriksaan', 'id' => $d->id_pemeriksaan])?>">Edit</a>
                <!-- <a class="btn btn-danger" href="<?= Url::toRoute(['transaksi/hapus-pemeriksaan', 'id' => $d->id_pemeriksaan])?>">Hapus</a> -->
              </td>
          </tr>
          <?php
          }
          ?>
        </tbody>
    </table>

    </div>
</div>