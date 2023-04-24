<?php
    $this->title = 'Data Pegawai';
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;
?>

<div class="master-index">

    <div class="bg-transparent">
        <h3>Tabel Data Pegawai</h3>
        <p><a class="btn btn-success" href="<?= Url::toRoute('master/tambah-pegawai')?>">Tambah Data Pegawai</a></p>
    </div>

    <div class="body-content">

    <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">ID User</th>
            <th scope="col">Telepon</th>
            <th scope="col">Email</th>
            <th scope="col">NIP</th>
            <th scope="col">Pilihan</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach($data as $d){
          ?>
          <tr>
            <th><?= $d->id_pegawai ?></th>
            <th><?= $d->users->nama_user ?></th>
            <th><?= $d->telepon_pegawai ?></th>
            <th><?= $d->email_pegawai ?></th>
            <th><?= $d->nip_pegawai ?></th>
              <td>
                <a class="btn btn-info" href="<?= Url::toRoute(['master/detail-pegawai', 'id' => $d->id_pegawai])?>">Detail</a>
                <a class="btn btn-success" href="<?= Url::toRoute(['master/edit-pegawai', 'id' => $d->id_pegawai])?>">Edit</a>
                <a class="btn btn-danger" href="<?= Url::toRoute(['master/hapus-pegawai', 'id' => $d->id_pegawai])?>">Hapus</a>
              </td>
          </tr>
          <?php
          }
          ?>
        </tbody>
    </table>

    </div>
</div>