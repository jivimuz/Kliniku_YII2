<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Json;
use app\models\User;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */


$this->title = 'Menu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
   
    <div class="body-content">
    
        <div class="row">
        <div class="col-lg-5">
            <img src="/images/dokter.png" class="mx-auto d-block" width="300px" alt="">
        </div>
        <div class="col-lg-7">
        <?php  
        $role = Yii::$app->user->identity->role;
        if($role == 1 ||$role == 2 ){?>
            <div class="col-lg-12">
                <h2>Master</h2>
            </div>
            <div class="col-lg-12">
        <?php if($role == 1){?>
                <a class="btn btn-outline-secondary" href="<?= Yii::$app->urlManager->createUrl(['user/index']) ?>">User &raquo;</a>
        <?php }?>
            
                <a class="btn btn-outline-secondary" href="<?= Yii::$app->urlManager->createUrl(['master/wilayah']) ?>">Wilayah &raquo;</a>
        
                <a class="btn btn-outline-secondary" href="<?= Yii::$app->urlManager->createUrl(['master/obat']) ?>">Obat &raquo;</a>
                <a class="btn btn-outline-secondary" href="<?= Yii::$app->urlManager->createUrl(['master/pegawai']) ?>">Pegawai &raquo;</a>
                <a class="btn btn-outline-secondary" href="<?= Yii::$app->urlManager->createUrl(['master/tindakan']) ?>">Tindakan &raquo;</a>
            <hr>

            </div>
        <?php } 
        if($role == 1 || $role == 3){ ?>
            <div class="col-lg-12">
                <h2>Transaksi</h2>
            </div>
            <div class="col-lg-12">
                <a class="btn btn-outline-secondary" href="<?= Yii::$app->urlManager->createUrl(['transaksi/pasien']) ?>">Pasien &raquo;</a>
                <a class="btn btn-outline-secondary" href="<?= Yii::$app->urlManager->createUrl(['transaksi/pemeriksaan']) ?>">Pemeriksaan &raquo;</a>
            <hr>
            </div>
        <?php } ?>
           
        </div>
        </div>
       
    </div>
</div>
