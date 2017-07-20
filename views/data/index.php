<?php
/* @var $this yii\web\View */
?>


<div class="col-md-6">

		
	<h3>About:</h3>

	<?php if(Yii::$app->session->getFlash('info_edit') !== null  ): ?>
            <div class="alert alert-success">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo Yii::$app->session->getFlash('info_edit') ?>
            </div>
    <?php endif; ?>

	
	<?php if(isset($data->id)): ?>
		<ul class="list-group">
			<li class="list-group-item">
				<span style="color: #2980b9">Born:</span> 
				<?= $data->birth_date ."-". $data->birth_month ."-". $data->birth_year ?>	
			</li>

			<li class="list-group-item">
				<span style="color: #2980b9">Studied at:</span>
				<?= $data->education; ?>	
			</li>

			<li class="list-group-item">
				<span style="color: #2980b9">Works at:</span>
				<?= $data->work?>	
			</li>

			<li class="list-group-item">
				<span style="color: #2980b9">Works at:</span>
				<?= $data->phone?>	
			</li>
		</ul>	
	<?php else: ?>
		<h2 style="color:#bdc3c7; ">Add information using below button</h2>
	<?php endif; ?>

	<?php if($userId == Yii::$app->user->identity->id): ?>
		<?php if(!isset($data->id)): ?>
				<a href="index.php?r=data/create" class="btn btn-primary">Add Info</a>	
		<?php else: ?>
				<a href="index.php?r=data/edit&id=<?=$data->id?>" class="btn btn-success">Edit Info</a>	
		<?php endif; ?>
	<?php endif; ?>

</div>




