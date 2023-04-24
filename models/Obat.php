<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Obat extends ActiveRecord
{
    
    public function rules()
    {
        return [
            [['nama_obat', 'harga_obat'], 'required'],
        ];
    }
}