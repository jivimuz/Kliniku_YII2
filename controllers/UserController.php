<?php

namespace app\controllers;

use app\models\ListUser;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii;
use yii\helpers\VarDumper;


/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        if(!Yii::$app->user->isGuest && Yii::$app->user->identity->role== 1){
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        } else {
            return $this->redirect(['site/menu']);
        }
    }

    /**
     * Displays a single User model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_user)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_user),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if(!Yii::$app->user->isGuest && Yii::$app->user->identity->role== 1){
            $model = new ListUser();

        if (($model->load(Yii::$app->request->post()))) {
            $model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
            // return varDumper::dump($model->password_hash);
            if ($model->save()) {
                if(!Yii::$app->user->isGuest){
                return $this->redirect(['view', 'id_user' => $model->id_user]);
                }else{
                    return $this->redirect(['site/login']);
                }
            }
        } else {
            $model->loadDefaultValues();
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

        
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_user)
    {
        if(!Yii::$app->user->isGuest && Yii::$app->user->identity->role== 1){
            $model = $this->findModel($id_user);

        if (($model->load(Yii::$app->request->post()))) {
            $model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
            // return varDumper::dump($model->password_hash);
            if ($model->save()) {
                return $this->redirect(['view', 'id_user' => $model->id_user]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_user)
    {
        if(!Yii::$app->user->isGuest && Yii::$app->user->identity->role== 1){
            $this->findModel($id_user)->delete();

        return $this->redirect(['index']);
        }else{ return $this->goback(); }
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_user)
    {
        if (($model = ListUser::findOne(['id_user' => $id_user])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
