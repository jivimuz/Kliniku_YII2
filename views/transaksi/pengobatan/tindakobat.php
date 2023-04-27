<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pengobatan */

$this->title = 'Create Tindakan';
$this->params['breadcrumbs'][] = ['label' => 'Menu', 'url' => ['site/menu']];
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan', 'url' => ['pemeriksaan']];
$this->params['breadcrumbs'][] = [    'label' => 'Pengobatan',     'url' => ['pengobatan', 'id' => $id]
];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengobatan-create">


    <?= $this->render('formtindak', [
        'model' => $model,
    ]) ?>

</div>