<?php namespace App\Users\Traits;

trait UserTraits {
    /**
     * Ensures password is always hashed
     *
     * @param $password
     * @return string
     */
    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = bcrypt($password);
    }
    /**
     * Relationship to Group Model(many to many)
     *
     * @return mixed
     */
    public function groups()
    {
        return $this->belongsToMany('App\Users\Entities\Group');
    }
}