<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string|null $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int|null $role
 * @property int $status
 * @property string|null $accessToken
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class TblUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username','nama_user', 'password_hash', 'email'], 'required'],
            [['role', 'status'], 'integer'],
            [['username', 'auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token', 'email', 'created_at', 'updated_at'], 'string', 'max' => 255],
            [['accessToken','nama_user'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'ID',
            'username' => 'Username',
            'nama_user' => 'Nama User',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'role' => 'Role',
            'status' => 'Status',
            'accessToken' => 'Access Token',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
