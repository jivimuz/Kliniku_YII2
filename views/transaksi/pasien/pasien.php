<?php
    $this->title = 'Data Pasien';
    use yii\helpers\Url;
?>

<div class="master-index">

    <div class="bg-transparent">
        <h3>Tabel Data Pasien</h3>
        <p><a class="btn btn-success" href="<?= Url::toRoute('transaksi/tambah-pasien')?>">Tambah Data Pasien</a></p>
    </div>

    <div class="body-content">

    <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            <th scope="col">TTL</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">Telepon</th>
            <th scope="col">Pilihan</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($data as $d){
          ?>
          <tr>
            <th><?= $d->id_pasien ?></th>
            <th><?= $d->nama_pasien ?></th>
            <th><?= $d->ttl_pasien ?></th>
            <th>
              <?php if($d->jenis_kelamin_pasien == 0): ?>
                  Perempuan
              <?php else: ?>
                  Laki - Laki
              <?php endif; ?>
            </th>
            <th><?= $d->alamat_pasien ?></th>
            <th><?= $d->telepon_pasien ?></th>
              <td>
                <!-- <a class="btn btn-info" href="<?= Url::toRoute(['transaksi/detail-pasien', 'id' => $d->id_pasien])?>">Detail</a> -->
                <a class="btn btn-success" href="<?= Url::toRoute(['transaksi/edit-pasien', 'id' => $d->id_pasien])?>">Edit</a>
                <!-- <a class="btn btn-danger" href="<?= Url::toRoute(['transaksi/hapus-pasien', 'id' => $d->id_pasien])?>">Hapus</a> -->
              </td>
          </tr>
          <?php
          }
          ?>
        </tbody>
    </table>

    </div>
</div>