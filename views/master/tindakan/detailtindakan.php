<?php
    $this->title = 'Detail Data Tindakan';
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;
?>

<h3>Detail Data Tindakan</h3>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Tindakan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th><?= $data->id_tindakan ?></th>
            <th><?= $data->nama_tindakan ?></th>
        </tr>
    </tbody>
</table>
<a class="btn btn-success" href="<?= Url::toRoute(['master/edit-tindakan', 'id' => $data->id_tindakan])?>">Edit</a>
<a class="btn btn-danger" href="<?= Url::toRoute(['master/hapus-tindakan', 'id' => $data->id_tindakan])?>">Hapus</a>