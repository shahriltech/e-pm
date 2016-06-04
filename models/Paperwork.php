<?php

namespace app\models;

use Yii;
use app\models\StatusPaperwork;
use app\models\Userpwas;
/**
 * This is the model class for table "paperwork".
 *
 * @property integer $id
 * @property string $nama_program
 * @property string $pw_obj
 * @property string $pw_background
 * @property string $pw_advantage
 * @property string $pw_date
 * @property string $jangka_masa
 * @property double $pw_budget
 * @property integer $user_id
 * @property integer $status_by_su
 * @property integer $status_by_bendahari
 * @property integer $status_by_timbalan
 * @property integer $status_by_nazir
 */
class Paperwork extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paperwork';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pw_budget'], 'number','message'=>'Nombor sahaja dibenarkan untuk jumlah peruntukan'],
            [['user_id', 'status_by_su', 'status_by_bendahari', 'status_by_timbalan', 'status_by_nazir'], 'integer'],
            [['nama_program','pw_submit_status'], 'string', 'max' => 200],
            [['pw_obj'], 'string', 'max' => 1000],
            [['pw_background','pw_advantage','pw_justifikasi'], 'string', 'max' => 1000],
            [['pw_startdate','pw_yearApprove'], 'string', 'max' => 20],
            [['pw_norujukan','pw_endDate','pw_dateUpdated','pw_monthlyApprove'], 'string', 'max' => 50],
            [['jangka_masa'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pw_norujukan'=>'No Rujukan',
            'nama_program' => 'Nama Program',
            'pw_obj' => 'Objektif Program',
            'pw_background' => 'Latar Belakang Program',
            'pw_advantage' => 'Kelebihan Program',
            'pw_startdate' => 'Tarikh Program Bermula',
            'jangka_masa' => 'Masa Program',
            'pw_budget' => 'Jumlah Peruntukan Diperlukan',
            'user_id' => 'User ID',
            'status_by_su' => 'Status By Su',
            'status_by_bendahari' => 'Status By Bendahari',
            'status_by_timbalan' => 'Status By Timbalan',
            'status_by_nazir' => 'Status By Nazir',
            'pw_submit_status' => 'Status Penghantaran',
            'pw_justifikasi' =>'Justikasi',
            'pw_endDate'=>'Tarikh Program Berakhir',
            'pw_dateUpdated'=>'Tarikh/Minggu',
            'pw_yearApprove'=>'Tahun',
            'pw_monthlyApprove'=>'Bulan',
        ];
    }
    public function getNama()
    {
        return $this->hasOne(Userpwas::className(), ['id' => 'user_id']);
    }
    public function getStatusbysetia()
    {
        return $this->hasOne(StatusPaperwork::className(), ['id' => 'status_by_su']);
    }
    public function getStatusbybendahari()
    {
        return $this->hasOne(StatusPaperwork::className(), ['id' => 'status_by_bendahari']);
    }
    public function getStatusbytimbalan()
    {
        return $this->hasOne(StatusPaperwork::className(), ['id' => 'status_by_timbalan']);
    }
    public function getStatusbynazir()
    {
        return $this->hasOne(StatusPaperwork::className(), ['id' => 'status_by_nazir']);
    }
}
