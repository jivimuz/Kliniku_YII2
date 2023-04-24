<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ListUser $model */

$this->title = 'Update User: ' . $model->nama_user;
$this->params['breadcrumbs'][] = ['label' => 'Menu', 'url' => ['site/menu']];
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_user, 'url' => ['view', 'id_user' => $model->id_user]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
