<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Pemeriksaan extends ActiveRecord
{
    
    public function rules()
    {
        return [
            [['nik', 'id_pegawai', 'id_wilayah'], 'required'],
            [['created_at', 'keterangan'], 'safe'],
        ];
    }
    public function getPasien() 
    {
        return $this->hasOne(Pasien::className(), ['nik' => 'nik']);
    }    
    public function getPegawai() 
    {
        return $this->hasOne(Pegawai::className(), ['id_pegawai' => 'id_pegawai']);
    }
    
    public function getWilayah() 
    {
        return $this->hasOne(Wilayah::className(), ['id_wilayah' => 'id_wilayah']);
    }    
    
}