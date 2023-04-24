<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Tindakan extends ActiveRecord
{
    
    public function rules()
    {
        return [
            [['nama_tindakan'], 'required'],
        ];
    }
}