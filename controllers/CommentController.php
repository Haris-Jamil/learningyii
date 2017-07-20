<?php

namespace app\controllers;

use Yii;
use app\models\Comment;

class CommentController extends \yii\web\Controller
{
    public function actionIndex($postId, $com)
    {
    	$comment = new Comment();
    		  	
	  	$comment->user_id = Yii::$app->user->identity->id;
	  	$comment->post_id = $postId;
	  	$comment->com_text = $com;

	  	$comment->insert();

	    return $this->redirect('index.php?r=site/newsfeed');

    }

}
