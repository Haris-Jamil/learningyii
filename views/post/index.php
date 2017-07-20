<?php
/* @var $this yii\web\View */
?>


<h2 class="page-header">Posts	
	<?php if(!isset($other)): ?>
	<span class="pull-right">
		<a href="index.php?r=post/create" class="btn btn-primary">Create new post</a>		
	</span>
	<?php endif; ?>
</h2>


<?php if(Yii::$app->session->getFlash('post_deleted') !== null): ?>
	<div class="alert alert-danger">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<?= Yii::$app->session->getFlash('post_deleted'); ?>
	</div>
<?php endif; ?>

<?php if(Yii::$app->session->getFlash('post_edited') !== null ): ?>
	<div class="alert alert-success">
	    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<?= Yii::$app->session->getFlash('post_edited') ?>
	</div>
<?php endif; ?>	

<?php foreach($posts as $post): ?>
	<div >

		<div style="background-color: #ecf0f1;padding: 20px;">
			<p><?= $post->post_data ?></p>	
		</div>
			
		<div style="background-color: #2c3e50; color: white;margin-bottom: 20px;padding: 15px;">
			<?php $date = strtotime($post->post_time) ?>
			<?php $formattedDate = date('F j, Y, g:i a', $date) ?>
			<span>
				<?= $formattedDate ?> 
				<?php if(!isset($other)): ?>
					<span class="pull-right">
						<a href="index.php?r=post/edit&id=<?= $post->id ?>" class="btn btn-warning btn-sm">Edit</a>		
						<a href="index.php?r=post/delete&id=<?= $post->id ?>" class="btn btn-danger btn-sm">Delete</a>			
					</span>
				<?php endif; ?>
				
			</span>	
		</div>
		
	</div>
	
<?php endforeach; ?>	




