<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\SignupForm;
use frontend\models\Tovar;
use yii\data\Sort;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actionSort()
    {
        $tovarsAll = Tovar::find()->where(['status'=>'принят'])->orderBy(['price'=>SORT_ASC])->all();
        return $this->render('sort',
        [
            'tovarsAll' => $tovarsAll,
        ]);
    }

    public function actionPrice()
    {
        $tovarsAll = Tovar::find()->where(['status'=>'принят'])->orderBy(['price'=>SORT_DESC])->all();
        return $this->render('price',
        [
            'tovarsAll'=>$tovarsAll,
        ]);
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
     * @return mixed
     */
    public function actionIndex()
    {
        $tovarsAll = Tovar::find()->andWhere(['not', ['brand' => 'mptshop']])->andWhere(['not',['brand' => 'chill']])->andWhere(['status' => 'принят'])->all();
        $tovarsMy = Tovar::find()->where(['or', ['brand' => 'mptshop']])->orWhere(['and',['brand' => 'chill']])->andWhere(['status' => 'принят'])->all();

        return $this->render('index',
        [
            'tovarsAll'=>$tovarsAll,
            'tovarsMy'=>$tovarsMy
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Спасибо за регистрацию. Авторизируйтесь!');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }
}
