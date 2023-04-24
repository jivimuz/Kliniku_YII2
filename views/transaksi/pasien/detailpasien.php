<?php
    $this->title = 'Detail Data Pasien';
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;
?>

<h3>Detail Data Pasien</h3>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            <th scope="col">TTL</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">Telepon</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th><?= $data->id_pasien ?></th>
            <th><?= $data->nama_pasien ?></th>
            <th><?= $data->ttl_pasien ?></th>
            <th><?= $data->jenis_kelamin_pasien ?></th>
            <th><?= $data->alamat_pasien ?></th>
            <th><?= $data->telepon_pasien ?></th>
        </tr>
    </tbody>
</table>
<a class="btn btn-success" href="<?= Url::toRoute(['transaksi/edit-pasien', 'id' => $data->id_pasien])?>">Edit</a>
<!-- <a class="btn btn-danger" href="<?= Url::toRoute(['transaksi/hapus-pasien', 'id' => $data->id_pasien])?>">Hapus</a> -->