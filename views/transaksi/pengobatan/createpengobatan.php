<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pengobatan */

$this->title = 'Create Pengobatan';
$this->params['breadcrumbs'][] = ['label' => 'Menu', 'url' => ['site/menu']];
$this->params['breadcrumbs'][] = ['label' => 'Pemeriksaan', 'url' => ['pemeriksaan']];
$this->params['breadcrumbs'][] = [    'label' => 'Pengobatan',     'url' => ['pengobatan', 'id' => $id]
];

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengobatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('formpengobatan', [
        'model' => $model,
    ]) ?>

</div>