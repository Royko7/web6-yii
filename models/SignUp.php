<?php
/**
 * Created by PhpStorm.
 * User: youra
 * Date: 18.02.19
 * Time: 21:10
 */

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Userdb;
use app\models\LoginForm;

class SignUp extends Model
{
    public $username;
    public $password;
    public $confirmPassword;
    public $email;

    public function rules()
    {
        return [
            // username and password are both required
            [['password', 'confirmPassword', 'email'], 'required'],
            // rememberMe must be a boolean value
            ['username', 'match', 'pattern' => '@^[a-z]+$@i', 'message' => 'some message'],
            ['email', 'validateEmail'],
            ['password', 'validatePasswordAndPasswordConfirm']
            // password is validated by validatePassword()

        ];
    }

    public function validatePasswordAndPasswordConfirm($password)
    {
        if ($this->password !== $this->confirmPassword) {

            $this->addError($password, 'password does not match');

//            return false;
//        } else {
//            return true;
        }
    }

    public function validateEmail($email, $params)
    {
        $temp = Userdb::findOne(['email' => $this->email]);

        if (!empty($temp)) {
            $this->addError($email, 'such email does exist');
            return false;
        }

        if (filter_var($this->email, FILTER_VALIDATE_EMAIL) &&
            preg_match('@^[a-z][a-z0-9\-_\.]+\@gmail\.com$@i', $this->email)) {
            return true;
        } else {
            $this->addError($email, 'Email does not match');
            return false;
        }
    }

    public function SignUp()
    {

        $status = $this->validate();
        $user = Userdb::findByUserName($this->username);
        $password_reset = mt_rand();
        $auth_keys = mt_rand();
        if (!empty($user)) {

            $this->addError('username', 'User already exist');
            return false;

        } else if ($status === true) {

            $user = new Userdb();
            $user->setAttributes(

                [
                    'username' => $this->username,
                    'password' => $this->password,
                    'email' => $this->email,
                    'status' => Userdb::USER_STATUS_REGISTERED_USER,
                    'created_at' => date('Y-m-d h:i:s'),
                    'updated_at' => date('Y-m-d h:i:s'),
                    'auth_key' => 'this will be',//todo:create
                    'password_reset_token' => md5(uniqid(rand(), true))//todo: create
                ]
                , true);
            if ($user->save()) {
//                echo 1232;
//                exit(1);
                return true;
            } else {
//                echo 123;
//                exit(2);
                return false;
            }

        }
    }


}