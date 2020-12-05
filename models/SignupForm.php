<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $password;
    public $role_id;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
        ];
    }
    public static function hasRole($role_id){
        if(!is_array($role_id)) $role_id = [$role_id];
        return in_array(SignupForm::findCurrent()->role_id, $role_id);
    }
    public static function findCurrent() {
        if(Yii::$app->user->isGuest)
            return null;
        return User::findOne([
            'id' => Yii::$app->user->identity->getId(),
        ]);
    }
    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $user->username = $this->username;
        $user->role_id = 2;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save();
    }
}
