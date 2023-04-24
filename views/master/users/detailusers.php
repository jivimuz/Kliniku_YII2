<?php
    $this->title = 'Detail Data user';
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;
?>

<h3>Detail Data user</h3>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama user</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th><?= $data->id_user ?></th>
            <th><?= $data->nama_user ?></th>
            <th><?= $data->username ?></th>
            <th><?= $data->password ?></th>
        </tr>
    </tbody>
</table>
<a class="btn btn-success" href="<?= Url::toRoute(['master/edit-users', 'id' => $data->id_user])?>">Edit</a>
<a class="btn btn-danger" href="<?= Url::toRoute(['master/hapus-users', 'id' => $data->id_user])?>">Hapus</a>