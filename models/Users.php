<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Users extends ActiveRecord
{
    
    public function rules()
    {
        return [
            [['nama_user', 'username', 'password'], 'required'],
        ];
    }
}