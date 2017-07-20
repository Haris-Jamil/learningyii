	<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use Yii\base\view;
use app\models\Data;

$this->title = $user->first_name . " " . $user->last_name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-profile">

<?= HTML::img('@web/assets/imgs/'. $user->picture , ['alt'=>'Display picture', 'width'=>'200', 'align'=>'bottom']) ?>
					
	<h1 class="page-header">

		<?= $this->title ?>

		<span class="pull-right">
			<a href="index.php?r=user/upload" class="btn btn-primary btn-sm">Update Profile Picture</a>
		</span>
	</h1>
    
    <div>
    	<?php
    		$id = Yii::$app->user->identity->id;
        	$data = Data::findOne($id);
    	?>
    	<?php echo $this->render('/data/index', ['data'=>$data, 'userId'=>$id]); ?>	
    </div>
	

</div>
