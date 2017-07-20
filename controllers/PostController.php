<?php

namespace app\controllers;

use Yii;
use yii\web\controllers;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use app\models\Post;



class PostController extends \yii\web\Controller
{


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'edit', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index','create', 'edit', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    public function actionCreate()
    {
        $post = new Post();

        if ($post->load(Yii::$app->request->post())) {
            if ($post->validate()) {
                    $post->save();
                    Yii::$app->getSession()->setFlash('post_added', 'New post added successfully');   
            }
        }

        return $this->render('create', [
            'post' => $post,
        ]);
    }

    public function actionDelete($id)
    {
        $post = Post::findOne($id);

        $post->delete();
        Yii::$app->getSession()->setFlash('post_deleted', 'post deleted');

        return $this->redirect('index.php?r=post');
    }

    public function actionEdit($id)
    {
       
        $post = Post::findOne($id);
        
        if ($post->load(Yii::$app->request->post())) {
            if ($post->validate()) {
                $post->save();

                Yii::$app->getSession()->setFlash('post_edited', 'post edited successfully');   
                return $this->redirect('index.php?r=post');    
            }
        }

        return $this->render('edit', [
            'post' => $post,
        ]);
    }

    public function actionIndex()
    {
        if(isset(Yii::$app->user->identity->id)){
            $user_id = Yii::$app->user->identity->id;

            $query = Post::find();

            $posts = $query->orderBy('post_time DESC')
                ->where(['user_id' => $user_id])
                ->all();

            return $this->render('index', ['posts'=>$posts]);
        }
    }

}
