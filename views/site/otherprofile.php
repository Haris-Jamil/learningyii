
<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use Yii\base\view;
use app\models\Data;
use app\models\Post;

$this->title = $user->first_name . " " . $user->last_name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-profile">

	<div class="col-md-6">
		<?= HTML::img('@web/assets/imgs/'. $user->picture , ['alt'=>'Display picture', 'width'=>'200']) ?>			
		<h1 class="page-header">
			<?= $this->title ?>
		</h1>
	    
	    <div>
	    	<?php
	        	$data = Data::findOne($user->id);
	    	?>
	    	<?php echo $this->render('/data/index', ['data'=>$data, 'userId'=>$user->id]); ?>	
	    </div>	
	</div>	
	
	
	<div class="col-md-6">
		<?php 
		 $query = Post::find();

            $posts = $query->orderBy('post_time DESC')
                ->where(['user_id' => $user->id])
                ->all();

            $other = true;
		?>
		<?php echo $this->render('/post/index', ['posts' => $posts, 'other' => $other]); ?>
	</div>

</div>