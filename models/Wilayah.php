<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Wilayah extends ActiveRecord
{
    
    public function rules()
    {
        return [
            [['nama_wilayah'], 'required'],
        ];
    }
}