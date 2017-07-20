<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $post app\models\Post */
/* @var $form ActiveForm */
?>
<div class="post-edit">



    <?php $form = ActiveForm::begin(); ?>

    	<?= $form->errorSummary($post); ?>

        <?= $form->field($post, 'post_data')->textArea(['rows'=>'6']); ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
            <a class="btn btn-warning " href="index.php?r=post">Cancel</a>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- post-edit -->