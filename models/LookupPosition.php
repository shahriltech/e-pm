<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookup_position".
 *
 * @property integer $position_id
 * @property string $position
 * @property integer $role
 */
class LookupPosition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_position';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role'], 'integer'],
            [['position'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'position_id' => 'Position ID',
            'position' => 'Position',
            'role' => 'Role',
        ];
    }
}
