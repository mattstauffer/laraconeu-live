<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface
{
    use UserTrait, RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function messages()
    {
        return $this->hasMany('Message');
    }

    public function fullname()
    {
        return implode(' ', [$this->first_name, $this->last_name]);
    }

    public function getGravatarHash()
    {
        return md5(strtolower(trim($this->email)));
    }

    public function getGravatarUrl()
    {
        return 'http://www.gravatar.com/avatar/' . $this->getGravatarHash();
    }
}
