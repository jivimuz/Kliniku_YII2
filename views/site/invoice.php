<?php
    $this->title = 'Detail Data Pemeriksaan';
    use yii\bootstrap4\Html;
    use app\models\TindakObat;

    function buatRupiah($angka){
        $hasil =  number_format($angka,0,',','.');
        $hasil = $hasil.",-";
        return $hasil;}
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <strong style="font-size: 24px;">Data Pemeriksaan </strong>
            <span class="float-right" style="font-size: 20px;"> <strong>ID : </strong><?= $data->id_pemeriksaan ?> <strong>Waktu : </strong><?= $data->created_at?></span>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h6 class="mb-3">Pasien :</h6>
                    <div>
                       Nama : <strong><?= $data->pasien->nama_pasien ?></strong>
                    </div>
                    <div>
                        Tanggal Lahir : <?= $data->pasien->ttl_pasien ?>
                    </div>
                    <div>
                        Jenis Kelamin : 
                        <?php if($data->pasien->jenis_kelamin_pasien == 0): ?>
                            Perempuan
                        <?php else: ?>
                            Laki - Laki
                        <?php endif; ?>
                    </div>
                    <div>
                        Alamat : <?= $data->pasien->alamat_pasien ?>
                    </div>
                    <div>
                        No. telp : <?= $data->pasien->telepon_pasien ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h6 class="mb-3">Pegawai :</h6>
                    <div>
                    Nama : <strong><?= $data->pegawai->users->nama_user ?></strong>
                    </div>
                    <div>
                        Email : <?= $data->pegawai->email_pegawai ?>
                    </div>
                    <div>
                        No. Telp : <?= $data->pegawai->telepon_pegawai ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h6 class="mb-3"></h6>
                    <div>
                        Lokasi Rujukan : <strong><?= $data->wilayah->nama_wilayah ?></strong>
                    </div>
                </div>
            </div>
            <div class="row mb-4" style="border: solid 1px #6c757d; padding: 5px;">
                
                <div class="col-sm-12">
                    <strong>Keterangan (tambahan) :</strong><br>
                    <?= $data->keterangan ?>
                </div>
            </div>
            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="center">#</th>
                            <th>Item</th>
                            <th>Deskripsi / Tindakan</th>
                            <th class="right">Harga / Item</th>
                            <th class="center">Jumlah</th>
                            <th class="right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="center">1</td>
                            <td class="left strong">Pendaftaran</td>
                            <td class="left">- Biaya pendaftaran pasien</td>

                            <td class="right">Rp. <?= buatRupiah($data->wilayah->harga_daftar)?></td>
                            <td class="center">1</td>
                            <td class="right">Rp. <?= buatRupiah($data->wilayah->harga_daftar)?></td>
                        </tr>
                        <tr>
                            <td class="center">2</td>
                            <td class="left strong">Dokter</td>
                            <td class="left">- Biaya pemeriksaan</td>

                            <td class="right">Rp. <?= buatRupiah($data->wilayah->harga_dokter)?></td>
                            <td class="center">1</td>
                            <td class="right">Rp. <?= buatRupiah($data->wilayah->harga_dokter)?></td>
                        </tr>
                        <?php 
                        $a = $data->wilayah->harga_dokter + $data->wilayah->harga_daftar;
                        $no = 3;
                        foreach($obats as $i):
                        $a = $a + ($i->obat->harga_obat * $i->jml_obat);
                        ?>
                        <tr>
                            <td class="center"><?=$no?></td>
                            <td class="left">Obat <?= $i->obat->nama_obat ?></td>
                            <td class="left">
                            <?php 
                            $tindak = TindakObat::find()->joinWith('tindakan')->where(['tindak_obat.id_pengobatan'=>$i->id_pengobatan])->all();
                            if(!empty($tindak)){
                                    foreach($tindak as $t){
                                    foreach($t->tindakan as $j){
                                        echo'- '. $j->nama_tindakan . '<br>';
                                    }
                                } 
                            }
                            ?></td>

                            <td class="right">Rp.<?= buatRupiah($i->obat->harga_obat) ?></td>
                            <td class="center"><?= $i->jml_obat?></td>
                            <td class="right">Rp.<?= buatRupiah($i->obat->harga_obat) ?></td>
                        </tr>
                        <?php 
                        $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5">
                </div>
                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                            <tr>
                                <td class="left">
                                    <strong>Subtotal</strong>
                                </td>
                                <td class="right">
                                    : 
                                    Rp.<?= buatRupiah($a);                             
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong>Total</strong>
                                </td>
                                <td class="right">
                                    : 
                                    <strong>
                                        Rp.<?=buatRupiah($a);                             
                                        ?>
                                    </strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>