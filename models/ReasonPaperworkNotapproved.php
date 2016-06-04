<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reason_paperworkNotapproved".
 *
 * @property integer $id
 * @property string $sebab
 * @property integer $paperwork_id
 */
class ReasonPaperworkNotapproved extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reason_paperworkNotapproved';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['paperwork_id'], 'integer'],
            [['sebab'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sebab' => '',
            'paperwork_id' => '',
        ];
    }
}
