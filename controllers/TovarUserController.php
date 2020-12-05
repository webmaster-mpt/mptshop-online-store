<?php

namespace frontend\controllers;

use frontend\models\SignupForm;
use Yii;
use frontend\models\TovarUser;
use frontend\models\TovarUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\HttpException;
use yii\web\UploadedFile as WebUploadedFile;

/**
 * TovarUserController implements the CRUD actions for TovarUser model.
 */
class TovarUserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TovarUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TovarUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if(Yii::$app->user->isGuest || !SignupForm::hasRole(1))
        throw new HttpException(500, "У вас недостаточно прав");
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TovarUser model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->isGuest || !SignupForm::hasRole(1))
        throw new HttpException(500, "У вас недостаточно прав");
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TovarUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TovarUser();
        if(Yii::$app->user->identity->id){
            if(Yii::$app->user->isGuest || !SignupForm::hasRole(2))
            throw new HttpException(500, "У вас недостаточно прав");
            $file = WebUploadedFile::getInstance($model, 'photo_tovar');
            if ($model->load(Yii::$app->request->post())) {
                if ($file) {
                    $photoname= uniqid($model->name) . $file->baseName . '.' . $file->extension;
                    $file->saveAs(Yii::getAlias('@frontend/web') . '/uploads/' . $photoname);
                    $model->photo_tovar = $photoname;
                    $model->status= "отказано";
                    if($model->save()){
                    Yii::$app->session->setFlash('success', 'Вы отправили запрос на продажу своего товара!)');
                    return $this->redirect(['site/index']);
                    }
                }
            }
        }
        else{
            Yii::$app->session->setFlash('error', 'Вы не авторизованы. Авторизуйтесь!');
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TovarUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if(Yii::$app->user->isGuest || !SignupForm::hasRole(1))
        throw new HttpException(500, "У вас недостаточно прав");
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TovarUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        if(Yii::$app->user->isGuest || !SignupForm::hasRole(1))
        throw new HttpException(500, "У вас недостаточно прав");
        return $this->redirect(['index']);
    }

    /**
     * Finds the TovarUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TovarUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TovarUser::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
