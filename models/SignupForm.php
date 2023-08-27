<?php
 
namespace app\models;
 
use Yii;
use yii\base\Model;
 
/**
 * Signup form
 */
class SignupForm extends Model
{
 
    public $username;
    public $email;
    public $status;
    public $jabatan;
    public $role;
    public $nama_lengkap;
    public $nip;
    public $nomor_hp;
    public $password;
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['jabatan', 'trim'],
            ['jabatan', 'required'],
            ['nama_lengkap', 'trim'],
            ['nama_lengkap', 'required'],
            ['nip', 'trim'],
            ['nip', 'required'],
            ['nomor_hp', 'trim'],
            ['nomor_hp', 'required'],
            ['role', 'required'],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            
        ];
    }
 
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
 
        if (!$this->validate()) {
            return null;
        }
 
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->jabatan = $this->jabatan;
        $user->nama_lengkap = $this->nama_lengkap;
        $user->nip = $this->nip;
        $user->nomor_hp = $this->nomor_hp;
        $user->role = $this->role;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        return $user->save() ? $user : null;
    }
 
}