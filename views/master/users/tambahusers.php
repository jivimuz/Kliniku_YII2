<?php
    $this->title = 'Tambah Data User';
    use yii\bootstrap4\Html;
    use yii\bootstrap4\ActiveForm;
    use yii\helpers\Url;
?>

<h3>Tambah Data User</h3>

<?php
$form = ActiveForm::begin([
    'method' => 'post',
    'action' => Url::to(['master/tambah-users']),
]) ?>

    <?= $form->field($model, 'nama_user')->label('Nama') ?>
    
    <?= $form->field($model, 'username')->label('Username') ?>

    <?= $form->field($model, 'password')->label('Password')->passwordInput() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>