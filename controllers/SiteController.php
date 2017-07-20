<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\User;
use app\models\Follow;
use app\models\Post;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['profile','newsfeed','follow','logout'],
                'rules' => [
                    [
                        'actions' => ['profile','newsfeed','follow', 'logout'],
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

    /**
     * @inheritdoc
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
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('index.php?r=site/profile');
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionProfile()
    {
        $id = Yii::$app->user->identity->id;

        $user = User::findOne($id);    
        return $this->render('profile', ['user' => $user]);
    }

    public function actionOtherprofile($id)
    {
        $user = User::findOne($id);    
        return $this->render('Otherprofile', ['user' => $user]);   
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionNewsfeed()
    {

        $id = Yii::$app->user->identity->id;

        $connection = Yii::$app->getDb();

        $command = $connection->createCommand("SELECT post.id, post.user_id, post.post_data, post.post_time FROM post INNER JOIN follow ON post.user_id = follow.following_id WHERE follow.follower_id = '$id' ORDER BY post.post_time DESC ");

        $data = $command->queryAll();

        //$data = "Apple";

        return $this->render('newsfeed', ['data' => $data]);

        
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionFollow()
    {
        return $this->render('follow');
    }
}
