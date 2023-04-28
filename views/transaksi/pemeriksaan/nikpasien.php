<?php

/** @var yii\web\View $this */
$this->title = 'Kliniku';
use yii\bootstrap4\Alert;
use app\models\Pasien;


?>
        
<div class="" >
<div class="site-index " >
      
    <div style="padding: 10px; opacity:100%">
        <h4>Masukan Nik Pasien</h4>
            <form method="get" action=""> 
            <div class="input-group mb-3" >
                <datalist id="userid" >
                <?php $list = Pasien::find()->select('nik, nama_pasien')->all();
                    foreach($list as $o){
                        echo '<option value="'.$o->nik.'">'. $o->nama_pasien.'</option>';
                    }
                ?>
                </datalist>
            <input type="number" class="form-control" list="userid"  placeholder="Masukan NIK anda" aria-label="Masukan NIK anda" aria-describedby="basic-addon2" name="nik">

            <div class="input-group-append">
                <button class="btn btn-primary" style="font-size: " type="submit"> Cari </button>
            </div>
    </div>
    </form>  
        <a href="pemeriksaan" class="btn btn-warning">back</a>
    </div>
</div>
</div>
