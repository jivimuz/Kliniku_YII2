<?php
    $this->title = 'Detail Data Wilayah';
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;
?>

<h3>Detail Data Wilayah</h3>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Wilayah</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th><?= $data->id_wilayah ?></th>
            <th><?= $data->nama_wilayah ?></th>
        </tr>
    </tbody>
</table>
<a class="btn btn-success" href="<?= Url::toRoute(['master/edit-wilayah', 'id' => $data->id_wilayah])?>">Edit</a>
<a class="btn btn-danger" href="<?= Url::toRoute(['master/hapus-wilayah', 'id' => $data->id_wilayah])?>">Hapus</a>