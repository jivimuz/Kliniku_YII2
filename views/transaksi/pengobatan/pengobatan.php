<?php
use yii\helpers\Html;
use app\models\TindakObat;

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
                <td>
                <?php 
                    $tindak = TindakObat::find()->joinWith('tindakan')->where(['tindak_obat.id_pengobatan'=>$row->id_pengobatan])->all();
                    if(!empty($tindak)){
                            foreach($tindak as $t){
                            foreach($t->tindakan as $i){
                                echo'- '. $i->nama_tindakan . ' '. Html::a('X', ['tindakobatdelete','id' => $id, 'ido' => $t->id_tindak_obat], ['class' => 'text-danger', 'data-confirm' => 'Apakah anda yakin akan menghapus data ini?']) . '<br>';
                            }
                        } 
                    }
                ?>
                </td>
                <td><?= Html::a('Tambah Tindakan', ['tindakobat','id' => $id, 'idp' => $row->id_pengobatan], ['class' => 'btn btn-primary']) ?> 
                <?= Html::a('Hapus', ['pengobatandelete','id' => $id, 'idp' => $row->id_pengobatan], ['class' => 'btn btn-danger', 'data-confirm' => 'Apakah anda yakin akan menghapus data ini?']) ?></td>
            </tr>
        <?php endforeach ?>
        <?php } else { ?>
    <div class="alert alert-warning">Data pengobatan tidak ditemukan.</div>
<?php } ?>
    </tbody>
</table>
