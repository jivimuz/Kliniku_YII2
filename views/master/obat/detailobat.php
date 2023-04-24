<?php
    $this->title = 'Detail Data Obat';
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;

    function buatRupiah($angka){
        $hasil =  number_format($angka,0,',','.');
        $hasil = $hasil.",-";
        return $hasil;}
?>

<h3>Detail Data Obat</h3>

<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Obat</th>
            <th scope="col">Harga</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th><?= $data->id_obat ?></th>
            <th><?= $data->nama_obat ?></th>
            <th><?= buatRupiah($data->harga_obat) ?></th>
        </tr>
    </tbody>
</table>
<a class="btn btn-success" href="<?= Url::toRoute(['master/edit-obat', 'id' => $data->id_obat])?>">Edit</a>
<a class="btn btn-danger" href="<?= Url::toRoute(['master/hapus-obat', 'id' => $data->id_obat])?>">Hapus</a>