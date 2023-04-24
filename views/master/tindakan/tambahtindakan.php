<?php
    $this->title = 'Tambah Data Tindakan';
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;
?>

<h3>Tambah Data Tindakan</h3>

<?php
$form = ActiveForm::begin([
    'method' => 'post',
    'action' => Url::to(['master/tambah-tindakan']),
]) ?>

    <?= $form->field($model, 'nama_tindakan')->label('Nama Tindakan') ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>