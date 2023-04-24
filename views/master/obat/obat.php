<?php
    $this->title = 'Data Obat';
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;

    function buatRupiah($angka){
      $hasil =  number_format($angka,0,',','.');
      $hasil = $hasil.",-";
      return $hasil;}
?>

<div class="master-index">

    <div class="bg-transparent">
        <h3>Tabel Data Obat</h3>
        <p><a class="btn btn-success" href="<?= Url::toRoute('master/tambah-obat')?>">Tambah Data Obat</a></p>
    </div>

    <div class="body-content">

    <table class="table">
        <thead class="thead-light">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Obat</th>
            <th scope="col">Harga</th>
            <th scope="col">Pilihan</th>
            </tr>
        </thead>
        <tbody>
          <?php
          foreach($data as $d){
          ?>
          <tr>
            <th><?= $d->id_obat ?></th>
            <th><?= $d->nama_obat ?></th>
            <th><?= buatRupiah($d->harga_obat) ?></th>
              <td>
                <a class="btn btn-info" href="<?= Url::toRoute(['master/detail-obat', 'id' => $d->id_obat])?>">Detail</a>
                <a class="btn btn-success" href="<?= Url::toRoute(['master/edit-obat', 'id' => $d->id_obat])?>">Edit</a>
                <a class="btn btn-danger" href="<?= Url::toRoute(['master/hapus-obat', 'id' => $d->id_obat])?>">Hapus</a>
              </td>
          </tr>
          <?php
          }
          ?>
        </tbody>
    </table>

    </div>
</div>