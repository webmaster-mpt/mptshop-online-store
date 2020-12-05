<?php

namespace frontend\controllers;

use frontend\models\Buyer;
use Yii;
use frontend\models\tovar;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile as WebUploadedFile;
/**
 * TovarController implements the CRUD actions for tovar model.
 */
class TovarController extends Controller
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
     * Displays a single tovar model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = new tovar();
        $email='sino.muzafari0401@gmail.com';
        $buyer_model = new Buyer();
        if ($buyer_model->load(Yii::$app->request->post())) {
            if($buyer_model->id_user=Yii::$app->user->identity->id){            
                if ($buyer_model->save($model->load(Yii::$app->request->post()))) {
                    Yii::$app->mailer->compose()
                    ->setFrom($email)
                    ->setTo($buyer_model->email)
                    ->setBcc($email)
                    ->setSubject('Chill$h0p')
                    ->setHtmlBody(
                        '<h3>Вы приобрели товар в интернет магазине Chill$h0p<h3>
                        <p style="font-size:15px;"> --------------- Ваш чек: --------------- <br><p>
                        <p> --------------- Название товара: '.$model->name.' --------------- <p>
                        <p> --------------- Бренд: '.$model->brand.' --------------- <p>
                        <p> --------------- Размер: '.$model->size.' --------------- <p>
                        <p> --------------- Цена купленого товара: '.$model->price.' ---------------<p>'
                    )
                    ->send();
                        Yii::$app->session->setFlash('success', 'На почте чек!)');
                        return $this->goHome();
                }
            }
            else{
                Yii::$app->session->setFlash('error', 'Вы не авторзованы!)');
                return $this->goHome();
            }
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'buyer_model' => $buyer_model
        ]);
       
    }
    /**
     * Creates a new tovar model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new tovar();

        $file = WebUploadedFile::getInstance($model, 'photo_tovar');
        if ($model->load(Yii::$app->request->post())) {
            if ($file) {
                $photoname= uniqid($model->name) . $file->baseName . '.' . $file->extension;
                $file->saveAs(Yii::getAlias('@frontend/web') . '/uploads/' . $photoname);
                $model->photo_tovar = $photoname;
                $model->status= "принято";
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the tovar model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return tovar the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = tovar::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
