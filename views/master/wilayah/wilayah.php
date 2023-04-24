<?php
    $this->title = 'Data Wilayah';
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;
?>

<div class="master-index">

    <div class="bg-transparent">
        <h3>Tabel Data Wilayah</h3>
        <p><a class="btn btn-success" href="<?= Url::toRoute('master/tambah-wilayah')?>">Tambah Data Wilayah</a></p>
    </div>

    <div class="body-content">

    <table class="table">
        <thead class="thead-light">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Wilayah</th>
            <th scope="col">Pilihan</th>
            </tr>
        </thead>
        <tbody>
          <?php
          foreach($data as $d){
          ?>
          <tr>
            <th><?= $d->id_wilayah ?></th>
            <th><?= $d->nama_wilayah ?></th>
              <td>
                <a class="btn btn-info" href="<?= Url::toRoute(['master/detail-wilayah', 'id' => $d->id_wilayah])?>">Detail</a>
                <a class="btn btn-success" href="<?= Url::toRoute(['master/edit-wilayah', 'id' => $d->id_wilayah])?>">Edit</a>
                <a class="btn btn-danger" href="<?= Url::toRoute(['master/hapus-wilayah', 'id' => $d->id_wilayah])?>">Hapus</a>
              </td>
          </tr>
          <?php
          }
          ?>
        </tbody>
    </table>

    </div>
</div>