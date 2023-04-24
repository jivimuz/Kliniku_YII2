<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Json;
use app\models\User;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;
use dosamigos\highcharts\HighCharts;

/** @var yii\web\View $this */
/** @var app\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */


$this->title = 'Menu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
   
    
    <hr>
    <div class="body-content">
    <div class="container">
            <div class="grafik">
            <?php
                foreach($data as $values){
                    $a[0]= ($values['nama_obat']);
                    $c[]= ($values['nama_obat']);
                    $b[]= array('type'=> 'column', 'name' =>$values['nama_obat'], 'data' => array((int)$values['jml']));
                }
                echo
                HighCharts::widget([
                    'clientOptions' => [
                        'chart'=>[
                            'type'=>'bar'
                        ],
                        'title' => ['text' => 'Data Obat yang sering digunakan'],
                        'xAxis' => [
                            'categories' => ['Jenis Obat']
                        ],
                        'yAxis' => [
                            'title' => ['text' => 'Jumlah Penggunaan']
                        ],
                        'series' => $b,
                    ]
                ]);
            ?>
            </div>


        </div>
        <div class="row">
        <?php  
        $role = Yii::$app->session->get('users')->role;
        if($role == 1){?>
            <div class="col-lg-5">
                <h2>Master</h2>
                <div class="col-lg-6">
                <p><a class="btn btn-outline-secondary" href="<?= Yii::$app->urlManager->createUrl(['master/wilayah']) ?>">Wilayah &raquo;</a></p>
                <p><a class="btn btn-outline-secondary" href="<?= Yii::$app->urlManager->createUrl(['user/index']) ?>">User &raquo;</a></p>
                <p><a class="btn btn-outline-secondary" href="<?= Yii::$app->urlManager->createUrl(['master/obat']) ?>">Obat &raquo;</a></p>
            </div>
            <div class="col-lg-6">
                <p><a class="btn btn-outline-secondary" href="<?= Yii::$app->urlManager->createUrl(['master/pegawai']) ?>">Pegawai &raquo;</a></p>
                <p><a class="btn btn-outline-secondary" href="<?= Yii::$app->urlManager->createUrl(['master/tindakan']) ?>">Tindakan &raquo;</a></p>
            </div>
            </div>
            <div class="col-lg-2">
            </div>
        <?php } 
        if($role == 3 || $role == 1){ ?>
            <div class="col-lg-5">
                <h2>Transaksi</h2>
                
            
            <div class="col-lg-6">
                <p><a class="btn btn-outline-secondary" href="<?= Yii::$app->urlManager->createUrl(['transaksi/pasien']) ?>">Pasien &raquo;</a></p>
            </div>
            <div class="col-lg-6">
                <p><a class="btn btn-outline-secondary" href="<?= Yii::$app->urlManager->createUrl(['transaksi/pemeriksaan']) ?>">Pemeriksaan &raquo;</a></p>
            </div>
            </div>
        <?php } ?>
            
        </div>
       
    </div>
</div>
