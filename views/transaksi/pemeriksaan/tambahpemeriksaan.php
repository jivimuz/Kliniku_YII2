<?php
    $this->title = 'Tambah Data Pemeriksaan';
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;
    use yii\helpers\ArrayHelper;
    use app\models\Pasien;
    use app\models\Pegawai;
    use app\models\Tindakan;
    use app\models\Wilayah;
    use app\models\Obat;
?>

<h3>Tambah Data Pemeriksaan</h3>

<?php
$form = ActiveForm::begin([
    'method' => 'post',
    'action' => Url::to(['transaksi/tambah-pemeriksaan']),
]) ?>

    <?= $form->field($model, 'id_pasien')->label('Nama Pasien')->dropDownList(
    ArrayHelper::map(Pasien::find()->all(), 'id_pasien', 'nama_pasien'), ['prompt'=>'Pilih Pasien']) ?>

    <?= $form->field($model, 'id_pegawai')->label('Pegawai yang bertugas')->dropDownList(
    ArrayHelper::map(Pegawai::find()->all(), 'id_pegawai', 'id_user'), ['prompt'=>'Pilih Pegawai']) ?>

    <?= $form->field($model, 'id_obat')->label('Obat')->dropDownList(
    ArrayHelper::map(Obat::find()->all(), 'id_obat', 'nama_obat'), ['prompt'=>'Pilih Obat']) ?>

    <?= $form->field($model, 'id_tindakan')->label('Hasil Pemeriksaan')->dropDownList(
    ArrayHelper::map(Tindakan::find()->all(), 'id_tindakan', 'nama_tindakan'), ['prompt'=>'Pilih Hasil Pemeriksaan']) ?>

    <?= $form->field($model, 'id_wilayah')->label('Lokasi Rujukan')->dropDownList(
    ArrayHelper::map(Wilayah::find()->all(), 'id_wilayah', 'nama_wilayah'), ['prompt'=>'Pilih Lokasi Rujukan'])?>

    <?= $form->field($model, 'keterangan')->label('Keterangan (tambahan)') ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>