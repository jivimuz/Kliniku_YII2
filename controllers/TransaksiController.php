<?php

namespace app\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use app\models\Wilayah;
use app\models\Obat;
use app\models\Pegawai;
use app\models\Pasien;
use app\models\Pemeriksaan;
use app\models\Tindakan;
use app\models\Users;
use app\models\Pengobatan;
use app\models\TindakObat;
if(!Yii::$app->user->isGuest && !Yii::$app->session->get('users')){
    return $this->redirect(['site/logout']);
}

class TransaksiController extends Controller
{
    // ========================================================Pasien========================================================
    // ========================================================Pasien========================================================
    // ========================================================Pasien========================================================
    public function actionPasien()
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
        $data = Pasien::find()->all();
        return $this->render('pasien/pasien', compact('data'));
    }else{ return $this->goback(); }
    }
    // public function actionDetailPasien($id)
    // {
    //     $data = Pasien::findOne($id);
    //     return $this->render('pasien/detailpasien', compact('data'));
    // }
    public function actionTambahPasien()
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
        $model = new Pasien;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Data berhasil di Tambah');
            return $this->redirect(['transaksi/pasien']);
        }
        return $this->render('pasien/tambahpasien', compact('model'));
    }else{ return $this->goback(); }
    }
    public function actionEditPasien($id)
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
        $model = Pasien::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('info', 'Data dengan id '.$id.' berhasil di Edit');
            // return $this->redirect(['transaksi/detail-pasien', 'id' => $id]);
            return $this->redirect(['transaksi/pasien']);
        }
        else{
            return $this->render('pasien/editpasien', compact('model'));
        }
    }else{ return $this->goback(); }
    }
    // ========================================================Pemeriksaan========================================================
    // ========================================================Pemeriksaan========================================================
    // ========================================================Pemeriksaan========================================================
    public function actionPemeriksaan()
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
        $data = Pemeriksaan::find()
        ->joinWith('pegawai')
        ->orderBy(['id_pemeriksaan' => SORT_DESC])
        ->all();
        return $this->render('pemeriksaan/pemeriksaan', compact('data'));
    }else{ return $this->goback(); }
    }
    public function actionDetailPemeriksaan($id)
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
        $data = Pemeriksaan::findOne($id);
        $obats = Pengobatan::find()->joinWith('obat')->where(['pengobatan.id_pemeriksaan'=>$id])->all();
        return $this->render('pemeriksaan/detailpemeriksaan', compact('data', 'obats'));
    }else{ return $this->goback(); }
    }

    public function actionTambahPemeriksaan()
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
        if(!empty($_GET['nik'])){
            $cekPasien = Pasien::find()->where(['nik'=>$_GET['nik']])->one();
            if(!empty($cekPasien)){
                $model = new Pemeriksaan;
                if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                    $model->created_at = date('Y-m-d H:i:s');
                    $model->save();
                    Yii::$app->session->setFlash('success', 'Data berhasil di Tambah');
                    return $this->redirect(['transaksi/pemeriksaan']);
                }else{
                    return $this->render('pemeriksaan/tambahpemeriksaan', compact('model','cekPasien'));
                }
            }
        }else{
        return $this->render('pemeriksaan/nikpasien');
        }
    }else{ return $this->goback(); }
    }
    public function actionEditPemeriksaan($id)
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
        $model = Pemeriksaan::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('info', 'Data dengan id '.$id.' berhasil di Edit');
            return $this->redirect(['transaksi/pemeriksaan']);
        }
        else{
            return $this->render('pemeriksaan/editpemeriksaan', compact('model'));
        }
    }else{ return $this->goback(); }
    }

    public function actionPengobatan($id)
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
        $data = Pengobatan::find()->joinWith('obat')->where(['pengobatan.id_pemeriksaan'=>$id])->all();
        return $this->render('pengobatan/pengobatan', [
            'data' => $data, 'id' => $id
        ]);
    }else{ return $this->goback(); }
    }
    public function actionCreatepengobatan($id)
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
        $model = new Pengobatan();

        if ($model->load(Yii::$app->request->post())) {
            $cekQty = Obat::find()->where(['id_obat'=>$model->id_obat])->one(); 
            if($cekQty->stock > 0 && $cekQty->stock >= $model->jml_obat){
                $cekQty->stock -= $model->jml_obat;
                $cekQty->save();
                $model->save();
                return $this->redirect(['transaksi/pengobatan', 'id' => $id]);
            } else {
                Yii::$app->session->setFlash('error', "Stock tidak mencukupi, Stock tersisa $cekQty->stock");
                return $this->redirect(Yii::$app->request->referrer);
            }
        }

        return $this->render('pengobatan/createpengobatan', [
            'model' => $model, 'id' => $id
        ]);
    }else{ return $this->goback(); }
    }

    public function actionPengobatandelete($id, $idp)
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
        $model = Pengobatan::findOne($idp);
        TindakObat::deleteAll(['id_pengobatan'=>$idp]);
        if (!$model) {
            throw new NotFoundHttpException('Data not found.');
        }
        $cekQty = Obat::find()->where(['id_obat'=>$model->id_obat])->one();
        $cekQty->stock += $model->jml_obat;
        $cekQty->save();
        $model->delete();

        return $this->redirect(['transaksi/pengobatan', 'id' => $id]);
    }else{ return $this->goback(); }
    }

    public function actionTindakobat($id, $idp)
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
        $model = new TindakObat();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['transaksi/pengobatan', 'id' => $id]);
        }
        return $this->render('pengobatan/tindakobat', [
            'model' => $model, 'id' => $id, 'idp' => $idp
        ]);
    }else{ return $this->goback(); }
    }

    public function actionTindakobatdelete($id, $ido)
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
        $model = TindakObat::findOne($ido);
        if (!$model) {
            throw new NotFoundHttpException('Data not found.');
        }
        $model->delete();

        return $this->redirect(['transaksi/pengobatan', 'id' => $id]);
    }else{ return $this->goback(); }
    }

   
}