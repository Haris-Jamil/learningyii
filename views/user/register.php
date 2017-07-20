<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $register app\models\user */
/* @var $form ActiveForm */
?>
<div class="user-register">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

        <?= $form->errorSummary($register); ?>
        <?= $form->field($register, 'first_name') ?>
        <?= $form->field($register, 'last_name') ?>
        <?= $form->field($register, 'username') ?>
        <?= $form->field($register, 'email') ?>
        <?= $form->field($register, 'password')->passwordinput(); ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-register -->
