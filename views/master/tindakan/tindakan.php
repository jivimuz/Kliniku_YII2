<?php
    $this->title = 'Data Tindakan';
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;
?>

<div class="master-index">

    <div class="bg-transparent">
        <h3>Tabel Data Tindakan</h3>
        <p><a class="btn btn-success" href="<?= Url::toRoute('master/tambah-tindakan')?>">Tambah Data Tindakan</a></p>
    </div>

    <div class="body-content">

    <table class="table">
        <thead class="thead-light">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Tindakan</th>
            <th scope="col">Pilihan</th>
            </tr>
        </thead>
        <tbody>
          <?php
          foreach($data as $d){
          ?>
          <tr>
            <th><?= $d->id_tindakan ?></th>
            <th><?= $d->nama_tindakan ?></th>
              <td>
                <a class="btn btn-info" href="<?= Url::toRoute(['master/detail-tindakan', 'id' => $d->id_tindakan])?>">Detail</a>
                <a class="btn btn-success" href="<?= Url::toRoute(['master/edit-tindakan', 'id' => $d->id_tindakan])?>">Edit</a>
                <a class="btn btn-danger" href="<?= Url::toRoute(['master/hapus-tindakan', 'id' => $d->id_tindakan])?>">Hapus</a>
              </td>
          </tr>
          <?php
          }
          ?>
        </tbody>
    </table>

    </div>
</div>