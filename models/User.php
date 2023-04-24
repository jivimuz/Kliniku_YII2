<?php

namespace app\models;
use yii;
use app\models\TblUser;
class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id_user;
    public $username;
    public $nama_user;
    public $password_hash;
    public $password_reset_token;
    public $auth_key;
    public $accessToken;
    public $email;
    public $status;
    public $role;
    public $created_at;
    public $updated_at;

    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password_hash' => '$2y$13$c8qAoLk7mEX7lwtlKDlFlO6P.iJgj4mBN2/FvjFUWyE4xFzf3FEBy',
            'auth_key' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password_hash' => 'demo',
            'auth_key' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];



    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id_user)
    {
        // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        $user = TblUser::findOne($id_user);
        if($user !== null)
        {
            return new static($user);
        }
        return null;
    }

    

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // foreach (self::$users as $user) {
        //     if ($user['accessToken'] === $token) {
        //         return new static($user);
        //     }
        // }
        $user = TblUser::find()->where(['accessToken'=>$token])->one();
        if($user !== null)
        {
            return new static($user);
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        // foreach (self::$users as $user) {
        //     if (strcasecmp($user['username'], $username) === 0) {
        //         return new static($user);
        //     }
        // }
    $user = TblUser::find()->where(['username'=>$username])->one();

        if($user !== null)
        {
            return new static($user);
        }
        return null;
    }
    

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id_user;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($auth_key)
    {
        return $this->auth_key === $auth_key;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
     /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    
    // public static function validatePassword($password)
    // {
    //     return $this->password_hash === $password;
    // }
   
    

    
}
