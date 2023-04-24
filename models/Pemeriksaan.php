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
            [['id_pasien', 'id_pegawai', 'id_obat', 'id_tindakan', 'id_wilayah', 'keterangan'], 'required'],
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
    public function getTindakan() 
    {
        return $this->hasOne(Tindakan::className(), ['id_tindakan' => 'id_tindakan']);
    }    
    public function getWilayah() 
    {
        return $this->hasOne(Wilayah::className(), ['id_wilayah' => 'id_wilayah']);
    }    
    public function getObat() 
    {
        return $this->hasOne(Obat::className(), ['id_obat' => 'id_obat']);
    }    
}