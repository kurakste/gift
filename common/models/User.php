<?php

namespace common\models;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $users = [
    ];

    public static function __init()
    {
        self::$users['200'] = [
                'id' => '200', 
                'username' => env('ADMIN_LOGIN'),
                'password' => env('ADMIN_PASS'),
                'authKey' => 'sdjsfkjadljdlfjlsdfj',
                'accessToken' => 'lksajdlksafdjldfjlsdfjlsadfj',
        ];
        self::$users['201'] = [
                'id' => '201',
                'username' => env('OP_LOGIN'),
                'password' => env('OP_PASS'),
                'authKey' => 'sdjsfkvdalkfg alSKDfjlsdfj',
                'accessToken' => 'lksaFLAKSDJGLKASJGFldfjlsdfjlsadfj',
        ];
    
    }


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        self::__init();
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        self::__init();
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
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
        self::__init();
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        self::__init();
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        self::__init();
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        self::__init();
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {

        self::__init();
        return $this->password === $password;
    }
}

