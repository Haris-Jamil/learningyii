<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%data}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $birth_date
 * @property string $birth_month
 * @property string $birth_year
 * @property string $education
 * @property string $work
 * @property string $phone
 */
class Data extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%data}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['birth_date', 'birth_month', 'birth_year'], 'string', 'max' => 10],
            [['education', 'work'], 'string', 'max' => 500],
            [['phone'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'birth_date' => 'Birth Date',
            'birth_month' => 'Birth Month',
            'birth_year' => 'Birth Year',
            'education' => 'Where do you study?',
            'work' => 'Where do you Work?',
            'phone' => 'Phone',
        ];
    }

    public function beforeSave($insert)
    {   
        $this->user_id = Yii::$app->user->identity->id;
        return Parent::beforeSave($insert);
    }
}
