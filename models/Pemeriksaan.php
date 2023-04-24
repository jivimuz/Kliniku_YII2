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
            [['id_pasien', 'id_pegawai', 'id_wilayah', 'keterangan'], 'required'],
        ];
    }
    public function getPasien() 
    {
        return $this->hasOne(Pasien::className(), ['id_pasien' => 'id_pasien']);
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