<?php 
use dosamigos\highcharts\HighCharts;
use app\models\Users;
?>

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
<hr>
            <div class="grafik">
    <?php
    foreach ($data2 as $values2) {
        $nama = Yii::$app->db->createCommand(
                    "SELECT nama_user FROM users WHERE id_user = :id_user"
                )->bindValue(':id_user', $values2['id_user'])->queryScalar();
            $d[0] = ($nama);
            $e[] = ($nama);
            $f[] = array('type' => 'column', 'name' => $nama, 'data' => array((int)$values2['jml']));
    }
    echo HighCharts::widget([
        'clientOptions' => [
            'chart' => [
                'type' => 'bar'
            ],
            'title' => ['text' => 'Data Pegawai yang sering melakukan pemeriksaan pasien'],
            'xAxis' => [
                'categories' => ['Nama Pegawai']
            ],
            'yAxis' => [
                'title' => ['text' => 'Jumlah Pemeriksaan']
            ],
            'series' => $f,
        ]
    ]);
    ?>
</div>



        </div>