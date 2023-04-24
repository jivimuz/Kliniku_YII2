<?php

/** @var yii\web\View $this */
$this->title = 'Si Klinik';
?>
<div class="image-bg" >
<div class="site-index " >
    <div style="padding: 40px; opacity:100%">
    <div class="jumbotron text-center bg-transparent text-black">
        <h1 class="judul1"><strong>Selamat datang di <span class="text-warning">Kliniku</span>!</strong></h1>
        <p class="text-danger judul2"><strong>Silahkan Klik untuk Mulai.</strong></p>

        <?php 
        if(Yii::$app->user->isGuest){?>
    <div class="row">
        <!-- <div class="col-md-6 text-right"> <a class="btn btn-lg btn-outline-primary" href="<?= Yii::$app->urlManager->createUrl(['user/create']) ?>">Daftar Peserta</a></div> -->
        <div class="col-md-12 "><a class="btn btn-lg btn-outline-success" href="<?= Yii::$app->urlManager->createUrl(['site/login']) ?>">Login</a></div>
        </div>
        <?php } else {?>
        <a class="btn btn-lg btn-outline-success" href="<?= Yii::$app->urlManager->createUrl(['site/menu']) ?>">Masuk Menu</a>

        <?php }?>



    </div>
    </div>
</div>
