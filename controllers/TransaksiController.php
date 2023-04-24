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
        $data = Pasien::find()->all();
        return $this->render('pasien/pasien', compact('data'));
    }
    // public function actionDetailPasien($id)
    // {
    //     $data = Pasien::findOne($id);
    //     return $this->render('pasien/detailpasien', compact('data'));
    // }
    public function actionTambahPasien()
    {
        $model = new Pasien;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Data berhasil di Tambah');
            return $this->redirect(['transaksi/pasien']);
        }
        return $this->render('pasien/tambahpasien', compact('model'));
    }
    public function actionEditPasien($id)
    {
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
    }
    // ========================================================Pemeriksaan========================================================
    // ========================================================Pemeriksaan========================================================
    // ========================================================Pemeriksaan========================================================
    public function actionPemeriksaan()
    {
        $data = Pemeriksaan::find()
        ->joinWith('pegawai')->all();
        return $this->render('pemeriksaan/pemeriksaan', compact('data'));
    }
    public function actionDetailPemeriksaan($id)
    {
        $data = Pemeriksaan::findOne($id);
        $obats = Pengobatan::find()->joinWith('obat')->joinWith('tindakan')->where(['pengobatan.id_pemeriksaan'=>$id])->all();
        return $this->render('pemeriksaan/detailpemeriksaan', compact('data', 'obats'));
    }
    public function actionTambahPemeriksaan()
    {
        $model = new Pemeriksaan;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Data berhasil di Tambah');
            return $this->redirect(['transaksi/pemeriksaan']);
        }
        return $this->render('pemeriksaan/tambahpemeriksaan', compact('model'));
    }
    public function actionEditPemeriksaan($id)
    {
        $model = Pemeriksaan::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('info', 'Data dengan id '.$id.' berhasil di Edit');
            return $this->redirect(['transaksi/detail-pemeriksaan', 'id' => $id]);
        }
        else{
            return $this->render('pemeriksaan/editpemeriksaan', compact('model'));
        }
    }

    public function actionPengobatan($id)
    {
        $data = Pengobatan::find()->joinWith('obat')->joinWith('tindakan')->where(['pengobatan.id_pemeriksaan'=>$id])->all();
        return $this->render('pengobatan/pengobatan', [
            'data' => $data, 'id' => $id
        ]);
    }
    public function actionCreatepengobatan($id)
    {
        $model = new Pengobatan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['transaksi/pengobatan', 'id' => $id]);
        }

        return $this->render('pengobatan/createpengobatan', [
            'model' => $model, 'id' => $id
        ]);
    }

    public function actionPengobatandelete($id, $idp)
    {
        $model = Pengobatan::findOne($idp);
        if (!$model) {
            throw new NotFoundHttpException('Data not found.');
        }
        $model->delete();

        return $this->redirect(['transaksi/pengobatan', 'id' => $id]);

    }
}