<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ListUser $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_user')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->passwordInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?php if(!Yii::$app->user->isGuest && Yii::$app->user->identity->role == 1){
     echo $form->field($model, 'role')->dropDownList(['1' => 'Admin', '2' => 'Master', '3' => 'Pegawai']) ;
    }
    ?>
    <br>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
