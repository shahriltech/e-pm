<?php

namespace app\models;

use Yii;
use app\models\LookupPosition;
use app\models\Userpass;
use app\models\LookupRole;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $ic_no
 * @property string $fullname
 * @property string $username
 * @property integer $role
 * @property string $password
 * @property integer $position_id
 */
class Userpwas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname'], 'required', 'message' => 'Sila Isi Nama Penuh Anda'],
            [['username'], 'required', 'message' => 'Sila Isi Nama Samaran Anda'],
            [['email'], 'required', 'message' => 'Sila Isi Email Anda'],
            [['role'], 'required', 'message' => 'Sila Pilih Jenis Pengguna'],
            [['position_id'], 'required', 'message' => 'Sila Pilih Jawatan Anda'],
            [['ic_no'], 'required', 'message' => 'Sila Isi No Kad Pengenalan'],
            ['email','email', 'message' => 'Email Yang Di Gunakan Tidak Sah.'],
            [['password_hash'],'required', 'message' => 'Sila Isi Kata Laluan Anda'],
            [['role', 'position_id','status'], 'integer'],
            [['ic_no'], 'string', 'max' => 14],
            ['ic_no', 'unique','message' => 'Kad Pengenalan Ini Telah Wujud'],
            ['username', 'unique'],
            ['email','email'],
            [['fullname','email'], 'string', 'max' => 250],
            [['username'], 'string', 'max' => 100],
            [['password_hash'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 50],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ic_no' => 'Kad Pengenalan',
            'fullname' => 'Nama Penuh',
            'username' => 'Nama Samaran',
            'role' => 'Jenis Pengguna',
            'password_hash' => 'Kata Laluan',
            'position_id' => 'Jawatan',
            'auth_key' => 'auth_key',
            'status'=>'Status',
            'email'=>'Email'
        ];
    }
    
}
