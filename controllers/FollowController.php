<?php

namespace app\controllers;

use Yii;
use app\models\Follow;

class FollowController extends \yii\web\Controller
{

    public function actionConnect($following)
    {
    	$follow = new Follow();

    	$follower = Yii::$app->user->identity->id;
    	
    	$follow->follower_id = $follower;
    	$follow->following_id = $following;
    	$follow->insert();
        
        return $this->redirect('index.php?r=site/otherprofile&id='.$following);
    }

    public function actionDiscon($unfollow)
    {
        $id = Follow::findOne($unfollow);
        $id->delete();

        Yii::$app->getSession()->setFlash('unfollowed', 'User unfollowed');

        return $this->redirect('index.php?r=site/follow');
    }

}
