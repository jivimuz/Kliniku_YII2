<?php
    $this->title = 'Data User';
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;
?>

<div class="master-index">

    <div class="bg-transparent">
        <h3>Tabel Data User</h3>
        <p><a class="btn btn-success" href="<?= Url::toRoute('master/tambah-users')?>">Tambah Data User</a></p>
    </div>

    <div class="body-content">

    <table class="table">
        <thead class="thead-light">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Pilihan</th>
            </tr>
        </thead>
        <tbody>
          <?php
          foreach($data as $d){
          ?>
          <tr>
            <th><?= $d->id_user ?></th>
            <th><?= $d->nama_user ?></th>
            <th><?= $d->username ?></th>
            <th><?= $d->password ?></th>
              <td>
                <a class="btn btn-info" href="<?= Url::toRoute(['master/detail-users', 'id' => $d->id_user])?>">Detail</a>
                <a class="btn btn-success" href="<?= Url::toRoute(['master/edit-users', 'id' => $d->id_user])?>">Edit</a>
                <a class="btn btn-danger" href="<?= Url::toRoute(['master/hapus-users', 'id' => $d->id_user])?>">Hapus</a>
              </td>
          </tr>
          <?php
          }
          ?>
        </tbody>
    </table>

    </div>
</div>