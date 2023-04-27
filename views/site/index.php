<?php

/** @var yii\web\View $this */
$this->title = 'Kliniku';
use yii\bootstrap4\Alert;
?>
        
<div class="" >
<div class="site-index " >
      
    <div style="padding: 40px; opacity:100%">
    <div class="jumbotron text-center bg-transparent text-black">
        <h1 class="judul1"><strong>Selamat datang di <span class="text-warning">Kliniku</span>!</strong></h1>
        <p class="text-danger judul2"><strong>Silahkan daftar atau cek invoice.</strong></p>
          
        <?php 
        if(Yii::$app->user->isGuest){?>
    <div class="row "> 
        <div class="mx-auto d-block">
            <a class="btn btn-lg btn-outline-primary" href="<?= Yii::$app->urlManager->createUrl(['site/daftarpasien']) ?>">Daftar Pasien</a>  
            <a class="btn btn-lg btn-outline-warning" href="<?= Yii::$app->urlManager->createUrl(['site/cekinvoice']) ?>">Cek Invoice</a>  
        </div>
        <?php } else {?>
        <a class="btn btn-lg btn-outline-success" href="<?= Yii::$app->urlManager->createUrl(['site/menu']) ?>">Masuk Menu</a>

        <?php }?>
    </div>
    </div>
</div>
