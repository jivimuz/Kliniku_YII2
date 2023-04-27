<?php

/** @var yii\web\View $this */
$this->title = 'Kliniku';
use yii\bootstrap4\Alert;


?>
        
<div class="" >
<div class="site-index " >
      
    <div style="padding: 10px; opacity:100%">
    <div class="jumbotron text-center bg-transparent text-black">
        <h4>Cek invoice terakhir menggunakan NIK anda yang sudah didaftarkan</h4>
            <form method="get" action="/site/invoice"> 
    <div class="mx-auto d-block p-5"> 
            <div class="input-group mb-3" >
            <input type="text" class="form-control" style="font-size: 30px;" placeholder="Masukan NIK anda" aria-label="Masukan NIK anda" aria-describedby="basic-addon2" name="nik">
            <div class="input-group-append">
                <button class="btn btn-primary" style="font-size: 30px;" type="submit"> Cari </button>
            </div>
            </div>
    </div>
    </form>  
    <div class="mx-auto d-block">
            <a class="btn btn-lg btn-outline-warning" href="<?= Yii::$app->urlManager->createUrl(['site/index']) ?>">Kembali</a> 
    </div>
    </div>
    </div>
</div>
</div>
