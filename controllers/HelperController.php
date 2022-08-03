<?php

namespace frontend\controllers;

use Yii;
use common\models\Helper;
use frontend\models\HelperSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HelperController implements the CRUD actions for Helper model.
 */
class HelperController extends Controller
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

    public function actionAnswerForm(){
        $post = Yii::$app->request->post();
        $helpers = Helper::find()->all();
        if(isset($post['save'])){
            $helpers->save();
            if (isset($post['delete'])) {
                foreach ($helpers as $id => $helper) {
                    if ($helper->id == $post['delete']) {
                        $helper->delete();
                        unset($helpers[$id]);
                    }
                }
            }
        }
        return $this->render('answer-form',[
            'helpers' => $helpers
        ]);
    }
//
//    public static function handleHelpersParts($post, $user_id) {
//        $helpers = Helper::find()->where(['user_id' => $user_id])->indexBy('id')->all();
//
//        if ($post) {
//            if (isset($post['delete'])) {
//                foreach ($helpers as $id => $helper) {
//                    if ($helper->id == $post['delete']) {
//                        $helper->delete();
//                        unset($helpers[$id]);
//                    }
//                }
//            }
//            if (isset($post['clear'])) {
//                foreach ($helpers as $helper) {
//                    $helper->delete();
//                }
//                $helpers = [];
//            } else if (isset($post['create'])) {
//                $newHelper = new Helper();
//                $newHelper->user_id = $user_id;
//                $newHelper->save();
//                $helpers[$newHelper->id] = $newHelper;
//            } else if (Helper::loadMultiple($helpers, $post) && Helper::validateMultiple($helpers)) {
//                foreach ($helpers as $helper) {
//                    $helper->save(false);
//                }
//            }
//        }
//        return $helpers;
//    }

    /**
     * Lists all Helper models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HelperSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Helper model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Helper model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Helper();

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = Yii::$app->user->id;
            $model->save();
            return $this->redirect(['/']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Helper model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Helper model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Helper model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Helper the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Helper::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
