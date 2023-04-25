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
        ->joinWith('pegawai')->all();
        return $this->render('pemeriksaan/pemeriksaan', compact('data'));
    }else{ return $this->goback(); }
    }
    public function actionDetailPemeriksaan($id)
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
        $data = Pemeriksaan::findOne($id);
        $obats = Pengobatan::find()->joinWith('obat')->joinWith('tindakan')->where(['pengobatan.id_pemeriksaan'=>$id])->all();
        return $this->render('pemeriksaan/detailpemeriksaan', compact('data', 'obats'));
    }else{ return $this->goback(); }
    }
    public function actionTambahPemeriksaan()
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
        $model = new Pemeriksaan;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Data berhasil di Tambah');
            return $this->redirect(['transaksi/pemeriksaan']);
        }
        return $this->render('pemeriksaan/tambahpemeriksaan', compact('model'));
    }else{ return $this->goback(); }
    }
    public function actionEditPemeriksaan($id)
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
        $model = Pemeriksaan::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('info', 'Data dengan id '.$id.' berhasil di Edit');
            return $this->redirect(['transaksi/detail-pemeriksaan', 'id' => $id]);
        }
        else{
            return $this->render('pemeriksaan/editpemeriksaan', compact('model'));
        }
    }else{ return $this->goback(); }
    }

    public function actionPengobatan($id)
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
        $data = Pengobatan::find()->joinWith('obat')->joinWith('tindakan')->where(['pengobatan.id_pemeriksaan'=>$id])->all();
        return $this->render('pengobatan/pengobatan', [
            'data' => $data, 'id' => $id
        ]);
    }else{ return $this->goback(); }
    }
    public function actionCreatepengobatan($id)
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
        $model = new Pengobatan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['transaksi/pengobatan', 'id' => $id]);
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
        if (!$model) {
            throw new NotFoundHttpException('Data not found.');
        }
        $model->delete();

        return $this->redirect(['transaksi/pengobatan', 'id' => $id]);
    }else{ return $this->goback(); }

    }
}