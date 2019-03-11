<?php
/**
 * Created by PhpStorm.
 * User: youra
 * Date: 01.03.19
 * Time: 19:21
 */

namespace app\models;


use Yii;
use yii\base\Model;
use yii\helpers\Html;
use yii\web\User;

class resetPassword extends Model
{

    public $email;
    public $captcha;

    public function rules()
    {
        return [
            [['email', 'captcha'], 'required'],
            ['email', 'email'],
            ['captcha', 'captcha']
        ];

    }

    public function attributeLabels()
    {
        return [
            'email' => 'Імейл',
            'captcha' => 'Введіть код'
        ];

    }


    public function resetPassword()
    {
        if ($this->validate()) {
            $user = Userdb::findOne(['email' => $this->email]);
            if (!empty($user->email)) {
                Yii::$app->mailer->compose()
                    ->setTo($this->email)
                    ->setFrom(Yii::$app->params['adminEmail'])
                    ->setSubject('reset password')
                    ->setHtmlBody('<a href="http://web6-yii.com/index.php?r=site%2Freset-password' . $user->password_reset_token . '">visit</a>')
                    ->send();
                return true;
            } else {
                return false;
            }

        }

    }
}