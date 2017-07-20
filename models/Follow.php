<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "follow".
 *
 * @property integer $id
 * @property integer $follower_id
 * @property integer $following_id
 */
class Follow extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'follow';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['follower_id', 'following_id'], 'required'],
            [['follower_id', 'following_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'follower_id' => 'Follower ID',
            'following_id' => 'Following ID',
        ];
    }
}
