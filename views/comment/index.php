<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comment */
/* @var $form ActiveForm */
?>
<div class="comment-index">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($comment, 'user_id') ?>
        <?= $form->field($comment, 'post_id') ?>
        <?= $form->field($comment, 'com_text') ?>
        <?= $form->field($comment, 'com_time') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- comment-index -->
