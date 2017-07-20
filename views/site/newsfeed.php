<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\models\User;
use app\models\Comment;
use yii\bootstrap\ActiveForm;	

$this->title = 'newsfeed';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-profile">

    <h1 class="page-header" ><?= Html::encode($this->title) ?></h1>

    <?php foreach($data as $d): ?>
		<div class="col-md-8" >
    	<div style="background-color: #EEEEEE;margin-bottom: 30px;" >

    		<div style="padding:10px;" >
    			<?php 
    			$user = User::findOne($d['user_id']);
	    		?>
	    		
	    		<span>
	    			<?= HTML::img('@web/assets/imgs/'. $user->picture , ['alt'=>'Display picture', 'width'=>'60', 'align'=>'bottom']) ?>
	    			<b style="font-size: 15px;" ><?= $user->first_name . " " . $user->last_name ?></b>
				</span>
	    		<p style="margin-top: 5px;" ><?= $d['post_data'] ?></p>	
    		</div>
    		

    		<div style="padding-left: 10px;background-color: #bdc3c7" >
    			<?php $date = date_create($d['post_time']) ?>
    			<p style="padding: 2px;" ><?=  date_format($date, 'd F, Y H:i A') ?></p>	
    		</div>

    		<div>
    			<?php $form = ActiveForm::begin( ['action' => 'index.php?r=comment/index', 'method'=>'get'] ); ?>
    			
    				<div style="padding: 5px;" >
    					<input type="hidden" name="postId" value="<?= $d['id'] ?>">
        				<input type="text" autocomplete="off" name="com" class="form-control" placeholder="write comment here...">    
				        <input type="submit" style="position: absolute;left:-99999px;" name="">
			        </div>
    			<?php ActiveForm::end(); ?>	
    		</div>

            <div style="padding: 10px;background-color:#E4F1FE;color: black;border-bottom: 2px solid #446CB3" >
                    
                    <?php 
                    $comments = Comment::find()->where(['post_id'=> $d['id']])->all(); ?>

                    <?php foreach($comments as $com): ?>
                        <div style="border-bottom: 2px solid #E4F1FE" >
                        
                            <?php $comm_user = User::findOne($com->user_id); ?>          

                            <span>
                                <?= HTML::img('@web/assets/imgs/'. $comm_user->picture , ['alt'=>'Display picture', 'width'=>'30', 'align'=>'bottom']) ?>
                                <b><?= $comm_user->first_name . " " . $comm_user->last_name ?></b>
                            </span>

                            <p><?= $com->com_text ?></p>
                            <?php $date = date_create($com->com_time) ?>
                            <p style="padding: 2px;" ><?=  date_format($date, 'd F, Y H:i A') ?></p>    
                        </div>
                    <?php endforeach; ?>
                    
            </div>
    		

    	</div>
    	</div>
	<?php endforeach; ?>
    	
</div>
