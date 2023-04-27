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
        if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
        $data = Obat::find()->all();
        return $this->render('obat/obat', compact('data'));
        }else{ return $this->goback(); }
    }
    public function actionDetailObat($id)
    {
        if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
            $data = Obat::findOne($id);
        return $this->render('obat/detailobat', compact('data'));
        }else{ return $this->goback(); }
    }
    public function actionHapusObat($id)
    {
        if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
            $data = Obat::findOne($id);
        if ($data->delete()) {
            Yii::$app->session->setFlash('danger', 'Data dengan id '.$id.' berhasil di Hapus');
            $data = Obat::find()->all();
            return $this->redirect(['master/obat', compact('data')]);
        }
        }else{ return $this->goback(); }
    }
    public function actionTambahObat()
    {
        if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
            $model = new Obat;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Data berhasil di Tambah');
            return $this->redirect(['master/obat']);
        }
        
        return $this->render('obat/tambahobat', compact('model'));
        }else{ return $this->goback(); }
    }
    public function actionEditObat($id)
    {
        if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
            $model = Obat::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('info', 'Data dengan id '.$id.' berhasil di Edit');
            return $this->redirect(['master/obat', 'id' => $id]);
        }
        else{
            return $this->render('obat/editobat', compact('model'));
        }
        }else{ return $this->goback(); }
    }
    // ========================================================Pegawai========================================================
    // ========================================================Pegawai========================================================
    // ========================================================Pegawai========================================================
    public function actionPegawai()
    {
        if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
            $data = Pegawai::find()->all();
        return $this->render('pegawai/pegawai', compact('data'));
        }else{ return $this->goback(); }
    }
    public function actionDetailPegawai($id)
    {
        if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
            $data = Pegawai::findOne($id);
        return $this->render('pegawai/detailpegawai', compact('data'));
        }else{ return $this->goback(); }
    }
    public function actionHapusPegawai($id)
    {
        if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
            $data = Pegawai::findOne($id);
        if ($data->delete()) {
            Yii::$app->session->setFlash('danger', 'Data dengan id '.$id.' berhasil di Hapus');
            $data = Pegawai::find()->all();
            return $this->redirect(['master/pegawai', compact('data')]);
            }
        }else{ return $this->goback(); }
    }
    public function actionTambahPegawai()
    {
        if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
            $model = new Pegawai;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Data berhasil di Tambah');
            return $this->redirect(['master/pegawai']);
        }
        return $this->render('pegawai/tambahpegawai', compact('model'));
        }else{ return $this->goback(); }
    }
    public function actionEditPegawai($id)
    {
        if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
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
    }else{ return $this->goback(); }
    }
    // ========================================================tindakan========================================================
    // ========================================================tindakan========================================================
    // ========================================================tindakan========================================================
    public function actionTindakan()
    {
        if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
            $data = Tindakan::find()->all();
        return $this->render('tindakan/tindakan', compact('data'));
        }else{ return $this->goback(); }
    }
    public function actionDetailTindakan($id)
    {
        if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
            $data = Tindakan::findOne($id);
        return $this->render('tindakan/detailtindakan', compact('data'));
        }else{ return $this->goback(); }
    }
    public function actionHapusTindakan($id)
    {
        if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
            $data = Tindakan::findOne($id);
        if ($data->delete()) {
            Yii::$app->session->setFlash('danger', 'Data dengan id '.$id.' berhasil di Hapus');
            $data = Tindakan::find()->all();
            return $this->redirect(['master/tindakan', compact('data')]);
        }
    }else{ return $this->goback(); }
    }
    public function actionTambahTindakan()
    {
        if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
            $model = new Tindakan;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Data berhasil di Tambah');
            return $this->redirect(['master/tindakan']);
        }
        return $this->render('tindakan/tambahtindakan', compact('model'));
    }else{ return $this->goback(); }
    }
    public function actionEditTindakan($id)
    {
        if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
            $model = Tindakan::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('info', 'Data dengan id '.$id.' berhasil di Edit');
            return $this->redirect(['master/tindakan']);
        }
        else{
            return $this->render('tindakan/edittindakan', compact('model'));
        }
        }else{ return $this->goback(); }
    }
    // ========================================================users========================================================
    // ========================================================users========================================================
    // ========================================================users========================================================
    public function actionUsers()
    {
        if(Yii::$app->session->get('users')->role == 1){
            $data = Users::find()->all();
        return $this->render('users/users', compact('data'));
        }else{ return $this->goback(); }
    }
    public function actionDetailUsers($id)
    {
        if(Yii::$app->session->get('users')->role == 1 ){
            $data = Users::findOne($id);
        return $this->render('users/detailusers', compact('data'));
        }else{ return $this->goback(); }
    }
    public function actionHapusUsers($id)
    {
        if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
            $data = Users::findOne($id);
        if ($data->delete()) {
            Yii::$app->session->setFlash('danger', 'Data dengan id '.$id.' berhasil di Hapus');
            $data = Users::find()->all();
            return $this->redirect(['master/users', compact('data')]);
        }
    }else{ return $this->goback(); }
    }
    public function actionTambahUsers()
    {
    if(Yii::$app->session->get('users')->role == 1 ){
            $model = new Users;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Data berhasil di Tambah');
            return $this->redirect(['master/users']);
        }
        return $this->render('users/tambahusers', compact('model'));
    }else{ return $this->goback(); }
    }
    public function actionEditUsers($id)
    {
    if(Yii::$app->session->get('users')->role == 1  ){
        $model = Users::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('info', 'Data dengan id '.$id.' berhasil di Edit');
            return $this->redirect(['master/detail-users', 'id' => $id]);
        }
        else{
            return $this->render('users/editusers', compact('model'));
        }
    }else{ return $this->goback(); }
    }
    // ========================================================wilayah========================================================
    // ========================================================wilayah========================================================
    // ========================================================wilayah========================================================
    public function actionWilayah()
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
        $data = Wilayah::find()->all();
        return $this->render('wilayah/wilayah', compact('data'));
    }else{ return $this->goback(); }
    }
    public function actionDetailWilayah($id)
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
        $data = Wilayah::findOne($id);
        return $this->render('wilayah/detailwilayah', compact('data'));
    }else{ return $this->goback(); }
    }
    public function actionHapusWilayah($id)
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
        $data = Wilayah::findOne($id);
        if ($data->delete()) {
            Yii::$app->session->setFlash('danger', 'Data dengan id '.$id.' berhasil di Hapus');
            $data = Wilayah::find()->all();
            return $this->redirect(['master/wilayah', compact('data')]);
        }
    }else{ return $this->goback(); }
    }
    public function actionTambahWilayah()
    {  
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
        $model = new Wilayah;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Data berhasil di Tambah');
            return $this->redirect(['master/wilayah']);
        }
        return $this->render('wilayah/tambahwilayah', compact('model'));
    }else{ return $this->goback(); }
    }
    public function actionEditWilayah($id)
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
        $model = Wilayah::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('info', 'Data dengan id '.$id.' berhasil di Edit');
            return $this->redirect(['master/wilayah', 'id' => $id]);
        }
        else{
            return $this->render('wilayah/editwilayah', compact('model'));
        }
    }else{ return $this->goback(); }
    }
    // ========================================================pasien========================================================
    // ========================================================pasien========================================================
    // ========================================================pasien========================================================
    public function actionPasien()
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
        $data = Pasien::find()->all();
        return $this->render('pasien/pasien', compact('data'));
    }else{ return $this->goback(); }
    }
    public function actionDetailPasien($id)
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
        $data = Pasien::findOne($id);
        return $this->render('pasien/detailpasien', compact('data'));
    }else{ return $this->goback(); }
    }
    public function actionHapusPasien($id)
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
        $data = Pasien::findOne($id);
        if ($data->delete()) {
            Yii::$app->session->setFlash('danger', 'Data dengan id '.$id.' berhasil di Hapus');
            $data = Pasien::find()->all();
            return $this->redirect(['master/pasien', compact('data')]);
        }
    }else{ return $this->goback(); }
    }
    public function actionTambahPasien()
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
        $model = new Pasien;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Data berhasil di Tambah');
            return $this->redirect(['master/pasien']);
        }
        return $this->render('pasien/tambahpasien', compact('model'));
    }else{ return $this->goback(); }
    }
    public function actionEditPasien($id)
    {
    if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 2 ){
        $model = Pasien::findOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('info', 'Data dengan id '.$id.' berhasil di Edit');
            return $this->redirect(['master/detail-pasien', 'id' => $id]);
        }
        else{
            return $this->render('pasien/editpasien', compact('model'));
        }
    }else{ return $this->goback(); }
    }
    
    // ========================================================pemeriksaan========================================================
    // ========================================================pemeriksaan========================================================
    // ========================================================pemeriksaan========================================================
    // public function actionPemeriksaan()
    // {
    // if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
    //     $data = Pemeriksaan::find()->all();
    //     return $this->render('pemeriksaan/pemeriksaan', compact('data'));
    // }
    // }
    // public function actionDetailPemeriksaan($id)
    // {
    // if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
    //     $data = Pemeriksaan::findOne($id);
    //     return $this->render('pemeriksaan/detailpemeriksaan', compact('data'));
    // }
    // }
    // public function actionHapusPemeriksaan($id)
    // {
    // if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
    //     $data = Pemeriksaan::findOne($id);
    //     if ($data->delete()) {
    //         Yii::$app->session->setFlash('danger', 'Data dengan id '.$id.' berhasil di Hapus');
    //         $data = Pemeriksaan::find()->all();
    //         return $this->redirect(['master/pemeriksaan', compact('data')]);
    //     }
    //     }
    // }
    // public function actionTambahPemeriksaan()
    // {
    // if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
    //     $model = new Pemeriksaan;
    //     if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    //         $model->save();
    //         Yii::$app->session->setFlash('success', 'Data berhasil di Tambah');
    //         return $this->redirect(['master/pemeriksaan']);
    //     }
    //     return $this->render('pemeriksaan/tambahpemeriksaan', compact('model'));
    // }
    // }
    // public function actionEditPemeriksaan($id)
    // {
    // if(Yii::$app->session->get('users')->role == 1 || Yii::$app->session->get('users')->role == 3 ){
    //     $model = Pemeriksaan::findOne($id);
    //     if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    //         $model->save();
    //         Yii::$app->session->setFlash('info', 'Data dengan id '.$id.' berhasil di Edit');
    //         return $this->redirect(['master/detail-pemeriksaan', 'id' => $id]);
    //     }
    //     else{
    //         return $this->render('pemeriksaan/editpemeriksaan', compact('model'));
    //     }
    // }
    // }
}
