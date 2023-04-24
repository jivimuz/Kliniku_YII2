<?php
use yii\helpers\Html;

$this->title = 'Pengobatan';
$this->params['breadcrumbs'][] = ['label' => 'Menu', 'url' => ['site/menu']];
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan', 'url' => ['pemeriksaan']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<p>
    <?= Html::a('Tambah Data', ['createpengobatan', 'id' => $id], ['class' => 'btn btn-success']) ?>

</p>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Obat</th>
            <th>Qty</th>
            <th>Tindakan</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
    <?php if($data){ ?>
        <?php foreach ($data as $row): ?>
            <tr>
                <td><?= $row->id_pemeriksaan ?> - <?= $row->id_pengobatan ?></td>
                <td><?= $row->obat->nama_obat ?></td>
                <td><?= $row->jml_obat?></td>
                <td><?php echo isset($row->tindakan) ? $row->tindakan->nama_tindakan : '-'; ?></td>
                <td><?= Html::a('Hapus', ['pengobatandelete','id' => $id, 'idp' => $row->id_pengobatan], ['class' => 'btn btn-danger', 'data-confirm' => 'Apakah anda yakin akan menghapus data ini?']) ?></td>
            </tr>
        <?php endforeach ?>
        <?php } else { ?>
    <div class="alert alert-warning">Data pengobatan tidak ditemukan.</div>
<?php } ?>
    </tbody>
</table>
