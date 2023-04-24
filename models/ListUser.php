<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id_user
 * @property string $username
 * @property string $nama_user
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int|null $role
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class ListUser extends \yii\db\ActiveRecord
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
            [['role'], 'integer'],
            [['username'], 'string', 'max' => 32],
            [['nama_user'], 'string', 'max' => 50],
            [['password_hash', 'email'], 'string', 'max' => 255],
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
            'password_hash' => 'Password',
            'email' => 'Email',
            'role' => 'Role',
        ];
    }
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }
}
