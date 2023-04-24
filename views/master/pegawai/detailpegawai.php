<?php
    $this->title = 'Detail Data Pegawai';
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;
?>

<h3>Detail Data Pegawai</h3>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            <th scope="col">Telepon</th>
            <th scope="col">Email</th>
            <th scope="col">NIP</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th><?= $data->id_pegawai ?></th>
            <th><?= $data->users->nama_user ?></th>
            <th><?= $data->telepon_pegawai ?></th>
            <th><?= $data->email_pegawai ?></th>
            <th><?= $data->nip_pegawai ?></th>
        </tr>
    </tbody>
</table>
<a class="btn btn-success" href="<?= Url::toRoute(['master/edit-pegawai', 'id' => $data->id_pegawai])?>">Edit</a>
<a class="btn btn-danger" href="<?= Url::toRoute(['master/hapus-pegawai', 'id' => $data->id_pegawai])?>">Hapus</a>