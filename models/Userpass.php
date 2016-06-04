<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userpass".
 *
 * @property integer $id
 * @property string $pass
 * @property integer $user_id
 */
class Userpass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'userpass';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pass', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['pass'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pass' => 'Pass',
            'user_id' => 'User ID',
        ];
    }
}
