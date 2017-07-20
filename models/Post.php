<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $post_data
 * @property string $post_time
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_data'], 'required'],
            [['user_id'], 'integer'],
            [['post_data'], 'string'],
            [['post_time'], 'safe'],
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
            'post_data' => 'Post Data',
            'post_time' => 'Post Time',
        ];
    }

    public function beforeSave($insert){

        $this->user_id = Yii::$app->user->identity->id;

        return Parent::beforeSave($insert);
    }
}
