<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Pasien extends ActiveRecord
{
    
    public function rules()
    {
        return [
            [['nama_pasien', 'ttl_pasien', 'jenis_kelamin_pasien', 'alamat_pasien', 'telepon_pasien'], 'required'],
        ];
    }
}