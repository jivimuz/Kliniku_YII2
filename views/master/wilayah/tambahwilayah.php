<?php
    $this->title = 'Tambah Data Wilayah';
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;
?>

<h3>Tambah Data Wilayah</h3>

<?php
$form = ActiveForm::begin([
    'method' => 'post',
    'action' => Url::to(['master/tambah-wilayah']),
]) ?>

    <?= $form->field($model, 'nama_wilayah')->label('Nama Wilayah') ?>
    <?= $form->field($model, 'harga_daftar')->label('Biaya Pendaftaran')->input('number') ?>
    <?= $form->field($model, 'harga_dokter')->label('Biaya Dokter')->input('number') ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>