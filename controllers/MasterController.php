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

class MasterController extends Controller
{
    // ========================================================Obat========================================================
    // ========================================================Obat========================================================
    // ========================================================Obat========================================================
    public function actionObat()
    {
        $data = Obat::find()->all();
        return $this->render('obat/obat', compact('data'));
    }
    public function actionDetailObat($id)
    {
        $data = Obat::findOne($id);
        return $this->render('obat/detailobat', compact('data'));
    }
    public function actionHapusObat($id)
    {
        $data = Obat::findOne($id);
        if ($data->delete()) {
            Yii::$app->session->setFlash('danger', 'Data dengan id '.$id.' berhasil di Hapus');
            $data = Obat::find()->all();
            return $this->redirect(['master/obat', compact('data')]);
        }
    }
    public function actionTambahObat()
    {
        $model = new Obat;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Data berhasil di Tambah');
            return $this->redirect(['master/obat']);
        }
        return $this->render('obat/tambahobat', compact('model'));
    }
    public function actionEditObat($id)
    {
        $model = Obat::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('info', 'Data dengan id '.$id.' berhasil di Edit');
            return $this->redirect(['master/detail-obat', 'id' => $id]);
        }
        else{
            return $this->render('obat/editobat', compact('model'));
        }
    }
    // ========================================================Pegawai========================================================
    // ========================================================Pegawai========================================================
    // ========================================================Pegawai========================================================
    public function actionPegawai()
    {
        $data = Pegawai::find()->all();
        return $this->render('pegawai/pegawai', compact('data'));
    }
    public function actionDetailPegawai($id)
    {
        $data = Pegawai::findOne($id);
        return $this->render('pegawai/detailpegawai', compact('data'));
    }
    public function actionHapusPegawai($id)
    {
        $data = Pegawai::findOne($id);
        if ($data->delete()) {
            Yii::$app->session->setFlash('danger', 'Data dengan id '.$id.' berhasil di Hapus');
            $data = Pegawai::find()->all();
            return $this->redirect(['master/pegawai', compact('data')]);
        }
    }
    public function actionTambahPegawai()
    {
        $model = new Pegawai;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Data berhasil di Tambah');
            return $this->redirect(['master/pegawai']);
        }
        return $this->render('pegawai/tambahpegawai', compact('model'));
    }
    public function actionEditPegawai($id)
    {
        $model = Pegawai::findOne($id);
        $data = ArrayHelper::map(Users::find()->asArray()->all(), 'id_user', 'nama_user');
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('info', 'Data dengan id '.$id.' berhasil di Edit');
            return $this->redirect(['master/detail-pegawai', 'id' => $id]);
        }
        else{
            return $this->render('pegawai/editpegawai', compact('model', 'data'));
        }
    }
    // ========================================================tindakan========================================================
    // ========================================================tindakan========================================================
    // ========================================================tindakan========================================================
    public function actionTindakan()
    {
        $data = Tindakan::find()->all();
        return $this->render('tindakan/tindakan', compact('data'));
    }
    public function actionDetailTindakan($id)
    {
        $data = Tindakan::findOne($id);
        return $this->render('tindakan/detailtindakan', compact('data'));
    }
    public function actionHapusTindakan($id)
    {
        $data = Tindakan::findOne($id);
        if ($data->delete()) {
            Yii::$app->session->setFlash('danger', 'Data dengan id '.$id.' berhasil di Hapus');
            $data = Tindakan::find()->all();
            return $this->redirect(['master/tindakan', compact('data')]);
        }
    }
    public function actionTambahTindakan()
    {
        $model = new Tindakan;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Data berhasil di Tambah');
            return $this->redirect(['master/tindakan']);
        }
        return $this->render('tindakan/tambahtindakan', compact('model'));
    }
    public function actionEditTindakan($id)
    {
        $model = Tindakan::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('info', 'Data dengan id '.$id.' berhasil di Edit');
            return $this->redirect(['master/detail-tindakan', 'id' => $id]);
        }
        else{
            return $this->render('tindakan/edittindakan', compact('model'));
        }
    }
    // ========================================================users========================================================
    // ========================================================users========================================================
    // ========================================================users========================================================
    public function actionUsers()
    {
        $data = Users::find()->all();
        return $this->render('users/users', compact('data'));
    }
    public function actionDetailUsers($id)
    {
        $data = Users::findOne($id);
        return $this->render('users/detailusers', compact('data'));
    }
    public function actionHapusUsers($id)
    {
        $data = Users::findOne($id);
        if ($data->delete()) {
            Yii::$app->session->setFlash('danger', 'Data dengan id '.$id.' berhasil di Hapus');
            $data = Users::find()->all();
            return $this->redirect(['master/users', compact('data')]);
        }
    }
    public function actionTambahUsers()
    {
        $model = new Users;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Data berhasil di Tambah');
            return $this->redirect(['master/users']);
        }
        return $this->render('users/tambahusers', compact('model'));
    }
    public function actionEditUsers($id)
    {
        $model = Users::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('info', 'Data dengan id '.$id.' berhasil di Edit');
            return $this->redirect(['master/detail-users', 'id' => $id]);
        }
        else{
            return $this->render('users/editusers', compact('model'));
        }
    }
    // ========================================================wilayah========================================================
    // ========================================================wilayah========================================================
    // ========================================================wilayah========================================================
    public function actionWilayah()
    {
        $data = Wilayah::find()->all();
        return $this->render('wilayah/wilayah', compact('data'));
    }
    public function actionDetailWilayah($id)
    {
        $data = Wilayah::findOne($id);
        return $this->render('wilayah/detailwilayah', compact('data'));
    }
    public function actionHapusWilayah($id)
    {
        $data = Wilayah::findOne($id);
        if ($data->delete()) {
            Yii::$app->session->setFlash('danger', 'Data dengan id '.$id.' berhasil di Hapus');
            $data = Wilayah::find()->all();
            return $this->redirect(['master/wilayah', compact('data')]);
        }
    }
    public function actionTambahWilayah()
    {
        $model = new Wilayah;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Data berhasil di Tambah');
            return $this->redirect(['master/wilayah']);
        }
        return $this->render('wilayah/tambahwilayah', compact('model'));
    }
    public function actionEditWilayah($id)
    {
        $model = Wilayah::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('info', 'Data dengan id '.$id.' berhasil di Edit');
            return $this->redirect(['master/detail-wilayah', 'id' => $id]);
        }
        else{
            return $this->render('wilayah/editwilayah', compact('model'));
        }
    }
    // ========================================================pasien========================================================
    // ========================================================pasien========================================================
    // ========================================================pasien========================================================
    public function actionPasien()
    {
        $data = Pasien::find()->all();
        return $this->render('pasien/pasien', compact('data'));
    }
    public function actionDetailPasien($id)
    {
        $data = Pasien::findOne($id);
        return $this->render('pasien/detailpasien', compact('data'));
    }
    public function actionHapusPasien($id)
    {
        $data = Pasien::findOne($id);
        if ($data->delete()) {
            Yii::$app->session->setFlash('danger', 'Data dengan id '.$id.' berhasil di Hapus');
            $data = Pasien::find()->all();
            return $this->redirect(['master/pasien', compact('data')]);
        }
    }
    public function actionTambahPasien()
    {
        $model = new Pasien;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Data berhasil di Tambah');
            return $this->redirect(['master/pasien']);
        }
        return $this->render('pasien/tambahpasien', compact('model'));
    }
    public function actionEditPasien($id)
    {
        $model = Pasien::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('info', 'Data dengan id '.$id.' berhasil di Edit');
            return $this->redirect(['master/detail-pasien', 'id' => $id]);
        }
        else{
            return $this->render('pasien/editpasien', compact('model'));
        }
    }
    
    // ========================================================pemeriksaan========================================================
    // ========================================================pemeriksaan========================================================
    // ========================================================pemeriksaan========================================================
    public function actionPemeriksaan()
    {
        $data = Pemeriksaan::find()->all();
        return $this->render('pemeriksaan/pemeriksaan', compact('data'));
    }
    public function actionDetailPemeriksaan($id)
    {
        $data = Pemeriksaan::findOne($id);
        return $this->render('pemeriksaan/detailpemeriksaan', compact('data'));
    }
    public function actionHapusPemeriksaan($id)
    {
        $data = Pemeriksaan::findOne($id);
        if ($data->delete()) {
            Yii::$app->session->setFlash('danger', 'Data dengan id '.$id.' berhasil di Hapus');
            $data = Pemeriksaan::find()->all();
            return $this->redirect(['master/pemeriksaan', compact('data')]);
        }
    }
    public function actionTambahPemeriksaan()
    {
        $model = new Pemeriksaan;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Data berhasil di Tambah');
            return $this->redirect(['master/pemeriksaan']);
        }
        return $this->render('pemeriksaan/tambahpemeriksaan', compact('model'));
    }
    public function actionEditPemeriksaan($id)
    {
        $model = Pemeriksaan::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('info', 'Data dengan id '.$id.' berhasil di Edit');
            return $this->redirect(['master/detail-pemeriksaan', 'id' => $id]);
        }
        else{
            return $this->render('pemeriksaan/editpemeriksaan', compact('model'));
        }
    }
}
