<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Pegawai extends ActiveRecord
{
    
    public function rules()
    {
        return [
            [['id_user', 'telepon_pegawai', 'email_pegawai','nip_pegawai'], 'required'],
        ];
    }
    public function getUsers() 
    {
        return $this->hasOne(Users::className(), ['id_user' => 'id_user']);
    }   
}