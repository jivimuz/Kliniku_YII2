<?php
    $this->title = 'Edit Data Pemeriksaan';
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;
    use yii\helpers\ArrayHelper;
    use app\models\Pasien;
    use app\models\Pegawai;
    use app\models\Tindakan;
    use app\models\Obat;
?>

<h3>Edit Data Pemeriksaan</h3>

<?php
$form = ActiveForm::begin([
    'method' => 'post',
    'action' => Url::to(['transaksi/edit-pemeriksaan', 'id' => $model->id_pemeriksaan]),
]) ?>

    <?= $form->field($model, 'id_pasien')->label('Pasien')->dropDownList(
    ArrayHelper::map(Pasien::find()->all(), 'id_pasien', 'nama_pasien')) ?>
    <?= $form->field($model, 'id_pegawai')->label('Pegawai')->dropDownList(
    ArrayHelper::map(Pegawai::find()->all(), 'id_pegawai', 'id_user')) ?>
    <?= $form->field($model, 'id_tindakan')->label('Tindakan')->dropDownList(
    ArrayHelper::map(Tindakan::find()->all(), 'id_tindakan', 'nama_tindakan')) ?>
    <?= $form->field($model, 'id_obat')->label('Obat')->dropDownList(
    ArrayHelper::map(Obat::find()->all(), 'id_obat', 'nama_obat')) ?>
    <?= $form->field($model, 'keterangan')->label('Keterangan (tambahan)') ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>