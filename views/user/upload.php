<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $user app\models\user */
/* @var $form ActiveForm */
?>
<div class="user-upload">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->errorSummary($user); ?>

        <?= $form->field($user, 'picture')->fileInput(); ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-upload -->
