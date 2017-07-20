<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $post app\models\Post */
/* @var $form ActiveForm */
?>
<div class="post-create">

	<?php if(Yii::$app->session->getFlash('post_added') !== null ): ?>
		<div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<?= Yii::$app->session->getFlash('post_added') ?>
		</div>
	<?php endif; ?>

    <?php $form = ActiveForm::begin(); ?>

    	<?= $form->errorSummary($post); ?>

        <?= $form->field($post, 'post_data')->textArea(['rows'=>'6']); ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- post-create -->
