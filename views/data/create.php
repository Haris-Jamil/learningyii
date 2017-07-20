<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $data app\models\Data */
/* @var $form ActiveForm */
?>
<div class="data-create">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($data, 'birth_date')
            ->dropDownList([
                '1'=>'1',
                '2'=>'2',
                '3'=>'3',
                '4'=>'4',
                '5'=>'5',
                '6'=>'6',
                '7'=>'7',
                '8'=>'8',
                '9'=>'9',
                '10'=>'10',
                '11'=>'11',
                '12'=>'12',
                '13'=>'13',
                '14'=>'14',
                '15'=>'15',
                '16'=>'16',
                '17'=>'17',
                '18'=>'18',
                '19'=>'19',
                '20'=>'20',
                '21'=>'21',
                '22'=>'22',
                '23'=>'23',
                '24'=>'24',
                '25'=>'25',
                '26'=>'26',
                '27'=>'27',
                '28'=>'28',
                '29'=>'29',
                '30'=>'30',
                '31'=>'31'

            ], ['prompt'=>'select Date']);
        ?>

        <?= $form->field($data, 'birth_month')
            ->dropDownList([
                'January'=>'January',
                'February'=>'February',
                'March'=>'March',
                'April'=>'April',
                'May'=>'May',
                'june'=>'june',
                'July'=>'July',
                'August'=>'August',
                'September'=>'September',
                'October'=>'October',
                'November'=>'November',
                'December'=>'December'

            ], ['prompt'=>'select month']);
        ?>

        <?= $form->field($data, 'birth_year')
          ->dropDownList([
                '2017'=>'2017',
                '2016'=>'2016',
                '2015'=>'2015',
                '2014'=>'2014',
                '2013'=>'2013',
                '2012'=>'2012',
                '2011'=>'2011',
                '2010'=>'2010',
                '2009'=>'2009',
                '2008'=>'2008',
                '2007'=>'2007',
                '2006'=>'2006',
                '2005'=>'2005',
                '2004'=>'2004',
                '2003'=>'2003',
                '2002'=>'2002',
                '2001'=>'2001',
                '2000'=>'2000',
                '1999'=>'1999',
                '1998'=>'1998',
                '1997'=>'1997',
                '1996'=>'1996',
                '1995'=>'1995',
                '1994'=>'1994',
                '1993'=>'1993',
                '1992'=>'1992',
                '1991'=>'1991'

            ], ['prompt'=>'select Year']);
        ?>

        <?= $form->field($data, 'education') ?>
        <?= $form->field($data, 'work') ?>
        <?= $form->field($data, 'phone') ?> 
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- data-create -->
