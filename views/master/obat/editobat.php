<?php
    $this->title = 'Edit Data Obat';
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;
?>

<h3>Edit Data Obat</h3>

<?php
$form = ActiveForm::begin([
    'method' => 'post',
    'action' => Url::to(['master/edit-obat', 'id' => $model->id_obat]),
]) ?>

    <?= $form->field($model, 'nama_obat')->label('Nama obat') ?>
    
    <?= $form->field($model, 'harga_obat')->label('Harga obat')->input('number') ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>