<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Follow';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-follow">

	<?php if( Yii::$app->session->getFlash('unfollowed') !== null ): ?>
		<div class="alert alert-danger">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<?= Yii::$app->session->getFlash('unfollowed'); ?>
		</div>
	<?php endif; ?>
 	
 	<div class="form-inline">
		
		<?php $id = Yii::$app->user->identity->id; ?>

 		<input type="text" id="keyword" class="form-control">	    
 		<input type="hidden" id="curUser" value="<?= $id ?>" name="">
	    <button class="btn btn-primary" onclick="getPeople();" >Search</button>
	    
 	</div>

 	<div id="result">
 		
 	</div>
 	 	
</div>

<script type="text/javascript">
	function getPeople()
	{
		var kw = $('#keyword').val();
		var curUser = $('#curUser').val();

		if(kw != "")
		{	
			$.ajax({
				'url' : 'getPeople.php',
				'type': 'get',
				'data': 'keyword='+kw+'&user='+curUser,
				'success': function(data){
					$('#result').html(data);
				} 
			});
		}
		else
		{
			alert('please enter something to search');
		}
	}

	function follow()
	{
		
	}
</script>
