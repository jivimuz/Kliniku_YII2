<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\TblUser;
use yii\helpers\Redirect;
use app\models\Pasien;
use app\models\Pemeriksaan;
use app\models\Pengobatan;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

   
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post())) {
            $user_id = TblUser::find()->where(['username'=>$model->username])->one();
            if($user_id !== null){
                Yii::$app->session->set('users', $user_id);
                $model->login();
            }else{
                return $this->render('login', [
                    'model' => $model,
                ]);
            }
            
            // return $this->render('menu');
        return $this->redirect(['site/menu']);
        }

        return $this->render('login', [
            'model' => $model,
        ]);
        
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->session->remove('user');
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    // public function actionContact()
    // {
    //     $model = new ContactForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
    //         Yii::$app->session->setFlash('contactFormSubmitted');

    //         return $this->refresh();
    //     }
    //     return $this->render('contact', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Displays about page.
     *
     * @return string
     */
    // public function actionAbout()
    // {
    //     return $this->render('about');
    // }
    
     public function actionMenu()
    {
        
        return $this->render('menu');
    }

    public function actionGraph()
    {
        $data = Yii::$app->db->createCommand(
            'select nama_obat, count(pengobatan.id_obat) as jml from pengobatan 
            JOIN obat ON pengobatan.id_obat = obat.id_obat group by pengobatan.id_obat'
            )->queryAll();
            
        $data2 = Yii::$app->db->createCommand(
            'select id_user, count(pemeriksaan.id_pegawai) as jml from pemeriksaan 
            JOIN pegawai ON pemeriksaan.id_pegawai = pegawai.id_pegawai group by pemeriksaan.id_pegawai'
            )->queryAll();
        return $this->render('graph',  ['data' => $data,'data2' => $data2]);
    }
    public function actionDaftarpasien()
    {
        $model = new Pasien;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Data berhasil di Tambah, Selanjutnya silahkan menunggu anjuran dokter');
            return $this->goBack();
        }
        return $this->render('daftarpasien', compact('model'));
    }

    public function actionCekinvoice(){
        return $this->render('cekinvoice');
    }

    public function actionInvoice($nik)
    {
        $data = Pemeriksaan::find()->where(['nik'=>$nik])->orderBy(['id_pemeriksaan' => SORT_DESC])->one();
        if(empty($data)){
            Yii::$app->session->setFlash('error', 'Data NIK tidak terdaftar');
            return $this->render('cekinvoice');
        }
        $obats = Pengobatan::find()->joinWith('obat')->where(['id_pemeriksaan'=>$data->id_pemeriksaan])->orderBy(['pengobatan.id_pemeriksaan' => SORT_DESC])->all();
        
        return $this->render('invoice', compact('data', 'obats'));
    }

    
}
