<?php namespace App\Users\Traits;

trait PermissionsTraits {
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