<?php
    $this->title = 'Edit Data Pegawai';
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;
    use yii\helpers\ArrayHelper;
    use app\models\Users;
?>

<h3>Edit Data Pegawai</h3>

<?php
$form = ActiveForm::begin([
    'method' => 'post',
    'action' => Url::to(['master/edit-pegawai', 'id' => $model->id_pegawai]),
]) ?>

    
    <?= $form->field($model, 'id_user')->label('ID User')->dropDownList($data) ?>
    
    <?= $form->field($model, 'telepon_pegawai')->label('Telepon')->input('number') ?>

    <?= $form->field($model, 'email_pegawai')->label('NIP')->input('email') ?>

    <?= $form->field($model, 'nip_pegawai')->label('NIP')->input('number') ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>